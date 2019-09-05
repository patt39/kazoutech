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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 expo">
                                        <div class="card">
                                            <div :class="getColorCardUser()" style="margin-top: -5px;">
                                                <div class="card-icon">
                                                    <i class="material-icons">forum</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Tag title: {{ form.title}}</b> -
                                                    <small class="category" v-text="form.title"></small>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- User Data -->
                                                <div class="col-md-12">
                                                    <div class="card card-nav-tabs">
                                                        <div :class="getColorHeaderUser()">
                                                            <div class="nav-tabs-navigation">
                                                                <div class="nav-tabs-wrapper">
                                                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                                                        <li class="nav-item">
                                                                            <router-link :to="{ name: 'tags.create' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                <i class="material-icons">create</i>
                                                                                <b>New tag</b>
                                                                            </router-link>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="profile">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Company - Name site</label>
                                                                                <input type="text" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <label>Title tag</label>
                                                                        <input v-model="form.title" type="text" name="title"
                                                                               class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                                                        <has-error :form="form" field="title"></has-error>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="submit">
                                                    <div class="text-center">
                                                        <router-link :to="{ name: 'tags.index' }" class="btn btn-primary btn-raised btn-round" data-toggle="tab">
                                                            <i class="material-icons">forum</i>
                                                            <b>All tags</b>
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
            <footer-admin></footer-admin>
        </div>

    </div>
</template>

<script>
    import api from '../../../../api/mixins/collections';
    import NavAdmin from "../../../inc/admin/NavAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin, NavAdmin},
        data() {
            return {
                user:{},
                form: new Form({
                    id: '',
                    title: ''
                })
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
            getMaterialIcon(color){
                let icon = 'material-icons text-' + color;
                return icon;
            },
        },
        created() {
            //Start Progress bar
            this.$Progress.start();
            api.tagView(this.$route.params.tag).then(({data}) => this.form.fill(data.data));
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>
