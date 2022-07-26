<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use App\Restaurant;
use App\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate($this->validationRule);
        $data = $request->all();
        $newOrder = new Order();
        $newOrder->name = $data['name'];
        $newOrder->surname = $data['surname'];
        $newOrder->email = $data['email'];
        $newOrder->phone_number = $data['phone_number'];
        $newOrder->total_price = $data['total_price'];
        $newOrder->billing_address = $data['billing_address'];
        $newOrder->shipping_address = $data['shipping_address'];
        $newOrder->shipped = false;
        // $message = "Ordine effettuato con successo";

        $newOrder->save();

        // $newOrder->products()->sync($data['products']);

        return redirect()->route('orders.edit', $newOrder->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        // INIZIALIZZAZIONE BRAINTREE
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3928pc3krb84swd8',
            'publicKey' => 'kv8cv2x6j45gmnw9',
            'privateKey' => '3af3bb352ecedf87038faf05f13f6c21'
        ]);

        // PASSAGGIO DEL TOKEN ALLA ROTTA
        $token = $gateway->ClientToken()->generate();
        // $order = Order::where('name', $order)->first();
        // dump($order->id);
        // dump($token);
        return view('orders.edit', ['token' => $token, 'order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // PROCESSO DI PAGAMENTO: SE AVVIENE CON SUCCESSO, CAMBIA IL VALORE DI ORDER DA "NON SPEDITO" A "SPEDITO"

        $data = $request->all();
        //qui inizializzo braintree
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '3928pc3krb84swd8',
            'publicKey' => 'kv8cv2x6j45gmnw9',
            'privateKey' => '3af3bb352ecedf87038faf05f13f6c21'
        ]);

        //NONCE DAL CLIENTE
        $nonceFromTheClient = $request->payment_method_nonce;

        //RISULTATO DEL PAGAMENTO
        $result = $gateway->transaction()->sale([
            'amount' => $order->total_price,
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        //dd($result);
        if ($result->success) {
            //dd($sponsorization);
            $order->shipped = true;
            $order->update();
            Mail::to('amministazione@deliverboo.it')->send(new SendNewMail($order->name, $order->total_price));
            return view('orders.success');
        } else {
            return view('orders.failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
