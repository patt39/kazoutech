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
                    <div v-if="!loaded" class="submit">
                        <LoaderEllipsis/>
                    </div>
                    <div v-if="loaded"  class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 expo">
                                        <div class="card">
                                            <div :class="getColorCardUser()" style="margin-top: -5px;">
                                                <div class="card-icon">
                                                    <i class="material-icons">meeting_room</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Update</b> -
                                                    <small class="category">This Technician</small>
                                                </h4>
                                            </div>
                                            <br>
                                            <div class="card-body">
                                                <alert-error class="text-center" :form="form" message="Les informations ne peuvent etre edité que pas l'utilisteur bien vouloir le contacter par mail pour plus d'information"></alert-error>
                                                <form id="RegisterValidation" @submit.prevent="updateItem()" role="form"
                                                      method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <select name="user_id" v-model="form.user_id" id="user_id" class="form-control"
                                                                        :class="{ 'is-invalid': form.errors.has('user_id') }">
                                                                    <option value="" disabled>Choisir un Technicien</option>
                                                                    <option v-for="user in users" :key="user.id" :value="user.id">{{user.name}}</option>
                                                                </select>
                                                                <has-error :form="form" field="user_id"></has-error>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                           <div class="form-group">
                                                               <label class="bmd-label-floating"></label>
                                                               <input v-model="form.district" type="text" name="district" placeholder="Quartier" class="form-control" :class="{ 'is-invalid': form.errors.has('district') }">
                                                               <has-error :form="form" field="district"></has-error>
                                                           </div>
                                                       </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <select name="occupation_id" v-model="form.occupation_id" id="occupation_id" class="form-control"
                                                                        :class="{ 'is-invalid': form.errors.has('occupation_id') }">
                                                                    <option value="" disabled>Choisir l'occupation du technicien</option>
                                                                    <option v-for="occupation in occupations" :key="occupation.id" :value="occupation.id">{{occupation.name}}</option>
                                                                </select>
                                                                <has-error :form="form" field="occupation_id"></has-error>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <select name="city_id" v-model="form.city_id" id="city_id" class="form-control"
                                                                        :class="{ 'is-invalid': form.errors.has('city_id') }">
                                                                    <option value="" disabled>Choisir la ville</option>
                                                                    <option v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
                                                                </select>
                                                                <has-error :form="form" field="city_id"></has-error>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="submit">
                                                        <div class="text-center">
                                                            <router-link :to="{ name: 'technicians.index' }" class="btn btn-danger btn-round" id="button_hover">
                                                                <i class="material-icons">chevron_left</i>
                                                                <b class="title_hover">Back</b>
                                                            </router-link>
                                                            <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised btn-round">
                                                                <i class="material-icons">save_alt</i>
                                                                <b class="title_hover">Save</b>
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
        </div>
    </div>
</template>
<script>
    import api from '../../../api/mixins/collections';
    import NavAdmin from "../../inc/admin/NavAdmin";
    import TopNav from "../../inc/admin/TopNav";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderEllipsis from "../../inc/animation/LoaderEllipsis";

    export default {
        components: {LoaderEllipsis, StatusAdmin, FooterAdmin, TopNav, NavAdmin},
        data() {
            return {
                loaded: false,
                user: {},
                cities:{},
                users:{},
                occupations:{},
                technicians: {},
                form: new Form({
                    id: '',
                    district: '',
                    ip: '',
                    city_id: '',
                    member_id:'',
                    user_id: '',
                    occupation_id: '',
                    status: '',
                    slug: ''
                }),
            }
        },
        methods: {
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.put("/dashboard/technicians/" + this.form.id)
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
                            notify.update({'type': 'success', 'message': '<strong>Technician Updated Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'technicians.index' }));

                        //End Progress bar
                        this.$Progress.finish();
                    }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    $.notify("Ooop! This action is unauthorized.", {
                        type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
                })
            }
        },
        created() {
            this.$Progress.start();
            api.technicianID(this.$route.params.id).then(({data}) => this.form.fill(data.data));
            axios.get("/api/occupations").then(({data}) => (this.occupations = data.data));
            axios.get("/api/cities").then(({data}) => (this.cities = data.data));
            axios.get("/api/users").then(({data}) => {
                this.loaded = true;
                this.users = data.data
            });
            axios.get("/api/account/user").then(response => {
                this.loaded = true;
                this.user = response.data.data
            });
            //End Progress bar
            this.$Progress.finish()
        }
    }
</script>

<style scoped>

</style>
