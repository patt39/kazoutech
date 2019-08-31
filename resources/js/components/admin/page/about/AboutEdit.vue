<template>
     <div>
         <vue-progress-bar/>
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
                                                 <i class="material-icons">person_outline</i>
                                             </div>
                                             <br>
                                             <h4 class="card-title" style="margin-top: 0px;"><b>Edit</b> -
                                                 <small class="category">Update Member</small>
                                             </h4>
                                         </div>
                                         <div class="card-body">
                                             <alert-error :form="form"></alert-error>
                                             <form id="RegisterValidation" @submit.prevent="updateItem()" role="form"
                                                   method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                 <div class="row">
                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                             <label class="bmd-label-floating"></label>
                                                             <input v-model="form.first_name" type="text" name="first_name"
                                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }" placeholder="Prénom">
                                                             <has-error :form="form" field="first_name"></has-error>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                             <label class="bmd-label-floating"></label>
                                                             <input v-model="form.last_name" type="text" name="last_name"
                                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('last_name') }" placeholder="Nom">
                                                             <has-error :form="form" field="last_name"></has-error>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="row">
                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                             <label class="bmd-label-floating"></label>
                                                             <input v-model="form.fblink" type="text" name="fblink"
                                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('fblink') }" placeholder="Facebook Username">
                                                             <has-error :form="form" field="fblink"></has-error>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-6">
                                                         <div class="form-group">
                                                             <label class="bmd-label-floating"></label>
                                                             <input v-model="form.instlink" type="text" name="instlink"
                                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('instlink') }" placeholder="Instagram Username">
                                                             <has-error :form="form" field="instlink"></has-error>
                                                         </div>
                                                     </div>
                                                     <!--
                                                     <div class="col-md-3">
                                                         <div class="form-group">
                                                             <label class="bmd-label-floating"></label>
                                                             <input v-model="form.twlink" type="text" name="twlink"
                                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('twlink') }" placeholder="Tweeter Username">
                                                             <has-error :form="form" field="twlink"></has-error>
                                                         </div>
                                                     </div>
                                                     <div class="col-md-3">
                                                         <div class="form-group">
                                                             <label class="bmd-label-floating"></label>
                                                             <input v-model="form.linklink" type="text" name="linklink"
                                                                    class="form-control" :class="{ 'is-invalid': form.errors.has('linklink') }" placeholder="Linkedin Username">
                                                             <has-error :form="form" field="linklink"></has-error>
                                                         </div>
                                                     </div>
                                                     -->
                                                 </div>
                                                 <br>
                                                 <div class="row">
                                                     <div class="col-md-6 ml-auto mr-auto">
                                                         <div style="padding-top: -100px;" class="profile text-center ">
                                                             <div class="avatar">
                                                                 <div class="fileinput fileinput-new text-center"
                                                                      data-provides="fileinput">
                                                                     <div class="fileinput-new thumbnail img-circle img-raised">
                                                                         <img :src="getImagesave()" :alt="form.first_name">
                                                                     </div>
                                                                     <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                                     <div>
                                                                <span class="btn btn-raised btn-round btn-info btn-file">
                                                                    <span class="fileinput-new">
                                                                        <b> Add Photo</b>
                                                                    </span>
                                                                    <span class="fileinput-exists">
                                                                        <i class="material-icons">edit</i>
                                                                        <b> Change</b>
                                                                    </span>
                                                                    <input @change="updateImage" id="photo" type="file" name="photo"
                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('photo') }"/>
                                                                 </span>
                                                                         <br/>
                                                                         <a href="#pablo"
                                                                            class="btn btn-danger btn-round fileinput-exists"
                                                                            data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                                             <b>Remove</b>
                                                                         </a>
                                                                     </div>
                                                                     <has-error :form="form" field="photo"></has-error>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="row">
                                                     <div class="col-md-12">
                                                         <div class="card card-nav-tabs">
                                                             <div class="card-body">
                                                                 <div class="tab-content">
                                                                     <div class="tab-pane active" id="profile">
                                                                         <div class="form-group">
                                                                             <label class="bmd-label-floating">Description <span style="color:red;">*</span></label>
                                                                             <br>
                                                                             <vue-editor v-model="form.description" :editorToolbar="customToolbar"></vue-editor>
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
                                                         <router-link :to="{ name: 'abouts.index' }" class="btn btn-danger btn-round" id="button_hover">
                                                             <i class="material-icons">chevron_left</i>
                                                             <b class="title_hover">Back</b>
                                                         </router-link>
                                                         <button v-if="$auth.can('edit-about')" id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised btn-round">
                                                             <i class="material-icons">save_alt</i>
                                                             <b class="title_hover">Update</b>
                                                         </button>
                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                         <br>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- end row -->
                     </div>
                 </div>
             </div>
         </div>
    </div>
</template>
<script>
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import api from '../../../../api/mixins/collections';
    export default {
        components: {StatusAdmin},
        data() {
            return {
                loaded: false,
                user: {},
                form: new Form({
                    id: '',
                    role: '',
                    ip: '',
                    description: '',
                    fblink: '',
                    first_name: '',
                    last_name: '',
                    photo: '',
                    twlink: '',
                    instlink: '',
                    user_id: '',
                    status: '',
                    slug: ''
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
            getImagesave(){
                let photo = (this.form.photo.length > 200) ? this.form.photo : this.form.photo;
                return photo;
            },
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
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
                        title: 'Your image is verry big',
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                    });
                }
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put('/dashboard/abouts/' + this.form.id)
                    .then(() => {

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Member updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'abouts.index' }));
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
        created() {
            this.$Progress.start();
            api.aboutID(this.$route.params.id).then(({data}) => this.form.fill(data.data));
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish()
        }
    }
</script>
<style scoped>

</style>

