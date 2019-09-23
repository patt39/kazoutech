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
                                    <p class="card-category"><b>All Audits site</b>
                                    <h3 class="card-title" style="color:red;"><b>{{audits.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">keyboard_capslock</i><b>All Audits site</b>
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
                                                <b>Datatables Audits Site</b>
                                            </h4>
                                            <p class="card-title">
                                                Audits Site
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
                                                <th><b>Event</b></th>
                                                <th><b>Auditable</b></th>
                                                <th><b>Old Values</b></th>
                                                <th><b>New Values</b></th>
                                                <th><b>Date Creation</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Event</b></th>
                                                <th><b>Auditable</b></th>
                                                <th><b>Old Values</b></th>
                                                <th><b>New Values</b></th>
                                                <th><b>Date Creation</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in audits" :key="item.id">
                                                <td>{{ item.event }}</td>
                                                <td>{{ item.auditable_type }}</td>
                                                <td>{{ item.old_values }}</td>
                                                <td v-if="item.user_id !== null">{{ (item.user.name.length > 30 ?
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
    export default {
        data() {
            return {
                loaded: false,
                editmode: false,
                user: {},
                audits: {},
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
                let url = "/api/audits";
                axios.get(url).then(response => {
                    next(vm => {
                        vm.$Progress.start();
                        vm.audits = response.data.data;
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
