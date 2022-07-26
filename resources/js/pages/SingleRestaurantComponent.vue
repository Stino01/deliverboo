<template>
    <div class="container">
        <!-- MODAL -->
        <div>
            <div>&nbsp;</div>
            <div>
                <button
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#cart"
                >
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="badge badge-light">{{ badge }}</span>
                </button>
                <div class="modal fade" id="cart">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Your Cart</h5>
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
                                            <td>&euro; {{ cart.price }}</td>
                                            <td width="100">
                                                <input
                                                    type="text"
                                                    readonly
                                                    class="form-control"
                                                    v-model="quantity"
                                                />
                                            </td>
                                            <td width="60">
                                                <button
                                                    @click="removeCart(n)"
                                                    class="btn btn-danger btn-sm"
                                                >
                                                    <i
                                                        class="fa-solid fa-xmark"
                                                    ></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                Total Price: &euro; {{ totalprice }} &nbsp;
                                <a href="/orders/create">
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
                <h2>MENU</h2>
                <h3>CATEGORIE</h3>
                <div class="container">
                    <div v-for="category in categories" :key="category.id">
                        <h2>{{ category.name }}</h2>
                        <hr />

                        <div class="row justify-content-center">
                            <div
                                class="col-lg-3 col-md-6 col-sm-6 mb-4 mb-md-4"
                                v-for="product in products"
                                :key="product.id"
                            >
                                <div
                                    class="card p-2 d-flex text-center text-white align-items-center justify-content-between"
                                    style="
                                        height: 25rem;
                                        background-color: #042940;
                                    "
                                    v-if="product.category_id == category.id"
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
                                            style="
                                                height: 10rem;
                                                width: 10rem;
                                                background-color: red;
                                            "
                                        >
                                            <img
                                                class="img-fluid text-center"
                                                v-bind:src="product.image"
                                                v-bind:alt="product.name"
                                            />
                                        </div>
                                        <button
                                            @click="addCart(product)"
                                            class="btn btn_main"
                                        >
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
            // cart
            carts: [],
            cartadd: {
                id: "",
                name: "",
                price: "",
                amount: "",
                restaurant_id: "",
            },
            formattedTotal: null,
            badge: "0",
            quantity: "1",
            totalprice: "0",
        };
    },
    created() {
        this.viewCart();
    },
    methods: {
        viewCart() {
            if (localStorage.getItem("carts")) {
                this.carts = JSON.parse(localStorage.getItem("carts"));
                this.badge = this.carts.length;
                this.totalprice = this.carts.reduce((total, item) => {
                    // console.log(total);
                    // console.log(this.quantity);
                    // console.log(item.price);
                    this.formattedTotal = Math.round(
                        parseFloat(total) + parseFloat(item.price)
                    ).toFixed(2);
                    return this.formattedTotal;
                }, 0);
            }
        },
        addCart(pro) {
            let check = false;
            // this.cartadd.id = pro.id;
            // this.cartadd.name = pro.name;
            // this.cartadd.price = pro.price;
            // this.cartadd.amount = pro.amount;
            // this.cartadd.restaurant_id = pro.restaurant_id;
            // console.log(pro.restaurant_id);
            // console.log(pro);
            console.log(this.carts, "CARRELLO");
            // console.log(this.restaurant.restaurant.name);
            // console.log(this.restaurant.restaurant.user_id);
            this.carts.forEach((element) => {
                // element.restaurant_id = this.restaurant.restaurant.name;
                // pro.restaurant_id = this.restaurant.restaurant.name;
                // console.log(pro.restaurant_id);
                // console.log(element.restaurant_id);
                // element.push(this.restaurant.name);
                // if (pro.resturant_id == this.restaurant.restaurant.user_id) {
                //   pro.restaurant_id = this.restaurant.restaurant.name;
                // }
                // console.log(pro);
                // console.log(element, "e poi", pro.restaurant_id);
                if (element.restaurant_id != pro.restaurant_id) {
                    check = true;
                }
            });
            if (check) {
                let deleteCart = confirm(
                    "Non puoi acquistare contemporanemante da più ristoranti. Vuoi veramente svuotare il carrello per inserire questo prodotto?"
                );
                if (deleteCart) {
                    this.emptyCart();
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
                this.carts.push(pro);
                this.cartadd = {};
                this.storeCart();
            }
        },
        removeCart(pro) {
            this.carts.splice(pro, 1);
            this.storeCart();
        },
        storeCart() {
            this.carts.forEach((el) => {
                console.log(el);
                el.restaurant_name = this.restaurant.restaurant.name;
            });
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem("carts", parsed);
            this.viewCart();
        },
        emptyCart() {
            window.localStorage.clear();
            this.carts = [];
        },
    },
    mounted() {
        const slug = this.$route.params.slug;

        axios
            .get(`/api/restaurants/${slug}`)
            .then((response) => {
                this.restaurant = response.data;
                this.products = response.data.products;
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
