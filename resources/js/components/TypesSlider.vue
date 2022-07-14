<template>
    <agile
        id="TypesSliderContainer"
        :slides-to-show="6"
        :options="myOptions"
        :center-mode="true"
        :autoplay="true"
        :autoplay-speed="2000"
    >
        <div class="cardCont">
            <div class="slide slide1"><p>Sushi</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide2"><p>Cinese</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide3"><p>Dessert</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide4"><p>Gelato</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide5"><p>Hamburger</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide6"><p>Kebab</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide7"><p>Pizza</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide8"><p>Sandwich</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide9"><p>Poke</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide10"><p>Ameriano</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide11"><p>Giapponese</p></div>
        </div>
        <div class="cardCont">
            <div class="slide slide12"><p>Italiano</p></div>
        </div>
        <template class="typesArrows typeArrowsLeft" slot="prevButton"
            ><i class="fa-solid fa-circle-chevron-left"></i
        ></template>
        <template class="typesArrows typeArrowsRight" slot="nextButton"
            ><i class="fa-solid fa-circle-chevron-right"></i
        ></template>
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
button {
    border: 0;
    background-color: transparent !important;
    i {
        font-size: 50px;
        color: #69dc9e;
    }
}

.cardCont {
    padding: 0 10px;
}

.agile__actions {
    position: relative;
    top: -9vw;
    i {
        background-color: white;
        border-radius: 50%;
    }
}

#TypesSliderContainer {
    margin: 100px auto 0;

    .slide {
        border-radius: 18px;
        height: 15vw;
        overflow: hidden;
        background-color: black;
        background-position: center;
        background-repeat: no-repeat;
        background-size: 60%;
        display: flex;
        flex-direction: column-reverse;
        align-items: center;
        background-color: #e59f71;
        p {
            margin: 7%;
            color: white;
            font-weight: 800;
            font-size: 1.5rem;
            text-shadow: 1px 1px 2px black, 0 0 25px black, 0 0 5px black;
        }
    }
    .slide1 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431633597071400/unknown.png");
    }
    .slide2 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431633878110298/unknown.png");
    }
    .slide3 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431634133946518/unknown.png");
    }
    .slide4 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431634444333147/unknown.png");
    }
    .slide5 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635060887664/unknown.png");
    }
    .slide6 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635484508431/unknown.png");
    }
    .slide7 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431635790712892/unknown.png");
    }
    .slide8 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996431636008800347/unknown.png");
    }
    .slide9 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434061042130974/poke_icon.png");
    }
    .slide10 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434061251854336/americana_icon.png");
    }
    .slide11 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434781489336401/giapponese_icon.png");
    }
    .slide12 {
        background-image: url("https://cdn.discordapp.com/attachments/993428504194584577/996434781866827847/italiana_icon.png");
    }
}
</style>
