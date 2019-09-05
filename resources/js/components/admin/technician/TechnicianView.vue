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
                    <errored-loading v-if="errored"/>
                    <div v-if="!loaded" class="submit">
                        <LoaderEllipsis/>
                    </div>
                    <div v-if="loaded"  class="row">
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
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Profile {{ technician.user.name }}</b> -
                                                    <small class="category">Complete profile technician</small>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- Profile Image -->
                                                <div class="row">
                                                    <div class="col-md-6 ml-auto mr-auto">
                                                        <div style="padding-top: -100px;" class="profile text-center ">
                                                            <div class="avatar">
                                                                <div class="fileinput fileinput-new text-center"
                                                                     data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail img-circle img-raised">
                                                                        <img :src="technician.user.avatar" :alt="technician.user.name">
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
                                                                                Profile <b v-text="technician.user.name"></b>
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
                                                                                <input v-model="technician.user.username" type="text" name="username" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Last Name</label>
                                                                                <input v-model="technician.user.name" type="text" name="name" maxlength="25" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>First Name</label>
                                                                                <input v-model="technician.user.email" type="text" maxlength="25" name="first_name" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>City</label>
                                                                                <input v-if="technician.city_id !== null" v-model="technician.city.name" type="text" name="username" class="form-control"/>
                                                                                <input v-else="technician.city_id === null" placeholder="don't exist" type="text" name="username" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>District</label>
                                                                                <input v-model="technician.district" type="text" name="name" maxlength="25" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Occupation</label>
                                                                                <input v-if="technician.occupation_id !== null"  v-model="technician.occupation.name" type="text"  maxlength="25" name="first_name" class="form-control"/>
                                                                                <input v-else="technician.occupation_id === null"   type="text" placeholder="don't exist" maxlength="25" name="first_name" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Diploma technician</label>
                                                                                <input v-if="technician.diploma_id !== null" v-model="technician.diploma.name" type="text" name="diploma" class="form-control"/>
                                                                                <input v-else="technician.diploma_id === null" placeholder="don't exist" type="text" name="diploma" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Speciality</label>
                                                                                <input v-model="technician.speciality" type="text" name="name" maxlength="25" class="form-control"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Years get diploma</label>
                                                                                <input  v-model="technician.year" type="number"  maxlength="4" name="first_name" class="form-control"/>
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
                                                        <router-link id="button_hover" :to="{ name: 'technicians.index' }" class="btn btn-success btn-raised btn-round">
                                                          <span class="btn-label">
                                                                <i class="material-icons">chevron_left</i>
                                                            </span>
                                                            <b class="title_hover">Technicians</b>
                                                        </router-link>
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
            <footer-admin></footer-admin>
        </div>

    </div>
</template>

<script>

    import api from '../../../api/mixins/collections';
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderEllipsis from "../../inc/animation/LoaderEllipsis";
    export default {
        components: {LoaderEllipsis, StatusAdmin},
        data() {
            return {
                loaded: false,
                errored: false,
                user:{},
                technician:{
                    user:'',
                    city:'',
                    diploma:'',
                    occupation:'',
                },
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

        },
        created(){
            this.$Progress.start();
            api.technicianSlug(this.$route.params.technician).then(response => {
                this.loaded = true;
                this.technician = response.data.data;
            }).catch(error => {
                this.$Progress.fail();
                console.log(error);
                this.errored = true
            });
            axios.get("/api/account/user").then(response => {
                this.loaded = true;
                this.user = response.data.data
            });
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>
