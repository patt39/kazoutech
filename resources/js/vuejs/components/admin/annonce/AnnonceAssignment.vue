<template>
    <div>
        <vue-progress-bar/>
        <div class="main-panel" id="javascriptComponents">
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
                                                    <i class="material-icons">assignment</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Assigne new job</b> -
                                                    <small class="category">To technician</small>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <form id="RegisterValidation" @submit.prevent="createItem()" role="form"
                                                      method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                    <!-- User Data -->
                                                    <div class="col-md-12">
                                                        <div class="card card-nav-tabs">
                                                            <div :class="getColorHeaderUser()">
                                                                <div class="nav-tabs-navigation">
                                                                    <div class="nav-tabs-wrapper">
                                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                                            <li class="nav-item">
                                                                                <router-link :to="{ name: 'categories.index' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                    <i class="material-icons">assignment</i>
                                                                                    <b>all assignments here</b>
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
                                                                                    <label>Charbonneur</label>
                                                                                    <select name="user_id" v-model="form.user_id" id="user_id" class="form-control"
                                                                                            :class="{ 'is-invalid': form.errors.has('user_id') }" style="margin-top: 15px;">
                                                                                        <option value="" disabled>Choose charbonneur</option>
                                                                                        <option v-for="item in charbonneurs.userbycities" :key="item.id" :value="item.id">{{item.name}}</option>
                                                                                    </select>
                                                                                    <br>
                                                                                    <has-error :form="form" field="user_id"></has-error>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br/>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Title</label>
                                                                                        <input v-model="form.title" type="text" name="title"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                                                                    <has-error :form="form" field="title"></has-error>                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Description <span style="color:red;">*</span></label>
                                                                                    <br>
                                                                                    <vue-editor v-model="form.description" :editorToolbar="customToolbar"/>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label pull-right">
                                                                                            You can use the
                                                                                            <a href="https://help.github.com/articles/getting-started-with-writing-and-formatting-on-github/" class="text-danger" target="_blank">
                                                                                                Markdown here
                                                                                            </a>
                                                                                            <span class="form-check-sign"/>
                                                                                        </label>
                                                                                    </div>
                                                                                    <has-error :form="form" field="body"/>
                                                                                </div>
                                                                            </div>
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
                                                            <router-link :to="{ name: 'annonces.index' }" class="btn btn-primary btn-raised" data-toggle="tab">
                                                                <i class="material-icons">forum</i>
                                                                <b>Back to annonce</b>
                                                            </router-link>

                                                            <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised">
                                                                <span class="btn-label">
                                                                    <i class="material-icons">save_alt</i>
                                                                </span>
                                                                <b class="title_hover">Assigne</b>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
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
    import NavAdmin from "../../inc/admin/NavAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";

    export default {
        components: {StatusAdmin, NavAdmin},
        data() {
            return {
                user:[],
                charbonneurs:[],
                form: new Form({
                    title: '',
                    user_id: '',
                    description: '',
                }),
                customToolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'font': [] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'align': [] }],
                    ['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
                    [{ 'color': [] }, { 'background': [] }],
                    ['link'],
                    ['clean'],
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
            createItem() {
                let SlugOccupation = this.$route.params.occupation;
                let SlugCity = this.$route.params.city;
                let Slugannonce = this.$route.params.annonce;
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post(route('assignedtaskstore',[SlugOccupation,SlugCity,Slugannonce]))
                    .then(() => {

                        //Insertion de l'alert !
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true,
                            animate: {
                                enter: 'animated bounceInDown',
                                exit: 'animated bounceOutUp'
                            },
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Annonce assigned Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        //Redirect after create
                        setTimeout(() => this.$router.push({ name: 'annonces_assigne' }), 2000);
                        //Fin insertion de l'alert !

                        //End Progress bar
                        this.$Progress.finish()
                    }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    toastr.error('', 'Ooop! Something wrong. Try later');
                })
            },

            loadItems(){
                let SlugOccupation = this.$route.params.occupation;
                let SlugCity = this.$route.params.city;
                dyaxios.get(route('api_active_charbonneurs_occupation_city.view',[SlugOccupation,SlugCity])).then(response => {this.charbonneurs = response.data});

            },
        },

        created() {
            //Start Progress bar
            this.$Progress.start();
            this.loadItems();
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>
