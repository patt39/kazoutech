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
                                        <i class="material-icons">email</i>
                                    </div>
                                    <p class="card-category"><b>All Emails Subscribers</b></p>
                                    <h3 class="card-title" style="color:red;"><b>{{subscribers.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">email</i><b>All Emails Subscribers</b>
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
                                                <b>Datatables Subscribers</b>
                                            </h4>
                                            <p class="card-title">
                                                Subscribers
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">email</i>
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
                                                <th><b>Emails</b></th>
                                                <th><b>Ips</b></th>
                                                <th><b>Date Creation</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Emails</b></th>
                                                <th><b>Ips</b></th>
                                                <th><b>Date Creation</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in subscribers" :key="item.id">
                                                <td>{{ item.email }}</td>
                                                <td>{{ item.ip }}</td>
                                                <td><b>{{ item.created_at | dateCalendar }}</b></td>
                                                <td class="td-actions text-right">
                                                    <a :href="`mailto:${item.email}`" class="btn  btn-dribbble btn-round btn-just-icon btn-sm" title="reply">
                                                            <i class="material-icons">reply</i>
                                                    </a>
                                                    <button @click="deleteItem(item.id)"
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
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";

    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                user: {},
                subscribers: {},
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
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Subscriber?',
                    text: "Are you sure you want to delete this Subscriber?",
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
                        axios.delete('/dashboard/subscribers/' + id).then(() => {
                            // /** Alert notify bootstrapp **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Subscriber deleted successfully.</strong>', 'progress': 75});
                        }, 2000);
                        /** End alert **/

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
        },

        created() {
            axios.get("/api/account/user").then(response => {
                this.user = response.data.data
            });
        },

       
        beforeRouteEnter (to, from, next) {

            try {
                axios.get("/api/subscribers").then(response => {
                    next(vm => {
                        vm.$Progress.start();
                        vm.subscribers = response.data.data;
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
