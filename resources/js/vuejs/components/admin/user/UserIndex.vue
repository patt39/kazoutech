<template>
    <div>
        <vue-progress-bar/>
        <div class="main-panel">
            <top-nav></top-nav>
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
                                        <i class="material-icons">account_box</i>
                                    </div>
                                    <p class="card-category"><b>All Users</b>
                                    <h3 class="card-title" style="color:red;"><b>{{users.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">account_box</i><b>All Users</b>
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
                                                <b>Datatables Users Site</b>
                                            </h4>
                                            <p class="card-title">
                                                Users registered
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">account_box</i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="header text-right">
                                        <button @click="reload" class="btn btn-success btn-raised button_note btn-sm"
                                                title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                    <div class="toolbar">
                                        <div class="submit text-center">
                                            <router-link :to="{name:'users.index'}" id="button_hover" class="btn btn-success btn-raised">
                                                <span class="btn-label">
                                                    <i class="material-icons">perm_identity</i>
                                                </span>
                                                <b class="title_hover">Profile users</b>
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Profile</b></th>
                                                <th><b>Name</b></th>
                                                <th><b>Confirmed</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Profile</b></th>
                                                <th><b>Name</b></th>
                                                <th><b>Confirmed</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="(item,index) in users" :key="item.id">
                                                <td><img :src="item.avatar" :alt="item.username" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%"></td>
                                                <td>
                                                    <router-link  :to="{ path: `/dashboard/profile/${item.username}` }" title="Administrator Online">
                                                        <!--
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm"></button>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm"></button>
                                                        -->
                                                        {{ (item.name.length > 15 ? item.name.substring(0,15)+ "..." : item.name) | upText }}
                                                    </router-link>
                                                </td>
                                                <td>
                                                    <div class="timeline-heading">
                                                        <span v-if="item.email_verified_at === null" class="badge badge-danger"><b>No</b></span>
                                                        <span v-if="item.email_verified_at != null" class="badge badge-success"><b>Yes</b></span>
                                                    </div>
                                                </td>
                                                <!--<td>
                                                    <router-link  :to="{ path: `/dashboard/users/p/${item.username}/followers/` }">
                                                        <h6 class="card-title">{{item.followers}}</h6>
                                                    </router-link>
                                                </td>-->
                                                <td class="td-actions text-right">
                                                    <!--<a href="javascript:void(0)" @click="getUser(item)" class="btn btn-link btn-warning btn-round btn-just-icon" title="View">
                                                        <i class="material-icons">visibility</i>
                                                    </a>-->
                                                    <button @click="viewItem(item)"
                                                            class="btn btn-link btn-warning btn-round btn-just-icon"
                                                            title="View">
                                                        <i class="material-icons">visibility</i>
                                                    </button>
                                                    <router-link  v-if="$auth.can('edit-user')" :to="{ name: 'users.edit', params: { id: item.id  } }" class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button v-if="$auth.can('delete-user')" @click="deleteItem(item.id)"
                                                            class="btn btn-link btn-danger btn-round btn-just-icon" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Export Excel Users -->
                                    <!--<div class="submit text-center">
                                        <button type="button" id="myUserDownload" class="btn btn-success btn-raised btn-round">
                                            <i class="material-icons">cloud_download</i>
                                            <b>Get Excel Users</b>
                                        </button>
                                    </div>-->

                                    <!-- Modal view technician -->
                                    <div class="modal fade" id="viewNew" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewLabel"><b>Profile user</b></h5>
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                            type="button">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- profile Image -->
                                                    <div class="row">
                                                        <div class="col-md-6 ml-auto mr-auto">
                                                            <div class="profile text-center "
                                                                 style="padding-top: -100px;">
                                                                <div class="avatar">
                                                                    <div class="fileinput fileinput-new text-center"
                                                                         data-provides="fileinput">
                                                                        <div
                                                                            class="fileinput-new thumbnail img-circle img-raised">
                                                                            <img :alt="userProfile.name"
                                                                                 :src="userProfile.avatar">
                                                                        </div>
                                                                        <div
                                                                            class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Pseudo</label>
                                                                <input class="form-control" name="username"
                                                                       type="text" v-model="userProfile.username">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input class="form-control" maxlength="25"
                                                                       name="name" type="text" v-model="userProfile.name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input class="form-control" maxlength="25"
                                                                       name="first_name" type="text"
                                                                       v-model="userProfile.first_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Sex</label>
                                                                <input class="form-control" maxlength="25"
                                                                       name="first_name" type="text"
                                                                       v-model="userProfile.sex">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Age</label>
                                                                <input class="form-control" maxlength="2"
                                                                       name="my_birthday" type="text"
                                                                       v-model="userProfile.age">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Your Phone Number</label>
                                                                <input class="form-control" name="phone"
                                                                       type="number"
                                                                       v-model="userProfile.phone">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input class="form-control" name="email"
                                                                       type="email"
                                                                       v-model="userProfile.email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Street Address</label>
                                                                <input class="form-control" name="address"
                                                                       type="text"
                                                                       v-model="userProfile.address">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Postal Code</label>
                                                                <input class="form-control" name="cap"
                                                                       type="number"
                                                                       v-model="userProfile.cap">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Professional Work</label>
                                                                <input class="form-control" name="work"
                                                                       type="text" v-model="userProfile.work">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" data-dismiss="modal" type="button">
                                                        <span class="btn-label">
                                                            <i class="material-icons">clear</i>
                                                            <b>Close</b>
                                                        </span>
                                                    </button>
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
            <footer-admin></footer-admin>
        </div>
    </div>
</template>

<script>
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";

    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                loaded: false,
                users: {},
                user: {},
                userProfile: {},
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
                        order: [[ 0, 'asc' ], [ 3, 'desc' ]],
                        responsive: true,
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
            viewItem(item) {
                //Masquer le modal après la création
                $("#viewNew").modal("show");
                //On passe les informations
                this.userProfile = item;
            },
            getColorCardUser(){
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser(){
                let colorHeader = 'card-header card-header-' + this.user.color_name;
                return colorHeader;
            },
            getUser(item){
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/p/${item.username}/`);
                //Progres bar
                this.$Progress.finish()
            },
            deleteItem(id) {
                Swal.fire({
                    title: 'Banish User?',
                    text: "Are you sure you want to banish this user?",
                    type: 'warning',
                    customClass: 'animated shake',
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    showCancelButton: true,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();

                        //Envoyer la requet au server
                        axios.delete('/dashboard/users/' + id).then(() => {

                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>User banish successfully.</strong>', 'progress': 75});
                            }, 2000);

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('AfterSave');
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
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                axios.get("/api/users/a/datatables").then(response => {
                    this.loaded = true;
                    this.users = response.data;
                    this.mydatatables();
                });
                axios.get("/api/account/user").then(response => {
                    this.loaded = true;
                    this.user = response.data.data
                });
                //End Progress bar
                this.$Progress.finish();
            },
            reload(){
                this.loadItems()
            },
        },
        created() {
            this.loadItems();
            Fire.$on('AfterSave', () => {
                this.loadItems();
            });
        },
    }

</script>

<style scoped>

</style>
