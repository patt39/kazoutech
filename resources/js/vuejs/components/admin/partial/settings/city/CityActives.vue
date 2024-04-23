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
                                        <i class="material-icons">location_city</i>
                                    </div>
                                    <p class="card-category"><b>All Cities</b></p>
                                    <h3 class="card-title" style="color:red;"><b>{{cities.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">location_city</i><b>All Cities</b>
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
                                                <b>Datatables Cities</b>
                                            </h4>
                                            <p class="card-title">
                                                City choice for buttons
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">location_city</i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <div class="header text-right">
                                            <button @click="reload" class="btn btn-success btn-raised button_note btn-sm"
                                                    title="Refresh Page">
                                                <i class="material-icons">replay</i>
                                                <b class="title_hover">Refresh</b>
                                            </button>
                                        </div>
                                        <br>
                                        <div class="submit text-center">
                                            <!--<button id="button_hover" class="btn btn-success btn-raised btn-round " @click="newModal">
                                                 <span class="btn-label">
                                                    <i class="material-icons">location_city</i>
                                                </span>
                                                <b class="title_hover">New City</b>
                                            </button>-->
                                            <router-link v-if="$auth.can('edit-administrator')" :to="{ name: 'cities.index' }" id="button_hover" class="btn btn-success btn-raised">
                                                 <span class="btn-label">
                                                    <i class="material-icons">spellcheck</i>
                                                </span>
                                                <b class="title_hover">Add Cities</b>
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Image</b></th>
                                                <th><b>Name</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Edited By</b></th>
                                                <th><b>Technicians</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Image</b></th>
                                                <th><b>Name</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Edited By</b></th>
                                                <th><b>Technicians</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in orderBycities" :key="item.id">
                                                <td><img :src="item.photo" style="height: 50px; width: 80px;border-radius: 4px"></td>
                                                <td>
                                                    <router-link  :to="{ path: `/dashboard/technicians/c/${item.slug}/` }">
                                                        <b>{{ (item.name.length > 15 ? item.name.substring(0,15)+ "..." : item.name) | upText }}</b>
                                                    </router-link>
                                                </td>
                                                <td>
                                                    <div class="timeline-heading">
                                                        <span v-if="item.status" class="badge badge-info"><b>Active</b></span>
                                                        <span v-if="item.city_vip"  class="badge badge-success"><b>VIP</b></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" @click="getUser(item)">
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </a>
                                                </td>
                                                <td><b v-html="item.technician_count"></b></td>
                                                <td class="td-actions text-right">
                                                    <button v-if="$auth.can('edit-administrator')" type="button" class="togglebutton btn btn-link btn-sm btn-sm">
                                                        <label>
                                                            <input type="checkbox" name="city_vip" v-model="item.city_vip"
                                                                   @change="changeCityVip(item)"/>
                                                            <span class="toggle"></span>
                                                        </label>
                                                    </button>

                                                    <button v-if="$auth.can('edit-administrator')" type="button" class="togglebutton btn btn-link btn-sm btn-sm">
                                                        <label>
                                                            <input type="checkbox" name="status" v-model="item.status"
                                                                   @change="changeStatus(item)"/>
                                                            <span class="toggle"></span>
                                                        </label>
                                                    </button>
                                                    <button @click="editItem(item)"
                                                            class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <button v-if="$auth.can('edit-administrator')" @click="deleteItem(item.id)"
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
                                                    <h5 class="modal-title" id="updatwNewLabel"><b>Update City</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <alert-error :form="form"/>
                                                    <form id="RegisterValidation" @submit.prevent="updateItem" role="form" method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                        <div class="row">
                                                            <div class="col-md-8 ml-auto mr-auto">
                                                                <div class="profile text-center">
                                                                    <br>
                                                                    <div class="fileinput fileinput-new text-center"
                                                                         data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail">
                                                                            <img :src="getImagesave()" :alt="form.slug">
                                                                        </div>
                                                                        <div
                                                                            class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                        <div>
                                                                            <span
                                                                                class="btn btn-raised btn-success btn-file">
                                                                              <span
                                                                                  class="fileinput-new"
                                                                                  style="cursor: pointer">
                                                                                   <i class="material-icons">insert_photo</i>
                                                                                       <b>Add Slide</b>
                                                                                </span>
                                                                               <span
                                                                                   class="fileinput-exists"
                                                                                   style="cursor: pointer">
                                                                                   <i class="material-icons">photo_library</i>
                                                                                   <b>Change</b>
                                                                                </span>
                                                                                <input id="photo"
                                                                                       @change="updateImage"
                                                                                       type="file"
                                                                                       class="form-control"
                                                                                       name="photo"/>
                                                                            </span>
                                                                            <a href="#pablo"
                                                                               class="btn btn-danger fileinput-exists"
                                                                               data-dismiss="fileinput">
                                                                                <i class="material-icons">cancel</i>
                                                                                <b>Remove</b>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <has-error :form="form" field="photo"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"/>
                                                            <input v-model="form.name" type="text" name="name" placeholder="Name city" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" required>
                                                            <has-error :form="form" field="name"/>
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
    import StatusAdmin from "../../../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../../../inc/animation/LoaderLds-default";

    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                loaded: false,
                cities: {},
                user: {},
                form: new Form({
                    id: '',
                    name: '',
                    color_name: '',
                    city_vip: '',
                    user_id: '',
                    status: '',
                    photo: '',
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
            getImagesave() {
                return (this.form.photo.length > 200) ? this.form.photo : this.form.photo;
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
            getColor(item){
                return 'badge badge-' + item.color_name;
            },
            editItem(item) {
                this.form.reset();
                //Masquer le modal après la création
                $('#addNew').modal('show');
                //On passe les information
                this.form.fill(item);
            },
            updateImage(e) {
                let reader = new FileReader();
                let file = e.target.files[0];
                if (file['size'] < 6000775) {
                    reader.onloadend = (file) => {
                        this.form.photo = reader.result
                    };
                    reader.readAsDataURL(file);
                } else {
                    this.$Progress.fail();
                    Swal.fire({
                        type: 'error',
                        title: 'Your image is very big',
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                    });
                }
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();
                this.form.put('/dashboard/cities/' + this.form.id)
                    .then(() => {
                        //Masquer le modal après la création
                        $('#addNew').modal('hide');
                        //Event
                        Fire.$emit('ItemGetter');

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>City updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        /** Fin alert **/

                        //End Progress bar
                        this.$Progress.finish();
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
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete City?',
                    text: "Are you sure you want to delete this city?",
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
                        axios.delete('/dashboard/cities/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>City deleted successfully.</strong>', 'progress': 75});
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
            /** Ici c'est pour changer le status **/
            changeStatus(item){
                //Start Progress bar
                this.$Progress.start();
                axios.get(`/dashboard/cities/change_status_cities/${item.id}`, {
                    status: item.status,
                }).then(res => {

                    $.notify('<strong>City updated Successfully.</strong>', {
                        allow_dismiss: false,
                        type: 'info',
                        placement: {
                            from: 'bottom',
                            align: 'right'
                        },
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        },
                    });

                    Fire.$emit('ItemGetter');
                    //End Progress bar
                    this.$Progress.finish();
                }).catch(() => {
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
            },    /** Ici c'est pour changer le status **/
            changeCityVip(item){
                //Start Progress bar
                this.$Progress.start();
                axios.get(`/dashboard/cities/change_city_vip_cities/${item.id}`, {
                    city_vip: item.city_vip,
                }).then(res => {

                    $.notify('<strong>Status VIP change successfully.</strong>', {
                        allow_dismiss: false,
                        type: 'info',
                        placement: {
                            from: 'bottom',
                            align: 'right'
                        },
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        },
                    });

                    Fire.$emit('ItemGetter');
                    //End Progress bar
                    this.$Progress.finish();
                }).catch(() => {
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
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                const url = "/api/cities";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.cities = response.data.data;
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
                }, 360000);
            },
        },
        created() {
            this.loadItems();
            Fire.$on('ItemGetter', () => {
                this.loadItems();
            });
            this.intervalFetchData();
        },
        computed: {
            orderBycities() {
                return _.orderBy(this.cities, ['status'], ['asc'])
            },
        },
    }

</script>

<style scoped>

</style>
