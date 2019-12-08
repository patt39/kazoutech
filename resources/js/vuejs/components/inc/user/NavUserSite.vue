<template>
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="../../../index.html">
                <img src="/assets/vendor_site/img/brand/white.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href=index.html">
                                <img src="/assets/img/vendor_site/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-lg-auto">
                    <li v-if="$auth.can('dashboard')" class="nav-item">
                        <a href="/dashboard" class="nav-link" role="button">
                            <i class="ni ni-app d-lg-none"></i>
                            <span class="nav-link-inner--text"><b>Dashboard</b></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/services" class="nav-link"  role="button">
                            <i class="ni ni-app d-lg-none"></i>
                            <span class="nav-link-inner--text"><b>Demander un service</b></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/become_technician" class="nav-link" role="button">
                            <i class="ni ni-app d-lg-none"></i>
                            <span class="nav-link-inner--text"><b>Devenir un bosseur</b></span>
                        </a>
                    </li>
                    <template v-if="guest">
                        <li class="nav-item">
                            <a href="/login" class="nav-link" role="button">
                                <i class="ni ni-app d-lg-none"></i>
                                <span class="nav-link-inner--text"><b>Connexion</b></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="btn btn-primary" role="button">
                                <span class="nav-link-inner--text pt-40">Inscription</span>
                            </a>
                        </li>
                    </template>
                    <li v-else="guest" class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="position: relative; padding-left: 50px;">

                            <img :src="userData.avatar" :alt="userData.name"  class="img-raised rounded-circle img-fluid text-center" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%">
                            <b v-text="userData.name"></b>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../examples/account-settings.html">
                                <i class="ni ni-lock-circle-open text-muted"></i>
                                Account Settings
                            </a>
                            <a class="dropdown-item" href="../examples/login-page.html">
                                <i class="ni ni-tv-2 text-danger"></i>
                                Login Page
                            </a>
                            <a class="dropdown-item" href="../examples/register-page.html">
                                <i class="ni ni-air-baloon text-pink"></i>
                                Register Page
                            </a>
                            <a class="dropdown-item" href="../examples/reset-page.html">
                                <i class="ni ni-atom text-info"></i>
                                Reset Page
                            </a>
                            <a class="dropdown-item" href="../examples/invoice-page.html">
                                <i class="ni ni-bullet-list-67 text-success"></i>
                                Invoice Page
                            </a>
                            <a class="dropdown-item" href="../examples/checkout-page.html">
                                <i class="ni ni-basket text-orange"></i>
                                Checkout Page
                            </a>
                            <a href="javascript:void(0)" @click="navLogout()" >
                                <i class="ni ni-chat-round text-primary"></i>
                                Log out
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
