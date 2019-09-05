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
                    <!-- Button Add New Note -->
                    <div class="header text-center">
                        <div class="toolbar">
                            <div class="submit text-center">
                                <button id="button_hover" class="btn btn-success btn-raised btn-round btn-lg" @click="newModal">
                                    <i class="material-icons">add_circle</i>
                                    <b class="title_hover">Add Note</b>
                                </button>
                                <router-link id="button_hover" class="btn btn-primary btn-raised btn-round btn-lg" :to="{ name: `tasks.index` }">
                                    <i class="material-icons">build</i>
                                    <b class="title_hover">Tasks</b>
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="header text-right">
                        <div class="header text-right">
                            <button value="Refresh Page" title="update datatables" @click="reload" class="btn btn-warning btn-round btn-just-icon btn-sm" >
                                <i class="material-icons">replay</i>
                            </button>
                        </div>
                    </div>
                    <div v-if="!loaded" class="submit">
                        <LoaderLdsDefault/>
                    </div>
                    <!-- Pagination -->
                    <div class="submit text-center">
                        <pagination-link v-if="pagination.last_page > 1"
                                         :pagination="pagination"
                                         :offset="5"
                                         @paginate="loadItems()"></pagination-link>
                    </div>
                    <!-- Timeline Note -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-timeline card-plain">
                                <div class="card-body">
                                    <ul class="timeline">
                                        <li v-for="item in notes" :key="item.created_at">
                                            <div class="timeline-badge primary" v-if="item.status === 0">
                                                <i class="material-icons">swap_horiz</i>
                                            </div>
                                            <div class="timeline-panel" v-if="item.status === 0">
                                                <div class="timeline-heading">
                                                    <span v-text="item.title" class="badge badge-primary"></span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p v-html="item.body.substr(0 ,150) + '...'"></p>
                                                    <hr>
                                                </div>
                                                <div class="timeline-footer">
                                                    <div class="card-footer">
                                                        <div class="author">
                                                            <a href="javascript:void(0)" @click="getUser(item)">
                                                                <img :src="item.user.avatar" :alt="item.user.name" class="avatar img-raised">
                                                                <span v-if="item.statusOnline" class="badge badge-success" title="Administrator Online">
                                                                    <b>{{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}</b>
                                                                </span>
                                                                <span v-else="item.statusOnline" class="badge badge-danger" title="Administrator Offline">
                                                                    <b>{{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}</b>
                                                                </span>
                                                            </a>

                                                        </div>
                                                        <div class="stats ml-auto">
                                                            <i class="material-icons">schedule</i>
                                                            <b>{{ item.updated_at | dateAgo }}</b>
                                                        </div>
                                                    </div>
                                                    <div class="submit">
                                                        <div class="text-right">
                                                            <button @click="viewItem(item)" class="btn btn-warning btn-round btn-just-icon btn-sm" title="View Note">
                                                    <span class="btn-label">
                                                        <i class="material-icons">visibility</i>
                                                    </span>
                                                            </button>
                                                            <button @click="editItem(item)" class="btn btn-success btn-round btn-just-icon btn-sm" title="Edit Note">
                                                    <span class="btn-label">
                                                        <i class="material-icons">edit</i>
                                                    </span>
                                                            </button>
                                                            <button @click="disableItem(item.id)" class="btn btn-info btn-round btn-just-icon btn-sm" title="Note Done">
                                                    <span class="btn-label">
                                                        <i class="material-icons">done_all</i>
                                                    </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-inverted" v-for="item in notes" :key="item.id">
                                            <div class="timeline-badge success" v-if="item.status === 1">
                                                <i class="material-icons">swap_horiz</i>
                                            </div>
                                            <div class="timeline-panel" v-if="item.status === 1">
                                                <div class="timeline-heading">
                                                    <span v-text="item.title" class="badge badge-success"></span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p v-html="item.body.substr(0 ,150) + '...'"></p>
                                                    <hr>
                                                </div>
                                                <div class="timeline-footer">
                                                    <div class="submit">
                                                        <div class="card-footer">
                                                            <div class="author">
                                                                <a href="javascript:void(0)" @click="getUser(item)">
                                                                    <img :src="item.user.avatar" :alt="item.user.name" class="avatar img-raised">
                                                                    <span v-if="item.statusOnline" class="badge badge-success" title="Administrator Online">
                                                                         <b>{{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}</b>
                                                                    </span>
                                                                    <span v-else="item.statusOnline" class="badge badge-danger" title="Administrator Offline">
                                                                         <b>{{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}</b>
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="stats ml-auto">
                                                                <i class="material-icons">schedule</i>
                                                                <b>{{ item.updated_at | dateAgo }}</b>
                                                            </div>
                                                        </div>
                                                        <div class="text-right">
                                                            <button @click="viewItem(item)" class="btn btn-warning btn-round btn-just-icon btn-sm" title="View Note">
                                                    <span class="btn-label">
                                                        <i class="material-icons">visibility</i>
                                                    </span>
                                                            </button>
                                                            <button @click="activeItem(item.id)" class="restore-lk btn btn-primary btn-round btn-just-icon btn-sm" title="Note Not Completed">
                                                    <span class="btn-label">
                                                        <i class="material-icons">reply</i>
                                                    </span>
                                                            </button>
                                                            <button @click="deleteItem(item.id)" class="btn btn-danger btn-round btn-just-icon btn-sm"
                                                                    title="Delete Note">
                                                    <span class="btn-label">
                                                        <i class="material-icons">delete_forever</i>
                                                    </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal New/Update Note -->
                    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 v-show="!editmode" class="modal-title" id="addNewLabel">
                                        <b>Add New Note</b>
                                    </h5>
                                    <h5 v-show="editmode" class="modal-title" id="updatwNewLabel">
                                        <b>Update Note</b>
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <alert-error :form="form"></alert-error>
                                    <form id="RegisterValidation" @keydown="form.onKeydown($event)" @submit.prevent="editmode ? updateItem() : createItem()" role="form" method="POST" action accept-charset="UTF-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"></label>
                                            <input v-model="form.title" type="text" name="title" placeholder="Title Note ..." class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" required>
                                            <has-error :form="form" field="title"></has-error>
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description <span style="color: red;">*</span></label>
                                            <vue-editor v-model="form.body" :editorToolbar="customToolbar"></vue-editor>
                                            <has-error :form="form" field="body"></has-error>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="text-center">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        <span class="btn-label">
                                            <i class="material-icons">clear</i>
                                            <b>Close</b>
                                        </span>
                                                </button>
                                                <button :disabled="form.busy" v-show="!editmode" type="submit" class="btn btn-success btn-raised" title="Edit">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                            <b>Yes, Save</b>
                                        </span>
                                                </button>
                                                <button :disabled="form.busy" v-show="editmode" type="submit" class="btn btn-success btn-raised" title="Delete">
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

                    <!-- Modal View Note -->
                    <div class="modal fade" id="viewNew" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="timeline-heading text-center">
                                        <span v-text="form.title" class="badge badge-info"></span>
                                    </div>
                                    <br>
                                    <div class="form-group text-justify">
                                        <span v-html="form.body"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <span class="btn-label">
                                <i class="material-icons">clear</i>
                                <b>Close</b>
                            </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header text-center">
                        <div class="toolbar">
                            <div class="submit text-center">
                                <button value="Refresh Page" @click="reload" class="btn btn-warning btn-raised btn-round button_note" >
                                    <i class="material-icons">replay</i>
                                    <b class="title_hover">Refresh page</b>
                                </button>
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
        components: {
            LoaderLdsDefault,
            StatusAdmin,
        },
        data() {
            return {
                loaded: false,
                fullPage: true,
                editmode: false,
                notes: {},
                form: new Form({
                    id: "",
                    title: "",
                    body: "",
                    status: "",
                    user_id: "",
                    ip: "",
                    slug: ""
                }),
                pagination:{
                    current_page: 1,
                },
                customToolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'font': [] }],
                    //[{ 'header': [false, 1, 2, 3, 4, 5, 6, ] }],
                    //[{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'align': [] }],
                    //[{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    //['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
                    //[{ 'script': 'sub'}, { 'script': 'super' }],
                    //[{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'color': [] }, { 'background': [] }],
                    ['link'],
                    //['link', 'image', 'video', 'formula'],
                    //[{ 'direction': 'rtl' }],
                    ['clean'],
                    //['emoji'],
                ],
            };
        },
        methods: {
            getUser(item){
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/profile/${item.user.username}`);
                //Progres bar
                this.$Progress.finish()
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put("/dashboard/notes/" + this.form.id).then(() => {
                    //Masquer le modal après la création
                    $("#addNew").modal("hide");

                    /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                          notify.update({'type': 'success', 'message': '<strong>Note updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        /** Fin alert **/

                    //End Progress bar
                    this.$Progress.finish();

                    //Event
                    Fire.$emit("AfterCreate");
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    toastr.error('', 'Ooop! Something wrong. Try later');
                });
            },
            editItem(item) {
                this.editmode = true;
                this.form.reset();
                //Masquer le modal après la création
                $("#addNew").modal("show");
                //On passe les information
                this.form.fill(item);
            },
            viewItem(item) {
                //Masquer le modal après la création
                $("#viewNew").modal("show");
                //On passe les informations
                this.form.fill(item);
            },
            newModal() {
                this.editmode = false;
                this.form.reset();
                //Masquer le modal après la création
                $("#addNew").modal("show");
            },
            deleteItem(id) {
                Swal.fire({
                    title: 'Delete Note?',
                    text: "Are you sure you want to delete this note?",
                    type: 'warning',
                    animation: false,
                    customClass: "animated shake",
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    showCancelButton: true,
                    reverseButtons: true
                }).then(result => {
                    //Envoyer la requete au server
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();
                        this.form.delete("/dashboard/notes/" + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                              notify.update({'type': 'success', 'message': '<strong>Note deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            /*** End alert ***/

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit("AfterCreate");
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
                        });
                    }
                });
            },
            /** Ici c'est l'activation  **/
            activeItem(id) {
                //Start Progress bar
                this.$Progress.start();
                this.form.get(`/dashboard/active_notes/${id}`).then(() => {
                    /** Alert notify bootstrapp **/
                      var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                          allow_dismiss: false,
                          showProgressbar: true
                      });
                      setTimeout(function() {
                          notify.update({'type': 'success', 'message': '<strong>Note not done successfully.</strong>', 'progress': 75});
                      }, 2000);

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit("AfterCreate");
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
                });
            },
            /** Ici c'est la desactivation **/
            disableItem(id) {
                //Start Progress bar
                this.$Progress.start();
                this.form.get(`/dashboard/disable_notes/${id}`).then(() => {

                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Note done successfully.</strong>', 'progress': 75});
                    }, 2000);
                    /** End alert **/

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit("AfterCreate");
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
                });
            },
            loadItems() {
                //Progrs bar
                this.$Progress.start();
                axios.get(`/api/notes?page=${this.pagination.current_page}`).then(response => {
                        this.loaded = true;
                        this.notes = response.data.data;
                        this.pagination = response.data.meta;
                        //End Progress bar
                        this.$Progress.finish();
                });
            },
            reload(){
                this.loadItems()
            },
            createItem() {
                this.$Progress.start();
                this.form.busy = true;
                // Submit the form via a POST request
                this.form.post("/dashboard/notes").then(() => {
                    //Event
                    Fire.$emit("AfterCreate");

                    //Masquer le modal après la création
                    $("#addNew").modal("hide");

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
                            notify.update({'type': 'success', 'message': '<strong>Note Created Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        //Fin insertion de l'alert !

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
                });
            }
        },
        created() {
            this.loadItems();
            Fire.$on("AfterCreate", () => {
                this.loadItems();
            });
        }
    };
</script>

<style scoped>

</style>
