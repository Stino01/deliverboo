<template>
  <div class="container" id='example-3'>
    <div v-for="(type, index) in restaurantTypes" :key="index">
      <input type="checkbox" name="type" id="type" :value="index + 1" v-model="selectValue" @change="searchType">
      <label for="type">{{ type.name }}</label>
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

<style>
</style>