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
                                <router-link  :to="{ name: 'login' }" class="nav-link">
                                    Login
                                </router-link>
                            </li>

                            <li class="nav-item">
                                <router-link  :to="{ name: 'register' }" class="nav-link">
                                    Register
                                </router-link>
                            </li>
                        </template>
                        <li v-else="guest" class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="position: relative; padding-left: 50px;">
                                <img :src="userData.avatar" :alt="userData.name"  class="img-raised rounded-circle img-fluid text-center" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%"> <b v-text="userData.name"></b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <router-link  :to="{ name: 'contact_cm' }" class="nav-link">
                                Contact
                            </router-link>
                        </li>
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