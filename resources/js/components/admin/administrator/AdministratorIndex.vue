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
                    <template v-if="$auth.can('view-administrator')">
                        <div class="row">
                            <div class="col-md-12 expo">
                                <div class="card">
                                    <div :class="getColorHeaderUser()">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="card-title">
                                                    <b>Profile Administrators</b>
                                                </h4>
                                                <p class="card-title">
                                                    Profile Administrators
                                                </p>
                                            </div>
                                            <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">supervised_user_circle</i>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="card-body">
                                        <div class="toolbar">
                                            <div class="submit text-center">
                                                <router-link :to="{name:'administrators.datatables'}" id="button_hover" class="btn btn-success btn-raised btn-round">
                                                    <span class="btn-label">
                                                        <i class="material-icons">perm_identity</i>
                                                    </span>
                                                    <b class="title_hover">Administrators Profile</b>
                                                </router-link>
                                                <!--<div class="submit text-center">
                                                    <button id="button_hover" @click="modalInvite()" class="btn btn-info btn-raised btn-round text-right">
                                                        <i class="material-icons">inbox</i>
                                                        <b class="title_hover">Invite Administrator</b>
                                                    </button>
                                                </div>-->
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                         <div class="row">
                                            <div v-for="(item,index) in users" :key="index" class="col-md-4 col-sm-4 ">
                                                <div class="card card-profile">
                                                    <div class="card-avatar">
                                                        <a href="#pablo">
                                                            <img class="img" :src="item.avatar" :alt="item.name"/>
                                                        </a>
                                                    </div>
                                                    <div class="stats text-center">
                                                         <a href="javascript:void(0)" @click="sendItem(item)" class="btn btn-info btn-just-icon btn-fill btn-round btn-sm" title="Send invitation">
                                                            <i class="material-icons">mail</i>
                                                        </a>
                                                        <button @click="getUser(item)" class="btn btn-warning btn-just-icon btn-fill btn-round btn-sm">
                                                            <i class="material-icons">visibility</i>
                                                        </button>
                                                        <router-link  v-if="$auth.can('edit-administrator')" :to="{ name: 'administrators.edit', params: { id: item.id  } }" class="btn btn-success btn-just-icon btn-fill btn-sm btn-round btn-wd" title="Edit">
                                                            <i class="material-icons">mode_edit</i>
                                                        <div class="ripple-container"></div>
                                                        </router-link>
                                                    </div>
                                                    <div class="card-body">
                                                         <a href="javascript:void(0)" @click="getUser(item)">
                                                            <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                            <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                            {{ (item.name.length > 15 ? item.name.substring(0,15)+ "..." : item.name) | upText }}
                                                        </a>
                                                        <h6>
                                                            <span v-for="role in item.roles" :class="getRoleName(role)">
                                                            <b>{{role}}</b>
                                                            </span>
                                                        </h6>
                                                        <h4 class="card-title"><b>{{ item.name }} {{ item.first_name }}</b></h4>
                                                        <h4 class="card-title"><b>Sex:</b> {{ item.sex }}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <!-- send invitation user -->
                                        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5  class="modal-title" id="updateNewLabel"><b>Invite Administrator</b></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="RegisterValidation" @submit.prevent="inviteAdmin()" role="form" method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.name" type="text" name="name" placeholder="Name administrator" class="form-control" :class="{ 'is-invalid': form.errors.has('name') }" required>
                                                                <has-error :form="form" field="name"></has-error>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.email" type="email" name="email" placeholder="Email administrator" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" required>
                                                                <has-error :form="form" field="email"></has-error>
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
                                                            <i class="material-icons">mail</i>
                                                            <b>Yes, Send</b>
                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="toolbar">
                                            <div class="submit text-center" >
                                                <infinite-loading spinner="waveDots" @infinite="infiniteHandler">
                                                <span slot="no-more"></span>
                                                </infinite-loading>
                                            </div>
                                        </div>
                                        <!-- Modal Invite Administrator -->
                                        <div class="modal fade" id="inviteAdmin" tabindex="-1" role="dialog" aria-labelledby="addNewLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><b>Invite Administrator</b></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form @keydown="form.onKeydown($event)" @submit.prevent="inviteAdmin()" role="form" method="POST" action="" accept-charset="UTF-8">
                                                            <div class="row">
                                                                <div class="alert alert-primary">
                                                                    <div class="container text-justify">
                                                                        <div class="alert-icon">
                                                                            <i class="material-icons">info_outline</i>
                                                                        </div>
                                                                        <b>Info alert - </b> You are about to send a message to an adminsitrater to communicate his new role.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="bmd-label-floating"></label>
                                                                        <select name="email" v-model="form.email" id="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                                                            <option value="" disabled >Select an administrator</option>
                                                                            <option v-for="user in users" :key="user.id" :value="user.email">{{user.name}}</option>
                                                                        </select>
                                                                        <has-error :form="form" field="email"></has-error>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
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
                                                            <i class="material-icons">alternate_email</i>
                                                            <b>Yes, Invite</b>
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
                    </template>
                    <div v-else="$auth.can('view-administrator')" class="container-fluid">
                        <alert-permission/>
                    </div>
                </div>
            </div>
            <footer-admin></footer-admin>
        </div>

    </div>
</template>

<script>
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                loaded: false,
                editmode: false,
                page: 1,
                users: [],
                user: {},
                colors:[],
                roles:{},
                form: new Form({
                    email: '',
                    name: '',
                })
            }
        },
        methods: {
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
            },
            getUser(item){
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/p/${item.username}/`);
                //Progres bar
                this.$Progress.finish()
            },
            getRoleName(role) {
                if (role === 'super-admin') {
                    return 'badge badge-info';
                }
                if (role === 'admin') {
                    return 'badge badge-success';
                }
                if (role === 'visitor') {
                    return 'badge badge-secondary';
                }
                if (role === 'editor') {
                    return 'badge badge-warning';
                }
                if (role === 'advertiser') {
                    return 'badge badge-danger';
                }
                if (role === 'moderator') {
                    return 'badge badge-primary';
                }
            },
            sendItem(item) {
                this.form.reset();
                //Afficher le modal de la création
                $('#addNew').modal('show');
                //On passe les informations
                this.form.fill(item);
            },
            modalInvite() {
                this.form.reset();
                //Masquer le modal après la création
                $('#inviteAdmin').modal('show');
            },
            inviteAdmin() {
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/user/invite")
                    .then(() => {
                        //Masquer le modal après la création
                        $('#inviteAdmin').modal('hide');
                        $('#addNew').modal('hide');

                        //Insertion de l'alert !
                        $.notify('<strong>Administrator invite Successfully.</strong>', {
                            allow_dismiss: false,
                            type: 'success',
                            placement: {
                                from: 'bottom',
                            },
                            animate: {
                                enter: "animated fadeInUp",
                                exit: "animated fadeOutDown"
                            },
                       });

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
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put('/dashboard/administrators/' + this.form.id)
                    .then(() => {
                        //Masquer le modal après la création
                        $('#newAdmin').modal('hide');

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Administrator updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        /** Fin alert **/

                        //Progres bar
                        this.$Progress.finish();

                        //Event
                        Fire.$emit('AfterCreate');
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
             infiniteHandler($state) {
                axios.get(`/api/administrators`, {
                    params: {
                        page: this.page,
                    },
                }).then(response => {
                    if (response.data.length) {
                        this.page += 1;
                        this.users.push(...response.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                });
            },
        },
        created() {
         axios.get("/api/account/user").then(response => {this.user = response.data.data});
         axios.get("/api/colors").then(({data}) => (this.colors = data.data));
        }
    }

</script>

<style scoped>

</style>
