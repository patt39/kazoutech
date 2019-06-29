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
                    <!-- Button Add New Note -->
                    <div class="header text-center">
                        <div class="toolbar">
                            <div class="submit text-center">
                                <router-link id="button_hover" class="btn btn-success btn-raised btn-round btn-lg" :to="{ name: `tasks.index` }">
                                    <i class="material-icons">add_circle</i>
                                    <b class="title_hover">Task</b>
                                </router-link>
                                <router-link id="button_hover" class="btn btn-primary btn-raised btn-round btn-lg" :to="{ name: `notes.index` }">
                                    <i class="material-icons">add_circle</i>
                                    <b class="title_hover">Notes</b>
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
                    <!-- Button Add New Note -->
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-timeline card-plain">
                                <div class="card-body">
                                    <ul class="timeline">
                                        <li v-for="item in usertasks" :key="item.id">
                                            <div class="timeline-badge success" v-if="item.note.status === 1">
                                                <i class="material-icons">swap_horiz</i>
                                            </div>
                                            <div class="timeline-panel" v-if="item.note.status === 1">
                                                <div class="timeline-heading">
                                                    <span v-text="item.note.title" class="badge badge-info"></span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p v-html="item.note.body.substr(0 ,250) + '...'"></p>
                                                </div>
                                                <hr><br>
                                                <h5><b>Progress Task</b></h5>
                                                <div :class="getProgressLine(item)">
                                                    <div :class="getProgressBar(item)" role="progressbar"  aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" :style="getProgressStyle(item)">
                                                        <span class="sr-only">{{item.progress}}% Complete</span>
                                                    </div>
                                                </div>
                                                <div class="timeline-footer">
                                                    <div class="card-footer">
                                                        <div class="author">
                                                            <router-link  :to="{ path: `/dashboard/tasks/u/${item.administrator.username}` }">
                                                                <img :src="item.administrator.avatar" :alt="item.administrator.name" class="avatar img-raised">
                                                                <span v-if="item.statusOnline" class="badge badge-success" title="Administrator Online">
                                                                    <b>{{ (item.administrator.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.administrator.name) | upText }}</b>
                                                                </span>
                                                                <span v-else="item.statusOnline" class="badge badge-danger" title="Administrator Offline">
                                                                    <b>{{ (item.administrator.name.length > 15 ? item.administrator.name.substring(0,15)+ "..." : item.administrator.name) | upText }}</b>
                                                                </span>
                                                            </router-link>
                                                        </div>
                                                        <div class="stats ml-auto">
                                                            <i class="material-icons">schedule</i>
                                                            <b>{{ item.updated_at | dateAgo }}</b>
                                                        </div>
                                                    </div>
                                                    <div v-if="item.administrator.id === user.id" class="text-right">
                                                        <button class="btn btn-warning btn-round btn-just-icon btn-sm" title="View Note">
                                                            <span class="btn-label">
                                                                <i class="material-icons">visibility</i>
                                                            </span>
                                                        </button>
                                                        <button @click="addProgress(item)" class="restore-lk btn btn-success btn-round btn-just-icon btn-sm" title="Add Progress Task">
                                                            <span class="btn-label">
                                                                <i class="material-icons">add</i>
                                                            </span>
                                                        </button>
                                                        <button v-if="item.description === null"  @click="addDescription(item)" class="btn btn-info btn-round btn-just-icon btn-sm"
                                                                title="Add Description">
                                                            <span class="btn-label">
                                                                <i class="material-icons">description</i>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-if="item.description != null" class="timeline-panel task-description">
                                                <div class="timeline-heading">
                                                    <span class="badge badge-danger">Description Task</span>
                                                </div>
                                                <div class="timeline-body" v-html="item.description"></div>
                                                <hr>
                                                <div class="timeline-footer">
                                                    <div class="card-footer">
                                                        <div class="author">
                                                            <button class="btn btn-info btn-round btn-just-icon btn-sm" title="Done Task">
                                                                <span class="btn-label">
                                                                    <i class="material-icons">done_all</i>
                                                                </span>
                                                            </button>
                                                        </div>
                                                        <div class="stats ml-auto">
                                                            <i class="material-icons">schedule</i>
                                                            <b>{{ item.updated_at | dateAgo }}</b>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button class="btn btn-warning btn-round btn-just-icon btn-sm" title="View Description">
                                                            <span class="btn-label">
                                                                <i class="material-icons">visibility</i>
                                                            </span>
                                                        </button>
                                                        <button  @click="addDescription(item)"  class="btn btn-success btn-round btn-just-icon btn-sm"
                                                                 title="Edit Description">
                                                            <span class="btn-label">
                                                                <i class="material-icons">edit</i>
                                                            </span>
                                                        </button>
                                                        <!--<button @click="deleteItem(item.id)" class="btn btn-danger btn-round btn-just-icon btn-sm"
                                                                title="Delete Description">
                                                            <span class="btn-label">
                                                                <i class="material-icons">delete_forever</i>
                                                            </span>
                                                        </button>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Progress Task -->
                    <div class="modal fade" id="addProgress" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 v-show="editmode" class="modal-title" id="updateNewLabel"><b>Update Progress Task</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="updateProgressTaskItem()" role="form" method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                        <div class="form-group">
                                            <label class="bmd-label-floating"></label>
                                            <input v-model="form.progress" type="number" name="progress" placeholder="Progress Task" class="form-control" :class="{ 'is-invalid': form.errors.has('progress') }" required maxlength="3"/>
                                            <has-error :form="form" field="progress"></has-error>
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

                    <!-- Modal Description Task -->
                    <div class="modal fade" id="addDescription" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 v-show="editmode" class="modal-title" id="descriptionNewLabel"><b>Update Description Task</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="updateDescriptionTaskItem()" role="form" method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Description <span style="color: red;">*</span></label>
                                            <vue-editor v-model="form.description" :editorToolbar="customToolbar"></vue-editor>
                                            <has-error :form="form" field="description"></has-error>
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

                    <!-- Modal New/Update Note -->
                    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 v-show="!editmode" class="modal-title" id="addNewLabel">
                                        <b>Give New Task</b>
                                    </h5>
                                    <h5 v-show="editmode" class="modal-title" id="updatwNewLabel">
                                        <b>Update Task</b>
                                    </h5>
                                </div>
                                <div class="modal-body">
                                    <form id="RegisterValidation" @keydown="form.onKeydown($event)" @submit.prevent="editmode ? updateItem() : createItem()" role="form" method="POST" action accept-charset="UTF-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating"></label>
                                                    <select  v-model="form.note_id" id="note_id" class="form-control" :class="{ 'is-invalid': form.errors.has('note_id') }">
                                                        <option value="" disabled >Select Title note </option>
                                                        <option v-for="note in notes" :key="note.id" :value="note.id" v-if="note.status === 1">{{note.title}}</option>
                                                    </select>
                                                    <has-error :form="form" field="note_id"></has-error>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating"></label>
                                                    <select name="administrator_id" v-model="form.administrator_id" id="administrator_id" class="form-control" :class="{ 'is-invalid': form.errors.has('administrator_id') }">
                                                        <option value="" disabled >Select an administrator</option>
                                                        <option v-for="user in users" :key="user.id" :value="user.id">{{user.name}}</option>
                                                    </select>
                                                    <has-error :form="form" field="administrator_id"></has-error>
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
                                                <button v-show="!editmode" type="submit" class="btn btn-success btn-raised" title="Edit">
                                        <span class="btn-label">
                                            <i class="material-icons">check</i>
                                            <b>Yes, Save</b>
                                        </span>
                                                </button>
                                                <button v-show="editmode" type="submit" class="btn btn-success btn-raised" title="Delete">
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
                    <div class="header text-right">
                        <div class="toolbar">
                            <div class="submit text-center">
                                <pagination-link v-if="pagination.last_page > 1"
                                                 :pagination="pagination"
                                                 :offset="5"
                                                 @paginate="loadItems()"></pagination-link>
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

    import api from '../../../../api/mixins/collections';
    import NavAdmin from "../../../inc/admin/NavAdmin";
    import TopNav from "../../../inc/admin/TopNav";
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";

    export default {
        components: {LoaderLdsDefault, StatusAdmin, FooterAdmin, TopNav, NavAdmin,},
        data() {
            return {
                loaded: false,
                fullPage: true,
                editmode: false,
                notes: {},
                users: {},
                usertasks: {},
                form: new Form({
                    id: "",
                    administrator_id: "",
                    note_id: "",
                    description: "",
                    progress: "",
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
            getProgressStyle(item){
                return 'width: ' + item.progress +'%;';
            },
            getProgressLine(item){
                return `progress progress-line-${item.administrator.color_name}`;
            },
            getProgressBar(item){
                return `progress-bar progress-bar-${item.administrator.color_name}`;
            },

            updateProgressTaskItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put("/dashboard/update_progress_tasks/" + this.form.id).then(() => {
                    //Masquer le modal après la création
                    $("#addProgress").modal("hide");

                    /** Debut de l'alert **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Progress Task updated successfully.</strong>', 'progress': 75});
                    }, 2000);
                    /** Fin alert **/

                    //End Progress bar
                    this.$Progress.finish();

                    //Event
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

            updateDescriptionTaskItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put("/dashboard/update_description_tasks/" + this.form.id).then(() => {
                    //Masquer le modal après la création
                    $("#addDescription").modal("hide");

                    /** Debut de l'alert **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Description Task updated successfully.</strong>', 'progress': 75});
                    }, 2000);
                    /** Fin alert **/

                    //End Progress bar
                    this.$Progress.finish();

                    //Event
                    Fire.$emit("AfterCreate");
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    //Alert error
                    $.notify("Ooop! description required", {
                        type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
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
            addProgress(item) {
                //Masquer le modal après la création
                $("#addProgress").modal("show");
                //On passe les informations
                this.form.fill(item);
            },
            addDescription(item) {
                //Masquer le modal après la création
                $("#addDescription").modal("show");
                //On passe les informations
                this.form.fill(item);
            },
            newModal() {
                this.editmode = false;
                this.form.reset();
                //Masquer le modal après la création
                $("#addNew").modal("show");
            },
            loadItems() {
                //Progrs bar
                this.$Progress.start();
                api.tasksbyuser(this.$route.params.username+'?page='+this.pagination.current_page)
                    .then((response) => {
                        this.loaded = true;
                        this.usertasks = response.data.data;
                        this.pagination = response.data.meta;
                        //End Progress bar
                        this.$Progress.finish();
                });
                axios.get("/api/notes").then(response => {this.notes = response.data.data});
                axios.get("/api/administrators").then(response => {this.users = response.data.data;});

            },
            reload(){
                this.loadItems()
            },
            createItem() {
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/dashboard/tasks").then(() => {
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
                        notify.update({'type': 'success', 'message': '<strong>Task Created Successfully.</strong>', 'progress': 75});
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
