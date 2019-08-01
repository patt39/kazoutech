<template>
    <div>
        <vue-progress-bar/>
        <NavAdmin/>
        <div class="main-panel" id="javascriptComponents">
            <TopNav/>
            <div class="content">
                <div class="container-fluid">
                    <br>
                    <StatusAdmin/>
                    <br>
                   <div v-if="loaded" class="row">
                        <div class="col-md-12 expo">
                            <div class="card card-stats">
                                <div :class="getColorCardUser()">
                                    <div class="card-icon">
                                        <i class="material-icons">settings_input_composite</i>
                                    </div>
                                    <p class="card-category"><b>All  Cookies</b>
                                    <h3 class="card-title" style="color:red;"><b>{{cookies.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">settings_input_composite</i><b>All  Cookies</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="!loaded" class="submit">
                        <LoaderLdsDefault/>
                    </div>
                    <div v-if="loaded" class="row">
                        <div class="col-md-12 expo">
                            <div class="card">
                                <div :class="getColorHeaderUser()">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">
                                                <b>Datatable All Cookies</b>
                                            </h4>
                                            <p class="card-title">
                                                Information Cookie Site
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">settings_input_composite</i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="header text-right">
                                        <button @click="reload" class="btn btn-success btn-raised btn-round button_note btn-sm"
                                                title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                <br>
                                <div class="card-body">
                                    <div  class="toolbar">
                                        <div class="submit text-center">
                                            <router-link :to="{ name: 'cookies.create' }" id="button_hover" class="btn btn-warning btn-raised btn-round ">
                                               <span class="btn-label">
                                                    <i class="material-icons">settings_input_composite</i>
                                                </span>
                                                <b class="title_hover">New Cookie</b>
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th><b>Cookie Title</b></th>
                                                    <th><b>Cookie Description</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Edit By</b></th>
                                                    <th><b>Last Update</b></th>
                                                    <th class="disabled-sorting text-right"><b>Actions</b></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th><b>Title Cookie</b></th>
                                                    <th><b>Text Cookie</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Edit By</b></th>
                                                    <th><b>Last Update</b></th>
                                                    <th class="text-right"><b>Actions</b></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr v-for="item in cookies" :key="item.id">
                                                    <td>{{ (item.title.length > 20 ? item.title.substring(0,20)+ "..." : item.title) | upText }}</td>
                                                    <td v-html="(item.body.length > 20 ? item.body.substring(0,20)+ '...' : item.body)"></td>
                                                    <td>
                                                        <div class="timeline-heading">
                                                            <span v-if="item.status === 1" class="badge badge-info"><b>Active</b></span>
                                                            <span v-else-if="item.status === 0"  class="badge badge-danger"><b>Deactive</b></span>
                                                        </div>
                                                    </td>
                                                   <td>
                                                    <a href="javascript:void(0)" @click="getUser(item)">
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </a>
                                                   </td>
                                                   <td>{{ item.updated_at | dateAgo }}</td>
                                                    <td class="td-actions text-right">
                                                        <template v-if="$auth.can('publish-cookie')">
                                                            <button v-if="item.status === 1" @click="disableItem(item.id)" class="btn btn-link btn-info btn-round btn-just-icon " title="Disable">
                                                                <i class="material-icons">power_settings_new</i>
                                                            </button>
                                                            <button v-else-if="item.status === 0" @click="activeItem(item.id)" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activate">
                                                                <i class="material-icons">power_settings_new</i>
                                                            </button>
                                                        </template>
                                                        <router-link :to="{ path: `/dashboard/cookies/lm/${item.slug}` }" class="btn btn-link  btn-warning btn-round btn-just-icon" title="View">
                                                            <i class="material-icons">visibility</i>
                                                        </router-link>
                                                        <router-link v-if="$auth.can('edit-cookie')" :to="{ path: `/dashboard/cookies/${item.id}/edit` }" class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                            <i class="material-icons">edit</i>
                                                        </router-link>
                                                        <button v-if="$auth.can('delete-cookie')" @click="deleteItem(item.id)" class="btn btn-link btn-danger btn-round btn-just-icon" title="Delete">
                                                            <i class="material-icons">delete_forever</i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <FooterAdmin/>
    </div>
 </div>
</template>

<script>
    import NavAdmin from "../../../inc/admin/NavAdmin";
    import TopNav from "../../../inc/admin/TopNav";
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import Loaded from "../../../inc/animation/Loaded";
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";

    export default {
        components: {Loaded, StatusAdmin, FooterAdmin, TopNav, NavAdmin, LoaderLdsDefault },
        data() {
            return {
                loaded: false,
                cookies: {},
                user:'',
                form: new Form({
                    id: '',
                    user: '',
                    title: '',
                    body: '',
                    user_id: '',
                    slug: '',
                }),
                customToolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'font': [] }],
                    //[{ 'header': [false, 1, 2, 3, 4, 5, 6, ] }],
                    //[{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'align': [] }],
                    //[{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    //['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
                    //[{ 'script': 'sub'}, { 'script': 'super' }],
                    //[{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'color': [] }, { 'background': [] }],
                    //['link', 'image', 'video', 'formula'],
                    ['link'],
                    //[{ 'direction': 'rtl' }],
                    ['clean'],
                    //['emoji'],
                ]
            }
        },
        methods: {
            mydatatables(){
                $( function () {
                    $('#datatables').DataTable({
                        "pagingType": "full_numbers",
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ],
                        order: [[ 0, 'desc' ], [ 3, 'asc' ]],
                        responsive: true,
                        stateSave: true,
                        destroy: true,
                        retrieve:true,
                        autoFill: true,
                        colReorder: true,
                        language: {
                            search: "<i class='material-icons'>search</i>",
                            searchPlaceholder: "Search Record"
                        },
                        "sPaginationType": "full_numbers"
                    });
                });
            },
            getColorCardUser(){
				let colorUser = 'card-header card-header-icon card-header-' + this.user.color_name;
				return colorUser;
			},
            getColorHeaderUser(){
				let colorUser = 'card-header card-header-' + this.user.color_name;
				return colorUser;
			},
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Cookie?',
                    text: "Are you sure you want to delete this Cookie?",
                    type: 'warning',
                    animation: false,
                    customClass: 'animated shake',
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    showCancelButton: true,
                    reverseButtons: true
                }).then((result) => {
                    //Envoyer la requete au server
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();
                        this.form.delete('/dashboard/cookies/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                              notify.update({'type': 'success', 'message': '<strong>Cookie deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            /** End alert ***/

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('AfterCreate');
                        }).catch(() => {
                            //Failled message
                            this.$Progress.fail();
                             $.notify("Ooop! Something wrong. Try later", {
                             type: 'danger',
                                animate: {
                                    enter: 'animated bounceInDown',
                                    exit: 'animated bounceOutUp'
                                }
                            });
                        })
                    }
                })
            },
            /** Ici c'est l'activation de la couleur  **/
            activeItem(id) {
                //Start Progress bar
                this.$Progress.start();
                axios.get('/dashboard/active_cookie/' + id).then(() => {
                      /** Alert notify bootstrapp **/
                      var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                          allow_dismiss: false,
                          showProgressbar: true
                      });
                      setTimeout(function() {
                          notify.update({'type': 'success', 'message': '<strong>Cookie activated successfully.</strong>', 'progress': 75});
                      }, 2000);
                      /** End alert ***/

                    //End Progress bar
                    this.$Progress.finish();
                    
                    Fire.$emit('AfterCreate');
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    $.notify("Ooop! Something wrong. Try later", {
                    type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
                })
            },
            /** Ici c'est la desactivation de la couleur **/
            disableItem(id) {
                //Start Progress bar
                this.$Progress.start();

                axios.get('/dashboard/disable_cookie/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Cookie desactivated successfully.</strong>', 'progress': 75});
                    }, 2000);
                    /** End alert ***/

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit('AfterCreate');
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    $.notify("Ooop! Something wrong. Try later", {
                    type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
                })
            },

            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                const url = "/api/cookies";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.cookies = response.data.data;
                    this.mydatatables();
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
                //End Progress bar
                this.$Progress.finish();
            },
            reload(){
                this.loadItems();
            },
        },
        created() {
            this.loadItems();
            Fire.$on('AfterCreate', () => {
                this.loadItems();
            });
        }
    }
</script>

<style scoped>

</style>
