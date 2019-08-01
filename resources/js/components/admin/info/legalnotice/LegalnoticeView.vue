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
                    <div  class="row">
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
                                                <h4 class="card-title" style="margin-top: 0px;"><b>View</b> -
                                                    <small class="category">Legal Notice</small>
                                                </h4>
                                            </div>
                                            <br>
                                            <div class="card-body">
                                                <!-- User Data -->
                                                <div class="col-md-12">
                                                    <div class="card card-nav-tabs">
                                                        <div :class="getColorHeaderUser()" v-if="$auth.can('create-legal') || $auth.can('edit-legal')">
                                                            <div class="nav-tabs-navigation">
                                                                <div class="nav-tabs-wrapper">
                                                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                                                        <li v-if="$auth.can('edit-legal')" class="nav-item">
                                                                            <router-link  :to="{ path: `/admin/legal_notice/${form.id}/edit` }" class="nav-link active" style="cursor:pointer;" data-toggle="tab">
                                                                                <i class="material-icons">edit</i>
                                                                                <b>Edit Legal</b>
                                                                            </router-link>
                                                                        </li>
                                                                        <li v-if="$auth.can('create-legal')" class="nav-item">
                                                                            <router-link  :to="{ name: 'legal_notice.create' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                <i class="material-icons">add</i>
                                                                                <b>New Legal</b>
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
                                                                        <vue-editor :disabled=true v-model="form.body" :editorToolbar="customToolbar"></vue-editor>
                                                                        <div class="form-check">
                                                                            <label class="form-check-label pull-right">
                                                                                Created by
                                                                                <router-link  :to="{ path: `/admin/profile/${form.user.username}` }" class="text-danger">
                                                                                    {{ form.user.name }}
                                                                                </router-link>
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
                                                        <router-link id="button_hover" :to="{ name: 'legal_notice.index' }" class="btn btn-danger btn-round" data-toggle="tab">
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
                            <!-- end row -->
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

    export default {
        components: { StatusAdmin, FooterAdmin, TopNav, NavAdmin},
        data() {
        return {
            user: '',
            form: new Form({
                id: '',
                body: '',
                user_id: '',
                user: '',
                color_name:'',
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
        getColorCardUser(){
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser(){
                let colorHeader = 'card-header card-header-' + this.user.color_name;
                return colorHeader;
            },
    },
    created()  {
            //Start Progress bar
            this.$Progress.start();
            api.legalnoticeSlug(this.$route.params.legalnotice).then(response => {
                this.legalnotice = response.data.data;
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish();
        })
    }
  }
</script>

<style scoped>

</style>