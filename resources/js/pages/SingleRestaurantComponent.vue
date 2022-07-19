<template>
  <div class="container">
    <h1>{{ restaurant.name }}</h1>
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
    axios.get(`/api/restaurants/${slug}`).then((response) => {
      this.restaurant = response.data;
    });
  },
};
</script>

<style lang="scss" scoped>
</style>