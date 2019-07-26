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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 expo">
                                        <div class="card">
                                            <div :class="getUserColorName()" style="margin-top: -5px;">
                                                <div class="card-icon">
                                                    <i class="material-icons">perm_identity</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Change password</b> -
                                                    <small class="category">Change my password</small>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <form id="RegisterValidation" @submit.prevent="changePassword()" role="form"
                                                      method="POST" action="" accept-charset="UTF-8">
                                                    <!-- Profile Image -->
                                                    <div class="row">
                                                        <div class="col-md-6 ml-auto mr-auto">
                                                            <div style="padding-top: -100px;" class="profile text-center ">
                                                                <div class="avatar">
                                                                    <div class="fileinput fileinput-new text-center"
                                                                         data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                                                            <img :src="user.avatar" :alt="user.name">
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <!-- User Data -->
                                                    <div class="col-md-12">
                                                        <div class="card card-nav-tabs">
                                                            <div :class="getUserPanelName()">
                                                                <div class="nav-tabs-navigation">
                                                                    <div class="nav-tabs-wrapper">
                                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                                            <li class="nav-item">
                                                                                <router-link :to="{ name: 'admin.account' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                    <i class="material-icons">face</i>
                                                                                    <b>Mon profile</b>
                                                                                </router-link>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <router-link :to="{ name: 'admin.edit_profile' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                    <i class="material-icons">create</i>
                                                                                    <b>Editer le profile</b>
                                                                                </router-link>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <router-link :to="{ name: 'admin.reset_password' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                    <i class="material-icons">vpn_key</i>
                                                                                    <b>Reinitialiser mot de passe</b>
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
                                                                                    <label class="bmd-label-floating">Company - {{company}}</label>
                                                                                    <input type="text" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating"></label>
                                                                            <input v-model="user.email" type="email" name="email" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <router-link :to="{ name: 'admin.change_password' }" style="cursor:pointer;" class="text-info">
                                                                            <b>Tu te rapelle de ton mot de passe ?</b>
                                                                        </router-link>
                                                                        <a href="javascript:void(0)" @click="sendItem" style="cursor:pointer;" class="text-info" title="Send invitation">
                                                                            <b>S'inscrire ici</b>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="submit">
                                                        <div class="text-center">
                                                            <button id="button_hover" type="submit" class="btn btn-success btn-raised btn-round">
                                                                <span class="btn-label">
                                                                    <i class="material-icons">vpn_key</i>
                                                                </span>
                                                                <b class="title_hover">Réinitialiser le mot de passe</b>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- new register user -->
                                            <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5  class="modal-title" id="updateNewLabel"><b>Create your account</b></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form @submit.prevent="createItem()" role="form" method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating"></label>
                                                                            <input v-model="form.username" type="text" name="username" placeholder="Username..." class="form-control" :class="{ 'is-invalid': form.errors.has('username') }" required>
                                                                            <has-error :form="form" field="username"></has-error>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating"></label>
                                                                            <input v-model="form.name" type="text" name="name" placeholder="Name..." class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" required>
                                                                            <has-error :form="form" field="name"></has-error>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating"></label>
                                                                            <input v-model="form.email" type="email" name="email" placeholder="Email.." class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" required>
                                                                            <has-error :form="form" field="email"></has-error>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating"></label>
                                                                            <input v-model="form.password" id="password" placeholder="Password..." :class="{ 'is-invalid': form.errors.has('password') }" type="password" class="form-control" name="password" required>
                                                                            <has-error :form="form" field="password"></has-error>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating"></label>
                                                                            <input v-model="form.password_confirmation" id="password-confirm" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" type="password" placeholder="Password confirmation..." class="form-control" name="password_confirmation" required>
                                                                            <has-error :form="form" field="password_confirmation"></has-error>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                        <span class="btn-label">
                                                            <i class="material-icons">clear</i>
                                                            <b>Close</b>
                                                        </span>
                                                                        </button>
                                                                        <button :disabled="form.busy" type="submit" class="btn btn-success btn-raised">
                                                        <span class="btn-label">
                                                            <i class="material-icons">near_me</i>
                                                            <b>Register</b>
                                                        </span>
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
    import TopNav from "../../inc/admin/TopNav";
    import NavAdmin from "../../inc/admin/NavAdmin";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin, FooterAdmin, NavAdmin, TopNav},
        props: ['company'],
        data() {
            return {
                user:{},
                form: new Form({
                    username: "",
                    name: "",
                    email: "",
                    password: "",
                }),
            }
        },
        methods:{
            getUserColorName(){
                let colorUser = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorUser;
            },
            getUserPanelName(){
                let colorPanel = 'card-header card-header-' + this.user.color_name;
                return colorPanel;
            },
            sendItem() {
                this.form.reset();
                //Afficher le modal de la création
                $('#addNew').modal('show');
            },
            createItem() {
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/auth/register")
                    .then(() => {
                        //Masquer le modal après la création
                        $('#inviteAdmin').modal('hide');
                        $('#addNew').modal('hide');

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
                            notify.update({'type': 'success', 'message': '<strong>Compte create Successfully.</strong>', 'progress': 75});
                        }, 2000);

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
            changePassword() {
                //Start Progress bar
                this.$Progress.start();

                this.form.post("/password/email").then(() => {
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
                            notify.update({'type': 'success', 'message': '<strong>Lien de réinitialisation mot de passe envoyé</strong>', 'progress': 75});
                        }, 2000);
                        //setTimeout(() => this.$router.push({ name: 'admin.account' }), 2000);
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
        beforeRouteEnter (to, from, next) {
            axios.get('/api/account/user')
                .then(response => {
                    next(vm => {
                        vm.$Progress.start();
                        vm.user = response.data.data;
                        vm.$Progress.finish()
                    })
                });
        }
    }
</script>

<style scoped>

</style>
