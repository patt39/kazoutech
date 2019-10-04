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
                                    <p class="card-category"><b>All Categories FAQs</b>
                                    <h3 class="card-title" style="color:red;"><b>{{categoryfaqs.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">forum</i>
                                        <b>All Categories FAQs</b>
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
                                                <b>Datatables Category FAQs</b>
                                            </h4>
                                            <p class="card-title">
                                                Public Help FAQs
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
                                <div class="card-body">
                                    <div class="header text-right">
                                        <button @click="reload"
                                                class="btn btn-success btn-raised btn-round button_note btn-sm"
                                                title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                    <br>
                                    <div v-if="$auth.can('create-category')" class="toolbar">
                                        <div class="submit text-center">
                                            <button id="button_hover" class="btn btn-raised btn-round  btn-success"
                                                    @click="newModal">
                                     <span class="btn-label">
                                        <i class="material-icons">forum</i>
                                    </span>
                                                <b class="title_hover">New Category FAQs</b>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Category Name</b></th>
                                                <th><b>Material Icon</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Edit by</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="disabled-sorting text-right"><b
                                                    v-if="($auth.can('publish-category') || $auth.can('edit-category') || $auth.can('delete-category'))">Actions</b>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Category Name</b></th>
                                                <th><b>Material Icon</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Edit by</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="text-right"><b
                                                    v-if="($auth.can('publish-category') || $auth.can('edit-category') || $auth.can('delete-category'))">Actions</b>
                                                </th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in categoryfaqs" :key="item.id">
                                                <td>
                                                    <router-link  :to="{ path: `/dashboard/faqs/c/${item.slug}/` }">
                                                    <b>{{ (item.name.length > 30 ? item.name.substring(0,30)+ "..." : item.name) | upText }}</b>
                                                    </router-link>
                                                </td>
                                                <td><i :class="getMaterialIcon(item.color_name)">{{ item.icon}}</i></td>
                                                <td>
                                                    <div class="timeline-heading">
                                                        <span v-if="item.status === 1" class="badge badge-info"><b>Active</b></span>
                                                        <span v-else-if="item.status === 0"
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
                                                    <template v-if="$auth.can('publish-category')">
                                                        <a href="javascript:void(0)" v-if="item.status === 1"
                                                           @click="disableItem(item.id)"
                                                           class="btn btn-link btn-info btn-round btn-just-icon "
                                                           title="Disable">
                                                            <i class="material-icons">check_circle</i>
                                                        </a>
                                                        <a href="javascript:void(0)" v-else-if="item.status === 0"
                                                           @click="activeItem(item.id)"
                                                           class="btn btn-link btn-danger btn-round btn-just-icon "
                                                           title="Activate">
                                                            <i class="material-icons">power_settings_new</i>
                                                        </a>
                                                    </template>
                                                    <a v-if="$auth.can('edit-category')" href="javascript:void(0)"
                                                       @click="editItem(item)"
                                                       class="btn btn-link  btn-success btn-round btn-just-icon"
                                                       title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <a v-if="$auth.can('delete-category')" href="javascript:void(0)"
                                                       @click="deleteItem(item.id)"
                                                       class="btn btn-link btn-danger btn-round btn-just-icon"
                                                       title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Modal création/édition Category Faqs -->
                                    <div class="modal fade" id="addNew" tabindex="-1" role="dialog"
                                         aria-labelledby="addNewLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 v-show="!editmode" class="modal-title" id="addNewLabel"><b>New
                                                        Category Faq</b></h5>
                                                    <h5 v-show="editmode" class="modal-title" id="updatwNewLabel"><b>Update
                                                        Category Faq</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="RegisterValidation"
                                                          @submit.prevent="editmode ? updateItem() : createItem()"
                                                          role="form" method="POST" action="" accept-charset="UTF-8"
                                                          @keydown="form.onKeydown($event)">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"></label>
                                                            <input v-model="form.name" type="text" name="name"
                                                                   placeholder="Name category "
                                                                   class="form-control"
                                                                   :class="{ 'is-invalid': form.errors.has('name') }"
                                                                   required/>
                                                            <has-error :form="form" field="name"></has-error>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"></label>
                                                            <input v-model="form.icon" type="text" name="icon"
                                                                   placeholder="Name icon(materialise icon)"
                                                                   class="form-control"
                                                                   :class="{ 'is-invalid': form.errors.has('icon') }"
                                                                   required/>
                                                            <has-error :form="form" field="icon"></has-error>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating"></label>
                                                            <select name="color_name" v-model="form.color_name"
                                                                    id="color_name" class="form-control"
                                                                    :class="{ 'is-invalid': form.errors.has('color_name') }">
                                                                <option value="" disabled>Choose your color</option>
                                                                <option v-for="color in colors" :key="color.id"
                                                                        :value="color.slug">{{color.color_name}}
                                                                </option>
                                                            </select>
                                                            <has-error :form="form" field="color_name"></has-error>
                                                        </div>
                                                        <br>
                                                        <div class="modal-footer">
                                                            <div class="text-center">
                                                                <button type="button" class="btn btn-danger"
                                                                        data-dismiss="modal">
                                                        <span class="btn-label">
                                                            <i class="material-icons">clear</i>
                                                            <b>Close</b>
                                                        </span>
                                                                </button>
                                                                <button v-show="!editmode" type="submit"
                                                                        class="btn btn-success btn-raised">
                                                        <span class="btn-label">
                                                            <i class="material-icons">check</i>
                                                            <b>Yes, Save</b>
                                                        </span>
                                                                </button>
                                                                <button v-show="editmode" type="submit"
                                                                        class="btn btn-success btn-raised">
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
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";

    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                loaded: false,
                editmode: false,
                user: {},
                categoryfaqs: {},
                colors: [],
                form: new Form({
                    id: '',
                    name: '',
                    icon: '',
                    color_name: '',
                    user_id: '',
                    status: '',
                    slug: ''
                })
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
                        order: [[0, 'asc'], [3, 'desc']],
                        responsive: true,
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
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser() {
                let colorHeader = 'card-header card-header-' + this.user.color_name;
                return colorHeader;
            },
            getMaterialIcon(color) {
                let icon = 'material-icons text-' + color;
                return icon;
            },
            getUser(item) {
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/p/${item.user.username}/`);
                //Progres bar
                this.$Progress.finish()
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put('/dashboard/category-faqs/' + this.form.id)
                    .then(() => {
                        //Masquer le modal après la création
                        $('#addNew').modal('hide');

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function () {
                            notify.update({
                                'type': 'success',
                                'message': '<strong>Category Faq updated successfully.</strong>',
                                'progress': 75
                            });
                        }, 2000);
                        /** Fin alert **/

                        //End Progress bar
                        this.$Progress.finish

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
                this.editmode = true;
                this.form.reset();
                //Masquer le modal après la création
                $('#addNew').modal('show');
                //On passe les informations
                this.form.fill(item);
            },
            newModal() {
                this.editmode = false;
                this.form.reset();
                //Masquer le modal après la création
                $('#addNew').modal('show');
            },
            createItem() {
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/dashboard/category-faqs")
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
                        setTimeout(function () {
                            notify.update({
                                'type': 'success',
                                'message': '<strong>Category Faq Created Successfully.</strong>',
                                'progress': 75
                            });
                        }, 2000);
                        //Fin insertion de l'alert !

                        //End Progress bar
                        this.$Progress.finish()
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
            deleteItem(id) {
                Swal.fire({
                    title: 'Delete Category FAQ?',
                    text: "Are you sure you want to delete this Category FAQ?",
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
                        this.form.delete('/dashboard/category-faqs/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function () {
                                notify.update({
                                    'type': 'success',
                                    'message': '<strong>Category Faq deleted successfully.</strong>',
                                    'progress': 75
                                });
                            }, 2000);
                            /*** End alert ***/

                            //End Progress bar
                            this.$Progress.finish();

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
                    }
                })
            },
            /* ici c'est l'activation de la couleur  **/
            activeItem(id) {
                //Start Progress bar
                this.$Progress.start();
                this.form.get('/dashboard/active_category-faqs/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Category Faq activated successfully.</strong>', {
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
                    //End Progress bar
                    this.$Progress.finish();

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
            /* Ici c'est la desactivation de la couleur **/
            disableItem(id) {
                //Start Progress bar
                this.$Progress.start();
                this.form.get('/dashboard/disable_category-faqs/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Category Faq desactivated successfully.</strong>', {
                        allow_dismiss: false,
                        type: 'primary',
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        },
                        animate: {
                            enter: "animated fadeInUp",
                            exit: "animated fadeOutDown"
                        },
                    });
                    /** End alert **/

                    //End Progress bar
                    this.$Progress.finish();

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
                const url = "/api/category-faqs";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.categoryfaqs = response.data.data;
                    this.mydatatables();
                    //End Progress bar
                    this.$Progress.finish();
                });
                axios.get("/api/colors").then(({data}) => (this.colors = data.data));
                axios.get("/api/account/user").then(response => {
                    this.user = response.data.data
                });
            },
            reload() {
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
