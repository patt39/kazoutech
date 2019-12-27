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
                                        <i class="material-icons">person_outline</i>
                                    </div>
                                    <p class="card-category"><b>All Slide Home page</b>
                                    <h3 class="card-title" style="color:red;"><b>{{slidehomes.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">person_outline</i><b>All Slide Home page</b>
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
                                        <button @click="reload"
                                                class="btn btn-success btn-raised button_note btn-sm"
                                                title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                    <div v-if="$auth.can('create-about')" class="toolbar">
                                        <div class="submit text-center">
                                            <router-link :to="{ name: 'slide_image' }" id="button_hover"
                                                         class="btn btn-success btn-raised ">
                                               <span class="btn-label">
                                                   <i class="material-icons">person_outline</i>
                                               </span>
                                                <b class="title_hover">New Image slide home</b>
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Image</b></th>
                                                <th><b>Title</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Edit By</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Image</b></th>
                                                <th><b>Title</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Edit By</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in abouts" :key="item.id">
                                                <td><img :src="item.photo"
                                                         style="width: 50px; height: 50px;  top: 15px; left: 15px; border-radius: 50%">
                                                </td>
                                                <td>{{ (item.title.length > 15 ? item.title.substring(0,15)+
                                                    "..." : item.title) | upText }}
                                                </td>
                                                <td>
                                                    <div class="timeline-heading">
                                                        <span v-if="item.status" class="badge badge-info"><b>Active</b></span>
                                                        <span v-else-if="!item.status"
                                                              class="badge badge-danger"><b>Deactive</b></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" @click="getUser(item)">
                                                        <button v-if="item.statusOnline" type="button"
                                                                class="btn btn-success btn-round btn-just-icon btn-sm"
                                                                title="Administrator Online"></button>
                                                        <button v-else="item.statusOnline" type="button"
                                                                class="btn btn-danger btn-round btn-just-icon btn-sm"
                                                                title="Administrator Offline"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+
                                                        "..." : item.user.name) | upText }}
                                                    </a>
                                                </td>
                                                <td><b>{{ item.updated_at | myDate }}</b></td>
                                                <td class="td-actions text-right">
                                                    <button type="button" class="togglebutton btn btn-link btn-sm btn-sm">
                                                        <label>
                                                            <input type="checkbox" name="status" v-model="item.status"
                                                                   @change="changeStatus(item)"/>
                                                            <span class="toggle"></span>
                                                        </label>
                                                    </button>
                                                    <router-link v-if="$auth.can('edit-about')"
                                                                 :to="{ path: `/dashboard/abouts/${item.id}/edit` }"
                                                                 class="btn btn-link  btn-success btn-round btn-just-icon"
                                                                 title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>

                                                    <button v-if="$auth.can('delete-about')"
                                                            @click="deleteItem(item.id)"
                                                            class="btn btn-link btn-danger btn-round btn-just-icon"
                                                            title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Modal show member -->
                                    <div class="modal fade" id="viewNew" tabindex="-1" role="dialog"
                                         aria-labelledby="addNewLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-10 ml-auto mr-auto">
                                                            <div style="padding-top: -100px;"
                                                                 class="profile text-center ">
                                                                <div class="avatar">
                                                                    <div class="fileinput fileinput-new text-center"
                                                                         data-provides="fileinput">
                                                                        <div
                                                                            class="fileinput-new thumbnail img-circle img-raised">
                                                                            <img :src="about.photo"
                                                                                 :alt="about.first_name">
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
                                                                <input v-model="about.last_name" type="text"
                                                                       name="last_name"
                                                                       class="form-control" placeholder="Full Name..."
                                                                       disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="about.first_name" type="text"
                                                                       class="form-control" name="First Name"
                                                                       placeholder="Role..." disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="about.fblink" type="text" name="fblink"
                                                                       class="form-control"
                                                                       placeholder="Facebook Username" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="about.instlink" type="text"
                                                                       name="instlink"
                                                                       class="form-control"
                                                                       placeholder="Instagram Username" disabled>
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
                                                        <p v-html="about.description"></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">
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
            <footer-admin></footer-admin>
        </div>

    </div>
</template>

<script>
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";

    export default {
        props: {
            checked: Boolean
        },
        components: {
            LoaderLdsDefault,
            StatusAdmin,
        },
        data() {
            return {
                loaded: false,
                editmode: false,
                abouts: {},
                user: {},
                about: {
                    'user': ''
                },
            }
        },
        methods: {
            mydatatables() {
                $(function () {
                    $('#datatables').DataTable({
                        "pagingType": "full_numbers",
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ],
                        order: [[0, 'desc'], [3, 'asc']],
                        responsive: true,
                        stateSave: true,
                        destroy: true,
                        retrieve: true,
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
            getColorCardUser() {
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser() {
                return 'card-header card-header-' + this.user.color_name;
            },
            getUser(item) {
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
                this.about = item;
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
                        axios.delete("/dashboard/abouts/" + id).then(() => {

                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true,
                                animate: {
                                    enter: 'animated bounceInDown',
                                    exit: 'animated bounceOutUp'
                                },
                            });
                            setTimeout(function () {
                                notify.update({
                                    'type': 'success',
                                    'message': '<strong>Member deleted Successfully.</strong>',
                                    'progress': 75
                                });
                            }, 2000);
                            /** End alert ***/

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('ItemGetter');
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

            /** Ici c'est l'activation de la data  **/
            changeStatus(item){
                //Start Progress bar
                this.$Progress.start();
                axios.get(`/dashboard/change_status_abouts/${item.id}`, {
                    status: item.status,
                }).then(res => {

                    $.notify('<strong>Member update Successfully.</strong>', {
                        allow_dismiss: false,
                        type: 'info',
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        },
                        animate: {
                            enter: "animated fadeInUp",
                            exit: "animated fadeOutDown"
                        },
                    });

                    Fire.$emit('ItemGetter');
                    //End Progress bar
                    this.$Progress.finish();
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
                let vm = this;
                //Start Progress bar
                vm.$Progress.start();
                axios.get("/api/abouts").then(response => {
                    vm.loaded = true;
                    vm.abouts = response.data.data;
                    vm.mydatatables();
                    //End Progress bar
                    vm.$Progress.finish();
                });
                axios.get("/api/account/user").then(response => {
                    vm.user = response.data.data
                });

            },
            reload() {
                this.loadItems()
            },
        },
        created() {
            this.loadItems();
            Fire.$on('ItemGetter', () => {
                this.loadItems();
            });
        }
    }
</script>

<style scoped>

</style>
