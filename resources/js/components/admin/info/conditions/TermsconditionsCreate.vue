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
                                                    <small class="category">New Term & Condition</small>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <form id="RegisterValidation" @submit.prevent="createItem()" role="form"
                                                      method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
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
                                                                                        <input v-model="form.title" type="text" name="title"
                                                                                               class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Presentation title">
                                                                                        <has-error :form="form" field="title"></has-error>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-8 ml-auto mr-auto">
                                                                                    <div class="profile text-center">
                                                                                        <br>
                                                                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                                            <div class="fileinput-new thumbnail">
                                                                                                <img v-show="!editmode" src="https://www.kazoucoin.com/assets/img/photo.jpg" alt="...">
                                                                                                <img v-show="editmode" :src="getImagesave()" :alt="form.slug">
                                                                                            </div>
                                                                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                                            <div>
                                                                                              <span class="btn btn-raised btn-round btn-success btn-file">
                                                                                                 <span class="fileinput-new" style="cursor: pointer">
                                                                                                    <i class="material-icons">insert_photo</i>
                                                                                                             <b>Add Slide</b>
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
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Description <span style="color: red;">*</span></label>
                                                                                <vue-editor v-model="form.body" :editorToolbar="customToolbar"></vue-editor>
                                                                                <div class="form-check">
                                                                                    <label class="form-check-label pull-right">
                                                                                        You can use the
                                                                                        <a href="https://help.github.com/articles/getting-started-with-writing-and-formatting-on-github/" class="text-danger" target="_blank">
                                                                                            Markdown here
                                                                                        </a>
                                                                                        <span class="form-check-sign"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <has-error :form="form" field="body"></has-error>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="submit">
                                                        <div class="text-center">
                                                            <router-link :to="{ name: 'conditions.index' }" id="button_hover" class="btn btn-danger btn-raised btn-round" data-toggle="tab">
                                                                <i class="material-icons">chevron_left</i>
                                                                <b class="title_hover">back</b>
                                                            </router-link>
                                                            <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised btn-round">
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
        <FooterAdmin/>
        </div>
    </div>
</template>

<script>
    import TopNav from "../../../inc/admin/TopNav";
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    export default {
        components: { StatusAdmin, FooterAdmin, TopNav },
        data() {
            return {
                editmode: false,
                user: '',
                form: new Form({
                    id: '',
                    ip: '',
                    title: '',
                    color_name: '',
                    photo: '',
                    body: '',
                    user_id: '',
                    status: '',
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
            getColorCardUser() {
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser() {
                let colorHeader = 'card-header card-header-' + this.user.color_name;
                return colorHeader;
            },
            getImagesave(){
                let photo = (this.form.photo.length > 200) ? this.form.photo : this.form.photo;
                return photo;
            },
            updateImage(e){
                //console.log('uploadert')
                let file = e.target.files[0];
                console.log(file);
                let reader = new FileReader();
                if (file['size'] < 6000775){
                    reader.onloadend = (file) => {
                        //console.log('RESULT',reader.result)
                        this.form.photo = reader.result
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
            createItem() {
                //Start Progress bar
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/dashboard/conditions")
                    .then(() => {
                        //Ici c'est l'insertion de l'alert !
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true,
                            animate: {
                                enter: 'animated bounceInDown',
                                exit: 'animated bounceOutUp'
                            },
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Term & Condition Created Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'conditions.index' }));
                        //End Progres bar
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
            }
        },
        created() {
            //Start Progress bar
            this.$Progress.start();
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>