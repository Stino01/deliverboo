<template>
  <div>
    <select
      class="form-select mt-3"
      name="type"
      id="type"
      v-model="selectValue"
      @change="searchType"
    >
      <option value="">Tipologia</option>
      <option
        :value="index"
        v-for="(type, index) in restaurantTypes"
        :key="index"
      >
        {{ type.id }} - {{ type.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  name: "InputComponent",
  data() {
    return {
      selectValue: "",
    };
  },
  props: ["restaurantTypes"],
  methods: {
    searchType() {
      this.$emit("searchType", this.selectValue);
      //   this.selectValue = "";
    },
    // reset() {
    //   this.selectValue = "";
    //   this.$emit("search", this.selectValue);
    // },
  },
};
</script>

<style>
</style>