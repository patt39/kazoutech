<template>
    <div>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Technician</div>

                            <div class="card-body">
                                <alert-error class="text-center" :form="form" message="Les informations ne peuvent etre edité que pas l'utilisteur bien vouloir le contacter par mail pour plus d'information"></alert-error>
                                <form id="RegisterValidation" @submit.prevent="updateItem()" role="form"
                                      method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating"></label>
                                                <input v-model="form.year"  type="number" placeholder="Annee obtantion diplome " :class="{ 'is-invalid': form.errors.has('year') }" maxlength="4" name="first_name" class="form-control"/>
                                                <has-error :form="form" field="year"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating"></label>
                                                <input v-model="form.speciality"  type="text" placeholder="Diplome specialiter" :class="{ 'is-invalid': form.errors.has('speciality') }" maxlength="100" name="speciality" class="form-control"/>
                                                <has-error :form="form" field="speciality"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating"></label>
                                                <input v-model="form.district" type="text" name="district" placeholder="Quartier" class="form-control" :class="{ 'is-invalid': form.errors.has('district') }">
                                                <has-error :form="form" field="district"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="bmd-label-floating"></label>
                                                <select name="city_id" v-model="form.diploma_id" id="diploma_id" class="form-control"
                                                        :class="{ 'is-invalid': form.errors.has('diploma_id') }">
                                                    <option value="" disabled>Quelle est votre niveau scolaire</option>
                                                    <option v-for="diploma in diplomas" :key="diploma.id" :value="diploma.id">{{diploma.name}}</option>
                                                </select>
                                                <has-error :form="form" field="diploma_id"></has-error>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="submit">
                                        <div class="text-center">
                                            <router-link :to="{ path: `/profile/t/${form.slug}` }" class="btn btn-danger btn-round" id="button_hover">
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
        </main>
    </div>
</template>

<script>
    import api from '../../../api/mixins/collections';
    export default {
        name: "RegisterIndex",
        data() {
            return {
                loaded: false,
                cities:{},
                occupations:{},
                diplomas: {},
                technicians: {},
                form: new Form({
                    id: '',
                    district: '',
                    ip: '',
                    year: '',
                    speciality: '',
                    city_id: '',
                    diploma_id: '',
                    member_id:'',
                    user_id: '',
                    occupation_id: '',
                    status: '',
                    slug: ''
                }),
            }
        },

        methods: {
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
            api.technicianSlug(this.$route.params.technician).then(({data}) => this.form.fill(data.data));
            axios.get("/api/occupations_by_status").then(({data}) => (this.occupations = data.data));
            axios.get("/api/cities_by_status").then(({data}) => (this.cities = data.data));
            axios.get("/api/diplomas_by_status").then(({data}) => (this.diplomas = data.data));
            //End Progress bar
            this.$Progress.finish()
        }

    }
</script>

<style scoped>

</style>