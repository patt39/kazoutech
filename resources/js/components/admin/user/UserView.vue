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
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            <div class="page-categories">
                                <ul :class="getPillsColorName()" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#profile" role="tablist">
                                            <i class="material-icons">face</i> Profile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link8" role="tablist">
                                            <i class="material-icons">location_on</i> Location
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link9" role="tablist">
                                            <i class="material-icons">gavel</i> Legal Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link10" role="tablist">
                                            <i class="material-icons">help_outline</i> Help Center
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-space tab-subcategories">
                                    <div class="tab-pane active" id="profile">
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
                                                                        <input type="text" class="form-control" name="phone" id="phone" v-model="form.cellphone" disabled />
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
                                                                        <input type="text" class="form-control" name="country" id="country"  disabled />
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
                                    <div class="tab-pane" id="link8">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Location of the product</h4>
                                                <p class="card-category">
                                                    More information here
                                                </p>
                                            </div>
                                            <div class="card-body">
                                                Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                                                <br>
                                                <br> Dramatically maintain clicks-and-mortar solutions without functional solutions.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="link9">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Legal info of the product</h4>
                                                <p class="card-category">
                                                    More information here
                                                </p>
                                            </div>
                                            <div class="card-body">
                                                Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                                                <br>
                                                <br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="link10">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Help center</h4>
                                                <p class="card-category">
                                                    More information here
                                                </p>
                                            </div>
                                            <div class="card-body">
                                                From the seamless transition of glass and metal to the streamlined profile, every detail was carefully considered to enhance your experience. So while its display is larger, the phone feels just right.
                                                <br>
                                                <br> Another Text. The first thing you notice when you hold the phone is how great it feels in your hand. The cover glass curves down around the sides to meet the anodized aluminum enclosure in a remarkable, simplified design.
                                            </div>
                                        </div>
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
            getPillsColorName(){
                let colorpills = 'nav nav-pills nav-pills-icons justify-content-center nav-pills-' + this.form.color_name;
                return colorpills;
            },
            getUserPanelName(){
                let colorPanel = 'card-header card-header-' + this.form.color_name;
                return colorPanel;
            },
            getImagesave(){
                let avatar = (this.form.avatar.length > 200) ? this.form.avatar : this.form.avatar;
                return avatar;
            },
        },
        created(){
            //Start Progress bar
            this.$Progress.start();
            api.userUsername(this.$route.params.username).then(({data}) => this.form.fill(data.data));
            axios.get("/api/colors").then(({data}) => (this.colors = data.data));
            axios.get("/api/countries").then((response) => ( this.countries = response.data.data));
            //End Progress bar
            this.$Progress.finish()
        }
    }
</script>

<style scoped>

</style>
