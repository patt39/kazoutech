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
                    <div class="col-md-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 expo">
                                    <div class="card">
                                        <div :class="getColorCardUser()" style="margin-top: -5px;">
                                            <div class="card-icon">
                                                <i class="material-icons">slideshow</i>
                                            </div>
                                            <br>
                                            <h4 class="card-title" style="margin-top: 0px;"><b>New</b> -
                                                <small class="category">{{ form.title}}</small>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <form id="RegisterValidation" @submit.prevent="createItem()" role="form"
                                                  method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                <div class="col-md-12">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Title <span style="color: red;">*</span></label>
                                                                            <input v-model="form.title" type="text" name="title"
                                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" >
                                                                            <has-error :form="form" field="title"></has-error>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Text Link</label>
                                                                            <input v-model="form.text_link" type="text" name="text_link"
                                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('text_link') }" >
                                                                            <has-error :form="form" field="text_link"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Redirect Link</label>
                                                                            <input v-model="form.redirect_link" type="text" name="redirect_link" placeholder="Example: /example/"
                                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('redirect_link') }" >
                                                                            <has-error :form="form" field="redirect_link"/>
                                                                        </div>
                                                                    </div>
                                                                    <div v-if="form.redirect_link.length > 0"  class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label></label>
                                                                            <select name="color_id" v-model="form.color_link" id="color_link" class="form-control"
                                                                                    :class="{ 'is-invalid': form.errors.has('color_link') }">
                                                                                <option value="" disabled>Choose Color</option>
                                                                                <option v-for="color in colors" :key="color.id" :value="color.slug">{{color.name}}</option>
                                                                            </select>
                                                                            <has-error :form="form" field="color_link"></has-error>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-8 ml-auto mr-auto">
                                                                        <div class="profile text-center">
                                                                            <br>
                                                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail">
                                                                                    <img :src="getImagesave()" :alt="form.slug">
                                                                                </div>
                                                                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                                <div>
                                                                                    <span class="btn btn-raised btn-success btn-file">
                                                                                        <span class="fileinput-new" style="cursor: pointer">
                                                                                             <i class="material-icons">slideshow</i>
                                                                                                  <b>Add Slide</b>
                                                                                        </span>
                                                                                        <span class="fileinput-exists" style="cursor: pointer">
                                                                                             <i class="material-icons">photo_library</i>
                                                                                            <b>Change</b>
                                                                                         </span>
                                                                                        <input id="photo" @change="updateImage" type="file" class="form-control" name="photo">
                                                                                     </span>
                                                                                    <a href="#pablo" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                                                                        <i class="material-icons">cancel</i>
                                                                                        <b>Remove</b>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <has-error :form="form" field="photo"></has-error>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="media-body">
                                                                            <label class="bmd-label-floating">Slidehome text<span style="color: red;">*</span></label>
                                                                            <quill-editor v-model="form.description"
                                                                                          :class="{ 'is-invalid': form.errors.has('description') }"
                                                                                          :options="editorOption">
                                                                            </quill-editor>
                                                                            <has-error :form="form" field="description"></has-error>
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
                                                        <router-link id="button_hover" :to="{ name: 'slidehomes.index' }" class="btn btn-danger" data-toggle="tab">
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
            <footer-admin></footer-admin>
        </div>
    </div>
</template>

<script>
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import LoaderEllipsis from "../../../inc/animation/LoaderEllipsis";
    export default {
        components: {StatusAdmin, LoaderEllipsis },
        data() {
            return {
                editmode: false,
                user: '',
                occupations: {},
                colors: {},
                form: new Form({
                    id: '',
                    title: '',
                    photo: '',
                    description: '',
                    redirect_link: '',
                    text_link: '',
                    color_link: '',
                }),
                editorOption: {
                    // some quill options
                    modules: {
                        toolbar: [
                            [{ 'font': [] }],
                            [{ 'size': ['small', false, 'large', 'huge'] }],
                            ['bold', 'italic', 'underline'],
                            [{'list': 'ordered'}, {'list': 'bullet'}],
                            [{ 'align': [] }],
                            [{ 'color': [] }, { 'background': [] }],
                            ['clean']
                        ]
                    }
                }
            }
        },
        methods: {
            getColorCardUser(){
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser(){
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
                this.form.post(route('slidehomes.store'))
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
                            notify.update({'type': 'success', 'message': '<strong>Slide Created Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'slidehomes.index' }));
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
        },
        mounted() {
            //Start Progress bar
            this.$Progress.start();
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            axios.get("/api/colors").then(response => {this.colors = response.data});
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>
