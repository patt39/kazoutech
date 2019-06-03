<template>
    <div>
        <vue-progress-bar/>
        <NavAdmin/>
        <div class="main-panel" id="javascriptComponents">
            <TopNav/>
            <div class="content">
                <div class="container-fluid">
                    <br>
                    <!-- Ici on va mettre le status de l'admin -->
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 expo">
                                <div class="card">
                                    <div :class="getUserColorName()" style="margin-top: -5px;">
                                        <div class="card-icon">
                                            <i class="material-icons">perm_identity</i>
                                        </div>
                                        <h4 class="card-title">
                                            Profile <b v-text="form.name"></b>
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
                                                    <input type="text" class="form-control" name="name" id="name" v-model="form.name" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="username" id="username" v-model="form.username" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Sex</label>
                                                    <input type="text" class="form-control" name="sex" id="sex" v-model="form.sex" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" v-model="form.email" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tel</label>
                                                    <input type="number" class="form-control" name="phone" id="phone" v-model="form.phone" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" name="address" id="address" v-model="form.address" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input type="text" class="form-control" name="cap" id="cap" v-model="form.cap" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <input type="text" class="form-control" name="country" id="country" v-model="form.country.name" disabled />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Work</label>
                                                    <input type="text" class="form-control" name="work"  v-model="form.work" disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>About Me</label>
                                                    <div class="form-group">
                                                        <p v-html="form.body"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 expo">
                                <div class="card card-profile">
                                    <div class="card-avatar">
                                        <a href="#pablo">
                                            <img class="img" :src="getImagesave()" :alt="form.name" />
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <!--<img :src="form.country.flag" :alt="form.name"/>
                                        <h6 v-if="form.statusOnline"><span class="badge badge-success" title="User online">Online</span></h6>
                                        <h6 v-else="form.statusOnline"><span class="badge badge-danger" title="user offline">Offline</span></h6>
                                        -->
                                        <h6 class="card-category text-gray">{{ form.work }}</h6>
                                        <h4 class="card-title"><b>Sex:</b> {{ form.sex }}</h4>
                                        <h4 class="card-title"><b>Age:</b> {{ form.age }} ans</h4>
                                        <h4 class="card-title"><b>{{ form.name }} {{ form.first_name }}</b></h4>
                                        <h4 class="card-title"><b>Member Since:</b> <b style="color: green;"> {{ form.created_at | formatDate }}</b></h4>
                                        <h4 class="card-title"><b>Last Login:</b> <b style="color: red;"> {{ form.last_sign_in_at | dateAgo }}</b></h4>
                                    </div>
                                </div>
                            </div>
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
    import NavAdmin from "../../inc/admin/NavAdmin";
    import TopNav from "../../inc/admin/TopNav";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    export default {
        components: {FooterAdmin, TopNav, NavAdmin},
        props: ['company'],
        data() {
            return {
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
                    phone: '',
                    cap: '',
                    avatar: '',
                    avatarcover: '',
                    address: '',
                    country_id: '',
                })
            };
        },
        methods: {
            getUserColorName(){
                return 'card-header card-header-icon card-header-' + this.form.color_name;
            },
            getImagesave(){
                return (this.form.avatar.length > 200) ? this.form.avatar : this.form.avatar;
            }
        },
        created() {
            //Start Progress bar
            this.$Progress.start();
            api.user(this.$route.params.username).then(({data}) => (this.form.fill(data.data)));
            //End Progress bar
            this.$Progress.finish();
        }
    };
</script>

<style scoped>

</style>