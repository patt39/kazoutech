<template>
    <div>
        <vue-progress-bar/>
        <div class="main-panel">
            <top-nav/>
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
                                        <i class="material-icons">all_out</i>
                                    </div>
                                    <p class="card-category"><b>All Announces</b>
                                    <h3 class="card-title" style="color:red;"><b>{{annonces.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">all_out</i><b>All announces</b>
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
                                                <b>Datatables announces</b>
                                            </h4>
                                            <p class="card-title">
                                                 Announces
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">all_out</i>
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
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Title</b></th>
                                                <th><b>Occupation</b></th>
                                                <th><b>City</b></th>
                                                <th><b>Edited By</b></th>
                                                <th><b>Annonces</b></th>
                                                <th class="disabled-sorting text-right"><b v-if="($auth.can('publish-occupation') || $auth.can('edit-occupation') || $auth.can('delet-occupation'))">Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Title</b></th>
                                                <th><b>Occupation</b></th>
                                                <th><b>City</b></th>
                                                <th><b>Edited By</b></th>
                                                <th><b>Annonce</b></th>
                                                <th class="text-right"><b v-if="($auth.can('publish-occupation') || $auth.can('edit-occupation') || $auth.can('delete-occupation'))">Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in annonces" :key="item.id">
                                                <td><b>{{ (item.title.length > 15 ? item.occupation.name.substring(0,15)+ "..." : item.title) | upText }}</b></td>
                                                <td>
                                                    <router-link  :to="{ path: `/dashboard/occupations/${item.occupation.slug}` }">
                                                        <b>{{ (item.occupation.name.length > 15 ? item.occupation.name.substring(0,15)+ "..." : item.occupation.name) | upText }}</b>
                                                    </router-link>
                                                </td>
                                                <td>
                                                    <router-link  :to="{ path: `/dashboard/annonces/${item.city.slug}` }">
                                                        <b>{{ (item.city.name.length > 15 ? item.city.name.substring(0,15)+ "..." : item.city.name) | upText }}</b>
                                                    </router-link>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" @click="getUser(item)">
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"/>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"/>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </a>
                                                </td>
                                               <td><b v-html="item.annonce_count"/></td>
                                                <td class="td-actions text-right">
                                                    <button v-if="$auth.can('edit-occupation')" type="button" class="togglebutton btn btn-link btn-sm btn-sm">
                                                        <label>
                                                            <input type="checkbox" name="status" v-model="item.status"
                                                                   @change="changeStatus(item)"/>
                                                            <span class="toggle"/>
                                                        </label>
                                                    </button>
                                                    <button  @click="viewItem(item)" class="btn btn-link btn-warning btn-round btn-just-icon" title="View">
                                                        <i class="material-icons">visibility</i>
                                                    </button>
                                                    <router-link :to="{ name: 'assignedtask' }" class="restore-lk btn btn-primary btn-just-icon btn-sm" title="Assigne task">
                                                    <span class="btn-label">
                                                        <i class="material-icons">reply</i>
                                                    </span>
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
                                     <!-- Modal view annonces -->
                                    <div class="modal fade" id="viewNew" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewLabel"><b>View announce</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input v-model="annonce.title" type="text" name="title" class="form-control"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Category</label>
                                                                <input v-model="annonce.occupation.name" type="text" name="name" maxlength="25" class="form-control"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Description</label>
                                                                <input v-model="annonce.description" type="text" name="description" class="form-control"/>
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
                </div>
            </div>
         <footer-admin/>
        </div>
    </div>
</template>
<script>
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                loaded: false,
                user: {},
                annonces: {},
                annonce: {
                     title: '',
                     occupation: '',
                     description: '',
                },
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
                return 'badge badge-' + item.color_name;
            },
            getUser(item){
                //Progress bar star
                this.$Progress.start();
                location.replace(`/dashboard/users/profile/${item.user.username}`);
                //Progres bar
                this.$Progress.finish()
            },
            viewItem (item) {
                //Masquer le modal après la création
                $("#viewNew").modal("show");
                //On passe les informations
                this.annonce = item;
            },
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Announce?',
                    text: "Are you sure you want to delete this announce?",
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
                        let url = route('annonces.destroy',id);
                        dyaxios.delete(url).then(() => {
                            Fire.$emit('ItemGetter');
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Announce deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            /* End alert ***/
                            //End Progress bar
                            this.$Progress.finish();
                        }).catch(() => {
                            this.$Progress.fail();
                            //Alert error
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
            /** Ici c'est pour changer le status **/
            changeStatus(item){
                //Start Progress bar
                this.$Progress.start();
                dyaxios.get(route('status_annonce',item.id), {
                    status: item.status,
                }).then(res => {

                    $.notify('<strong>Annonce updated Successfully.</strong>', {
                        allow_dismiss: false,
                        type: 'info',
                        placement: {
                            from: 'bottom',
                            align: 'right'
                        },
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        },
                    });

                    Fire.$emit('ItemGetter');
                    //End Progress bar
                    this.$Progress.finish();
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    //Alert error
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
                axios.get(route('annonces_dashboard.api')).then(response => {
                    this.loaded = true;
                    this.annonces = response.data;
                    this.mydatatables()
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
                //End Progress bar
                this.$Progress.finish();

            },
            reload(){
                this.loadItems()
            },
        },
        created() {
            this.loadItems();
            Fire.$on('ItemGetter', () => {
                this.loadItems();
            });
        }
    }
</script>

<style scoped>

</style>
