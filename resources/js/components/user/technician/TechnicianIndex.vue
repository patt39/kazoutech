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
                                        <button value="Refresh Page" title="update datatables" @click="reload" class="btn btn-success btn-round btn-just-icon btn-sm" >
                                            <i class="material-icons">replay</i>
                                        </button>
                                    </div>
                                    <div class="toolbar">
                                        <div class="submit text-center">
                                            <router-link :to="{ name: 'technicians.create' }" id="button_hover" class="btn btn-success btn-raised btn-round ">
                                                  <span class="btn-label">
                                        <i class="material-icons">meeting_room</i>
                                    </span>
                                                <b class="title_hover">New Technician</b>
                                            </router-link>

                                            <router-link :to="{ name: 'task_technicians.index' }" id="button_hover" class="btn btn-info btn-raised btn-round ">
                                                  <span class="btn-label">
                                        <i class="material-icons">meeting_room</i>
                                    </span>
                                                <b class="title_hover">Task Technician</b>
                                            </router-link>
                                        </div>
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
                                                    <router-link  :to="{ path: `/dashboard/users/profile/${item.user.username}/` }">
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </router-link>
                                                </td>
                                                <td><b>{{ (item.city.name.length > 15 ? item.city.name.substring(0,15)+ "..." : item.city.name) | upText }}</b></td>
                                                <td><b>{{ (item.occupation.name.length > 15 ? item.occupation.name.substring(0,15)+ "..." : item.occupation.name) | upText }}</b></td>
                                                <td><b>{{ item.updated_at | dateAgo }}</b></td>
                                                <td class="td-actions text-right">
                                                    <router-link  :to="{ path: `/dashboard/technicians/t/${item.username}/` }" class="btn btn-link btn-warning btn-round btn-just-icon" title="View">
                                                        <i class="material-icons">visibility</i>
                                                    </router-link>

                                                    <router-link  :to="{ path: `/dashboard/technicians/${item.id}/edit/` }" class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button @click="deleteItem(item.id)" class="btn btn-link btn-danger btn-round btn-just-icon" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Modal création/édition faq -->

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
    import NavAdmin from "../../inc/admin/NavAdmin";
    import TopNav from "../../inc/admin/TopNav";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin, FooterAdmin, TopNav, NavAdmin},
        data() {
            return {
                loaded: false,
                user: {},
                technicians: {},
                form: new Form({
                    id: '',
                    district: '',
                }),
            }
        },
        methods: {
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
            getUser(item){
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/profile/${item.user.username}`);
                //Progres bar
                this.$Progress.finish()
            },
            deleteItem(id) {
                Swal.fire({
                    title: 'Delete Technician?',
                    text: "Are you sure you want to delete this faq?",
                    type: 'warning',
                    animation: false,
                    customClass: 'animated shake',
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    showCancelButton: true,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();
                        //Envoyer la requet au server
                        this.form.delete('/dashboard/technicians/' + id).then(() => {

                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true,
                                animate: {
                                    enter: 'animated bounceInDown',
                                    exit: 'animated bounceOutUp'
                                },
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Technician deleted Successfully.</strong>', 'progress': 75});
                            }, 2000);
                            /** End alert ***/

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('AfterCreate');
                        }).catch(() => {
                            //Failled message
                            this.$Progress.fail();
                            $.notify("Ooop! Something wrong. Try later", {
                                type: 'danger',
                                animate: {
                                    enter: 'animated bounceInDown',
                                    exit: 'animated bounceOutUp'
                                }
                            });
                        })
                    }
                })
            },
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                axios.get("/api/technicians").then(response => {
                    this.loaded = true;
                    this.technicians = response.data.data;
                    this.mydatatables();
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
                //End Progress bar
                this.$Progress.finish();
            },
            reload(){
                this.loadItems();
            },
        },
        created() {
            this.loadItems();
            Fire.$on('AfterCreate', () => {
                this.loadItems();
            });
        }
    }
</script>

<style scoped>

</style>
