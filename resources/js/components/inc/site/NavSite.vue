<template>
    <div>
        <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-warning" color-on-scroll="100" id="sectionsNav">
            <div class="container">
                <div class="navbar-translate">
                    <a class="navbar-brand" href="/"><b>{{ config('app.name') }}</b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="dropdown nav-item">
                            <a href="/" class=" nav-link">
                                <i class="material-icons">home</i> <b>Home</b>
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <i class="material-icons">view_day</i> <b>Services</b>
                            </a>
                            <div class="dropdown-menu dropdown-with-icons">
                                <a href="/orders" class="dropdown-item">
                                    <i class="material-icons">card_giftcard</i> <b>Orders</b>
                                </a>
                                <a href="/evenements" class="dropdown-item">
                                    <i class="material-icons">event_available</i> <b>Events</b>
                                </a>
                                <a href="/others" class="dropdown-item">
                                    <i class="material-icons">bubble_chart</i> <b>Others</b>
                                </a>
                            </div>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="/faqs" class=" nav-link">
                                <i class="material-icons">contact_support</i> <b>FAQs</b>
                            </a>
                        </li>
                        <li class="dropdown nav-item">
                            <a href="/contact-us" class=" nav-link">
                                <i class="material-icons">perm_phone_msg</i> <b>Contact Us</b>
                            </a>
                        </li>
                        <!-- Authentication Links -->

                        <!--<li class="dropdown nav-item ">
                            <a href="#" class=" nav-link"  data-toggle="modal" data-target="#loginModal">
                                <i class="material-icons">face</i> <b>{{ __('Login / Register')}}</b>
                            </a>
                        </li>-->

                        <li class="dropdown nav-item">
                            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" style="position: relative; padding-left: 50px;">
                                <img :src="user.avatar" :alt="user.name"  class="img-raised rounded-circle img-fluid text-center" style="width: 32px; height: 32px; position: absolute; top: 10px; left: 10px; border-radius: 50%"> <b v-text="user.username"></b>
                            </a>
                            <div class="dropdown-menu dropdown-with-icons">
                                <a v-if="user.my_status === 'active'" href="/admin" class="dropdown-item">
                                    <i class="material-icons">dashboard</i> <b>Dashboard</b>
                                </a>
                                <a :href="`/orders/store/${user.username}`" class="dropdown-item">
                                    <i class="material-icons">card_giftcard</i> <b>My Orders</b>
                                </a>
                                <a href="../sections.html#features" class="dropdown-item">
                                    <i class="material-icons">event_available</i> <b>My Events</b>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="material-icons">info</i> <b>Aide & Contact</b>
                                </a>
                                <a :href="`/@${user.username}`" class="dropdown-item">
                                    <i class="material-icons">person</i> <b>Profile</b>
                                </a>
                                <a href="/account/profile" class="dropdown-item">
                                    <i class="material-icons">settings</i> <b>Paramètres</b>
                                </a>
                                <a class="dropdown-item" href="/user/logout">
                                    <i class="material-icons">power_settings_new</i> <b>Deconnexion</b>
                                </a>
                            </div>
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
            axios.get("/admin/api/account/user").then((response) => ( this.user = response.data));
            //setInterval(() => this.loadItems(),3000);
        }
    }
</script>

<style scoped>

</style>