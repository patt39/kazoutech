<template>
    <div>
        <vue-progress-bar/>
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
                                        <i class="material-icons">person_outline</i>
                                    </div>
                                    <p class="card-category"><b>All Team Members</b>
                                    <h3 class="card-title" style="color:red;"><b>{{abouts.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">person_outline</i><b>All Team Members</b>
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
                                                <b>Datatables Members</b>
                                            </h4>
                                            <p class="card-title">
                                                Platform Creators
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">person_outline</i>
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
                                    <div v-if="$auth.can('create-about')" class="toolbar">
                                        <div class="submit text-center">
                                           <router-link :to="{ name: 'abouts.create' }" id="button_hover" class="btn btn-success btn-raised btn-round ">
                                               <span class="btn-label">
                                                   <i class="material-icons">person_outline</i>
                                               </span>
                                               <b class="title_hover">New MEMBER</b>
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th><b>Image</b></th>
                                                    <th><b>Member Name</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Edit By</b></th>
                                                    <th><b>Last Update</b></th>
                                                    <th class="disabled-sorting text-right"><b>Actions</b></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th><b>Image</b></th>
                                                    <th><b>Member Name</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Edit By</b></th>
                                                    <th><b>Last Update</b></th>
                                                    <th class="text-right"><b>Actions</b></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in abouts" :key="item.id">
                                                <td><img :src="item.photo" style="width: 50px; height: 50px;  top: 15px; left: 15px; border-radius: 50%" ></td>
                                                <td>{{ (item.last_name.length > 15 ? item.last_name.substring(0,15)+ "..." : item.last_name) | upText }}</td>
                                                <td>
                                                    <div class="timeline-heading">
                                                        <span v-if="item.status === 1" class="badge badge-info"><b>Active</b></span>
                                                        <span v-else-if="item.status === 0" class="badge badge-danger"><b>Deactive</b></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" @click="getUser(item)">
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </a>
                                                </td>
                                                <td><b>{{ item.updated_at | myDate }}</b></td>
                                                <td class="td-actions text-right">
                                                    <template v-if="$auth.can('publish-about')">
                                                        <button  v-if="item.status === 1" @click="disableItem(item.id)" class="btn btn-link btn-info btn-round btn-just-icon " title="Disable">
                                                            <i class="material-icons">power_settings_new</i>
                                                        </button>
                                                        <button  v-else-if="item.status === 0" @click="activeItem(item.id)" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activate">
                                                            <i class="material-icons">power_settings_new</i>
                                                        </button>
                                                    </template>
                                                    <button @click="viewItem(item)" class="btn btn-link btn-warning btn-round btn-just-icon" title="View">
                                                        <span class="btn-label">
                                                            <i class="material-icons">visibility</i>
                                                        </span>
                                                    </button>
                                                    <router-link  v-if="$auth.can('edit-about')" :to="{ path: `/dashboard/abouts/${item.id}/edit` }" class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button v-if="$auth.can('delete-about')" @click="deleteItem(item.id)"
                                                            class="btn btn-link btn-danger btn-round btn-just-icon" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Modal show member -->
                                    <div class="modal fade" id="viewNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-10 ml-auto mr-auto">
                                                            <div style="padding-top: -100px;" class="profile text-center ">
                                                                <div class="avatar">
                                                                    <div class="fileinput fileinput-new text-center"
                                                                         data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                                                            <img :src="form.photo" :alt="form.first_name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.last_name" type="text" name="last_name"
                                                                       class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }" placeholder="Full Name..." disabled>
                                                                <has-error :form="form" field="last_name"></has-error>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.first_name" type="text" name="First Name"
                                                                       class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }" placeholder="Role..." disabled>
                                                                <has-error :form="form" field="first_name"></has-error>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.fblink" type="text" name="fblink"
                                                                       class="form-control" :class="{ 'is-invalid': form.errors.has('fblink') }" placeholder="Facebook Username" disabled>
                                                                <has-error :form="form" field="fblink"></has-error>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.instlink" type="text" name="instlink"
                                                                       class="form-control" :class="{ 'is-invalid': form.errors.has('instlink') }" placeholder="Instagram Username" disabled>
                                                                <has-error :form="form" field="instlink"></has-error>
                                                            </div>
                                                        </div>
                                                        <!--<div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.twlink" type="text" name="twlink"
                                                                       class="form-control" :class="{ 'is-invalid': form.errors.has('twlink') }" placeholder="Tweeter Username" disabled>
                                                                <has-error :form="form" field="twlink"></has-error>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.linklink" type="text" name="linklink"
                                                                       class="form-control" :class="{ 'is-invalid': form.errors.has('linklink') }" placeholder="Linkedin Username" disabled>
                                                                <has-error :form="form" field="linklink"></has-error>
                                                            </div>
                                                        </div>-->
                                                    </div>
                                                    <div class="form-group text-justify">
                                                        <p v-html="form.description"></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                <span class="btn-label">
                                                    <i class="material-icons">clear</i>
                                                    <b>Close</b>
                                                </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
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
    import TopNav from "../../../inc/admin/TopNav";
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";

    export default {
        components: {
            LoaderLdsDefault,
            StatusAdmin,
            FooterAdmin,
            TopNav,
        },
        data() {
            return {
                loaded: false,
                editmode: false,
                abouts:{},
                user: {},
                form: new Form({
                    id: '',
                    role: '',
                    ip: '',
                    description: '',
                    fblink: '',
                    first_name: '',
                    last_name: '',
                    photo: '',
                    twlink: '',
                    instlink: '',
                    user_id: '',
                    status: '',
                    slug: ''
                }),
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
                            searchPlaceholder: "Search Record",
                        },
                        "sPaginationType": "full_numbers",

                    });
                });
            },
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
			},
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
			},
            getUser(item){
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/p/${item.user.username}/`);
                //Progres bar
                this.$Progress.finish()
            },
            viewItem(item) {
                //Masquer le modal après la création
                $('#viewNew').modal('show');
                //On passe les information
                this.form.fill(item);
            },
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Member?',
                    text: "Are you sure you want to delete this member?",
                    type: 'warning',
                    animation: false,
                    customClass: 'animated shake',
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                    showCancelButton: true,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();
                        //Envoyer la requete au server
                        this.form.delete("/dashboard/abouts/" + id).then(() => {

                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true,
                            animate: {
                                enter: 'animated bounceInDown',
                                exit: 'animated bounceOutUp'
                                },
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Member deleted Successfully.</strong>', 'progress': 75});
                            }, 2000);
                            /** End alert ***/

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('AfterCreate');
                        }).catch(() => {
                            //Failled message
                            this.$Progress.fail();
                            //Alert error
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
                this.form.get('/dashboard/active_abouts/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true,
                                animate: {
                                    enter: 'animated bounceInDown',
                                    exit: 'animated bounceOutUp'
                                },
                            });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Member activated Successfully.</strong>', 'progress': 75});
                        }, 2000);
                    /** End alert ***/

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit('AfterCreate');
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    //Alert error
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
                this.form.get('/dashboard/disable_abouts/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true,
                            animate: {
                                enter: 'animated bounceInDown',
                                exit: 'animated bounceOutUp'
                            },
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Member desactivated Successfully.</strong>', 'progress': 75});
                        }, 2000);
                    /** End alert ***/

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit('AfterCreate');
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    //Alert error
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
                axios.get("/api/abouts").then(response => {
                    this.loaded = true;
                    this.abouts = response.data.data;
                    this.mydatatables();
                    //End Progress bar
                    this.$Progress.finish();
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});

            },
            reload(){
                this.loadItems()
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
