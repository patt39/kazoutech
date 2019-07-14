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
                    <div class="header text-center">
                        <div class="toolbar">
                            <div class="submit text-center">
                                <router-link id="button_hover" class="btn btn-success btn-raised btn-round btn-lg" :to="{ name: `tasks.index` }">
                                    <b class="title_hover">All Task</b>
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="header text-right">
                        <button @click="reload" class="btn btn-warning btn-raised btn-round button_note btn-sm"
                                title="Refresh Page">
                            <i class="material-icons">replay</i>
                            <b class="title_hover">Refresh</b>
                        </button>
                    </div>
                    <!-- Button Add New Note -->
                    <div v-if="!loaded" class="submit">
                        <LoaderLdsDefault/>
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
                                                    <div class="text-right">
                                                        <button @click="viewItem(item)" class="btn btn-warning btn-round btn-just-icon btn-sm" title="View Note">
                                                            <span class="btn-label">
                                                                <i class="material-icons">visibility</i>
                                                            </span>
                                                        </button>
                                                        <template v-if="item.administrator.id === user.id">
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
                                                        </template>
                                                    </div>
                                                </div>
                                            </div>
                                            <div v-if="item.description !== null" class="timeline-panel task-description">
                                                <div class="timeline-heading text-left">
                                                    <span class="badge badge-danger">Description Task</span>
                                                </div>
                                                <div class="timeline-body" v-html="item.description.substr(0 ,150) + '...'"></div>
                                                <hr>
                                                <div class="timeline-footer">
                                                    <div class="card-footer">
                                                        <!--<div class="author">
                                                            <button class="btn btn-info btn-round btn-just-icon btn-sm" title="Done Task">
                                                                <span class="btn-label">
                                                                    <i class="material-icons">done_all</i>
                                                                </span>
                                                            </button>
                                                        </div>-->
                                                        <div class="stats ml-auto">
                                                            <i class="material-icons">schedule</i>
                                                            <b>{{ item.updated_at | dateAgo }}</b>
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button @click="viewProgressTask(item)" class="btn btn-warning btn-round btn-just-icon btn-sm" title="View Description">
                                                            <span class="btn-label">
                                                                <i class="material-icons">visibility</i>
                                                            </span>
                                                        </button>
                                                        <button v-if="item.administrator.id === user.id" @click="addDescription(item)"  class="btn btn-success btn-round btn-just-icon btn-sm"
                                                                 title="Edit Description">
                                                            <span class="btn-label">
                                                                <i class="material-icons">edit</i>
                                                            </span>
                                                        </button>
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
                                    <alert-error :form="form"></alert-error>
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
                                    <alert-error :form="form"></alert-error>
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

                    <!-- Modal View Description Task -->
                    <div class="modal fade" id="viewProgressTaskNew" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Description <span style="color: red;">*</span></label>
                                        <vue-editor v-model="form.description" :editorToolbar="customToolbar"></vue-editor>
                                        <has-error :form="form" field="description"></has-error>
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
                user: {},
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
                axios.get("/api/account/user").then(response => {this.user = response.data.data});

            },
            reload(){
                this.loadItems()
            },
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
