<template>
    <header>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark primaryColorBG">
            <!-- <div class="container"> -->
                
                    <!-- Left Side Of Navbar -->
                    <a
                        class="navbar-brand text-white text-uppercase ml-5"
                        href="#"
                    >
                        <img
                            src="https://cdn.discordapp.com/attachments/941312490950766592/996354486467571802/TEq98Yg.png"
                            width="40"
                            height="40"
                            class="d-inline-block align-center"
                            alt="Deliverboo Logo"
                        />
                        <h4 class="d-inline-block align-center">
                            Deliverboo
                        </h4></a
                    >

                    <!-- Right Side Of Navbar -->
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

                    <div
                        class="collapse navbar-collapse justify-content-end mr-5"
                        id="navbarSupportedContent"
                    >
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
                                        <a
                                            class="dropdown-item text-white"
                                            href="http://127.0.0.1:8000/login"
                                            >Accedi</a
                                        >
                                        <a
                                            class="dropdown-item text-white"
                                            href="http://127.0.0.1:8000/register"
                                            >Registrati</a
                                        >

                                        <div class="dropdown-divider"></div>
                                        <a
                                            class="dropdown-item text-white"
                                            href="http://127.0.0.1:8000/admin"
                                            >Menu Ristoratore</a
                                        >
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
              
            <!-- </div> -->
        </nav>
       
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

</style>
