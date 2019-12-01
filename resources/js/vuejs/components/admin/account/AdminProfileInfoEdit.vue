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
                                                    <!-- profile Image -->
                                                    <div class="row">
                                                        <div class="col-md-6 ml-auto mr-auto">
                                                            <div style="padding-top: -100px;" class="profile text-center ">
                                                                <div class="avatar">
                                                                    <div class="fileinput fileinput-new text-center"
                                                                         data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail img-circle img-raised">
                                                                            <img :src="getImagesave()" :alt="form.name">
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                                        <div>
                                                                            <span class="btn btn-raised btn-round btn-info btn-file">
                                                                                <span class="fileinput-new">
                                                                                    <b> Add Profile</b>
                                                                                </span>
                                                                                <span class="fileinput-exists">
                                                                                    <i class="material-icons">edit</i>
                                                                                    <b> Change</b>
                                                                                </span>
                                                                                <input @change="updateImage" id="avatar" type="file" class="form-control" name="avatar"/>
                                                                            </span>
                                                                            <br/>
                                                                            <a href="#pablo"
                                                                               class="btn btn-danger btn-round fileinput-exists"
                                                                               data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                                                <b>Remove</b>
                                                                            </a>
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
                                                                            <!--<li class="nav-item">
                                                                                <router-link :to="{ name: 'admin.account' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                    <i class="material-icons">face</i>
                                                                                    <b>Mon profile</b>
                                                                                </router-link>
                                                                            </li>-->
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
                                                                                    <label class="bmd-label-floating">Company - kazoutech</label>
                                                                                    <input type="text" class="form-control" disabled/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Pseudo</label>
                                                                                    <input v-model="form.username" type="text" name="username"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('username') }"/>
                                                                                    <has-error :form="form" field="username"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Last Name</label>
                                                                                    <input v-model="form.name" type="text" name="name" maxlength="25"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"/>
                                                                                    <has-error :form="form" field="name"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    <input v-model="form.email" type="email" name="email"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('email') }"/>
                                                                                    <has-error :form="form" field="email"></has-error>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Your Country</label>
                                                                                    <select name="country_id" v-model="form.country_id"
                                                                                            id="country_id" class="form-control"
                                                                                            :class="{ 'is-invalid': form.errors.has('country_id') }"
                                                                                            style="margin-top: 15px;">
                                                                                        <option value="" disabled>Choose Your Country
                                                                                        </option>
                                                                                        <option v-for="country in countries"
                                                                                                :key="country.name"
                                                                                                :value="country.id">{{country.name}}
                                                                                        </option>
                                                                                    </select>
                                                                                    <has-error :form="form" field="country_id"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
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
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="submit">
                                                        <div class="text-center">
                                                            <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-sm btn-raised">
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
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin},
        data() {
            return {
                colors:{},
                countries:{},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    username: '',
                    color_name: '',
                    avatar: '',
                    avatarcover: '',
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
            updateImage(e){
                let file = e.target.files[0];
                let reader = new FileReader();
                let limit = 1024 * 1024 * 2;
                if(file['size'] > limit){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You are uploading a large file',
                    });
                    return false;
                }
                reader.onloadend = (file) => {
                    this.form.avatar = reader.result;
                };
                reader.readAsDataURL(file);
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put('/user/update/')
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
                        setTimeout(() => this.$router.push({ name: 'admin.account' }), 2000);
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
        //Ici je recupere les donner avant que la page n'apparait pour le moment
        //je n'ai pas besoin du created ici
        beforeRouteEnter (to, from, next) {
            axios.get('/api/account/profile')
                .then(({data}) =>  {
                    next(vm => {
                        vm.$Progress.start();
                        vm.form.fill(data);
                        vm.$Progress.finish()
                    })
                });
        },
        created(){
            //Start Progress bar
            this.$Progress.start();
            axios.get("/api/colors").then(({data}) => (this.colors = data.data));
            axios.get("/api/countries").then((response) => ( this.countries = response.data.data));
            //End Progress bar
            this.$Progress.finish()
        }
    }
</script>

<style scoped>

</style>
