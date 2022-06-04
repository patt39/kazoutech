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
                                        <i class="material-icons">account_box</i>
                                    </div>
                                    <p class="card-category"><b>All Users</b></p>
                                    <h3 class="card-title" style="color:red;"><b>{{users.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">account_box</i><b>All Users</b>
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
                                                <b>Datatables Users Site</b>
                                            </h4>
                                            <p class="card-title">
                                                Users registered
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">account_box</i>
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
                                    <div class="toolbar">
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Profile</b></th>
                                                <th><b>Confirmed</b></th>
                                                <th><b>Deleted date</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Profile</b></th>
                                                <th><b>Confirmed</b></th>
                                                <th><b>Deleted date</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in orderByitems" :key="item.id">
                                                <td><img :src="item.avatar" :alt="item.username" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%"></td>
                                                <td>
                                                    <div class="timeline-heading">
                                                        <span v-if="item.email_verified_at === null" class="badge badge-danger"><b>No</b></span>
                                                        <span v-if="item.email_verified_at != null" class="badge badge-success"><b>Yes</b></span>
                                                    </div>
                                                </td>
                                                <td><b>{{ item.updated_at | myDate }}</b></td>
                                                <td class="td-actions text-right">
                                                    <button @click="restoreItem(item.id)"
                                                            class="btn btn-link btn-info btn-round btn-just-icon"
                                                            title="Restore user">
                                                        <i class="material-icons">restore</i>
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
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                loaded: false,
                users: {},
                user: {},
                userProfile: {},
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
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser(){
                let colorHeader = 'card-header card-header-' + this.user.color_name;
                return colorHeader;
            },
            restoreItem(id) {
                Swal.fire({
                    title: 'Restore User?',
                    text: "Are you sure you want to restore this user?",
                    type: 'warning',
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
                        axios.post('/dashboard/users_restore/' + id).then(() => {

                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>User restored successfully.</strong>', 'progress': 75});
                            }, 2000);

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('AfterSave');
                        }).catch(() => {
                            //Failled message
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
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                const url = "/api/users/trash";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.users = response.data.data;
                    this.mydatatables();
                })
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
                //End Progress bar
                this.$Progress.finish();
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
            Fire.$on('AfterSave', () => {
                this.loadItems();
            });
            this.intervalFetchData();
        },
        computed: {
            orderByitems() {
                return _.orderBy(this.users, ['created_at'], ['desc'])
            },
        },
    }

</script>

<style scoped>

</style>
