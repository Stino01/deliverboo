    <template>
  <section>
    <!-- <TypesSlider /> -->

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
              :to="{
                name: 'single-restaurant',
                params: { slug: restaurant.slug },
              }"
            >
              Visualizza Ristorante
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <!-- <div v-if="finalRestaurants.length == 0" class="container">
      <p>Non ci sono ristoranti che corrispondono a questa tipologia</p>
    </div> -->
  </section>
</template>

<script>
import InputComponent from "./InputComponent.vue";
import TypesSlider from "./TypesSlider.vue";
export default {
  name: "RestaurantGridComponent",
  components: { TypesSlider, InputComponent },
  data() {
    return {
      types: [],
      restaurants: [],
      searchText: [],
      filter: [],
      finalRestaurants: [],
    };
  },
  methods: {
    setSearchType(index) {
      this.searchText = index;
      // console.log(this.filteredList);
      // console.log(this.finalRestaurants);
      // console.log(this.searchText);
      // this.filter = [...this.filteredList];
      // console.log(this.filter, "array");
      // console.log(this.filteredList)
    },
  },
  created() {
    //CHIAMATA AXIOS PER TYPES
    axios
      .get("/api/types")
      .then((res) => {
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
      if (this.searchText === []) {
        return (this.restaurants = []);
      }
      return this.restaurants.filter((el) => {
        // console.log(this.searchText, "Array coi tipi");
        // console.log(el.pivot_type_id, "tipo di ristorante");
        if (this.searchText.includes(el.pivot_type_id)) {
          if (!this.filter.includes(el.pivot_restaurant_id)) {
            this.filter.push(el.pivot_restaurant_id);
            this.finalRestaurants.push(el);
            console.log(this.finalRestaurants);
          }
          return el;
          // console.log(this.filter, "array");
          // console.log(el);
        }
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>