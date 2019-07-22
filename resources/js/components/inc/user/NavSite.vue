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


                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>

                        <li class="nav-item">
                            <router-link  :to="{ name: 'register' }" class="nav-link">
                                Register
                            </router-link>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="caret"></span>
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
        name: "NavSite",
        data() {
            return {
                user: {},
            }
        },
        created() {
            axios.get("/api/account/user").then(
                response => {this.user = response.data.data}
            );
            //setInterval(() => this.loadItems(),3000);
        }
    }
</script>

<style scoped>

</style>