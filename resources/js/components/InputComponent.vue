<template>
  <div class="container" id="example-3">
    <div class="row d-flex justify-content-center">
      <div
        v-for="(type, index) in restaurantTypes"
        :key="index"
        class="col-sm my-4 checkbox"
      >
        <input
          type="checkbox"
          name="type"
          id="type"
          :value="index + 1"
          v-model="selectValue"
          @change="searchType"
        />
        <label
          class="text-capitalize card_title text-white font-weight-bold"
          for="type"
          >{{ type.name }}</label
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "InputComponent",
  data() {
    return {
      selectValue: [],
    };
  },
  props: ["restaurantTypes"],
  methods: {
    searchType() {
      this.$emit("searchType", this.selectValue);
    },
  },
};
</script>

<style lang="scss">
.card_title {
  position: absolute;
  top: 10%;
  left: 10%;
}

// .checkbox > span {
//     color: #005c53;
//     padding: 0.5rem 0.25rem;
// }

.checkbox {
  display: inline-flex;
  cursor: pointer;
  position: relative;

  & > input {
    -webkit-appearance: none;
    -moz-appearance: none;
    -o-appearance: none;
    appearance: none;
    outline: none;
    height: 15rem;
    width: 15rem;
    // border: 1px solid #34495e;
    border-radius: 4px;
    transition-duration: 0.3s;
    background-size: 80%;
    background-repeat: no-repeat;
    background-position: center;
    cursor: pointer;
  }

  &:first-of-type > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635790712892/unknown.png");
    background-color: #adc965;
    //TYPES 1 PIZZA
  }
  &:nth-child(2) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431633597071400/unknown.png");
    background-color: #89d5c9;
    //TYPES 2 SUSHI
  }

  &:nth-child(3) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431634133946518/unknown.png");
    background-color: #fac172;
    //TYPES 3 DESSERT
  }
  &:nth-child(4) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434061042130974/poke_icon.png");
    background-color: #ff8357;
    //TYPES 4 POKE
  }
  &:nth-child(5) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431634444333147/unknown.png");
    background-color: #e25b45;
    //TYPES 5 GELATO
  }
  &:nth-child(6) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635060887664/unknown.png");
    background-color: #fabe0e;
    //TYPES 6 HAMBURGER
  }
  &:nth-child(7) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635484508431/unknown.png");
    background-color: #f5c6b2;
    //TYPES 7 KEBAB
  }
  &:nth-child(8) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431636008800347/unknown.png");
    background-color: #aae6da;
    //TYPES 8 SANDWICH
  }
  &:nth-child(9) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434061251854336/americana_icon.png");
    background-color: #e0966f;
    //TYPES 9 AMERICANO
  }
  &:nth-child(10) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434781866827847/italiana_icon.png");
    background-color: #49888a;
    //TYPES 10 ITALIANO
  }
  &:nth-child(11) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431633878110298/unknown.png");
    background-color: #b68141;
    //TYPES 11 CINESE
  }
  &:nth-child(12) > input {
    background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434781489336401/giapponese_icon.png");
    background-color: #f8b2bc;
    //TYPES 12 GIAPPONESE
  }

  & > input:checked {
    border: 0.5rem solid #dbf227;
  }

  & > input:active {
    border: 0.5rem solid #005c53;
  }
}
</style>
