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
                    <div  class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 expo">
                                        <div class="card">
                                            <div :class="getColorCardUser()" style="margin-top: -5px;">
                                                <div class="card-icon">
                                                    <i class="material-icons">copyright</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>View</b> -
                                                    <small class="category">Policy Privacy</small>
                                                </h4>
                                            </div>
                                            <br>
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="card card-nav-tabs">
                                                        <div :class="getColorHeaderUser()" v-if="$auth.can('create-privacy') || $auth.can('edit-privacy')">
                                                            <div class="nav-tabs-navigation">
                                                                <div class="nav-tabs-wrapper">
                                                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                                                        <li v-if="$auth.can('edit-privacy')" class="nav-item">
                                                                            <router-link :to="{ path: `/dashboard/policy_privacy/${policyprivacy.id}/edit` }" class="nav-link active" style="cursor:pointer;" data-toggle="tab">
                                                                                <i class="material-icons">edit</i>
                                                                                <b>Edit Privacy</b>
                                                                            </router-link>
                                                                        </li>
                                                                        <li v-if="$auth.can('create-privacy')" class="nav-item">
                                                                            <router-link :to="{ name: 'policy_privacy.create' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                <i class="material-icons">add</i>
                                                                                <b>New Privacy</b>
                                                                            </router-link>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="profile">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating">Description</label>
                                                                        <vue-editor :disabled=true v-model="policyprivacy.body" :editorToolbar="customToolbar"></vue-editor>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label pull-right">
                                                                                Created by
                                                                                <router-link  :to="{ path: `/dashboard/profile/${policyprivacy.user.username}` }" class="text-danger">
                                                                                    {{ policyprivacy.user.name}}
                                                                                </router-link>
                                                                                <span class="form-check-sign"></span>
                                                                            </label>
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
                                                        <router-link :to="{ name: 'policy_privacy.index' }" id="button_hover" class="btn btn-danger btn-raised btn-round" data-toggle="tab">
                                                            <i class="material-icons">chevron_left</i>
                                                            <b class="title_hover">Back</b>
                                                        </router-link>
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
            <FooterAdmin/>
        </div>
    </div>
</template>

<script>
    import api from '../../../../api/mixins/collections';
    import TopNav from "../../../inc/admin/TopNav";
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin, FooterAdmin, TopNav },
        data() {
            return {
                editmode: false,
                user:{},
                policyprivacy:{
                    user: '',
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
                let colorUser = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorUser;
            },
            getColorHeaderUser(){
                let colorUser = 'card-header card-header-' + this.user.color_name;
                return colorUser;
            }
        },
        created()  {
            //Start Progress bar
            this.$Progress.start();
            api.policyprivacyView(this.$route.params.id).then(response => {
                this.policyprivacy = response.data.data;
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish();
        })
    }
 }
</script>

<style scoped>

</style>