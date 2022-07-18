<template>
  <main>
    <SloganComponent />
    <TypesSlider />

    <!-- <label type="text" for="type">Type</label>
    <select
      class="form-control"
      name="type"
      id="type"
      v-model="inputText"
      @change="changeSearch"
    > -->
    <!-- <option value="">All</option> -->
    <!-- <option :value="index" v-for="(type, index) in types" :key="index">
        {{ type.id }} - {{ type.name }}
      </option>
    </select>

    <ul>
      <li v-for="(restaurant, index) in filteredList" :key="index">
        <a v-if="restaurant.pivot_type_id == searchText" href=""
          >{{ restaurant.name }} - {{ restaurant.pivot_type_id }}</a
        >
      </li>
    </ul> -->
    <InputComponent
      @searchType="setSearchType($event)"
      :restaurantTypes="types"
    />
    <div
      v-if="filteredList.length > 0"
      class="row d-flex justify-content-around my-5"
    >
      <div
        v-for="restaurant in filteredList"
        :key="restaurant.index"
        class="
          d-flex
          justify-content-center
          col-6 col-sm-4 col-md-3 col-lg-2
          m-3
        "
      >
        <div class="card">
          <div class="card-header">
            {{ restaurant.name }}
          </div>
          <div class="card-body">
            <router-link
              class="mx-2 btn btn_main"
              :to="{ name: 'single-restaurant', params: { slug: restaurant.slug } }"
            >
              Visualizza Ristorante
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import TypesSlider from "./TypesSlider.vue";
import SloganComponent from "./SloganComponent.vue";
import InputComponent from "./InputComponent.vue";
export default {
  name: "MainComponent",
  components: { TypesSlider, SloganComponent, InputComponent },
  data() {
    return {
      types: [],
      restaurants: [],
      inputText: "",
      searchText: "",
    };
  },
  methods: {
    setSearchType(index) {
      // this.searchText = this.inputText + 1;
      this.searchText = index + 1;
      console.log(this.searchText);
      console.log(this.filteredList);
    },
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
  computed: {
    filteredList() {
      if (this.searchText === "") {
        return this.restaurants;
      }
      return this.restaurants.filter((el) => {
        return el.pivot_type_id === this.searchText;
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>