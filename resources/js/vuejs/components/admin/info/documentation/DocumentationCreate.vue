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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 expo">
                                        <div class="card">
                                            <div :class="getColorCardUser()" style="margin-top: -5px;">
                                                <div class="card-icon">
                                                    <i class="material-icons">indeterminate_check_box</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Create</b> -
                                                    <small class="category">New Documentation</small>
                                                </h4>
                                            </div>
                                            <br>
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="card card-nav-tabs">
                                                        <div class="card-body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="profile">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating"></label>
                                                                                    <form id="RegisterValidation" @submit.prevent="createItem()" role="form" method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"></label>
                                                                                            <input v-model="form.name" type="text" name="name" placeholder="Document name" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" required>
                                                                                            <has-error :form="form" field="name"></has-error>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-md-8 ml-auto mr-auto">
                                                                                                <div class="profile text-center">
                                                                                                    <br>
                                                                                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                                                        <div class="fileinput-new thumbnail">
                                                                                                            <img v-show="!editmode" src="https://www.kazoucoin.com/assets/img/default-avatar.png" alt="...">
                                                                                                            <img v-show="editmode" :src="getDocumentsave()" :alt="form.fullname">
                                                                                                        </div>
                                                                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                                                        <div>
                                                                                                            <span class="btn btn-raised btn-round btn-success btn-file">
                                                                                                                <span class="fileinput-new" style="cursor: pointer">
                                                                                                                    <i class="material-icons">insert_photo</i>
                                                                                                                            <b>Add Document</b>
                                                                                                                </span>
                                                                                                                <span class="fileinput-exists" style="cursor: pointer">
                                                                                                                    <i class="material-icons">photo_library</i>
                                                                                                                        <b>Change</b>
                                                                                                                </span>
                                                                                                                <input @change="uploadDocument" id="name_doc" type="file" name="name_doc"
                                                                                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('name_doc') }"/>
                                                                                                            </span>
                                                                                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                                                                                                <i class="material-icons">cancel</i>
                                                                                                                <b>Remove</b>
                                                                                                            </a>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- error -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr/>
                                                                                        <div class="submit">
                                                                                            <div class="text-center">
                                                                                                <router-link :to="{ name: 'documentations.index' }" class="btn btn-danger" id="button_hover">
                                                                                                    <i class="material-icons">chevron_left</i>
                                                                                                    <b class="title_hover">Back</b>
                                                                                                </router-link>
                                                                                                <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised">
                                                                                                    <i class="material-icons">save_alt</i>
                                                                                                    <b class="title_hover">Save</b>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <footer-admin></footer-admin>
        </div>
    </div>
</template>
<script>
    import TopNav from "../../../inc/admin/TopNav";
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";

    export default {
        components: {StatusAdmin},
        data() {
            return {
                editmode: false,
                loaded: false,
                user: {},
                form: new Form({
                   name: "",
                   name_doc: "",
                }),
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
                    //['link', 'image', 'video', 'formula'],
                    ['link'],
                    //[{ 'direction': 'rtl' }],
                    ['clean'],
                    //['emoji'],
                ]
            }
        },
        methods: {
            getDocumentsave(){
                let name_doc = this.form.name_doc;
                console.log(name_doc);
                return name_doc;
            },
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            uploadDocument(e){
                this.form.name_doc = this.$refs.name_doc   
            },
            createItem() {
                 let form = this.form.name_doc;
                 let formData = new FormData(form);
                //Start Progress bar
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/dashboard/documentations", formData)
                    .then(() => {
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
                            notify.update({'type': 'success', 'message': '<strong>Document added successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'documentations.index' }));

                        //End Progress bar
                        this.$Progress.finish();
                    }).catch(() => {
                    //Failed message
                    this.$Progress.fail();
                    $.notify("Ooops! Something wrong. Try later", {
                        type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
                })
            }
        },
        created() {
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
        }
    }
</script>

<style scoped>

</style>
