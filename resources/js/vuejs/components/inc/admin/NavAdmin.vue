<template>
    <div>
        <div class="sidebar" data-color="orange" data-background-color="black"  :data-image="user.avatar">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
        -->
            <div class="logo">
                <a href="/" class="simple-text logo-mini">
                    <b>KT</b>
                </a>
                <a href="/" target="_blank" class="simple-text logo-normal">
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
						<b v-text="user.name"/>
						<b class="caret"/>
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
                                    <router-link :to="{ path: `/dashboard/tasks/u/${user.username}/`}" class="nav-link">
                                        <span class="sidebar-mini">TT</span>
                                        <span class="sidebar-normal"><b>Tasks Todo</b></span>
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
                    <!-- Occupations -->
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#pageExamples">
                            <i class="material-icons">list_alt</i>
                            <p><b>Pages</b>
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pageExamples">
                            <ul class="nav">
                                <!-- Abouts -->
                                <li v-if="$auth.can('create-about')" class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#aboutsCollapse">
                                        <span class="sidebar-mini"> AB </span>
                                        <span class="sidebar-normal"> About page
                                          <b class="caret"></b>
                                        </span>
                                    </a>
                                    <div class="collapse" id="aboutsCollapse" style="">
                                        <ul class="nav">
                                            <li  class="nav-item">
                                                <router-link  :to="{ name: 'abouts.index' }"  replace class="nav-link">
                                                    <span class="sidebar-mini"><b>AM</b></span>
                                                    <span class="sidebar-normal"><b>About Member</b></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!--Testimonial-->
                                <li v-if="$auth.can('create-testimonial')" class="nav-item">
                                    <router-link  :to="{ name: 'testimonials.index' }" class="nav-link">
                                        <span class="sidebar-mini"><b>TS</b></span>
                                        <span class="sidebar-normal"><b>Testimonials</b></span>
                                    </router-link>
                                </li>
                                <!--Blog-->
                                <li class="nav-item">
                                    <router-link  :to="{ path: '/dashboard/blogs/' }" class="nav-link">
                                        <span class="sidebar-mini"><b>BG</b></span>
                                        <span class="sidebar-normal"><b>Blog</b></span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Links Pages -->
                    <li v-if="$auth.can('create-occupation')" class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#pageOccupations">
                            <i class="material-icons">assignment</i>
                            <p><b>Occupations</b>
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="pageOccupations">
                            <ul class="nav">
                                <li class="nav-item">
                                    <router-link  :to="{ name: 'occupations.index' }" class="nav-link">
                                        <span class="sidebar-mini"><b>OC</b></span>
                                        <span class="sidebar-normal"><b>Occupations</b></span>
                                    </router-link>
                                </li>
                                 <!--Registration-->
                                <li class="nav-item">
                                    <router-link  :to="{ name: 'categoryoccupations.index' }" class="nav-link">
                                        <span class="sidebar-mini"><b>CO</b></span>
                                        <span class="sidebar-normal"><b>Category Occupation</b></span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- Links Partial -->
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#partialExamples">
                            <i class="material-icons">list</i>
                            <p><b>Partials</b>
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="partialExamples">
                            <ul class="nav">
                                <!-- Links -->
                                <li class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#aidesSettings">
                                        <span class="sidebar-mini"><b>ST</b></span>
                                        <span class="sidebar-normal"><b>Settings</b>
                                          <b class="caret"></b>
                                        </span>
                                    </a>
                                    <div class="collapse" id="aidesSettings">
                                        <ul class="nav">
                                            <li class="nav-item ">
                                                <a class="nav-link" data-toggle="collapse" href="#componentsSettings">
                                                    <span class="sidebar-mini"><b>ST</b></span>
                                                    <span class="sidebar-normal"><b>Style & Data</b>
                                                    <b class="caret"></b>
                                                </span>
                                                </a>
                                                <div class="collapse" id="componentsSettings">
                                                    <ul class="nav">
                                                        <!-- Colors -->
                                                        <li v-if="$auth.can('create-color')" class="nav-item">
                                                            <router-link  :to="{ path: '/dashboard/colors/' }" class="nav-link">
                                                                <span class="sidebar-mini"><b>CO</b></span>
                                                                <span class="sidebar-normal"><b>Colors</b></span>
                                                            </router-link>
                                                        </li>
                                                        <!-- Diplomas -->
                                                        <li class="nav-item">
                                                            <router-link  :to="{ path: '/dashboard/diplomas/' }" class="nav-link">
                                                                <span class="sidebar-mini"><b>DI</b></span>
                                                                <span class="sidebar-normal"><b>Diplomas</b></span>
                                                            </router-link>
                                                        </li>
                                                        <!-- Countries -->
                                                        <li class="nav-item">
                                                            <router-link  :to="{ name: 'countries.index' }"  replace class="nav-link">
                                                                <span class="sidebar-mini"><b>CO</b></span>
                                                                <span class="sidebar-normal"><b>Country</b></span>
                                                            </router-link>
                                                        </li>
                                                        <!-- Cities -->
                                                        <li class="nav-item">
                                                            <router-link  :to="{ name: 'cities.actives' }"  replace class="nav-link">
                                                                <span class="sidebar-mini"><b>CI</b></span>
                                                                <span class="sidebar-normal"><b>Cities</b></span>
                                                            </router-link>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <router-link  :to="{ path: '/dashboard/links/' }" class="nav-link">
                                        <span class="sidebar-mini"><b>LI</b></span>
                                        <span class="sidebar-normal"><b>Links</b></span>
                                    </router-link>
                                </li>
                                <!-- Tags -->
                                <li class="nav-item">
                                    <router-link  :to="{ path: '/dashboard/tags/' }" class="nav-link">
                                        <span class="sidebar-mini"><b>TA</b></span>
                                        <span class="sidebar-normal"><b>Tags</b></span>
                                    </router-link>
                                </li>
                                <!-- Categories -->
                                <li class="nav-item">
                                    <router-link  :to="{ path: '/dashboard/categories/' }" class="nav-link">
                                        <span class="sidebar-mini"><b>CA</b></span>
                                        <span class="sidebar-normal"><b>Categories</b></span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Categories Faqs -->
                    <li v-if="$auth.can('create-faq')" class="nav-item ">
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
                                <li class="nav-item">
                                    <router-link  :to="{ name: 'faqsoccupation.index' }" class="nav-link">
                                        <span class="sidebar-mini"><b>FO</b></span>
                                        <span class="sidebar-normal"><b>FAQsOccupation</b></span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Slide pages-->
                    <li v-if="$auth.can('slide_image')" class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#AllSlides">
                            <i class="material-icons">photo</i>
                            <p><b>Slide Pages</b>
                                <b class="caret"/>
                            </p>
                        </a>
                        <div class="collapse" id="AllSlides">
                            <ul class="nav">
                                <li class="nav-item">
                                    <router-link  :to="{ path: '/dashboard/slidehomes/' }" class="nav-link">
                                        <span class="sidebar-mini"><b>SH</b></span>
                                        <span class="sidebar-normal"><b>Slide Home</b></span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Contacts -->
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#contactsSettings">
                            <i class="material-icons">message</i>
                            <p><b>Contacts</b>
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="contactsSettings">
                            <ul class="nav">
                                <li class="nav-item">
                                    <router-link  :to="{ path: '/dashboard/deviscontacts/' }" class="nav-link">
                                        <span class="sidebar-mini"><b>DC</b></span>
                                        <span class="sidebar-normal"><b>Devis Contact</b></span>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  :to="{ path: '/dashboard/contacts/' }" class="nav-link">
                                        <span class="sidebar-mini"><b>MCP</b></span>
                                        <span class="sidebar-normal"><b>Message Contact Page</b></span>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link  :to="{ name: 'subscribers.index' }" class="nav-link">
                                        <span class="sidebar-mini"><b>SC</b></span>
                                        <span class="sidebar-normal"><b>Subscribers</b></span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Technician -->
                    <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/technicians/' }" class="nav-link">
                            <i class="material-icons">meeting_room</i>
                            <p><b>Charbonneurs</b></p>
                        </router-link>
                    </li>
                    <!-- Annonces -->
                    <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/annonces/' }" class="nav-link">
                            <i class="material-icons">all_out</i>
                            <p><b>Annonces</b></p>
                        </router-link>
                    </li>
                     <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/annonces/assigned' }" class="nav-link">
                            <i class="material-icons">assignment</i>
                            <p><b>Annonces assigned</b></p>
                        </router-link>
                    </li>
                    <!-- Documentation -->
                    <li class="nav-item">
                        <router-link  :to="{ path: '/dashboard/documentations/' }" class="nav-link">
                            <i class="material-icons">ballot</i>
                            <p><b>Documentations</b></p>
                        </router-link>
                    </li>
                    <!-- Administrations -->
                    <li  v-if="$auth.can('administration')" class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#administrationExamples">
                            <i class="material-icons">person_outline</i>
                            <p><b>Administrations</b>
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="administrationExamples">
                            <ul class="nav">
                                <!-- Audits -->
                                <li v-if="$auth.can('auditing')" class="nav-item">
                                    <router-link  :to="{ name: 'audits.index' }" class="nav-link">
                                        <span class="sidebar-mini">AS</span>
                                        <span class="sidebar-normal"><b>Audits site</b></span>
                                    </router-link>
                                </li>
                                <!-- Activities -->
                                <li v-if="$auth.can('activity')" class="nav-item">
                                    <router-link  :to="{ name: 'activities.index' }" class="nav-link">
                                        <span class="sidebar-mini">AC</span>
                                        <span class="sidebar-normal"><b>Activities site</b></span>
                                    </router-link>
                                </li>
                                <!-- Administrators -->
                                <li v-if="$auth.can('view-administrator')"  class="nav-item">
                                    <router-link  :to="{ name: 'administrators.index' }" class="nav-link">
                                        <span class="sidebar-mini">AD</span>
                                        <span class="sidebar-normal"><b>Administrators</b></span>
                                    </router-link>
                                </li>
                                <!-- Users -->
                                <li v-if="$auth.can('view-user')" class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#aidesUsers">
                                        <span class="sidebar-mini"><b>US</b></span>
                                        <span class="sidebar-normal"><b>Users</b>
                                          <b class="caret"></b>
                                        </span>
                                    </a>
                                    <div class="collapse" id="aidesUsers">
                                        <ul class="nav">
                                            <li class="nav-item ">
                                                <a class="nav-link" data-toggle="collapse" href="#componentsUsers">
                                                    <span class="sidebar-mini"><b>US</b></span>
                                                    <span class="sidebar-normal"><b>Users</b>
                                                    <b class="caret"></b>
                                                </span>
                                                </a>
                                                <div class="collapse" id="componentsUsers">
                                                    <ul class="nav">
                                                        <li class="nav-item">
                                                            <router-link :to="{ name: 'users.index' }" class="nav-link">
                                                                <span class="sidebar-mini"><b>US</b></span>
                                                                <span class="sidebar-normal"><b>Users</b></span>
                                                            </router-link>
                                                        </li>
                                                        <li class="nav-item">
                                                            <router-link :to="{ name: 'users.trash' }"
                                                                         class="nav-link">
                                                                <span class="sidebar-mini"><b>TU</b></span>
                                                                <span class="sidebar-normal"><b>Trash Users</b></span>
                                                            </router-link>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Notes -->
                                <li  class="nav-item">
                                    <router-link  :to="{ name: 'notes.index' }" class="nav-link">
                                        <span class="sidebar-mini">NO</span>
                                        <span class="sidebar-normal"><b>Notes</b></span>
                                    </router-link>
                                </li>
                                <!-- Tasks -->
                                <li v-if="$auth.can('view-user')" class="nav-item ">
                                    <a class="nav-link" data-toggle="collapse" href="#componentsTasks">
                                        <span class="sidebar-mini"><b>TK</b></span>
                                        <span class="sidebar-normal"><b>Tasks</b>
                                          <b class="caret"></b>
                                        </span>
                                    </a>
                                    <div class="collapse" id="componentsTasks">
                                        <ul class="nav">
                                            <li class="nav-item">
                                                <router-link :to="{ name: 'tasks.index' }" class="nav-link">
                                                    <span class="sidebar-mini"><b>TS</b></span>
                                                    <span class="sidebar-normal"><b>Tasks</b></span>
                                                </router-link>
                                            </li>
                                            <li class="nav-item">
                                                <router-link :to="{ name: 'tasks.database' }"
                                                             class="nav-link">
                                                    <span class="sidebar-mini"><b>TD</b></span>
                                                    <span class="sidebar-normal"><b>Task Datatable</b></span>
                                                </router-link>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- Permissions -->
                                <li v-if="$auth.can('view-role-permission')"  class="nav-item">
                                    <router-link  :to="{ name: 'permissions.index' }" class="nav-link">
                                        <span class="sidebar-mini">PM</span>
                                        <span class="sidebar-normal"><b>Permissions</b></span>
                                    </router-link>
                                </li>
                                <!-- Roles -->
                                <li v-if="$auth.can('view-role-permission')" class="nav-item">
                                    <router-link   :to="{ name: 'roles.index' }" class="nav-link">
                                        <span class="sidebar-mini">RO</span>
                                        <span class="sidebar-normal"><b>Roles</b></span>
                                    </router-link>
                                </li>
                            </ul>
                        </div>
                    </li>
                     <!-- Legals Mentions -->
                   <li class="nav-item">
                       <a class="nav-link" data-toggle="collapse" href="#legalsExamples">
                           <i class="material-icons">looks</i>
                           <p><b>Legal & Mention</b>
                               <b class="caret"></b>
                           </p>
                       </a>
                       <div class="collapse" id="legalsExamples">
                           <ul class="nav">
                               <li class="nav-item">
                                   <router-link  :to="{ path: '/dashboard/licence_site/' }" class="nav-link">
                                       <span class="sidebar-mini"><b>LS</b></span>
                                       <span class="sidebar-normal"><b>Licence Site</b></span>
                                   </router-link>
                               </li>
                               <li class="nav-item ">
                                   <router-link  :to="{ path: '/dashboard/policy_privacy/' }" class="nav-link">
                                       <span class="sidebar-mini"><b>PP</b></span>
                                       <span class="sidebar-normal"><b>Policy & Privacy</b></span>
                                   </router-link>
                               </li>
                               <li class="nav-item ">
                                   <router-link  :to="{ path: '/dashboard/conditions/' }" class="nav-link">
                                       <span class="sidebar-mini"><b>TC</b></span>
                                       <span class="sidebar-normal"><b>Terms & Conditions</b></span>
                                   </router-link>
                               </li>
                           </ul>
                       </div>
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
                        axios.post('/logout').then(() => {

                            location.replace(`/`);
                            //End Progress bar
                            this.$Progress.finish();
                        }).catch(() => {
                            //Failled message
                            this.$Progress.fail();
                        });
                    }
                })
            },
        },
        created() {
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
        }
    }
</script>

<style scoped>

</style>
