<template>
    <main>
        <SloganComponent />
        <TypesSlider />
    </main>
</template>

<script>
import SloganComponent from './SloganComponent.vue';
import TypesSlider from './TypesSlider.vue';
export default {
    name: "MainComponent",
    components: {
        TypesSlider,
        SloganComponent
    }
}
</script>

<style lang="scss" scoped>
    main {
        height: 100vh;
    }
</style>
