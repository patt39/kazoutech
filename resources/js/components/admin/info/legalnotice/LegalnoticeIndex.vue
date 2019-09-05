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
                    <div v-if="loaded" class="row">
                        <div class="col-md-12 expo">
                            <div class="card card-stats">
                                <div :class="getColorCardUser()">
                                    <div class="card-icon">
                                        <i class="material-icons">gavel</i>
                                    </div>
                                    <p class="card-category"><b>All Legalmentions Site</b>
                                    <h3 class="card-title" style="color:red;"><b>{{legalnotices.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">gavel</i><b>All legalmentions</b>
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
                                                <b>Datatables Legal Notice</b>
                                            </h4>
                                            <p class="card-title">
                                                Informations Menu
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">gavel</i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div  class="toolbar">
                                        <div class="header text-right">
                                            <button @click="reload" class="btn btn-success btn-raised btn-round button_note btn-sm"
                                                    title="Refresh Page">
                                                <i class="material-icons">replay</i>
                                                <b class="title_hover">Refresh</b>
                                            </button>
                                        </div>
                                        <div class="submit text-center">
                                            <router-link :to="{ name: 'legal_notice.create' }" id="button_hover" class="btn btn-success btn-raised btn-round">
                                                 <span class="btn-label">
                                                    <i class="material-icons">gavel</i>
                                                </span>
                                                <b class="title_hover">New Legal</b>
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Legal Notice</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Edit by</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Legal Notice</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Edit by</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in legalnotices" :key="item.id">
                                                <td v-html="item.body.length > 30 ? item.body.substring(0,30)+ '...' : item.body"></td>
                                                <td>
                                                    <div class="timeline-heading">
                                                        <span v-if="item.status === 1" class="badge badge-info"><b>Active</b></span>
                                                        <span v-else-if="item.status === 0"  class="badge badge-danger"><b>Deactive</b></span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a :href="`/dashboard/users/p/${item.user.username}/`">
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </a>
                                                </td>
                                                <td>{{ item.updated_at | myDate }}</td>
                                                <td class="td-actions text-right">
                                                    <template>
                                                        <button v-if="item.status === 1" @click="disableItem(item.id)" class="btn btn-link btn-info btn-round btn-just-icon " title="Disable">
                                                            <i class="material-icons">power_settings_new</i>
                                                        </button>
                                                        <button v-else-if="item.status === 0" @click="activeItem(item.id)" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activate">
                                                            <i class="material-icons">power_settings_new</i>
                                                        </button>
                                                    </template>
                                                    <router-link  :to="{ path: `/dashboard/legal_notice/lm/${item.id}` }" class="btn btn-link btn-warning btn-round btn-just-icon" title="View">
                                                            <span class="btn-label">
                                                                <i class="material-icons">visibility</i>
                                                            </span>
                                                    </router-link>
                                                    <router-link  :to="{ path: `/dashboard/legal_notice/${item.id}/edit` }" class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button @click="deleteItem(item.id)" v-if="$auth.can('delete-legal')"
                                                            class="btn btn-link btn-danger btn-round btn-just-icon" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer-admin></footer-admin>
        </div>

    </div>
</template>

<script>
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import Loaded from "../../../inc/animation/Loaded";
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";

    export default {
        components: {Loaded, StatusAdmin, LoaderLdsDefault },
        data() {
            return {
                loaded: false,
                editmode: false,
                legalnotices: {},
                user: {},
                form: new Form({
                    id: '',
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
                            searchPlaceholder: "Search Record"
                        },
                        "sPaginationType": "full_numbers"
                    });
                });
            },
            getColorCardUser(){
                let colorUser = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorUser;
            },
            getColorHeaderUser(){
                let colorUser = 'card-header card-header-' + this.user.color_name;
                return colorUser;
            },
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Legal Notice?',
                    text: "Are you sure you want to delete this legal Notice?",
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
                    //Envoyer la requete au server
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();
                        this.form.delete('/dashboard/legal_notice/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Legal Notice deleted successfully.</strong>', 'progress': 75});
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
            /** Ici c'est l'activation de la couleur  **/
            activeItem(id) {
                //Start Progress bar
                this.$Progress.start();
                this.form.get('/dashboard/active_legal_notice/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Legal Notice activated successfully.</strong>', 'progress': 75});
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
            },
            /** Ici c'est la desactivation de la couleur **/
            disableItem(id) {
                //Start Progress bar
                this.$Progress.start();

                this.form.get('/dashboard/disable_legal_notice/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Legal Notice desactivated successfully.</strong>', 'progress': 75});
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
            },

            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                const url = "/api/legal_notice";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.legalnotices = response.data.data;
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
