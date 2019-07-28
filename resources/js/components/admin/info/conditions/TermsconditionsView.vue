<template>
    <div>
        <vue-progress-bar/>
        <NavAdmin/>
        <div class="main-panel" id="javascriptComponents">
            <TopNav/>
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
                                                <h4 class="card-title" style="margin-top: 0px;"><b>View</b> -
                                                    <small class="category">Term & Condition</small>
                                                </h4>
                                            </div>
                                            <br>
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="card card-nav-tabs">
                                                        <div :class="getColorHeaderUser()" v-if="$auth.can('create-condition_utilisation') || $auth.can('edit-condition_utilisation')">
                                                            <div class="nav-tabs-navigation">
                                                                <div class="nav-tabs-wrapper">
                                                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                                                        <li v-if="$auth.can('edit-condition_utilisation')" class="nav-item">
                                                                            <router-link :to="{ path: `/admin/conditions/${condition.id}/edit` }" class="nav-link active" style="cursor:pointer;" data-toggle="tab">
                                                                                <i class="material-icons">edit</i>
                                                                                <b>Edit Condition</b>
                                                                            </router-link>
                                                                        </li>
                                                                        <li v-if="$auth.can('create-condition_utilisation')" class="nav-item">
                                                                            <router-link :to="{ name: 'conditions.create' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                <i class="material-icons">add</i>
                                                                                <b>New Condition</b>
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
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating"></label>
                                                                                    <input v-model="condition.title" type="text" name="title"
                                                                                           class="form-control" placeholder="Presentation title" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-8 ml-auto mr-auto">
                                                                                <div class="profile text-center">
                                                                                    <br>
                                                                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                                                        <div class="fileinput-new thumbnail">
                                                                                            <img :src="getImagesave()" :alt="condition.slug">
                                                                                        </div>
                                                                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating"></label>
                                                                            <vue-editor :disabled=true v-model="condition.body" :editorToolbar="customToolbar"></vue-editor>
                                                                            <div class="form-check">
                                                                                <label class="form-check-label pull-right">
                                                                                    Created by
                                                                                    <router-link  :to="{ path: `/admin/profile/${condition.user.username}` }" class="text-danger">
                                                                                        {{ condition.user.name}}
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
                                                </div>
                                                <hr>
                                                <div class="submit">
                                                    <div class="text-center">
                                                        <router-link id="button_hover" :to="{ name: 'conditions.index' }" class="btn btn-danger btn-round" data-toggle="tab">
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
        <FooterAdmin/>
        </div>
    </div>
</template>

<script>
    import api from '../../../../api/mixins/collections';
    import NavAdmin from "../../../inc/admin/NavAdmin";
    import TopNav from "../../../inc/admin/TopNav";
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import LoaderEllipsis from "../../../inc/animation/LoaderEllipsis";

    export default {
        components: {StatusAdmin, FooterAdmin, TopNav, NavAdmin, LoaderEllipsis },
        data() {
            return {
                editmode: false,
                user: '',
                condition: {
                    id: '',
                    ip: '',
                    title: '',
                    user: '',
                    color_name: '',
                    photo: '',
                    body: '',
                    user_id: '',
                    status: '',
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
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser(){
                let colorHeader = 'card-header card-header-' + this.user.color_name;
                return colorHeader;
            },
            getImagesave(){
                let photo = (this.condition.photo.length > 200) ? this.condition.photo : this.condition.photo;
                return photo;
            },
        },
        created() {
            //Start Progress bar
            this.$Progress.start();
            api.conditionSlug(this.$route.params.condition).then(response => {
                this.loaded = true;
                this.condition = response.data.data;
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish();
        })
    }
}  
</script>

<style scoped>

</style>