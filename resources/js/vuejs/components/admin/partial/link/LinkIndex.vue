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
                                        <i class="material-icons">http</i>
                                    </div>
                                    <p class="card-category"><b>All Colors</b></p>
                                    <h3 class="card-title" style="color:red;"><b>{{links.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">http</i><b>All Links</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <errored-loading v-if="errored"/>
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
                                                <b>Datatables Links</b>
                                            </h4>
                                            <p class="card-title">
                                                Redirect link to Another Page
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">http</i>
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
                                    <div  class="toolbar">
                                        <div class="submit text-center">
                                            <button id="button_hover" class="btn btn-success btn-raised btn-round" @click="newModal">
                                                <span class="btn-label">
                                                    <i class="material-icons">http</i>
                                                </span>
                                                <b class="title_hover">New Link</b>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Link Name</b></th>
                                                <th><b>Redirect Link</b></th>
                                                <th><b>Edit By</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="disabled-sorting text-right"><b v-if="($auth.can('edit-link') || $auth.can('delete-link'))">Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Link Name</b></th>
                                                <th><b>Redirect Link</b></th>
                                                <th><b>Edit By</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="text-right"><b v-if="($auth.can('edit-link') || $auth.can('delete-link'))">Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in links" :key="item.id">
                                                <td>{{ item.name | upText }}</td>
                                                <td><a :href="item.link" target="_blank" :title="item.name" class="badge badge-primary badge-pill"><b>{{ item.link }}</b></a></td>
                                                <td>
                                                    <a href="javascript:void(0)" @click="getUser(item)">
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </a>
                                                </td>
                                                <td><b>{{ item.updated_at | myDate }}</b></td>
                                                <td class="td-actions text-right">
                                                    <a href="javascript:void(0)" @click="editItem(item)" v-if="$auth.can('edit-link')"
                                                       class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a href="javascript:void(0)" @click="deleteItem(item.id)" v-if="$auth.can('delete-link')"
                                                       class="btn btn-link btn-danger btn-round btn-just-icon" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Modal création/édition link -->
                                    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 v-show="!editmode" class="modal-title" id="addNewLabel"><b>Add New Link</b></h5>
                                                    <h5 v-show="editmode" class="modal-title" id="updateNewLabel"><b>Update Link</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="RegisterValidation" @submit.prevent="editmode ? updateItem() : createItem()" role="form" method="POST" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"></label>
                                                            <input v-model="form.name" type="text" name="name" placeholder="Name link "
                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                                            <has-error :form="form" field="name"></has-error>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"></label>
                                                            <input v-model="form.link" type="text" name="link" placeholder="Example link: http://myexample.com"
                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('link') }">
                                                            <has-error :form="form" field="link"></has-error>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="text-center">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        <span class="btn-label">
                                                            <i class="material-icons">clear</i>
                                                            <b>Close</b>
                                                        </span>
                                                                </button>
                                                                <button v-show="!editmode" type="submit" class="btn btn-success btn-raised">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                            <b>Yes, Save</b>
                                                        </span>
                                                                </button>
                                                                <button v-show="editmode" type="submit" class="btn btn-success btn-raised">
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
                errored: false,
                editmode: false,
                user: {},
                links: {},
                form: new Form({
                    id: '',
                    name: '',
                    link: '',
                    user_id: '',
                    status: '',
                    slug: '',
                    role_user: '',
                    color_name:''
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
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
            },
            getColor(item){
                return 'badge badge-' + item.color_name;
            },
            getUser(item){
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/p/${item.user.username}/`);
                //Progres bar
                this.$Progress.finish()
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();
                this.form.put('/dashboard/links/' + this.form.id)
                    .then(() => {
                        //Masquer le modal après la création
                        $('#addNew').modal('hide');

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>link updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        /** Fin alert **/

                        //End Progress bar
                        this.$Progress.finish();
                        //Event
                        Fire.$emit('AfterCreate');
                    })
                    .catch(() => {
                        //Failled message
                        this.$Progress.fail();
                        //Alert error
                        $.notify("Ooops! Something wrong. Try later", {
                            type: 'danger',
                            animate: {
                                enter: 'animated bounceInDown',
                                exit: 'animated bounceOutUp'
                            }
                        });
                    })
            },
            editItem(item) {
                this.editmode = true;
                this.form.reset();
                //Masquer le modal après la création
                $('#addNew').modal('show');
                //On passe les information
                this.form.fill(item);
            },
            newModal() {
                this.editmode = false;
                this.form.reset();
                //Masquer le modal après la création
                $('#addNew').modal('show');
            },
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Link?',
                    text: "Are you sure you want to delete this Link?",
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
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();

                        //Envoyer la requete au server
                        axios.delete('/dashboard/links/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>link deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            /* End alert ***/

                            //End Progress bar
                            this.$Progress.finish();
                            Fire.$emit('AfterCreate');

                        }).catch(() => {
                            this.$Progress.fail();
                            //Alert error
                            $.notify("Ooops! Something wrong. Try later", {
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
            createItem() {
                //Start Progress bar
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/dashboard/links")
                    .then(() => {
                        //Event
                        Fire.$emit('AfterCreate');

                        //Masquer le modal après la création
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
                            notify.update({'type': 'success', 'message': '<strong>link Created Successfully.</strong>', 'progress': 75});
                        }, 2000);

                        //End Progress bar
                        this.$Progress.finish()
                    })
                    .catch(() => {
                        this.$Progress.fail();
                        //Alert error
                        $.notify("Ooops! Something wrong. Try later", {
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
                const url = "/dashboard/api/links";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.links = response.data.data;
                    this.mydatatables();
                    //End Progress bar
                    this.$Progress.finish();
                }).catch(error => {
                    console.log(error);
                    this.errored = true
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
            },
            reload(){
                this.loadItems()
            },
            intervalFetchData: function () {
                setInterval(() => {
                    this.loadItems();
                }, 120000);
            },
        },
        created() {
            this.loadItems();
            this.$storage.setOptions({
                prefix: 'app_',
                driver: 'local',
                ttl: 60 * 60 * 24 * 1000 // 24 hours
            });
            Fire.$on('AfterCreate', () => {
                this.loadItems();
            });
            // Run the intervalFetchData function once to set the interval time for later refresh
            this.intervalFetchData();
        }
    }

</script>
<style scoped>

</style>
