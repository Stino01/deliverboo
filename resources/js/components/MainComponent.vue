<template>
    <main>
        <TypesSlider />
    </main>
</template>

<script>
import TypesSlider from './TypesSlider.vue';
export default {
    name: "MainComponent",
    components: { TypesSlider }
}
</script>

<style lang="scss" scoped>
    main {
        height: 100vh;
    }
</style>