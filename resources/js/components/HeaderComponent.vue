<template>
    <header>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark primaryColorBG">
            <a class="navbar-brand text-white text-uppercase ml-5" href="#">
                <img
                    src="https://cdn.discordapp.com/attachments/941312490950766592/996354486467571802/TEq98Yg.png"
                    width="40"
                    height="40"
                    class="d-inline-block align-center"
                    alt="Deliverboo Logo"
                />
                <h4 class="d-inline-block align-center">Deliverboo</h4></a
            >
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end mr-5" id="navbarSupportedContent">
                <form class="form-inline my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle text-white"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-expanded="false"
                            >
                                Area Riservata
                            </a>
                            <div
                                class="dropdown-menu"
                                style="background-color: #9fc131"
                            >
                                <a class="dropdown-item text-white" href="http://127.0.0.1:8000/login"
                                    >Accedi</a
                                >
                                <a class="dropdown-item text-white" href="http://127.0.0.1:8000/register"
                                    >Registrati</a
                                >

                                          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-white" href="http://127.0.0.1:8000/admin">Menù Ristoratore</a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>
        <!-- <nav class="navbar navbar-dark primaryColorBG fixed-top">
            <a class="navbar-brand" href="http://127.0.0.1:8000/" width="80"
                    height="80">
                <img
                    src="https://cdn.discordapp.com/attachments/941312490950766592/996354486467571802/TEq98Yg.png"
                    width="80"
                    height="80"
                    class="d-inline-block align-top"
                    alt="Deliverboo Logo"
                />
                deliverboo</a
            >
            <button class="btn btn_main"><a href="http://127.0.0.1:8000/login">Accedi</a></button>
            <button class="btn btn_main"><a href="http://127.0.0.1:8000/register">Registrati</a></button>
        </nav> -->
        <!-- <div class="container">
            <div id="top">
                <a  class="navbar-brand" href="http://127.0.0.1:8000/">
                    <div id="left">
                        <img
                            src="https://cdn.discordapp.com/attachments/941312490950766592/996354486467571802/TEq98Yg.png"
                        />
                        <h1>deliverboo</h1>
                    </div>
                </a>

                <div id="right"> <button> <a href="http://127.0.0.1:8000/login">LOGIN</a></button></div>
            </div>
        </div> -->
    </header>
</template>
<script>
export default {
    name: "HeaderComponent",
    data() {
        return {
            menuItem: [
                {
                    label: "Home",
                    routeName: "home",
                },
            ],
        };
    },
};
</script>
<style lang="scss">
.dropdown-item:hover {
    background-color: #dbf227 !important ;
    color: #005c53 !important;
}


// header {
//     margin: 0 auto;
//     background-color: #042940; /*BLUE */
//     #top {
//         #left {
//             display: flex;
//             flex-direction: row;
//             align-items: center;
//             vertical-align: middle;
//             img {
//                 width: 50px;
//             }
//             h1 {
//                 color: white;
//                 text-transform: uppercase;
//                 vertical-align: middle;
//                 margin: 0 !important;
//                 padding: 1.5rem;
//             }
//         }
//     }
// }
</style>
