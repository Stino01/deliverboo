    <template>
  <section>
    <TypesSlider />
    <InputComponent @searchType="setSearchType($event)" :restaurantTypes="types" />
    <div v-if="filteredList.length > 0" class="row d-flex justify-content-around my-5" >
      <div v-for="restaurant in filteredList" :key="restaurant.index" class=" d-flex justify-content-center col-6 col-sm-4 col-md-3 col-lg-2 m-3 " >
        <div class="card">
          <div class="card-header">
            {{ restaurant.name }}
          </div>
          <div class="card-body">
            <router-link class="mx-2 btn btn_main" :to="{ name: 'single-restaurant', params: { slug: restaurant.slug }, }" >
              Visualizza Ristorante
            </router-link>
          </div>
        </div>
      </div>
    </div>
    <div v-if="filteredList.length == 0" class="container">
      <p>Non ci sono ristoranti che corrispondono a questa tipologia</p>
    </div>
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
    };
  },
  methods: {
    setSearchType(index) {
      this.searchText = index;
      console.log(this.filteredList);
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
        if (this.searchText.includes(el.pivot_type_id)) {
          return el
        }
      });
    },
  },
};
</script>

<style lang="scss" scoped>
</style>