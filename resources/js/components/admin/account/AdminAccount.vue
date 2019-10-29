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
                                    <div class="col-md-8 expo">
                                        <div class="card">
                                            <div :class="getUserColorName()" style="margin-top: -5px;">
                                                <div class="card-icon">
                                                    <i class="material-icons">perm_identity</i>
                                                </div>
                                                <h4 class="card-title">
                                                    <b>My Profile View</b>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label>Company ({{company}})</label>
                                                            <input type="text" class="form-control" v-model="company" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" name="name" id="name" v-model="user.name" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" name="username" id="username" v-model="user.username" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Sex</label>
                                                            <input type="text" class="form-control" name="sex" id="sex" v-model="user.sex" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control" name="email" id="email" v-model="user.email" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Tel</label>
                                                            <input type="text" class="form-control" name="phone" id="phone" v-model="user.phone" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" name="address" id="address" v-model="user.address" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input type="text" class="form-control" name="cap" id="cap" v-model="user.cap" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Country</label>
                                                            <select name="country_id" v-model="user.country_id"
                                                                    id="country" class="form-control"
                                                                    style="margin-top: -15px;" disabled>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>About Me</label>
                                                            <div class="form-group">
                                                                <p v-html="user.body"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="text-center">
                                                    <router-link  :to="{ name: 'admin.edit_profile' }" class="btn btn-info btn-raised button_profile">
                                                        <span class="btn-label">
                                                            <i class="material-icons">edit</i>
                                                        </span>
                                                        <b class="title_hover">Edit Profile</b>
                                                    </router-link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 expo">
                                        <div class="card card-profile">
                                            <div class="card-avatar">
                                                <a href="#pablo">
                                                    <img class="img" :src="user.avatar" :alt="user.name"/>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h6 v-if="user.statusOnline"><span class="badge badge-success" title="User online">Online</span></h6>
                                                <h6 v-else="user.statusOnline"><span class="badge badge-danger" title="user offline">Offline</span></h6>
                                                <h6 class="card-category text-gray">{{ user.work }}</h6>
                                                <h4 class="card-title"><b>Sex:</b> {{ user.sex }}</h4>
                                                <h4 class="card-title"><b>Age:</b> {{ user.age }} ans</h4>
                                                <h4 class="card-title"><b>{{ user.name }} {{ user.first_name }}</b></h4>
                                                <h4 class="card-title"><b>Member Since:</b> <b style="color: green;"> {{ user.created_at | formatDate }}</b></h4>
                                                <h4 class="card-title"><b>Last Login:</b> <b style="color: red;"> {{ user.last_sign_in_at | dateAgo }}</b></h4>
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
        components: {StatusAdmin,},
        props: ['company'],
        data() {
            return {
                user:{}
            }
        },
        methods:{
            getUserColorName(){
                let colorUser = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorUser;
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
