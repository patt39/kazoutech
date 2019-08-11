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
                                        <i class="material-icons">assignment_ind</i>
                                    </div>
                                    <p class="card-category"><b>All Documentations</b>
                                    <h3 class="card-title" style="color:red;"><b>{{documentations.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">assignment_ind</i><b>All Documentations</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <errored-loading v-if="errored"/>
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
                                                <b>Datatables Documentations</b>
                                            </h4>
                                            <p class="card-title">
                                                Documentation Choice For Buttons
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                <span>
                                    <i id="tooltipSize" class="material-icons">assignment_ind</i>
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
                                    <div v-if="$auth.can('create-documentation')" class="toolbar">
                                        <div class="submit text-center">
                                            <button id="button_hover" class="btn btn-success btn-raised btn-round " @click="newModal">
                                     <span class="btn-label">
                                        <i class="material-icons">assignment_ind</i>
                                    </span>
                                                <b class="title_hover">New Documentation</b>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Name</b></th>
                                                <th><b>File</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="disabled-sorting text-right"><b v-if="($auth.can('publish-documentation') || $auth.can('edit-documentation') || $auth.can('delete-documentation'))">Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Name</b></th>
                                                <th><b>File</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="text-right"><b v-if="($auth.can('publish-documentation') || $auth.can('edit-documentation') || $auth.can('delete-documentation'))">Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in orderByItems" :key="item.id">
                                                <td>{{ item.name | upText }}</td>
                                                <td>{{ item.name_doc }}</td>
                                                <td><b>{{ item.updated_at | dateCalendar }}</b></td>
                                                <td class="td-actions text-right">
                                                    <button @click="editItem(item)"
                                                            class="btn btn-link  btn-info btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">get_app</i>
                                                    </button>
                                                    <button v-if="$auth.can('edit-documentation')" @click="editItem(item)"
                                                            class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button v-if="$auth.can('delete-documentation')" @click="deleteItem(item.id)"
                                                            class="btn btn-link btn-danger btn-round btn-just-icon" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Modal création/édition color -->
                                    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 v-show="!editmode" class="modal-title" id="addNewLabel"><b>Add New Color</b></h5>
                                                    <h5 v-show="editmode" class="modal-title" id="updateNewLabel"><b>Update Color</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="RegisterValidation" @submit.prevent="editmode ? updateItem() : createItem()" role="form" method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input v-model="form.name" type="text" name="name"
                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Name document">
                                                                    <has-error :form="form" field="name"></has-error>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 ml-auto mr-auto">
                                                                <div class="profile text-center">
                                                                    <br>
                                                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail">
                                                                            <img v-show="!editmode" src="https://www.kazoucoin.com/assets/img/photo.jpg" alt="...">
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                        <div>
                                                                         <span class="btn btn-raised btn-round btn-success btn-file">
                                                                            <span class="fileinput-new" style="cursor: pointer">
                                                                               <i class="material-icons">insert_photo</i>
                                                                                        <b>Add File</b>
                                                                            </span>
                                                                             <span class="fileinput-exists" style="cursor: pointer">
                                                                                <i class="material-icons">photo_library</i>
                                                                                     <b>Change</b>
                                                                             </span>
                                                                             <input id="photo" @change="updateImage" type="file" class="form-control" name="photo">
                                                                         </span>
                                                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                                                                <i class="material-icons">cancel</i>
                                                                                <b>Remove</b>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <has-error :form="form" field="photo"></has-error>
                                                                </div>
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
                                                                <button :disabled="form.busy" v-show="!editmode" type="submit" class="btn btn-success btn-raised">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                            <b>Yes, Save</b>
                                                        </span>
                                                                </button>
                                                                <button :disabled="form.busy" v-show="editmode" type="submit" class="btn btn-success btn-raised">
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
        components: {LoaderLdsDefault, StatusAdmin, FooterAdmin, TopNav},
        data() {
            return {
                loaded: false,
                errored: false,
                editmode: false,
                user: {},
                documentations: {},
                form: new Form({
                    id: '',
                    name: '',
                    slug: ''
                })
            }
        },
        methods: {
            updateImage(e){
                //console.log('uploadert')
                let file = e.target.files[0];
                console.log(file);
                let reader = new FileReader();
                if (file['size'] < 6000775){
                    reader.onloadend = (file) => {
                        //console.log('RESULT',reader.result)
                        this.form.name_doc = reader.result
                    };
                    reader.readAsDataURL(file);
                }else{
                    this.$Progress.fail();
                    Swal.fire({
                        type: 'error',
                        title: 'Your image is very big',
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                    });
                }
            },
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
                this.form.put('/dashboard/colors/' + this.form.id)
                    .then(() => {
                        //Masquer le modal après la création
                        $('#addNew').modal('hide');

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Color updated successfully.</strong>', 'progress': 75});
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
                    title: 'Delete Documentations?',
                    text: "Are you sure you want to delete this documentations?",
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
                        axios.delete('/dashboard/colors/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Documentations deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            /* End alert ***/

                            //End Progress bar
                            this.$Progress.finish();
                            Fire.$emit('AfterCreate');

                        }).catch(() => {
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
            createItem() {
                //Start Progress bar
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/dashboard/documentations")
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
                            notify.update({'type': 'success', 'message': '<strong>Documentations Created Successfully.</strong>', 'progress': 75});
                        }, 2000);

                        //End Progress bar
                        this.$Progress.finish()
                    })
                    .catch(() => {
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
                const url = "/api/documentations";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.documentations = response.data.data;
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
        },
        //get order bay
        computed: {
            orderByItems() {
                return _.orderBy(this.documentations, ['name'], ['asc'])
            },
        },
    }

</script>

<style scoped>

</style>
