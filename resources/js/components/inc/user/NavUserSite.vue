<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="/">
                    Kazoutech
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->


                        <template v-if="guest">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                   Demander un service
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Devenir un bosseur
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/login" class="nav-link">
                                    <b>Connexion</b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link">
                                    <b>  Inscription</b>
                                </a>
                            </li>
                        </template>
                        <li v-else="guest" class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="position: relative; padding-left: 50px;">
                                <img :src="userData.avatar" :alt="userData.name"  class="img-raised rounded-circle img-fluid text-center" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%">
                                <b v-text="userData.name"></b>
                            </a>
                            <div class="dropdown-menu dropdown-with-icons">
                                <a href="#" class="dropdown-item">
                                   <b>Dashboard</b>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <b>Profile</b>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <b>Paramètres</b>
                                </a>
                                <a href="javascript:void(0)" @click="navLogout()" class="dropdown-item">
                                    <b>Deconnexion</b>
                                </a>
                            </div>
                        </li>
                        <!--<li class="nav-item">
                            <router-link  :to="{ name: 'contact_cm' }" class="nav-link">
                                Contact
                            </router-link>
                        </li>-->
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                userData: {},
            }
        },
        methods: {

            /* ***** script logout navbar ****/
            navLogout(){
                //Start Progress bar
                this.$Progress.start();

                //Envoyer la requet au server
                axios.post('/logout').then(() => {

                    location.replace(`/`);
                    //End Progress bar
                    this.$Progress.finish();
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                });
            },
        },
        created() {
            axios.get("/api/account/user").then(
                response => {this.userData = response.data.data}
            );
            //setInterval(() => this.loadItems(),3000);
        }
    }
</script>

<style scoped>

</style>
