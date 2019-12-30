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
                                            <h4 class="card-title" style="margin-top: 0px;"><b>New Category occupation</b> -
                                                <small class="category">{{ occupation.name}}</small>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <alert-error :form="form"/>
                                            <form id="RegisterValidation" @submit.prevent="updateItem()" role="form"
                                                  method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                <div class="col-md-12">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Name category occupation<span style="color: red;">*</span></label>
                                                                        <input v-model="form.name" type="text" name="name"
                                                                               class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" />
                                                                        <has-error :form="form" field="name"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label>Subject category occupation<span style="color: red;">*</span></label>
                                                                        <input v-model="form.subject" type="text" name="subject"
                                                                               class="form-control" :class="{ 'is-invalid': form.errors.has('subject') }" />
                                                                        <has-error :form="form" field="subject"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label><span style="color: red;">*</span></label>
                                                                        <select name="color_id" v-model="form.color_id" id="color_id" class="form-control"
                                                                                :class="{ 'is-invalid': form.errors.has('color_id') }">
                                                                            <option value="" disabled>Choose Color</option>
                                                                            <option v-for="color in colors" :key="color.id" :value="color.id">{{color.name}}</option>
                                                                        </select>
                                                                        <has-error :form="form" field="color_id"/>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                                  <has-error :form="form" field="photo"/>
                                                                            </span>
                                                                                <a href="#pablo"
                                                                                   class="btn btn-danger fileinput-exists"
                                                                                   data-dismiss="fileinput">
                                                                                    <i class="material-icons">cancel</i>
                                                                                    <b>Remove</b>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="media-body">
                                                                        <label class="bmd-label-floating">Tell about for you<span style="color: red;">*</span></label>
                                                                        <quill-editor v-model="form.description"
                                                                                      :class="{ 'is-invalid': form.errors.has('description') }"
                                                                                      :options="editorOption">
                                                                        </quill-editor>
                                                                        <has-error :form="form" field="body"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="submit">
                                                    <div class="text-center">
                                                        <router-link id="button_hover" :to="{ path: `/dashboard/occupations/v/${occupation.slug}` }" class="btn btn-danger" data-toggle="tab">
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
    import StatusAdmin from "../../../../inc/admin/StatusAdmin";
    import LoaderEllipsis from "../../../../inc/animation/LoaderEllipsis";

    export default {
        components: {StatusAdmin, LoaderEllipsis },
        data() {
            return {
                editmode: false,
                user: '',
                colors:[],
                occupation:{},
                form: new Form({
                    id: '',
                    name: '',
                    photo: '',
                    description: '',
                    occupation_id: '',
                    color_id: '',
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
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
            },
            getImagesave(){
                return (this.form.photo.length > 200) ? this.form.photo : this.form.photo;
            },
            updateImage(e){
                let reader = new FileReader();
                let file = e.target.files[0];
                if (file['size'] < 6000775){
                    reader.onloadend = (file) => {
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

                let Id = this.$route.params.id;
                let SlugOccupation = this.$route.params.occupation;
                let url = route('occupations.show_dashboard_update',[SlugOccupation,Id]);
                this.form.put(url)
                    .then(() => {
                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Data created successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'occupations.show_dashboard', params: { occupation: this.occupation.slug  }}));
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
            let Id = this.$route.params.id;
            let SlugOccupation = this.$route.params.occupation;
            let url = route('occupations.apioccupationbyslugedit',[SlugOccupation,Id]);
            dyaxios.get(url).then(({data}) => this.form.fill(data));
            dyaxios.get(route('occupations.apioccupationbyslug',[SlugOccupation])).then(response => {this.occupation = response.data});
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            axios.get("/api/colors").then(response => {this.colors = response.data});
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>
