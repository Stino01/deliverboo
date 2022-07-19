<template>
  <div class="container">
    <div v-if="restaurant">
      <h1>{{ restaurant.name }}</h1>
    </div>
  </div>
</template>

<script>
export default {
  name: "SingleRestaurantComponent",
  data() {
    return {
      restaurant: null,
    };
  },
  mounted() {
    const slug = this.$route.params.slug;
    // console.log(slug);
    axios.get(`/api/restaurants/${slug}`).then((response) => {
      this.restaurant = response.data;
      console.log(this.restaurant);
    });
  },
};
</script>

<style lang="scss" scoped>
</style>