<template>
    <div>
         <vue-progress-bar/>
        <div class="main-panel" id="javascriptComponents">
            <TopNav/>
            <div class="content">
                <div class="container-fluid">
                    <br>
                    <StatusAdmin/>
                    <errored-loading v-if="errored"/>
                    <div v-if="!loaded" class="submit">
                        <loader-ellipsis/>
                    </div>
                    <div v-if="loaded" class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 expo">
                                        <div class="card">
                                            <div :class="getColorCardUser()" style="margin-top: -5px;">
                                                <div class="card-icon">
                                                    <i class="material-icons">chat</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Show</b> -
                                                    <small class="category">Testimonial</small>
                                                </h4>
                                            </div>
                                            <br>
                                            <div class="card-body">
                                                <form id="RegisterValidation" role="form">
                                                        <div class="row">
                                                            <div class="col-md-10 ml-auto mr-auto">
                                                                <div style="padding-top: -100px;" class="profile text-center ">
                                                                    <div class="avatar">
                                                                        <div class="fileinput fileinput-new text-center"
                                                                             data-provides="fileinput">
                                                                            <div class="fileinput-new thumbnail img-circle img-raised">
                                                                                <img :src="testimonial.user.avatar" :alt="testimonial.user.name">
                                                                            </div>
                                                                            <h4 class="card-title"><b>{{ testimonial.user.name }} {{ testimonial.user.first_name }}</b></h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"></label>
                                                                    <input v-model="testimonial.role" type="text" name="role" class="form-control" placeholder="Member Role">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Description</label>
                                                            <br>
                                                            <vue-editor :disabled=true v-model="testimonial.body" :editorToolbar="customToolbar"></vue-editor>
                                                        </div>
                                                    <br>
                                                    <div class="submit">
                                                        <div class="text-center">
                                                            <router-link :to="{ name: 'testimonials.index' }" class="btn btn-danger btn-round" id="button_hover">
                                                                <i class="material-icons">chevron_left</i>
                                                                <b class="title_hover">Back</b>
                                                            </router-link>
                                                            <router-link v-if="$auth.can('edit-testimonial')" :to="{ path: `/dashboard/testimonials/${testimonial.id}/edit` }" class="btn btn-success btn-round" id="button_hover">
                                                                <i class="material-icons">edit</i>
                                                                <b class="title_hover">Edit</b>
                                                            </router-link>
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
    import api from "../../../../api/mixins/collections";
    import TopNav from "../../../inc/admin/TopNav";
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";

    export default {
        components: {StatusAdmin, FooterAdmin, TopNav },
        data() {
            return {
                loaded: false,
                errored: false,
                editmode: false,
                user:[],
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
        },
        created() {
            //Start Progress bar
            this.$Progress.start();
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            api.testimonialSlug(this.$route.params.testimonial).then(response => {
                this.loaded = true;
                this.testimonial = response.data.data;
            }).catch(error => {
                console.log(error);
                this.errored = true
            });
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>
