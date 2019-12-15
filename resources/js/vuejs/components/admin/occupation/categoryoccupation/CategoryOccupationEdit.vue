<template>
    <div>
        <vue-progress-bar/>
        <div class="main-panel">
            <top-nav/>
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
                                                <small class="category" v-text="form.name"/>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <form id="RegisterValidation" @submit.prevent="updateItem()" role="form"
                                                  method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                <div class="col-md-12">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="profile">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Name category occupation<span style="color: red;">*</span></label>
                                                                    <div class="form-group">
                                                                        <input v-model="form.name" type="text" name="name"
                                                                               class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" />
                                                                        <has-error :form="form" field="name"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <label>Subject category occupation<span style="color: red;">*</span></label>
                                                                    <div class="form-group">
                                                                        <input v-model="form.subject" type="text" name="subject"
                                                                               class="form-control" :class="{ 'is-invalid': form.errors.has('subject') }" />
                                                                        <has-error :form="form" field="subject"/>
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
                                                                            </span>
                                                                                <a href="#pablo"
                                                                                   class="btn btn-danger fileinput-exists"
                                                                                   data-dismiss="fileinput">
                                                                                    <i class="material-icons">cancel</i>
                                                                                    <b>Remove</b>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <has-error :form="form" field="photo"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label>Description category occupation<span style="color: red;">*</span></label>
                                                                    <div class="form-group">
                                                                        <textarea v-model="form.description" type="text" name="description"
                                                                                  class="form-control" :class="{ 'is-invalid': form.errors.has('description') }" rows="7"/>
                                                                        <has-error :form="form" field="description"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="submit">
                                                    <div class="text-center">
                                                        <router-link id="button_hover" :to="{ name: 'categoryoccupations.index' }" class="btn btn-danger" data-toggle="tab">
                                                            <i class="material-icons">chevron_left</i>
                                                            <b class="title_hover">Back</b>
                                                        </router-link>
                                                        <button v-if="$auth.can('edit-occupation')" id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised">
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
            <footer-admin/>
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
                form: new Form({
                    id: '',
                    name: '',
                    photo: '',
                    subject: '',
                    description: '',
                    user: '',
                }),
            }
        },
        methods: {
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
            },
            getImagesave() {
                return (this.form.photo.length > 200) ? this.form.photo : this.form.photo;
            },
            updateImage(e) {
                let reader = new FileReader();
                let file = e.target.files[0];
                if (file['size'] < 6000775) {
                    reader.onloadend = (file) => {
                        this.form.photo = reader.result
                    };
                    reader.readAsDataURL(file);
                } else {
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
                this.form.put(route('categoryoccupations.update',this.form.id))
                    .then(() => {

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Category updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        /** Fin alert **/

                        //End Progress bar
                        this.$Progress.finish();
                    })
                    .catch(() => {
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
                    })
            },
        },
        mounted() {
            //Start Progress bar
            this.$Progress.start();
            dyaxios.get(route('categoryoccupations.show',this.$route.params.id)).then(response => {this.occupation = this.form.fill(response.data)});
            dyaxios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>
