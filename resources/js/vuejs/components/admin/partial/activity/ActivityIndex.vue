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
                    <div class="row">
                        <div class="col-md-12 expo">
                            <div class="card card-stats">
                                <div :class="getColorCardUser()">
                                    <div class="card-icon">
                                        <i class="material-icons">keyboard_capslock</i>
                                    </div>
                                    <p class="card-category"><b>All Activities Logs</b></p>
                                    <h3 class="card-title" style="color:red;"><b>{{activities.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">keyboard_capslock</i><b>All Activities Logs</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 expo">
                            <div class="card">
                                <div :class="getColorHeaderUser()">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="card-title">
                                                <b>Datatables Activities Logs</b>
                                            </h4>
                                            <p class="card-title">
                                                Administrators Logs
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">keyboard_capslock</i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                    </div>
                                    <br>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Activity Route</b></th>
                                                <th><b>Description</b></th>
                                                <th><b>ID Activity</b></th>
                                                <th><b>Modify By</b></th>
                                                <th><b>Date Creation</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Activity Route</b></th>
                                                <th><b>Description</b></th>
                                                <th><b>ID Activity</b></th>
                                                <th><b>Modify By</b></th>
                                                <th><b>Date Creation</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in activities" :key="item.id">
                                                <td>{{ item.subject_type }}</td>
                                                <td>{{ item.description }}</td>
                                                <td>{{ item.subject_id }}</td>
                                                <td v-if="item.causer_id !== null">{{ (item.user.name.length > 30 ?
                                                    item.user.name.substring(0,30)+ "..." : item.user.name) | upText }}
                                                </td>
                                                <td v-else="item.causer_id === null"><b>User don't exist</b></td>
                                                <td><b>{{ item.created_at | dateCalendar }}</b></td>
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
                user: {},
                activities: {},
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
        },
        created() {
            axios.get("/api/account/user").then(response => {
                this.user = response.data.data
            });
        },
        beforeRouteEnter (to, from, next) {

            try {

                let url = "/dashboard/api/activities";
               axios.get(url).then(response => {
                       next(vm => {
                           vm.$Progress.start();
                           vm.activities = response.data.data;
                           vm.mydatatables();
                           vm.$Progress.finish()
                       })
                   });
            }catch (err) {

                next(false)
            }

        },
    }
</script>

<style scoped>

</style>
