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
                    <template v-if="$auth.can('view-administrator')">
                        <div v-if="loaded" class="row">
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
                        <div v-if="loaded" class="row">
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
                                            <!--<div class="submit text-center">
                                                <button id="button_hover" @click="modalInvite()" class="btn btn-info btn-raised btn-round text-right">
                                                    <i class="material-icons">inbox</i>
                                                    <b class="title_hover">Invite Administrator</b>
                                                </button>
                                            </div>-->
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
                                                    <td><span v-for="role in item.roles" :class="getRoleName(role)"><b>{{role}}</b></span></td>
                                                    <td>
                                                        <a href="javascript:void(0)" @click="getUser(item)">
                                                            <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                            <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                            {{ (item.name.length > 15 ? item.name.substring(0,15)+ "..." : item.name) | upText }}
                                                        </a>
                                                    </td>
                                                    <td><b>{{ item.updated_at | myDate }}</b></td>
                                                    <td class="td-actions text-right">
                                                        <a href="javascript:void(0)" @click="sendItem(item)" class="btn btn-link btn-info btn-round btn-just-icon" title="Send invitation">
                                                            <i class="material-icons">near_me</i>
                                                        </a>
                                                        <a href="javascript:void(0)" @click="getUser(item)" class="btn btn-link btn-warning btn-round btn-just-icon" title="View administrator">
                                                            <i class="material-icons">visibility</i>
                                                        </a>
                                                        <router-link  v-if="$auth.can('edit-administrator')" :to="{ path: `/dashboard/administrators/${item.id}/edit` }" class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit administrator">
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
                                        <!-- send invitation user -->
                                        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5  class="modal-title" id="updateNewLabel"><b>Invite Administrator</b></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="RegisterValidation" @submit.prevent="inviteAdmin()" role="form" method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.name" type="text" name="name" placeholder="Name administrator" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" required>
                                                                <has-error :form="form" field="name"></has-error>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.email" type="email" name="email" placeholder="Email administrator" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" required>
                                                                <has-error :form="form" field="email"></has-error>
                                                            </div>
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
                                                            <i class="material-icons">near_me</i>
                                                            <b>Yes, Send</b>
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
                                                                        <select name="email" v-model="form.email" id="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
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
                    </template>
                    <div v-else="$auth.can('view-administrator')" class="container-fluid">
                        <alert-permission/>
                    </div>
                </div>
            </div>
            <FooterAdmin/>
        </div>
    </div>
</template>

<script>
    import TopNav from "../../inc/admin/TopNav";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin, FooterAdmin, TopNav},
        data() {
            return {
                loaded: false,
                editmode: false,
                users: {},
                user: {},
                colors:[],
                roles:{},
                form: new Form({
                    email: '',
                    name: '',
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
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
            },
            getUser(item){
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/p/${item.username}/`);
                //Progres bar
                this.$Progress.finish()
            },
            getRoleName(role) {
                if (role === 'super-admin') {
                    return 'badge badge-info';
                }
                if (role === 'admin') {
                    return 'badge badge-success';
                }
                if (role === 'visitor') {
                    return 'badge badge-secondary';
                }
                if (role === 'editor') {
                    return 'badge badge-warning';
                }
                if (role === 'advertiser') {
                    return 'badge badge-danger';
                }
                if (role === 'moderator') {
                    return 'badge badge-primary';
                }
            },
            sendItem(item) {
                this.form.reset();
                //Afficher le modal de la création
                $('#addNew').modal('show');
                //On passe les informations
                this.form.fill(item);
            },
            modalInvite() {
                this.form.reset();
                //Masquer le modal après la création
                $('#inviteAdmin').modal('show');
            },
            inviteAdmin() {
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/user/invite")
                    .then(() => {
                        //Masquer le modal après la création
                        $('#inviteAdmin').modal('hide');
                        $('#addNew').modal('hide');

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
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                const url = "/api/administrators";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.users = response.data.data;
                    this.mydatatables();
                    //End Progress bar
                    this.$Progress.finish();
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
                axios.get("/api/colors").then(({data}) => (this.colors = data.data));
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
