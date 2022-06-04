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
                                        <i class="material-icons">assignment</i>
                                    </div>
                                    <p class="card-category"><b>All Occupations</b></p>
                                    <h3 class="card-title" style="color:red;"><b>{{occupations.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">assignment</i><b>All occupations</b>
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
                                                <b>Datatables Occupations</b>
                                            </h4>
                                            <p class="card-title">
                                                Occupations choice for buttons
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">color_lens</i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="header text-right">
                                        <button @click="reload" class="btn btn-success btn-raised button_note btn-sm"
                                                title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                    <br>
                                    <div v-if="$auth.can('create-occupation')" class="toolbar">
                                        <div class="submit text-center">
                                            <router-link :to="{ name: 'occupations.create' }" class="btn btn-success btn-raised " >
                                                <span class="btn-label">
                                                    <i class="material-icons">assignment</i>
                                                </span>
                                                <b class="title_hover">New Occupations</b>
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Image</b></th>
                                                <th><b>Name occupations</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Technicians</b></th>
                                                <th class="disabled-sorting text-right"><b v-if="($auth.can('publish-occupation') || $auth.can('edit-occupation') || $auth.can('delete-occupation'))">Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Image</b></th>
                                                <th><b>Name occupations</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Technicians</b></th>
                                                <th class="text-right"><b v-if="($auth.can('publish-occupation') || $auth.can('edit-occupation') || $auth.can('delete-occupation'))">Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in occupations" :key="item.id">
                                                <td><img :src="item.photo" style="height: 50px; width: 80px;border-radius: 5px"></td>
                                                <td>
                                                    <router-link  :to="{ path: `/dashboard/occupations/v/${item.slug}/` }">
                                                        <b>{{ (item.name.length > 15 ? item.name.substring(0,15)+ "..." : item.name) | upText }}</b>
                                                    </router-link>
                                                </td>
                                                <td>
                                                    <div class="timeline-heading">
                                                        <span v-if="item.status" class="badge badge-info"><b>Active</b></span>
                                                        <span v-else-if="!item.status"  class="badge badge-danger"><b>Disactive</b></span>
                                                    </div>
                                                </td>
                                                <td><b v-html="item.technician_count"/></td>
                                                <td class="td-actions text-right">
                                                    <template v-if="$auth.can('publish-occupation')">
                                                        <button  v-if="item.status === 1" @click="disableItem(item.id)" class="btn btn-link btn-info btn-round btn-just-icon " title="Disable">
                                                            <i class="material-icons">check_circle</i>
                                                        </button>
                                                        <button  v-else-if="item.status === 0" @click="activeItem(item.id)" class="btn btn-link btn-danger btn-round btn-just-icon " title="Activate">
                                                            <i class="material-icons">power_settings_new</i>
                                                        </button>
                                                    </template>
                                                    <router-link :to="{ name: 'occupations.edit', params: { id: item.id  } }" v-if="$auth.can('edit-occupation')"
                                                                 class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>
                                                    <button v-if="$auth.can('delete-occupation')" @click="deleteItem(item.id)"
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
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                loaded: false,
                user: {},
                occupations: {},
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
                        order: [[ 0, 'asc' ], [ 3, 'desc' ]],
                        responsive: true,
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
            getColor(item){
                let colorStyle = 'badge badge-' + item.color_name;
                return colorStyle;
            },
            getUser(item){
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/profile/${item.user.username}`);
                //Progres bar
                this.$Progress.finish()
            },
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Occupations?',
                    text: "Are you sure you want to delete this occupations?",
                    type: 'warning',
                    animation: false,
                    customClass: 'animated pulse',
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
                        //Envoyer la requete au server
                        let url = route('occupations.destroy',id);
                        dyaxios.delete(url).then(() => {
                            Fire.$emit('LoadItems');
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Occupations deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            /* End alert ***/
                            //End Progress bar
                            this.$Progress.finish();
                        }).catch(() => {
                            this.$Progress.fail();
                            //Alert error
                            $.notify("Ooops! Something wrong. Try later", {
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
                //Progress bar star
                this.$Progress.start();
                axios.get('/dashboard/active_occupations/' + id).then(() => {
                    Fire.$emit('LoadItems');
                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Occupations activated Successfully.</strong>', {
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
                }).catch(() => {
                    //Alert error
                    $.notify("Ooops! Something wrong. Try later", {
                        type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
                })
            },
            /** Ici c'est la désactivation de la couleur **/
            disableItem(id) {
                //Start Progress bar
                this.$Progress.start();
                axios.get('/dashboard/disable_occupations/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Occupations disactivated Successfully.</strong>', {
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
                    /** End alert **/

                    //End Progres bar
                    this.$Progress.finish();

                    Fire.$emit('LoadItems');
                }).catch(() => {
                    //Alert error
                    $.notify("Ooops! Something wrong. Try later", {
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
                let url = "/api/occupations";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.occupations = response.data.data;
                    this.mydatatables()
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
                //End Progress bar
                this.$Progress.finish();

            },
            reload(){
                this.loadItems()
            },
            //intervalFetchData: function () {
            //    setInterval(() => {
            //        this.loadItems();
            //    }, 120000);
            //},
        },
        created() {
            this.loadItems();
            Fire.$on('LoadItems', () => {
                this.loadItems();
            });
            // Run the intervalFetchData function once to set the interval time for later refresh
            //this.intervalFetchData();
        }
    }

</script>

<style scoped>

</style>
