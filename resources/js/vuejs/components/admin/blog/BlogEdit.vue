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
                                                <i class="material-icons">indeterminate_check_box</i>
                                            </div>
                                            <br>
                                            <h4 class="card-title" style="margin-top: 0px;"><b>Edit</b> -
                                                <small class="category">{{ form.title}}</small>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <form id="RegisterValidation" @submit.prevent="updateItem()" role="form"
                                                  method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                <div class="col-md-12">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Title <span style="color: red;">*</span></label>
                                                                            <input v-model="form.title" type="text" name="title"
                                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" >
                                                                            <has-error :form="form" field="title"></has-error>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <select name="occupation_id" v-model="form.occupation_id" id="occupation_id" class="form-control"
                                                                                :class="{ 'is-invalid': form.errors.has('occupation_id') }">
                                                                            <option value="" disabled>Choose Category</option>
                                                                            <option v-for="occupation in occupations" :key="occupation.id" :value="occupation.id">{{occupation.name}}</option>
                                                                        </select>
                                                                        <has-error :form="form" field="occupation_id"/>
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
                                                                                                       <i class="material-icons">insert_photo</i>
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
                                                                            <label class="bmd-label-floating">Blog post<span style="color: red;">*</span></label>
                                                                            <quill-editor v-model="form.body"
                                                                                          :class="{ 'is-invalid': form.errors.has('body') }"
                                                                                          :options="editorOption">
                                                                            </quill-editor>
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
                                                        <router-link id="button_hover" :to="{ name: 'blogs.index' }" class="btn btn-danger" data-toggle="tab">
                                                            <i class="material-icons">chevron_left</i>
                                                            <b class="title_hover">Back</b>
                                                        </router-link>
                                                        <button v-if="$auth.can('edit-occupation')" id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised">
                                                            <i class="material-icons">save_alt</i>
                                                            <b class="title_hover">Update</b>
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
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderEllipsis from "../../inc/animation/LoaderEllipsis";
    export default {
        components: {StatusAdmin, LoaderEllipsis },
        data() {
            return {
                editmode: false,
                user: '',
                occupations: {},
                form: new Form({
                    id: '',
                    title: '',
                    photo: '',
                    occupation_id: '',
                    body: '',
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
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                let url = route('blogs.update',this.form.id);
                this.form.put(url)
                    .then(() => {
                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Data updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'blogs.index' }));
                        /** Fin alert **/
                        //End Progress bar
                        this.$Progress.finish();
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
        },
        mounted() {
            //Start Progress bar
            this.$Progress.start();
            let IdBlog = this.$route.params.id;
            let url = route('blogs.show',IdBlog);
            dyaxios.get(url).then(({data}) => this.form.fill(data));
            dyaxios.get(route('api.occupations')).then(response => {this.occupations = response.data.data});
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>
