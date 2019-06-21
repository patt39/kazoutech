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
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Edit Profile</b> -
                                                    <small class="category" v-text="form.name"></small>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <form id="RegisterValidation" @submit.prevent="updateItem()" role="form"
                                                      method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                    <!-- Profile Image -->
                                                    <div class="row">
                                                        <div class="col-md-6 ml-auto mr-auto">
                                                            <div style="padding-top: -100px;" class="profile text-center ">
                                                                <div class="avatar">
                                                                    <div class="fileinput fileinput-new text-center"
                                                                         data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                                                            <img :src="getImagesave()" :alt="form.name">
                                                                        </div>
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
                                                                                <router-link :to="{ path: `/dashboard/users/${form.id}/edit` }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                    <i class="material-icons">create</i>
                                                                                    <b>Edit Profile {{ form.username }}</b>
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
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Pseudo</label>
                                                                                    <input v-model="form.username" type="text" name="username"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('username') }">
                                                                                    <has-error :form="form" field="username"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Last Name</label>
                                                                                    <input v-model="form.name" type="text" name="name" maxlength="25"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                                                                    <has-error :form="form" field="name"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>First Name</label>
                                                                                    <input v-model="form.first_name" type="text" maxlength="25" name="first_name" class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }">
                                                                                    <has-error :form="form" field="first_name"></has-error>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                                                                            <div class="col-md-3">
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
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Your Country</label>
                                                                                    <select name="country_id" v-model="form.country_id"
                                                                                            id="country_id" class="form-control"
                                                                                            :class="{ 'is-invalid': form.errors.has('country_id') }"
                                                                                            style="margin-top: 15px;">
                                                                                        <option value="" disabled>Choose Your Country</option>
                                                                                        <option v-for="country in countries"
                                                                                                :key="country.name"
                                                                                                :value="country.id">{{country.name}}
                                                                                        </option>
                                                                                    </select>
                                                                                    <has-error :form="form" field="country_id"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label>Header Color Card</label>
                                                                                    <select name="color_name" v-model="form.color_name" id="color_name" class="form-control"
                                                                                            :class="{ 'is-invalid': form.errors.has('color_name') }" style="margin-top: 15px;">
                                                                                        <option value="" disabled>Choose Your Color</option>
                                                                                        <option v-for="color in colors" :key="color.id" :value="color.slug">{{color.color_name}}</option>
                                                                                    </select>
                                                                                    <has-error :form="form" field="color_name"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
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
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Age</label>
                                                                                    <input type="text" v-model="form.age" name="my_birthday" maxlength="2"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('age') }">
                                                                                    <has-error :form="form" field="age"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Your Phone Number</label>
                                                                                    <input v-model="form.phone" type="number" name="phone"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }">
                                                                                    <has-error :form="form" field="phone"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    <input v-model="form.email" type="email" name="email"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                                                                    <has-error :form="form" field="email"></has-error>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Street Address</label>
                                                                                    <input v-model="form.address" type="text" name="address"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('adress') }">
                                                                                    <has-error :form="form" field="address"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Postal Code</label>
                                                                                    <input v-model="form.cap" type="number" name="cap"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('cap') }">
                                                                                    <has-error :form="form" field="cap"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Professional Work</label>
                                                                                    <input v-model="form.work" type="text" name="work"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('work') }">
                                                                                    <has-error :form="form" field="work"></has-error>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group">
                                                                            <label class="bmd-label-floating">Choose status</label>
                                                                            <select name="my_status" v-model="form.my_status" id="my_status" class="form-control"
                                                                                    :class="{ 'is-invalid': form.errors.has('my_status') }" style="margin-top: 15px;">
                                                                                <option value="" disabled>Add user role</option>
                                                                                <option value="active">Administrator</option>
                                                                                <option value="0">User</option>
                                                                            </select>
                                                                            <has-error :form="form" field="my_status"></has-error>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="submit">
                                                        <div class="text-center">
                                                            <router-link :to="{ name: 'users.index' }" class="btn btn-danger btn-round" id="button_hover">
                                                                <i class="material-icons">chevron_left</i>
                                                                <b class="title_hover">Back</b>
                                                            </router-link>
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
            <FooterAdmin/>
        </div>
    </div>
</template>

<script>
    import api from '../../../api/mixins/collections';
    import TopNav from "../../inc/admin/TopNav";
    import NavAdmin from "../../inc/admin/NavAdmin";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin, FooterAdmin, NavAdmin, TopNav},
        props: ['company'],
        data() {
            return {
                colors:{},
                countries:{},
                form: new Form({
                    id: '',
                    name: '',
                    first_name: '',
                    last_name: '',
                    work: '',
                    sex: '',
                    age: '',
                    email: '',
                    body: '',
                    username: '',
                    color_name: '',
                    color_style: '',
                    phone: '',
                    cap: '',
                    avatar: '',
                    avatarcover: '',
                    address: '',
                    my_status: '',
                    country_id: '',
                }),
            }
        },
        methods:{
            getUserColorName(){
                let colorUser = 'card-header card-header-icon card-header-' + this.form.color_name;
                return colorUser;
            },
            getUserPanelName(){
                let colorPanel = 'card-header card-header-' + this.form.color_name;
                return colorPanel;
            },
            getImagesave(){
                let avatar = (this.form.avatar.length > 200) ? this.form.avatar : this.form.avatar;
                return avatar;
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put('/dashboard/users/'+ this.form.id)
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
                            notify.update({'type': 'success', 'message': '<strong>Profile updated Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'users.index' }), 1000);
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
            api.userID(this.$route.params.id).then(({data}) => this.form.fill(data.data));
            axios.get("/api/colors").then(({data}) => (this.colors = data.data));
            axios.get("/api/countries").then((response) => ( this.countries = response.data.data));
            //End Progress bar
            this.$Progress.finish()
        }
    }
</script>

<style scoped>

</style>
