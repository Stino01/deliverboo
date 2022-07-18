<template>
  <main>
    <SloganComponent />
    <TypesSlider />

    <label type="text" for="type">Type</label>
    <select class="form-control" name="type" id="type" v-model="inputText" @change="changeSearch()">
      <option value="">All</option>
      <option :value="index" v-for="(type, index) in types" :key="index">{{ type.name }}</option>
    </select>

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
      inputText: '',
      searchText: "",
    };
  },
  methods: {
    changeSearch(){
        this.searchText = this.inputText
        //console.log(this.searchText)
    }
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

</style>