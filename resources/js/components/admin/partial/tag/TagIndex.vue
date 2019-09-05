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
                                        <i class="material-icons">forum</i>
                                    </div>
                                    <p class="card-category"><b>All Tags</b>
                                    <h3 class="card-title" style="color:red;"><b>{{tags.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">forum</i>
                                        <b>All Tags</b>
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
                                                <b>Datatables Tag</b>
                                            </h4>
                                            <p class="card-title">
                                                Public help Tags
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                <span>
                                    <i id="tooltipSize" class="material-icons">forum</i>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div  class="card-body">
                                    <div class="header text-right">
                                        <button @click="reload" class="btn btn-success btn-raised btn-round button_note btn-sm"
                                                title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                    <br>
                                    <div class="card-body">
                                        <div class="toolbar">
                                            <div class="submit text-center">
                                                <router-link id="button_hover" :to="{ name: 'tags.create' }" class="btn btn-success btn-raised btn-round" append>
                                               <span class="btn-label">
                                                    <i class="material-icons">forum</i>
                                                </span>
                                                    <b class="title_hover">New Tag</b>
                                                </router-link>
                                            </div>
                                        </div>
                                        <div class="material-datatables">
                                            <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                                   cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th><b>Tag Name</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Edit by</b></th>
                                                    <th><b>Last Update</b></th>
                                                    <th class="disabled-sorting text-right"><b>Actions</b></th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th><b>Tag Name</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Edit by</b></th>
                                                    <th><b>Last Update</b></th>
                                                    <th class="text-right"><b>Actions</b></th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <tr v-for="item in tags" :key="item.id">
                                                    <td>{{ item.title | upText }}</td>
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
                                                    <td><b>{{ item.updated_at | myDate }}</b></td>
                                                    <td class="td-actions text-right">
                                                        <a  href="javascript:void(0)" v-if="item.status === 1" @click="disableItem(item.id)" class="btn btn-link btn-info btn-round btn-just-icon " title="Disable">
                                                            <i class="material-icons">power_settings_new</i>
                                                        </a>
                                                        <a href="javascript:void(0)" v-else-if="item.status === 0" @click="activeItem(item.id)" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activate">
                                                            <i class="material-icons">power_settings_new</i>
                                                        </a>
                                                        <router-link  :to="{ path: `/dashboard/tags/show/${item.slug}` }" class="btn btn-link  btn-warning btn-round btn-just-icon" title="View tag">
                                                            <i class="material-icons">visibility</i>
                                                        </router-link>
                                                        <router-link  :to="{ path: `/dashboard/tags/${item.id}/edit` }" class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                            <i class="material-icons">edit</i>
                                                        </router-link>
                                                        <a href="javascript:void(0)" @click="deleteItem(item.id)"
                                                           class="btn btn-link btn-danger btn-round btn-just-icon" title="Delete">
                                                            <i class="material-icons">delete_forever</i>
                                                        </a>
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
            <footer-admin></footer-admin>
        </div>

    </div>
</template>

<script>
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                loaded: false,
                editmode: false,
                tags: {},
                user: {},
                form: new Form({
                    id: '',
                    title: '',
                    user_id: '',
                    status: '',
                    slug: ''
                })
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
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser(){
                let colorHeader = 'card-header card-header-' + this.user.color_name;
                return colorHeader;
            },
            getMaterialIcon(color){
                let icon = 'material-icons text-' + color;
                return icon;
            },
            getUser(item){
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/p/${item.user.username}/`);
                //Progres bar
                this.$Progress.finish()
            },
            deleteItem(id) {
                Swal.fire({
                    title: 'Delete Tag?',
                    text: "Are you sure you want to delete this Tag?",
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
                        this.form.delete('/dashboard/tags/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Tag deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            /*** End alert ***/

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('AfterCreate');
                        }).catch(() => {
                            //Failled message
                            this.$Progress.fail();
                            toastr.error('', 'Ooop! Something wrong. Try later');
                        })
                    }
                })
            },
            /* ici c'est l'activation de la couleur  **/
            activeItem(id) {
                //Start Progress bar
                this.$Progress.start();
                this.form.get('/dashboard/active_tags/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Tag activated successfully.</strong>', 'progress': 75});
                    }, 2000);

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit('AfterCreate');
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    toastr.error('', 'Ooop! Something wrong. Try later');
                })
            },
            /* Ici c'est la desactivation de la couleur **/
            disableItem(id) {
                //Start Progress bar
                this.$Progress.start();
                this.form.get('/dashboard/disable_tags/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Tag desactivated successfully.</strong>', 'progress': 75});
                    }, 2000);
                    /** End alert **/

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit('AfterCreate');
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    toastr.error('', 'Ooop! Something wrong. Try later');
                })
            },
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                const url = "/api/tags";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.tags = response.data.data;
                    this.mydatatables();
                    //End Progress bar
                    this.$Progress.finish();
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});

            },
             reload(){
                this.loadItems();
            },
            intervalFetchData: function () {
                setInterval(() => {
                    this.loadItems();
                }, 120000);
            },
        },
        created() {
            this.loadItems();

            Fire.$on('AfterCreate', () => {
                this.loadItems();
            });
            this.intervalFetchData();
        }
    }

</script>

<style scoped>

</style>
