<template>
    <main>
        <SloganComponent />
        <TypesSlider />
    </main>
</template>

<script>
import TypesSlider from './TypesSlider.vue';
import SloganComponent from './SloganComponent.vue';
export default {
    name: "MainComponent",
    components: { TypesSlider, SloganComponent }
}
</script>

<style lang="scss" scoped>
    main {
        height: 100vh;
    }
</style>