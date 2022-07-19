<template>
  <div class="container">
    <div class="card">
      <div v-if="restaurant">
        <div class="card-header">
          <h1>{{ restaurant.name }}</h1>
        </div>
      </div>
      <div class="card-body">
        <h1></h1>
        <h2>MENU</h2>
        <h3>CATEGORIE</h3>
        <ul>
          <li v-for="category in categories" :key="category.id">
            <a href="">{{ category.name }}</a>
          </li>
        </ul>
        <h3>LISTA PRODOTTI</h3>
        <ul>
          <li v-for="product in products" :key="product.id" >
            {{ product.name }}
          </li>
        </ul>
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
    };
  },
  mounted() {
    const slug = this.$route.params.slug;
    
    axios.get(`/api/restaurants/${slug}`).then((response) => {
      this.restaurant = response.data.restaurant;
      this.products = response.data.products;
    }).catch((error) => {
      console.log(error);
    });;

    axios.get("/api/categories").then((res) => {
        this.categories = res.data.categories;
    }).catch((error) => {
      console.log(error);
    });
  },
};
</script>

<style lang="scss" scoped>
</style>