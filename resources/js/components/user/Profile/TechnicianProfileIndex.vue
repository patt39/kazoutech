<template>
    <div>
        <NavSite/>


        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Register</div>

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
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    import NavSite from "../../inc/user/NavSite";
    import api from '../../../api/mixins/collections';
    export default {
        name: "RegisterIndex",
        components: {NavSite},
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
            };
        },

        methods: {
            loadItems() {
                this.$Progress.start();
                api.technicianSlug(this.$route.params.technician).then(response => {
                    this.loaded = true;
                    this.technician = response.data.data;
                }).catch(error => {
                    console.log(error);
                    this.errored = true
                });
                axios.get("/api/account/user").then(response => {
                    this.loaded = true;
                    this.user = response.data.data
                });
                //End Progress bar
                this.$Progress.finish();
            },
        },

        created() {
            this.loadItems();
            //Start Progress bar
        }

    }
</script>

<style scoped>

</style>