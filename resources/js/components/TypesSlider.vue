<template>
    <agile id="TypesSliderContainer" :slides-to-show="6" :options="myOptions">
        <div class="slide slide1"> <p>cibo numero 1</p> </div>
        <div class="slide slide2"> <p>cibo numero 2</p> </div>
        <div class="slide slide3"> <p>cibo numero 3</p> </div>
        <div class="slide slide4"> <p>cibo numero 4</p> </div>
        <div class="slide slide5"> <p>cibo numero 5</p> </div>
        <div class="slide slide6"> <p>cibo numero 6</p> </div>
        <div class="slide slide7"> <p>cibo numero 7</p> </div>
        <div class="slide slide8"> <p>cibo numero 8</p> </div>
        <div class="slide slide9"> <p>cibo numero 9</p> </div>
        <div class="slide slide10"> <p>cibo numero 10</p> </div>
        <div class="slide slide11"> <p>cibo numero 11</p> </div>
        <div class="slide slide12"> <p>cibo numero 12</p> </div>
        <template class="typesArrows" slot="prevButton"><i class="fa-solid fa-circle-chevron-left"></i></template>
        <template class="typesArrows" slot="nextButton"><i class="fa-solid fa-circle-chevron-right"></i></template>
    </agile>
</template>

<script>
import { VueAgile } from "vue-agile";

export default {
    components: {
        agile: VueAgile,
    },
    data() {
        return {
            myOptions: {
                navButtons: false,
                responsive: [
                    {
                        breakpoint: 600,
                        settings: {
                            dots: false,
                        },
                    },
                    {
                        breakpoint: 900,
                        settings: {
                            navButtons: true,
                            dots: false,
                            infinite: true,
                        },
                    },
                ],
            },
        };
    },
};
</script>

<style lang="scss">
button{
    border: 0;
    background-color: transparent !important;
    i{
        font-size: 50px;
        color: #69dc9e;
    }
}
#TypesSliderContainer {
    margin: 100px auto 0;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    .slide {
        border-radius: 18px;
        height: 15vw;
        margin: 10px;
        overflow: hidden;
        background-color: black;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

        display: flex;
        flex-direction: column-reverse;
        align-items: center;

        background-color: #E59F71;
        p{
            margin: 7%;
            color: white;
            font-weight: 800;
            font-size: 1.5rem;
            text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 5px black;
        }
    }
    .slide1 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431633597071400/unknown.png");}
    .slide2 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431633878110298/unknown.png");}
    .slide3 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431634133946518/unknown.png");}
    .slide4 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431634444333147/unknown.png");}
    .slide5 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635060887664/unknown.png");}
    .slide6 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635484508431/unknown.png");}
    .slide7 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635790712892/unknown.png");}
    .slide8 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431636008800347/unknown.png");}
    .slide9 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434061042130974/poke_icon.png");}
    .slide10 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434061251854336/americana_icon.png");}
    .slide11 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434781489336401/giapponese_icon.png");}
    .slide12 {background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434781866827847/italiana_icon.png");}
}
</style>
