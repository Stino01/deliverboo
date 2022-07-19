<template>
  <main>
    <SloganComponent />
    <button
      type="button"
      class="btn btn-warning"
      @click="addToCart('Kebab con cipolla')"
    >
      Aggiungi al carrello
    </button>
    <div class="card" v-if="cart">
      {{ cart.nomeProdotto }} : &euro;{{ cart.prezzo }}
    </div>
    
    <router-view></router-view>
    <RestaurantGridComponent />
  </main>
</template>

<script>
import SloganComponent from "./SloganComponent.vue";
import RestaurantGridComponent from "./RestaurantGridComponent.vue";
export default {
  name: "MainComponent",
  components: {  SloganComponent, RestaurantGridComponent },
  data() {
    return {
      cart: null,
    };
  },
  methods: {
    addToCart(prodotto, price = 5) {
      window.localStorage.setItem("nomeProdotto", prodotto);
      window.localStorage.setItem("prezzo", price);
      this.cart = { nomeProdotto: prodotto, prezzo: price };
    },
  },
  created() {
    this.cart = {
      nomeProdotto: window.localStorage.getItem("nomeProdotto"),
      prezzo: window.localStorage.getItem("prezzo"),
    };
  },
};
</script>

<style lang="scss" scoped>
</style>