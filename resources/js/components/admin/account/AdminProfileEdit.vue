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
                                            <div :class="getUserColorName()" style="margin-top: -5px;">
                                                <div class="card-icon">
                                                    <i class="material-icons">perm_identity</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Edit Profile</b> -
                                                    <small class="category">Complete my profile</small>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <form id="RegisterValidation" @submit.prevent="updateItem()" role="form"
                                                      method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
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
                                                                                    <i class="material-icons">info</i>
                                                                                    <b>Personal info</b>
                                                                                </router-link>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <router-link :to="{ name: 'admin.profiles_edit', params: { id: form.id  } }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                    <i class="material-icons">create</i>
                                                                                    <b>Editer le profile</b>
                                                                                </router-link>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <router-link :to="{ name: 'admin.change_password' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                    <i class="material-icons">vpn_key</i>
                                                                                    <b>Changer mot de passe</b>
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
                                                                                    <input type="text" class="form-control" disabled/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>First Name</label>
                                                                                    <input v-model="form.first_name" type="text" maxlength="25" name="first_name" class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }"/>
                                                                                    <has-error :form="form" field="first_name"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Street Address</label>
                                                                                    <input v-model="form.address" type="text" name="address"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('address') }"/>
                                                                                    <has-error :form="form" field="address"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Postal Code</label>
                                                                                    <input v-model="form.cap" type="number" name="cap"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('cap') }"/>
                                                                                    <has-error :form="form" field="cap"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Professional Work</label>
                                                                                    <input v-model="form.work" type="text" name="work"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('work') }"/>
                                                                                    <has-error :form="form" field="work"></has-error>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Sex</label>
                                                                                    <select name="sex" v-model="form.sex" id="sex" class="form-control"
                                                                                            :class="{ 'is-invalid': form.errors.has('sex') }" style="margin-top: 15px;">
                                                                                        <option value="" disabled>Choose Your Sex</option>
                                                                                        <option value="Male">Male</option>
                                                                                        <option value="Female">Female</option>
                                                                                    </select>
                                                                                    <has-error :form="form" field="sex"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Sidebar Filters Color Menu</label>
                                                                                    <select name="color_style" v-model="form.color_style" id="color_style" class="form-control"
                                                                                            :class="{ 'is-invalid': form.errors.has('color_style') }" style="margin-top: 15px;">
                                                                                        <option value="" disabled>Choose Your Color Style</option>
                                                                                        <option value="purple">Purple</option>
                                                                                        <option value="azure">Azure</option>
                                                                                        <option value="green">Green</option>
                                                                                        <option value="orange">Orange</option>
                                                                                        <option value="danger">Danger</option>
                                                                                    </select>
                                                                                    <has-error :form="form" field="color_style"></has-error>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Age</label>
                                                                                    <input type="text" v-model="form.age" name="my_birthday" maxlength="2"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('age') }"/>
                                                                                    <has-error :form="form" field="age"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Your Phone Number</label>
                                                                                    <input v-model="form.phone" type="number" name="phone"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }"/>
                                                                                    <has-error :form="form" field="phone"></has-error>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="tab-pane" id="settings">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="media-body">
                                                                                        <label class="bmd-label-floating"></label>
                                                                                        <vue-editor v-model="form.body" :class="{ 'is-invalid': form.errors.has('body') }"
                                                                                                    :editorToolbar="customToolbar"></vue-editor>
                                                                                        <has-error :form="form" field="body"></has-error>
                                                                                    </div>
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
                                                            <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised btn-round">
                                                                <span class="btn-label">
                                                                    <i class="material-icons">save_alt</i>
                                                                </span>
                                                                <b class="title_hover">Update profile</b>
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
    import api from '../../../api/mixins/collections';
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin},
        props: ['company'],
        data() {
            return {
                user:{},
                colors:{},
                form: new Form({
                    id: '',
                    first_name: '',
                    last_name: '',
                    work: '',
                    sex: '',
                    age: '',
                    body: '',
                    color_style: '',
                    phone: '',
                    cap: '',
                    address: ''
                }),
                customToolbar: [
                    [{'header': [1, 2, 3, 4, 5, 6, false]}],
                    [{'font': []}],
                    //[{ 'header': [false, 1, 2, 3, 4, 5, 6, ] }],
                    //[{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{'align': []}],
                    //[{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    //['blockquote', 'code-block'],
                    //[{'list': 'ordered'}, {'list': 'bullet'}, {'list': 'check'}],
                    //[{ 'script': 'sub'}, { 'script': 'super' }],
                    //[{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{'color': []}, {'background': []}],
                    //['link', 'image', 'video', 'formula'],
                    ['link'],
                    //[{ 'direction': 'rtl' }],
                    ['clean'],
                    //['emoji'],
                ],
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
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put("/profiles/" + this.form.id)
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
                            notify.update({'type': 'success', 'message': '<strong>profile updated Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        //setTimeout(() =>  location.replace(`/dashboard/account/profile`), 2000);
                        //setTimeout(() => this.$router.push({ name: 'admin.account' }), 2000);
                        //End Progress bar
                        this.$Progress.finish();
                    }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    //Alert
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
        created(){
            //Start Progress bar
            this.$Progress.start();
            api.profileID(this.$route.params.id).then(({data}) => this.form.fill(data.data));
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish()
        }
    }
</script>

<style scoped>

</style>
