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
                    <div class="row">
                        <div class="col-md-12 expo">
                            <div class="card card-stats">
                                <div :class="getColorCardUser()">
                                    <div class="card-icon">
                                        <i class="material-icons">supervised_user_circle</i>
                                    </div>
                                    <p class="card-category"><b>All Administrators</b>
                                    <h3 class="card-title" style="color:red;"><b>{{users.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">supervised_user_circle</i><b>All Administrators</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="!loaded" class="submit">
                        <LoaderLdsDefault/>
                    </div>
                    <div class="row">
                        <div class="col-md-12 expo">
                            <div class="card">
                                <div :class="getColorHeaderUser()">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">
                                                <b>Datatables Administrators</b>
                                            </h4>
                                            <p class="card-title">
                                                Historic informations
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
								<span>
									<i id="tooltipSize" class="material-icons">supervised_user_circle</i>
								</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <div class="submit text-center">
                                            <button id="button_hover" @click="modalInvite()" class="btn btn-info btn-raised btn-round text-right">
                                                <i class="material-icons">inbox</i>
                                                <b class="title_hover">Invite Administrator</b>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Profile</b></th>
                                                <th><b>Admin Name</b></th>
                                                <th><b>Admin Sex</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Admin Role</b></th>
                                                <th><b>Edit By</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Profile</b></th>
                                                <th><b>Admin Name</b></th>
                                                <th><b>Admin Sex</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Admin Role</b></th>
                                                <th><b>Edit By</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in users" :key="item.id">
                                                <td><img :src="item.avatar" :alt="item.username" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%"></td>
                                                <td>{{ (item.name.length > 15 ? item.name.substring(0,15)+ "..." : item.name) | upText }}</td>
                                                <td>{{ item.sex }}</td>
                                                <td v-if="item.statusOnline"><span class="badge badge-success" title="Administrator Online">Online</span></td>
                                                <td v-else="item.statusOnline"><span class="badge badge-danger" title="Administrator Offline">Offline</span></td>
                                                <td><span><b>{{item.roles.name}}</b></span></td>
                                                <td>
                                                    <router-link  :to="{ path: `/admin/profile/${item.username}` }">
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                        {{ (item.name.length > 15 ? item.name.substring(0,15)+ "..." : item.name) | upText }}
                                                    </router-link>
                                                </td>
                                                <td><b>{{ item.updated_at | myDate }}</b></td>
                                                <td class="td-actions text-right">
                                                    <button @click="viewItem(item)" class="btn btn-link btn-warning btn-round btn-just-icon" title="View">
                                                        <i class="material-icons">visibility</i>
                                                    </button>
                                                    <router-link  :to="{ path: `/dashboard/administrators/${item.id}/edit` }" class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Export Excel Users -->
                                    <div class="submit text-center">
                                        <button type="button" id="myAdminDownload" class="btn btn-success btn-raised btn-round">
                                            <i class="material-icons">cloud_download</i>
                                            <b>Get Excel Admins</b>
                                        </button>
                                    </div>

                                    <!-- Modal Update Role Administrator -->
                                    <div class="modal fade" id="newAdmin" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><b>Update Role Administrator</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
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
                                                                            <img :src="form.avatar" :alt="form.name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <form @keydown="form.onKeydown($event)" @submit.prevent="updateItem()" role="form" method="POST" action="" accept-charset="UTF-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input v-model="form.name" type="text" name="name" placeholder="Admin Name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" disabled>
                                                                    <has-error :form="form" field="name"></has-error>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input v-model="form.email" type="email" name="email" placeholder="Admin Email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" disabled>
                                                                    <has-error :form="form" field="email"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <select name="sex" v-model="form.sex" id="sex" class="form-control" :class="{ 'is-invalid': form.errors.has('sex') }">
                                                                        <option value="" disabled>Choose Sex</option>
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                    </select>
                                                                    <has-error :form="form" field="sex"></has-error>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <select name="my_status" v-model="form.my_status" id="my_status" class="form-control" :class="{ 'is-invalid': form.errors.has('my_status') }">
                                                                        <option value="" disabled>Choose Status</option>
                                                                        <option value="null">Unactivated</option>
                                                                        <option value="active">Activated</option>
                                                                    </select>
                                                                    <has-error :form="form" field="my_status"></has-error>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <select name="role_user" v-model="form.role_user" id="role" class="form-control" :class="{ 'is-invalid': form.errors.has('role_user') }">
                                                                        <option value="" disabled>Choose Role</option>
                                                                        <option v-for="role in roles" :key="role.id" :value="role.name">{{role.name}}</option>
                                                                    </select>
                                                                    <has-error :form="form" field="role_user"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="modal-footer">
                                                            <div class="text-center">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        <span class="btn-label">
                                                            <i class="material-icons">clear</i>
                                                            <b>Close</b>
                                                        </span>
                                                                </button>
                                                                <button :disabled="form.busy" type="submit" class="btn btn-success btn-raised">
                                                        <span class="btn-label">
                                                            <i class="material-icons">save_alt</i>
                                                            <b>Yes, Update</b>
                                                        </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Invite Administrator -->
                                    <div class="modal fade" id="inviteAdmin" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><b>Invite Administrator</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form @keydown="form.onKeydown($event)" @submit.prevent="inviteAdmin()" role="form" method="POST" action="" accept-charset="UTF-8">
                                                        <div class="row">
                                                            <div class="alert alert-primary">
                                                                <div class="container text-justify">
                                                                    <div class="alert-icon">
                                                                        <i class="material-icons">info_outline</i>
                                                                    </div>
                                                                    <b>Info alert - </b> You are about to send a message to an adminsitrater to communicate his new role.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <select name="name" v-model="form.email" id="name" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                                                        <option value="" disabled >Select an administrator</option>
                                                                        <option v-for="user in users" :key="user.id" :value="user.email">{{user.name}}</option>
                                                                    </select>
                                                                    <has-error :form="form" field="email"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="modal-footer">
                                                            <div class="text-center">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        <span class="btn-label">
                                                            <i class="material-icons">clear</i>
                                                            <b>Close</b>
                                                        </span>
                                                                </button>
                                                                <button :disabled="form.busy" type="submit" class="btn btn-success btn-raised">
                                                        <span class="btn-label">
                                                            <i class="material-icons">alternate_email</i>
                                                            <b>Yes, Invite</b>
                                                        </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
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
    import NavAdmin from "../../inc/admin/NavAdmin";
    import TopNav from "../../inc/admin/TopNav";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin, FooterAdmin, TopNav, NavAdmin},
        data() {
            return {
                loaded: false,
                editmode: false,
                users: {},
                colors:[],
                roles:{},
                color_user: '',
                form: new Form({
                    id: '',
                    name: '',
                    first_name: '',
                    work: '',
                    sex: '',
                    roles: '',
                    role_user: '',
                    age: '',
                    email: '',
                    username: '',
                    avatar: '',
                    my_status: '',
                    created_at: '',
                    last_sign_in_at: '',
                    current_sign_in_at: '',
                    edited_by: ''
                })
            }
        },
        methods: {
            /* Ici c'est le script du datatable */
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
                return 'card-header card-header-icon card-header-' + this.color_user;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.color_user;
            },
            getRoleName(role) {
                if (role == 'super-admin') {
                    return 'badge badge-info';
                }
                if (role == 'admin') {
                    return 'badge badge-success';
                }
                if (role == 'visitor') {
                    return 'badge badge-secondary';
                }
                if (role == 'editor') {
                    return 'badge badge-warning';
                }
                if (role == 'advertiser') {
                    return 'badge badge-danger';
                }
                if (role == 'moderator') {
                    return 'badge badge-primary';
                }
            },
            modalInvite() {
                this.form.reset();
                //Masquer le modal après la création
                $('#inviteAdmin').modal('show');
            },
            inviteAdmin() {
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/invite")
                    .then(() => {
                        //Masquer le modal après la création
                        $('#inviteAdmin').modal('hide');

                        //Insertion de l'alert !
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true,
                            animate: {
                                enter: 'animated bounceInDown',
                                exit: 'animated bounceOutUp'
                            },
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Administrator invite Successfully.</strong>', 'progress': 75});
                        }, 2000);

                        //End Progress bar
                        this.$Progress.finish();
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
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put('/dashboard/administrators/' + this.form.id)
                    .then(() => {
                        //Masquer le modal après la création
                        $('#newAdmin').modal('hide');

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Administrator updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        /** Fin alert **/

                        //Progres bar
                        this.$Progress.finish();

                        //Event
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
            editItem(item) {
                this.form.reset();
                //Masquer le modal après la création
                $('#newAdmin').modal('show');
                //On passe les information
                this.form.fill(item);
            },
            viewItem(item) {
                this.viewmode = true;
                this.form.reset();
                //Masquer le modal après la création
                $('#viewNew').modal('show');
                //On passe les information
                this.form.fill(item);
            },
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                const url = "/api/administrators";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.users = response.data.data;
                    this.mydatatables()
                });
                axios.get('/api/account/user').then(({data}) => (this.color_user = data.color_name));//
                axios.get("/api/colors").then(({data}) => (this.colors = data.data));
                //const urlRoles = "/admin/api/roles";
                //axios.get(urlRoles).then(({data}) => (this.roles = data.data));
                //End Progress bar
                this.$Progress.finish()
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
