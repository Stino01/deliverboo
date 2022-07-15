<template>
    <footer>
        <div id="blocks">
            <div class="block">
                <ul>
                    <li>Scopri Deliverboo</li>
                    <li><a href="#"> investitori</a></li>
                    <li> <a href="#"> chi siamo </a> </li>
                    <li><a href="#">ristoranti</a> </li>
                    <li><a href="#"> altro </a> </li>
                    <li><a href="#">pressroom</a> </li>
                    <li><a href="#">il nostro blog</a> </li>
                    <li><a href="">  programmazione</a></li>
                    <li><a href="#">design</a> </li>
                    <li><a href="#"> lavora con noi</a></li>
                    <li><a href="#">diventa nostro partner</a> </li>
                </ul>
            </div>
            <div class="block">
                <ul>
                    <li>Note legali </li>
                    <li><a href="#">termini & Condizioni </a> </li>
                    <li><a href="#"> informativa sulla privacy</a></li>
                    <li><a href="#">cookies </a> </li>
                </ul>
            </div>
            <div class="block">
                <ul>
                    <li> Aiuto</li>
                    <li><a href="#">contatti</a> </li>
                    <li><a href="#">FAQ</a> </li>
                    <li><a href="#">tipi di cucina</a> </li>
                </ul>
            </div>
            <div class="block">
                <ul>
                    <li>Porta Deliverboo con te </li>
                    <li>
                        <img
                            src="https://cdn.discordapp.com/attachments/941312490950766592/996772132816162946/appstore.png"
                        />
                    </li>
                    <li>
                        <img
                            src="https://cdn.discordapp.com/attachments/941312490950766592/996772133004922951/playstore.png"
                        />
                    </li>
                </ul>
            </div>
        </div>
        <div id="underFooter">
            <div id="left">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
            </div>
            <div id="right">
                <p><i class="fa-solid fa-copyright"></i> 2022 Deliverboo</p>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "FooterComponent",
};
</script>

<style lang="scss">
footer {
    padding: 0 15%;
    margin: 0 auto;
    background-color: #73818c;
    #blocks {
        display: flex;
        justify-content: space-between;
        .block {
            background-color: #8c7e73;
            width: 23%;
            margin: 40px 0;
            border-radius: 10px;
            padding: 10px;
            ul {
                list-style-type: none;
                padding: 0 !important;
                :first-child {
                    font-size: 1.5rem;
                    font-weight: 800;
                    margin-bottom: 5px;
                }
                li {
                    color: white;

                    a{
                      text-decoration: none;
                      color:#dbf227!important; // YELLOW
                      font-size: 1rem!important;
                      &:hover{
                        color:  #005c53!important; // BLUE MARINE
                      }
                    }
                }
            }
        }
    }
    #underFooter {
        display: flex;
        justify-content: space-between;
        padding: 20px 0;
        #left,
        #right {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        #left {
            display: flex;
            gap: 10px;
            i {
                font-size: 30px;
                color: white;
            }
        }
        #right {
            color: #bdbdbd;
        }
    }
}
</style>
