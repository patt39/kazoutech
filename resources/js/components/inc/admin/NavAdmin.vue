<template>
    <div>
        <div class="sidebar" data-color="azure" data-background-color="black"  :data-image="user.avatar">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
        -->
            <div class="logo">
                <a href="/" class="simple-text logo-mini">
                    <b>KT</b>
                </a>
                <a href="/" class="simple-text logo-normal">
                    <b style="font-size: 80%;">Kazoutech</b>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img :src="user.avatar" />
                    </div>
                    <div class="user-info">
                        <a data-toggle="collapse" href="#collapseExample" class="username">
					<span>
						<b v-text="user.name"></b>
						<b class="caret"></b>
					</span>
                        </a>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li class="nav-item">
                                    <router-link  :to="{ name: 'admin.account' }" class="nav-link">
                                        <span class="sidebar-mini"><b>MP</b></span>
                                        <span class="sidebar-normal"><b>My Profile</b></span>
                                    </router-link>
                                </li>
                                <li class="nav-item ">
                                    <router-link :to="{ name: 'admin.edit_profile' }" class="nav-link">
                                        <span class="sidebar-mini">EP</span>
                                        <span class="sidebar-normal"><b>Edit Profile</b></span>
                                    </router-link>
                                </li>
                                <li class="nav-item ">
                                    <router-link :to="{ name: 'messages.index' }" class="nav-link">
                                        <span class="sidebar-mini">MB</span>
                                        <span class="sidebar-normal"><b>Message Box</b></span>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini"><b>MS</b></span>
                                        <span class="sidebar-normal"><b>Member since:
									{{ user.created_at | myDate}}
                                        </b>
								</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-mini"><b>CL</b></span>
                                        <span class="sidebar-normal"><b>Current Login:
									{{ user.current_sign_in_at | dateAgo}}</b>
								</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" @click="navLogout()" id="btnShowAlertLogout" style="cursor:pointer;">
                                        <span class="sidebar-mini"><b>L</b></span>
                                        <span class="sidebar-normal"><b>Logout</b></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/' }" class="nav-link">
                            <i class="material-icons">dashboard</i>
                            <p><b>Dashboard</b></p>
                        </router-link>
                    </li>
                    <!-- Links -->
                    <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/links' }" class="nav-link">
                            <i class="material-icons">http</i>
                            <p><b>Links</b></p>
                        </router-link>
                    </li>
                    <!-- Countries -->
                    <li class="nav-item">
                        <router-link  :to="{ name: 'countries.index' }"  replace class="nav-link">
                            <i class="material-icons">flag</i>
                            <p><b>Countries</b></p>
                        </router-link>
                    </li>
                    <!-- Colors -->
                    <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/colors' }" class="nav-link">
                            <i class="material-icons">color_lens</i>
                            <p><b>colors</b></p>
                        </router-link>
                    </li>
                    <!-- Categories -->
                    <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/categories/' }" class="nav-link">
                            <i class="material-icons">local_offer</i>
                            <p><b>Categories</b></p>
                        </router-link>
                    </li>
                    <!-- Tags -->
                    <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/tags/' }" class="nav-link">
                            <i class="material-icons">local_offer</i>
                            <p><b>Tags</b></p>
                        </router-link>
                    </li>
                    <!-- Occupations -->
                    <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/occupations/' }" class="nav-link">
                            <i class="material-icons">assignment</i>
                            <p><b>Occupations</b></p>
                        </router-link>
                    </li>
                    <!-- Categories Faqs -->
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#faqsExamples">
                            <i class="material-icons">contact_support</i>
                            <p><b>FAQs</b>
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="faqsExamples">
                            <ul class="nav">
                                <li class="nav-item">
                                    <router-link  :to="{ path: '/dashboard/category-faqs/' }" class="nav-link">
                                        <span class="sidebar-mini"><b>CF</b></span>
                                        <span class="sidebar-normal"><b>Category FAQs</b></span>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  :to="{ name: 'faqs.index' }" class="nav-link">
                                        <span class="sidebar-mini"><b>FQ</b></span>
                                        <span class="sidebar-normal"><b>FAQs</b></span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Contacts -->
                    <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/contacts' }" class="nav-link">
                            <i class="material-icons">message</i>
                            <p><b>Contacts</b></p>
                        </router-link>
                    </li>
                    <!-- Contacts -->
                    <li class="nav-item">
                        <router-link  :to="{ name: 'users.index' }" class="nav-link">
                            <i class="material-icons">face</i>
                            <p><b>Users</b></p>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NavAdmin",
        data() {
            return {
                user: {},
            }
        },
        methods: {

            /* ***** script logout navbar ****/
            navLogout(){
                Swal.fire({
                    title:'Logout',
                    text: 'Are you sure you want to logout ?',
                    //type:'question',
                    animation: false,
                    customClass: 'animated rubberBand',
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes, logout',
                    cancelButtonText: 'cancel',
                    showCancelButton: true,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();
                        //Envoyer la requet au server
                        window.location.href = '/user/logout';
                    }
                })
            },
        },
        created() {
            axios.get("/api/account/user").then((response) => ( this.user = response.data));
            //setInterval(() => this.loadItems(),3000);
        }
    }
</script>

<style scoped>
    .router-link-active {
        color: orange;
    }
</style>