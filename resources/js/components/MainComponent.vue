<template>
  <main>
    <SloganComponent />
    <TypesSlider />

    <ul>
      <li v-for="(type, index) in types" :key="index">
        {{ type.name }}
      </li>
    </ul>

    <ul>
      <li v-for="(restaurant, index) in restaurants" :key="index">
        {{ restaurant.name }}
      </li>
    </ul>
  </main>
</template>

<script>
import TypesSlider from "./TypesSlider.vue";
import SloganComponent from "./SloganComponent.vue";
export default {
  name: "MainComponent",
  components: { TypesSlider, SloganComponent },
  data() {
    return {
      types: [],
      restaurants: [],
    };
  },
  created() {
    //CHIAMATA AXIOS PER TYPES
    axios
      .get("/api/types")
      .then((res) => {
        // console.log(res.data.types);
        this.types = res.data.types;
      })
      .catch((error) => {
        console.log(error);
      });

    //CHIAMATA AXIOS PER RISTORANTI
    axios
      .get("/api/restaurants")
      .then((res) => {
        this.restaurants = res.data.restaurants;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>

<style lang="scss" scoped>
main {
  height: 100vh;
}
</style>