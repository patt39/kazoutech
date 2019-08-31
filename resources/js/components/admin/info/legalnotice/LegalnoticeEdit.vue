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
                                                 <i class="material-icons">gavel</i>
                                             </div>
                                             <br>
                                             <h4 class="card-title" style="margin-top: 0px;"><b>Edit</b> -
                                                 <small class="category">Update Legal Notice</small>
                                             </h4>
                                         </div>
                                         <br>
                                         <div class="card-body">
                                             <form id="RegisterValidation" @submit.prevent="updateItem()" role="form"
                                                   method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                 <div class="col-md-12">
                                                     <div class="card card-nav-tabs">
                                                         <div class="card-body">
                                                             <div class="tab-content">
                                                                 <div class="tab-pane active" id="profile">
                                                                     <div class="form-group">
                                                                         <label class="bmd-label-floating">Description <span style="color: red;">*</span></label>
                                                                         <vue-editor v-model="form.body" :editorToolbar="customToolbar"></vue-editor>
                                                                         <div class="form-check">
                                                                             <label class="form-check-label pull-right">
                                                                                 Created by
                                                                                 <router-link  :to="{ path: `/admin/profile/${form.user.username}` }" class="text-danger">
                                                                                     {{ form.user.name }}
                                                                                 </router-link>
                                                                             </label>
                                                                         </div>
                                                                         <has-error :form="form" field="body"></has-error>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <hr>
                                                 <div class="submit">
                                                     <div class="text-center">
                                                         <router-link id="button_hover" :to="{ name: 'legal_notice.index' }" class="btn btn-danger btn-round" data-toggle="tab">
                                                             <i class="material-icons">chevron_left</i>
                                                             <b class="title_hover">Back</b>
                                                         </router-link>
                                                         <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised btn-round">
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
         </div>
    </div>
</template>
<script>
    import api from '../../../../api/mixins/collections';
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    

    export default {
        components: {StatusAdmin,},
        data() {
            return {
                user: {},
                form: new Form({
                    id: '',
                    body: '',
                    user: ''
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
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put('/dashboard/legal_notice/' + this.form.id)
                    .then(() => {

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Legal Notice updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'legal_notice.index' }));
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
            api.legalnoticeID(this.$route.params.id).then(({data}) => this.form.fill(data.data));
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>
