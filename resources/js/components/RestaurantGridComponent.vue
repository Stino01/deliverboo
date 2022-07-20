    <template>
  <section>
    <!-- <TypesSlider /> -->

    <div class="container">
      <div class="row">
        <div
          v-for="(type, index) in types"
          :key="index"
          class="col-sm-6 col-md-3 col-lg-2 py-2 checkbox"
        >
          <input
            type="checkbox"
            name="type"
            id="type"
            :value="index + 1"
            v-model="selectValue"
            @change="searchType()"
          />
          <label
            class="text-uppercase font-weight-bold pt-2 label_text"
            for="type"
            >{{ type.name }}</label
          >
        </div>
      </div>
    </div>

    <div
      v-if="restaurants.length > 0"
      class="row d-flex justify-content-around my-5"
    >
      <div
        v-for="restaurant in restaurants"
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
// import InputComponent from "./InputComponent.vue";
import TypesSlider from "./TypesSlider.vue";
export default {
  name: "RestaurantGridComponent",
  components: { TypesSlider },
  data() {
    return {
      types: [],
      restaurants: [],
      selectValue: [],
      apiPath: "api/restaurants",
    };
  },
  methods: {
    getApiTypes() {
      axios
        .get("api/types")
        .then((response) => {
          this.types = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    searchType() {
      if (this.selectValue.length > 0) {
        let finalQuery = "";
        this.selectValue.forEach((el) => {
          finalQuery += el + ",";
        });

        axios
          .get(`${this.apiPath}?type=${finalQuery}`)
          .then((response) => {
            this.restaurants = response.data;
          })
          .catch((error) => {
            console.log(error);
          });
      } else {
        axios
          .get(this.apiPath)
          .then((response) => {
            console.log(response.data);
            this.restaurants = response.data;
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
  created() {
    this.getApiTypes();
    this.searchType();
  },
};
</script>

<style lang="scss" scoped>
// .label_text {
//     position: absolute;
//     top: 50%;
//     transform: translateY(-50%);
//     color: #005c53!important;
// text-shadow: 2px 0 #fff, -2px 0 #fff, 0 2px #fff, 0 -2px #fff,
//              1px 1px #fff, -1px -1px #fff, 1px -1px #fff, -1px 1px #fff;
// }

// .checkbox > span {
//     color: #005c53;
//     padding: 0.5rem 0.25rem;
// }

.checkbox {
  display: inline-flex;
  cursor: pointer;
  position: relative;
  flex-direction: column;
  align-items: center;

  & > input {
    -webkit-appearance: none;
    -moz-appearance: none;
    -o-appearance: none;
    appearance: none;
    outline: none;
    height: 8rem;
    width: 8rem;
    // border: 1px solid #34495e;
    border-radius: 50%;
    transition-duration: 0.3s;
    background-size: 80%;
    background-repeat: no-repeat;
    background-position: center;
    cursor: pointer;
  }

  //TYPES 1 PIZZA
  &:first-of-type > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635790712892/unknown.png");
    background-color: #adc965;
  }
  //TYPES 2 SUSHI
  &:nth-child(2) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431633597071400/unknown.png");
    background-color: #89d5c9;
  }

  //TYPES 3 DESSERT
  &:nth-child(3) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431634133946518/unknown.png");
    background-color: #fac172;
  }

  //TYPES 4 POKE
  &:nth-child(4) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434061042130974/poke_icon.png");
    background-color: #ff8357;
  }

  //TYPES 5 GELATO
  &:nth-child(5) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431634444333147/unknown.png");
    background-color: #e25b45;
  }

  //TYPES 6 HAMBURGER
  &:nth-child(6) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635060887664/unknown.png");
    background-color: #fabe0e;
  }

  //TYPES 7 KEBAB
  &:nth-child(7) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635484508431/unknown.png");
    background-color: #f5c6b2;
  }

  //TYPES 8 SANDWICH
  &:nth-child(8) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431636008800347/unknown.png");
    background-color: #aae6da;
  }

  //TYPES 9 AMERICANO
  &:nth-child(9) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434061251854336/americana_icon.png");
    background-color: #e0966f;
  }

  //TYPES 10 ITALIANO
  &:nth-child(10) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434781866827847/italiana_icon.png");
    background-color: #49888a;
  }

  //TYPES 11 CINESE
  &:nth-child(11) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431633878110298/unknown.png");
    background-color: #b68141;
  }

  //TYPES 12 GIAPPONESE
  &:nth-child(12) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434781489336401/giapponese_icon.png");
    background-color: #f8b2bc;
  }

  & > input:checked {
    border: 0.5rem solid #dbf227;
  }

  & > input:active {
    border: 0.5rem solid #005c53;
  }
}
</style>