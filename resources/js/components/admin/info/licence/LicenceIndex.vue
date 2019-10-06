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
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <p class="card-category"><b>All Licences site</b>
                                    <h3 class="card-title" style="color:red;"><b>{{licencesites.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">verified_user</i><b>All licences</b>
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
                                                <b>Datatables Licences Site</b>
                                            </h4>
                                            <p class="card-title">
                                                Licence Site
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">verified_user</i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="header text-right">
                                        <button @click="reload"
                                                class="btn btn-success btn-raised btn-round button_note btn-sm"
                                                title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                    <br>
                                    <div class="card-body">
                                        <div class="toolbar">
                                            <div class="submit text-center">
                                                <router-link :to="{ name: 'licence_site.create' }" id="button_hover"
                                                             class="btn btn-success btn-raised btn-round">
                                                <span class="btn-label">
                                                    <i class="material-icons">verified_user</i>
                                                </span>
                                                    <b class="title_hover">New licence</b>
                                                </router-link>
                                            </div>
                                        </div>
                                        <div class="material-datatables">
                                            <table id="datatables"
                                                   class="table table-striped table-no-bordered table-hover"
                                                   cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th><b>Licence Site</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Edit By</b></th>
                                                    <th><b>Last Update</b></th>
                                                    <th class="disabled-sorting text-right"><b>Actions</b></th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th><b>Licence Site</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Edit By</b></th>
                                                    <th><b>Last Update</b></th>
                                                    <th class="text-right"><b>Actions</b></th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <tr v-for="item in licencesites" :key="item.id">
                                                    <td v-html="item.body.length > 30 ? item.body.substring(0,30)+ '...' : item.body"></td>
                                                    <td>
                                                        <div class="timeline-heading">
                                                            <span v-if="item.status === 1" class="badge badge-info"><b>Active</b></span>
                                                            <span v-else-if="item.status === 0"
                                                                  class="badge badge-danger"><b>Deactive</b></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)" @click="getUser(item)">
                                                            <button v-if="item.statusOnline" type="button"
                                                                    class="btn btn-success btn-round btn-just-icon btn-sm"
                                                                    title="Administrator Online"></button>
                                                            <button v-else="item.statusOnline" type="button"
                                                                    class="btn btn-danger btn-round btn-just-icon btn-sm"
                                                                    title="Administrator Offline"></button>
                                                            {{ (item.user.name.length > 15 ?
                                                            item.user.name.substring(0,15)+ "..." : item.user.name) |
                                                            upText }}
                                                        </a>
                                                    </td>
                                                    <td>{{ item.updated_at | myDate }}</td>
                                                    <td class="td-actions text-right">
                                                        <template>
                                                            <button v-if="item.status === 1"
                                                                    @click="disableItem(item.id)"
                                                                    class="btn btn-link btn-info btn-round btn-just-icon"
                                                                    title="Disable">
                                                                <i class="material-icons">check_circle</i>
                                                            </button>
                                                            <button v-else-if="item.status === 0"
                                                                    @click="activeItem(item.id)"
                                                                    class="btn btn-link btn-danger btn-round btn-just-icon"
                                                                    title="Activate">
                                                                <i class="material-icons">power_settings_new</i>
                                                            </button>
                                                        </template>
                                                        <router-link
                                                            :to="{ path: `/dashboard/licence_site/lm/${item.slug}` }"
                                                            class="btn btn-link btn-warning btn-round btn-just-icon"
                                                            title="View">
                                                            <span class="btn-label">
                                                                <i class="material-icons">visibility</i>
                                                            </span>
                                                        </router-link>
                                                        <router-link
                                                            :to="{ path: `/dashboard/licence_site/${item.id}/edit` }"
                                                            class="btn btn-link btn-success btn-round btn-just-icon"
                                                            title="Edit">
                                                            <i class="material-icons">edit</i>
                                                        </router-link>
                                                        <button @click="deleteItem(item.id)"
                                                                class="btn btn-link btn-danger btn-round btn-just-icon"
                                                                title="Delete">
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
        components: {Loaded, StatusAdmin, LoaderLdsDefault},
        data() {
            return {
                loaded: false,
                editmode: false,
                licencesites: {},
                user: {},
                form: new Form({
                    id: '',
                }),
            }
        },
        methods: {
            mydatatables() {
                $(function () {
                    $('#datatables').DataTable({
                        "pagingType": "full_numbers",
                        "lengthMenu": [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"]
                        ],
                        order: [[0, 'desc'], [3, 'asc']],
                        responsive: true,
                        stateSave: true,
                        destroy: true,
                        retrieve: true,
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
            getColorCardUser() {
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser() {
                let colorHeader = 'card-header card-header-' + this.user.color_name;
                return colorHeader;
            },
            getUser(item) {
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/p/${item.user.username}/`);
                //Progres bar
                this.$Progress.finish()
            },
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Licence Site?',
                    text: "Are you sure you want to delete this Licence site?",
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
                        this.form.delete('/dashboard/licence_site/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function () {
                                notify.update({
                                    'type': 'success',
                                    'message': '<strong>Licence Site deleted successfully.</strong>',
                                    'progress': 75
                                });
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
                this.form.get('/dashboard/active_licence_site/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Licence activated Successfully.</strong>', {
                        allow_dismiss: false,
                        type: 'info',
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        },
                        animate: {
                            enter: "animated fadeInUp",
                            exit: "animated fadeOutDown"
                        },
                    });
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

                this.form.get('/dashboard/disable_licence_site/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Licence site desactivated Successfully.</strong>', {
                        allow_dismiss: false,
                        type: 'primary',
                        placement: {
                            from: 'bottom',
                            align: 'center'
                        },
                        animate: {
                            enter: "animated fadeInUp",
                            exit: "animated fadeOutDown"
                        },
                    });
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
                const url = "/api/licence_site";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.licencesites = response.data.data;
                    this.mydatatables();
                });
                axios.get("/api/account/user").then(response => {
                    this.user = response.data.data
                });
                //End Progress bar
                this.$Progress.finish();
            },
            reload() {
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
