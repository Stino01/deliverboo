<template>
  <div class="container">
    <!-- MODAL -->
    <div>
      <div>&nbsp;</div>
      <div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#cart">
          <i class="fa-solid fa-cart-shopping"></i>
          <span class="badge badge-light">{{ badge }}</span>
        </button>
        <div class="modal fade" id="cart">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4>Il tuo carrello</h4>
                <button @click="sendOrder()">Prova chiamata API</button>
                <button
                  type="button"
                  class="close"
                  data-dismiss="modal"
                  aria-label="Close"
                >
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="cart-body">
                <table class="table table-striped text-left">
                  <tbody>
                    <tr v-for="(cart, n) in carts" :key="n">
                      <td>{{ cart.name }}</td>
                      <td>&euro; {{ cart.subtotal.toFixed(2) }}</td>
                      <td width="100">
                        <input
                          type="text"
                          readonly
                          class="form-control"
                          v-model="cart.quantity"
                        />
                        <div class="d-flex justify-content-around">
                          <button @click="addQuantity(cart)">
                            <i class="fa-solid fa-plus text-success"></i>
                          </button>
                          <button @click="decreaseQuantity(cart)">
                            <i class="fa-solid fa-minus text-muted"></i>
                          </button>
                        </div>
                      </td>
                      <td width="60">
                        <button
                          @click="removeCart(n)"
                          class="btn btn-danger btn-sm"
                        >
                          <i class="fa-solid fa-xmark text-danger"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="modal-footer">
                Total Price: &euro; {{ totalprice }} &nbsp;
                <a href="/orders/create" v-if="carts.length > 0">
                  <button
                    type="submit"
                    value="Checkout"
                    class="btn btn-primary"
                  >
                    Checkout
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CARD PRODOTTI-->
    <div class="card">
      <div v-if="restaurant">
        <div class="card-header">
          <h1>{{ restaurant.name }}</h1>
        </div>
      </div>
      <div class="card-body">
        <h2>I NOSTRI PIATTI</h2>
        <div class="container">
          <div class="row justify-content-center">
            <div
              class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-md-4"
              v-for="product in products"
              :key="product.id"
            >
              <div
                class="
                  card
                  p-2
                  d-flex
                  text-center text-white
                  align-items-center
                  justify-content-between
                "
                style="height: 25rem; background-color: #042940"
              >
                <div>
                  <h4 class="card-title text-uppercase">
                    {{ product.name }}
                  </h4>
                  <h6 class="card-subtitle mb-2">
                    Prezzo: &euro; {{ product.price }}
                  </h6>

                  <p class="card-text">
                    {{ product.description }}
                  </p>
                </div>

                <div class="d-flex styled">
                  <div
                    class="mb-3 text-center"
                    style="height: 10rem; width: 10rem; background-color: red"
                  >
                    <img
                      class="img-fluid text-center"
                      v-bind:src="product.image"
                      v-bind:alt="product.name"
                    />
                  </div>
                  <button @click="addToCart(product)" class="btn btn_main">
                    Aggiungi al carrello
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SingleRestaurantComponent",
  data() {
    return {
      restaurant: null,
      categories: [],
      products: [],
      carts: [],

      cartadd: {
        id: "",
        name: "",
        lastname: "",
        email: "",
        phone: null,
        price: "",
        amount: "",
        restaurant_id: "",
        prod_id: [],
        prod_qnty: [],
        total: null,
      },

      formData: {
        id: "",
        name: "",
        lastname: "",
        email: "",
        phone: null,
        price: "",
        amount: "",
        restaurant_id: "",
        prod_id: [],
        prod_qnty: [],
        total: null,
      },

      formattedTotal: null,
      badge: "0",
      quantity: "1",
      totalprice: "0",
      // count: 1,
    };
  },
  created() {
    this.viewCart();
  },
  methods: {
    // FUNZIONE PER VISUALIZZARE I DATI CORRETTI NEL CARRELLO
    viewCart() {
      if (localStorage.getItem("carts")) {
        this.carts = JSON.parse(localStorage.getItem("carts"));

        // FUNZIONE PER IL NUMERINO DEI PRODOTTI NEL BADGE
        this.badge = this.carts.reduce((total, item) => {
          return total + item.quantity;
        }, 0);

        // FUNZIONE PER VISUALIZZARE IL PREZZO TOTALE ALLA FINE DELL'ORDINE
        this.totalprice = this.carts.reduce((total, item) => {
          // console.log(total, "questo è total");
          // console.log(item, "questo è item");
          this.formattedTotal = (
            parseFloat(total) + parseFloat(item.subtotal)
          ).toFixed(2);
          return this.formattedTotal;
        }, 0);
      }
    },
    // FUNZIONE PER AGGIUNGERE PRODOTTI AL CARRELLO
    addToCart(pro) {
      let check = false;
      this.carts.forEach((element) => {
        if (element.restaurant_id != pro.restaurant_id) {
          check = true;
        }
      });
      if (check) {
        // ECCEZIONE, PRODOTTI DA RISTORANTI DIVERSI
        let deleteCart = confirm(
          "Non puoi acquistare contemporanemante da più ristoranti. Vuoi veramente svuotare il carrello per inserire questo prodotto?"
        );
        if (deleteCart) {
          // CANCELLAZIONE CARRELLO E AGGIUNTA PRODOTTO DI RISTORANTE DIVERSO
          this.emptyCart();
          pro.quantity = 1;
          this.carts.push(pro);
          this.cartadd.id = pro.id;
          this.cartadd.name = pro.name;
          this.cartadd.price = pro.price;
          window.localStorage.setItem(
            `item${this.carts.length}`,
            JSON.stringify(pro)
          );
          this.storeCart();
        }
      } else {
        pro.quantity = 1;
        // QUA ENTRA SOLO SE IL CARRELLO E' VUOTO
        if (this.carts.length == 0) {
          this.carts.push(pro);
          // IN QUESTO ELSE ENTRA SOLO DOPO IL PRIMO ELEMENTO AGGIUNTO NEL CARRELLO
        } else {
          // this.carts.push(pro);
          let itemInCart = this.carts.filter((item) => item.id === pro.id);
          let isItemInCart = itemInCart.length > 0;

          if (isItemInCart === false) {
            this.carts.push(Vue.util.extend({}, pro));
          } else {
            itemInCart[0].quantity += pro.quantity;
          }
        }
        this.cartadd = {};
        this.storeCart();
        // console.log(this.carts);
      }
    },

    //FUNZIONE PER AUMENTARE LA QUANTITA' DEL PRODOTTO
    addQuantity(cart) {
      // cart.quantity = 1;
      // console.log(cart);
      let itemInCart = this.carts.filter((item) => item.id === cart.id);
      itemInCart[0].quantity += 1;
      this.cartadd = {};
      this.storeCart();
    },

    //FUNZIONE PER DIMINUIRE LA QUANTITA' DEL PRODOTTO
    decreaseQuantity(cart) {
      // cart.quantity = 1;
      // console.log(cart);
      let itemInCart = this.carts.filter((item) => item.id === cart.id);
      itemInCart[0].quantity -= 1;
      if (itemInCart[0].quantity <= 0) {
        this.carts.splice(cart, 1);
        this.storeCart();
      }
      this.cartadd = {};
      this.storeCart();
    },

    // FUNZIONE PER RIMUOVERE TUTTA UNA LISTA DI PRODOTTI UGUALI DAL CARRELLO
    removeCart(pro) {
      this.carts.splice(pro, 1);
      this.storeCart();
    },

    // FUNZIONE PER SALVARE IL CARRELLO
    storeCart() {
      this.carts.forEach((el) => {
        // console.log(el);
        el.subtotal = el.price * el.quantity;
        el.restaurant_name = this.restaurant.restaurant.name;
      });
      let parsed = JSON.stringify(this.carts);
      localStorage.setItem("carts", parsed);
      this.viewCart();
    },

    // FUNZIONE PER SVUOTARE IL CARRELLO
    emptyCart() {
      window.localStorage.clear();
      this.carts = [];
    },

    //CHIAMATA API PER PASSARE I PRODOTTI AL BACKEND

    sendOrder() {
      // console.log(this.products);
      let prod = this.products;
      // if (this.check) {
      //   this.payment = true;
      prod.forEach((element) => {
        this.formData.prod_id.push(element.id);
        // console.log(element.id);
        // console.log(this.formData.prod_id);
        this.formData.prod_qnty.push(element.qnty);
      });

      this.formData.total = this.total;
      console.log(this.formData.prod_id);
      axios
        .post("/api/orders", this.formData)
        .then((res) => {
          console.log(res);
        })
        .catch((err) => {
          console.error(err);
        });
      // }
      //  else {
      //   this.$refs["error"].innerHTML = "Compila tutti i campi obbligatori";
      //   const timeout = setTimeout(() => {
      //     this.$refs["error"].innerHTML = "";
      //   }, 3000);
      // }
    },
  },
  mounted() {
    const slug = this.$route.params.slug;

    axios
      .get(`/api/restaurants/${slug}`)
      .then((response) => {
        this.restaurant = response.data;
        this.products = response.data.products;
        // this.products.forEach((product) => {
        // product.quantity = 0;
        // });
        // console.log(this.products, "e poi", this.restaurant);
      })
      .catch((error) => {
        console.log(error);
      });

    axios
      .get("/api/categories")
      .then((res) => {
        this.categories = res.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>







































































































<style lang="scss" scoped>
.styled {
  flex-direction: column;
  align-items: center;
}

hr {
  margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 2px solid rgba(0, 0, 0, 0.1);
}
</style>
