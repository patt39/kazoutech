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
                                        <i class="material-icons">flag</i>
                                    </div>
                                    <p class="card-category"><b>All Countries</b>
                                    <h3 class="card-title" style="color:red;"><b>{{countries.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">flag</i><b>All Countries</b>
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
                                                <b>Datatables Countries</b>
                                            </h4>
                                            <p class="card-title">
                                                All countries available
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                <span>
                                    <i id="tooltipSize" class="material-icons">flag</i>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <div class="submit text-center">
                                            <button  id="button_hover" class="btn btn-warning btn-raised btn-round " @click="newModal">
                                     <span class="btn-label">
                                        <i class="material-icons">flag</i>
                                    </span>
                                                <b class="title_hover">New Country</b>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Country Name</b></th>
                                                <th><b>Code</b></th>
                                                <th><b>Flag</b></th>
                                                <!--<th><b>Edited By</b></th>-->
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Country Name</b></th>
                                                <th><b>Code</b></th>
                                                <th><b>Flag</b></th>
                                                <!--<th><b>Edited By</b></th>-->
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in countries" :key="item.id">
                                                <td>{{ item.name | upText }}</td>
                                                <td>{{ item.code }}</td>
                                                <td><img :src="item.flag" ></td>
                                                <!--<td>
                                                    <a v-if="item.user.status" :href="`/admin/profile/${item.user.username}`" title="Administrator Online">
                                                        <button type="button" class="btn btn-success btn-round btn-just-icon btn-sm"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </a>
                                                    <a v-else="item.user.status" :href="`/admin/profile/${item.user.username}`" title="Administrator Offline">
                                                        <button type="button" class="btn btn-danger btn-round btn-just-icon btn-sm"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </a>
                                                </td>-->
                                                <td class="td-actions text-right">
                                                    <button @click="editItem(item)"
                                                            class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button @click="deleteItem(item.id)"
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
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 v-show="!editmode" class="modal-title" id="addNewLabel"><b>Add new Country</b></h5>
                                                    <h5 v-show="editmode" class="modal-title" id="updatwNewLabel"><b>Update Country</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form @submit.prevent="editmode ? updateItem() : createItem()" role="form" method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                        <div class="col-md-8 ml-auto mr-auto">
                                                            <div class="profile text-center">
                                                                <br>
                                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail">
                                                                        <img v-show="editmode" :src="form.flag" :alt="form.slug">
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                    <div>
                                                            <span class="btn btn-raised btn-round btn-warning btn-file">
                                                                <span class="fileinput-new" style="cursor: pointer">
                                                                    <i class="material-icons">insert_photo</i>
                                                                    <b>Add flag country</b>
                                                                </span>
                                                                <span class="fileinput-exists" style="cursor: pointer">
                                                                    <i class="material-icons">photo_library</i>
                                                                    <b>Change</b>
                                                                </span>
                                                                <input id="flag" @change="updateImage" type="file" class="form-control" name="flag">
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
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"></label>
                                                            <input v-model="form.name" type="text" name="name" placeholder="Name country" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" required>
                                                            <has-error :form="form" field="name"></has-error>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"></label>
                                                            <input v-model="form.code" type="text" name="code" placeholder="Code country" class="form-control" :class="{ 'is-invalid': form.errors.has('code') }" required>
                                                            <has-error :form="form" field="code"></has-error>
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
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import TopNav from "../../../inc/admin/TopNav";
    import NavAdmin from "../../../inc/admin/NavAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin, NavAdmin, TopNav, FooterAdmin},
        data() {
            return {
                loaded: false,
                editmode: false,
                color_user: '',
                countries: {},
                form: new Form({
                    id: '',
                    name: '',
                    code: '',
                    user_id: '',
                    flag: ''
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
                return 'card-header card-header-icon card-header-' + this.color_user;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.color_user;
            },
            getColor(item){
                let colorStyle = 'badge badge-' + item.color_name;
                return colorStyle;
            },
            //getImagesave(){
            //    let flag = (this.form.flag.length > 200) ? this.form.flag : this.form.flag;
            //    return flag;
            //},
            updateImage(e){
                let file = e.target.files[0];
                let reader = new FileReader();
                let limit = 1024 * 1024 * 2;
                if(file['size'] > limit){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You are uploading a large file',
                    });
                    return false;
                }
                reader.onloadend = (file) => {
                    this.form.flag = reader.result;
                };
                reader.readAsDataURL(file);
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();
                this.form.put('/dashboard/countries/' + this.form.id)
                    .then(() => {
                        //Masquer le modal après la création
                        $('#addNew').modal('hide');

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Country updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        /** Fin alert **/

                        //End Progress bar
                        this.$Progress.finish();
                        //Event
                        Fire.$emit('AfterCreate');
                    }).catch(() => {
                        //Failled message
                        this.$Progress.fail();
                        toastr.error('', 'Ooop! Something wrong. Try later');
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
                    title: 'Delete Country?',
                    text: "Are you sure you want to delete this country?",
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
                        axios.delete('/dashboard/countries/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Country deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            /* End alert ***/

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
            loadItem() {
                //Start Progress bar
                this.$Progress.start();
                const url = "/api/countries";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.countries = response.data.data;
                    this.mydatatables()
                });
                axios.get("/api/account/user").then(({data}) => (this.color_user = data.color_name));
                //End Progress bar
                this.$Progress.finish();
            },
            createItem() {
                //Start Progress bar
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/dashboard/countries")
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
                            notify.update({'type': 'success', 'message': '<strong>Country Created Successfully.</strong>', 'progress': 75});
                        }, 2000);

                        //End Progress bar
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        //Failled message
                        this.$Progress.fail();
                        toastr.error('', 'Ooop! Something wrong. Try later');
                    })
            }
        },
        created() {
            this.loadItem();
            Fire.$on('AfterCreate', () => {
                this.loadItem();
            });
        }
    }

</script>

<style scoped>

</style>
