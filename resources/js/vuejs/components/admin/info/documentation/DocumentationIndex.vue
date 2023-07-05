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
                                        <i class="material-icons">assignment_ind</i>
                                    </div>
                                    <p class="card-category"><b>All Documentations</b></p>
                                    <h3 class="card-title" style="color:red;"><b>{{documentations.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">assignment_ind</i><b>All Documentations</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <errored-loading v-if="errored"/>
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
                                                <b>Datatables Documentations</b>
                                            </h4>
                                            <p class="card-title">
                                                Documentation Choice For Buttons
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">assignment_ind</i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="header text-right">
                                        <button @click="reload" class="btn btn-success btn-raised btn-round button_note btn-sm"
                                                title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                    <div v-if="$auth.can('create-documentation')" class="toolbar">
                                        <div class="submit text-center">
                                            <router-link :to="{ name: 'documentations.create' }" id="button_hover"
                                                class="btn btn-success btn-raised btn-round">
                                                <span class="btn-label">
                                                    <i class="material-icons">assignment_ind</i>
                                                </span>
                                                    <b class="title_hover">New Documentation</b>
                                                </router-link>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Doc Name</b></th>
                                                <th><b>File</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="disabled-sorting text-right"><b v-if="($auth.can('publish-documentation') || $auth.can('edit-documentation') || $auth.can('delete-documentation'))">Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Doc Name</b></th>
                                                <th><b>File</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="text-right"><b v-if="($auth.can('publish-documentation') || $auth.can('edit-documentation') || $auth.can('delete-documentation'))">Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in orderByItems" :key="item.id">
                                                <td style="font-weight: bold;">{{ item.name | upText }}</td>
                                                <td>{{ item.name_doc }}</td>
                                                <td><b>{{ item.updated_at | dateCalendar }}</b></td>
                                                <td class="td-actions text-right">
                                                    <a :href="`/dashboard/documentations/${item.id}/downloaddocumentation/`"
                                                       class="btn btn-link  btn-info btn-round btn-just-icon" title="Download file">
                                                        <i class="material-icons">get_app</i>
                                                    </a>
                                                    <a :href="`/dashboard/documentations/${item.id}/edit/`"
                                                       class="btn btn-link  btn-success btn-round btn-just-icon" title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <button v-if="$auth.can('delete-documentation')" @click="deleteItem(item.id)"
                                                            class="btn btn-link btn-danger btn-round btn-just-icon" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Modal création/édition color -->
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
                errored: false,
                editmode: false,
                user: {},
                documentations: {},
                form: new Form({
                    id: '',
                    name: '',
                    slug: ''
                })
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
                location.replace(`/dashboard/users/p/${item.user.username}/`);
                //Progres bar
                this.$Progress.finish()
            },
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Documentation?',
                    text: "Are you sure you want to delete this documentation?",
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

                        //Envoyer la requete au server
                        axios.delete('/dashboard/documentations/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            //var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            //    allow_dismiss: false,
                            //    showProgressbar: true
                            //});
                            //setTimeout(function() {
                            //    notify.update({'type': 'success', 'message': '<strong>Documentations deleted successfully.</strong>', 'progress': 75});
                            //}, 2000);
                            $.notify({
                                icon: "add_alert",
                                message: "<strong>Documentations deleted successfully.</strong>."

                            }, {
                                type: 'success',
                                timer: 3000,
                            });
                            /* End alert ***/

                            //End Progress bar
                            this.$Progress.finish();
                            Fire.$emit('AfterCreate');

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
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                const url = "/api/documentations";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.documentations = response.data.data;
                    this.mydatatables();
                    //End Progress bar
                    this.$Progress.finish();
                }).catch(error => {
                    console.log(error);
                    this.errored = true
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
            },
            reload(){
                this.loadItems()
            },
            intervalFetchData: function () {
                setInterval(() => {
                    this.loadItems();
                }, 120000);
            },
        },
        created() {
            this.loadItems();
            Fire.$on('ItemGetter', () => {
                this.loadItems();
            });
        },
        //get order bay
        computed: {
            orderByItems() {
                return _.orderBy(this.documentations, ['name'], ['asc'])
            },
        },
    }

</script>

<style scoped>

</style>
