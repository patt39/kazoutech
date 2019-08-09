<template>
    <div>
        <vue-progress-bar/>
        <div class="main-panel" id="javascriptComponents">
            <TopNav/>
            <div class="content">
                <div class="container-fluid">
                    <br>
                    <StatusAdmin/>
                    <br>
                    <div v-if="loaded" class="row">
                        <div class="col-md-12 expo">
                            <div class="card card-stats">
                                <div :class="getColorCardUser()">
                                    <div class="card-icon">
                                        <i class="material-icons">meeting_room</i>
                                    </div>
                                    <p class="card-category"><b>All Technicians</b>
                                    <h3 class="card-title" style="color:red;"><b>{{technicians.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">meeting_room</i><b>All Technicians</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="!loaded" class="submit">
                        <LoaderLdsDefault/>
                    </div>
                    <div v-if="loaded" class="row">
                        <div class="col-md-12 expo">
                            <div class="card">
                                <div :class="getColorHeaderUser()">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">
                                                <b>Datatables Technicians</b>
                                            </h4>
                                            <p class="card-title">
                                                Technicians Available
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                <span>
                                    <i id="tooltipSize" class="material-icons">meeting_room</i>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="header text-right">
                                        <button  @click="reload" class="btn btn-success btn-raised btn-round button_note btn-sm"
                                                 title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                    <div class="toolbar">

                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Technician</b></th>
                                                <th><b>Name</b></th>
                                                <th><b>City</b></th>
                                                <th><b>Occupation</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Technician</b></th>
                                                <th><b>Name</b></th>
                                                <th><b>City</b></th>
                                                <th><b>Occupation</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in technicians" :key="item.id">
                                                <td><img :src="item.user.avatar" :alt="item.user.username" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%"></td>
                                                <td>
                                                    <router-link  :to="{ path: `/dashboard/technicians/u/${item.slug}/` }">
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </router-link>
                                                </td>
                                                <td v-if="item.city_id !== null">
                                                    <router-link  :to="{ path: `/dashboard/technicians/c/${item.city.slug}/` }">
                                                        <b>{{ (item.city.name.length > 15 ? item.city.name.substring(0,15)+ "..." : item.city.name) | upText }}</b>
                                                    </router-link>
                                                </td>
                                                <td v-else="item.city_id === null"><b>City don't select</b></td>
                                                <td v-if="item.occupation_id !== null">
                                                    <router-link  :to="{ path: `/dashboard/technicians/o/${item.occupation.slug}/` }">
                                                        <b>{{ (item.occupation.name.length > 15 ? item.occupation.name.substring(0,15)+ "..." : item.occupation.name) | upText }}</b>
                                                    </router-link>
                                                </td>
                                                <td v-else="item.occupation_id === null"><b>Occupation don't select</b></td>
                                                <td><b>{{ item.updated_at | dateAgo }}</b></td>
                                                <td class="td-actions text-right">

                                                    <!--<router-link  :to="{ path: `/dashboard/technicians/u/${item.slug}/` }" class="btn btn-link btn-warning btn-round btn-just-icon" title="View">
                                                        <i class="material-icons">visibility</i>
                                                    </router-link>-->
                                                    <button  @click="viewItem(item)" class="btn btn-link btn-warning btn-round btn-just-icon" title="View">
                                                        <i class="material-icons">visibility</i>
                                                    </button>

                                                    <!--<router-link  :to="{ path: `/dashboard/technicians/${item.id}/edit/` }" class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>-->
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Modal view technician -->
                                    <div class="modal fade" id="viewNew" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewLabel"><b>Profile technician</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
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
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" data-dismiss="modal" type="button">
                                        <span class="btn-label">
                                            <i class="material-icons">clear</i>
                                            <b>Close</b>
                                        </span>
                                                    </button>
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
            <FooterAdmin/>
        </div>
    </div>
</template>

<script>
    import TopNav from "../../inc/admin/TopNav";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin, FooterAdmin, TopNav},
        data() {
            return {
                loaded: false,
                user: {},
                technicians: {},
                technician:{
                    user:'',
                    city:'',
                    diploma:'',
                    occupation:'',
                },
                form: new Form({
                    id: '',
                    district: '',
                }),
            }
        },
        methods: {
            viewItem(item) {
                //Masquer le modal après la création
                $("#viewNew").modal("show");
                //On passe les informations
                this.technician = item;
            },
            mydatatables(){
                $( function () {
                    $('#datatables').DataTable({
                        "pagingType": "full_numbers",
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ],
                        order: [[ 0, 'desc' ], [ 3, 'asc' ]],
                        responsive: true,
                        stateSave: true,
                        destroy: true,
                        retrieve:true,
                        autoFill: true,
                        colReorder: true,
                        language: {
                            search: "<i class='material-icons'>search</i>",
                            searchPlaceholder: "Search Record",
                        },
                        "sPaginationType": "full_numbers",

                    });
                });
            },
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
            },
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                axios.get("/api/technicians").then(response => {
                    this.loaded = true;
                    this.technicians = response.data.data;
                    this.mydatatables();
                });
                axios.get("/api/account/user").then(response => {
                    this.loaded = true;
                    this.user = response.data.data
                });
                //End Progress bar
                this.$Progress.finish();
            },
            reload(){
                this.loadItems();
            },
            intervalFetchData: function () {
                setInterval(() => {
                    this.loadItems();
                }, 360000);
            },
        },
        created() {
            this.loadItems();
            Fire.$on('AfterCreate', () => {
                this.loadItems();
            });
            this.intervalFetchData();
        }
    }
</script>

<style scoped>

</style>
