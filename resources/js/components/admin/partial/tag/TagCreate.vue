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
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Add new tags</b> -
                                                    <small class="category">New tag</small>
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
                                                                                <router-link :to="{ name: 'tags.index' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                    <i class="material-icons">create</i>
                                                                                    <b>All tags</b>
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

                                                            <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised btn-round">
                                                                    <span class="btn-label">
                                                                        <i class="material-icons">save_alt</i>
                                                                    </span>
                                                                <b class="title_hover">Create tag</b>
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
            <FooterAdmin/>
        </div>
    </div>
</template>

<script>
    import TopNav from "../../../inc/admin/TopNav";
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin, FooterAdmin, TopNav},
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
            createItem() {
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/dashboard/tags")
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
                            notify.update({'type': 'success', 'message': '<strong>Tag Created Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        //Redirect after create
                        setTimeout(() => this.$router.push({ name: 'tags.index' }), 2000);
                        //Fin insertion de l'alert !

                        //End Progress bar
                        this.$Progress.finish()
                    }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    toastr.error('', 'Ooop! Something wrong. Try later');
                })
            }
        },
        created() {
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
        }
    }
</script>

<style scoped>

</style>