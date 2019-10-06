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
                                        <i class="material-icons">indeterminate_check_box</i>
                                    </div>
                                    <p class="card-category"><b>All Terms & Conditions</b>
                                    <h3 class="card-title" style="color:red;"><b>{{conditions.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">indeterminate_check_box</i><b>All Terms &
                                        Conditions</b>
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
                                                <b>Datatables Utilisations Conditions</b>
                                            </h4>
                                            <p class="card-title">
                                                Texts To Be Accepted
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">indeterminate_check_box</i>
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
                                        <div v-if="$auth.can('create-condition_utilisation')" class="toolbar">
                                            <div class="submit text-center">
                                                <router-link :to="{ name: 'conditions.create' }" id="button_hover"
                                                             class="btn btn-success btn-raised btn-round ">
                                               <span class="btn-label">
                                                    <i class="material-icons">indeterminate_check_box</i>
                                                </span>
                                                    <b class="title_hover">New Condition</b>
                                                </router-link>
                                            </div>
                                        </div>
                                        <div class="material-datatables">
                                            <table id="datatables"
                                                   class="table table-striped table-no-bordered table-hover"
                                                   cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th><b>Image</b></th>
                                                    <th><b>Title Condition</b></th>
                                                    <th><b>Text Condition</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Edit By</b></th>
                                                    <th class="disabled-sorting text-right"><b>Actions</b></th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th><b>Image</b></th>
                                                    <th><b>Title Condition</b></th>
                                                    <th><b>Text Condition</b></th>
                                                    <th><b>Status</b></th>
                                                    <th><b>Edit By</b></th>
                                                    <th class="text-right"><b>Actions</b></th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <tr v-for="item in conditions" :key="item.id">
                                                    <td><img :src="item.photo"
                                                             style="height: 50px; width: 80px;border-radius: 10px"></td>
                                                    <td>{{ (item.title.length > 20 ? item.title.substring(0,20)+ "..." :
                                                        item.title) | upText }}
                                                    </td>
                                                    <td v-html="(item.body.length > 20 ? item.body.substring(0,20)+ '...' : item.body)"></td>
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
                                                    <td class="td-actions text-right">
                                                        <template v-if="$auth.can('publish-condition_utilisation')">
                                                            <button v-if="item.status === 1"
                                                                    @click="disableItem(item.id)"
                                                                    class="btn btn-link btn-info btn-round btn-just-icon "
                                                                    title="Disable">
                                                                <i class="material-icons">check_circle</i>
                                                            </button>
                                                            <button v-else-if="item.status === 0"
                                                                    @click="activeItem(item.id)"
                                                                    class="btn btn-link btn-danger btn-round btn-just-icon "
                                                                    title="Activate">
                                                                <i class="material-icons">power_settings_new</i>
                                                            </button>
                                                        </template>
                                                        <router-link
                                                            :to="{ path: `/dashboard/conditions/lm/${item.slug}` }"
                                                            class="btn btn-link  btn-warning btn-round btn-just-icon"
                                                            title="View">
                                                            <i class="material-icons">visibility</i>
                                                        </router-link>
                                                        <router-link v-if="$auth.can('edit-condition_utilisation')"
                                                                     :to="{ path: `/dashboard/conditions/${item.id}/edit` }"
                                                                     class="btn btn-link  btn-success btn-round btn-just-icon"
                                                                     title="Edit">
                                                            <i class="material-icons">edit</i>
                                                        </router-link>
                                                        <button v-if="$auth.can('delete-condition_utilisation')"
                                                                @click="deleteItem(item.id)"
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
    import TopNav from "../../../inc/admin/TopNav";
    import FooterAdmin from "../../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import Loaded from "../../../inc/animation/Loaded";
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";

    export default {
        components: {Loaded, StatusAdmin, LoaderLdsDefault},
        data() {
            return {
                loaded: false,
                user: '',
                termsconditions: {},
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
                    title: 'Delete Term & Condition ?',
                    text: "Are you sure you want to delete this term & condition?",
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
                    //Envoyer la requet au server
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();
                        axios.delete('/dashboard/conditions/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function () {
                                notify.update({
                                    'type': 'success',
                                    'message': '<strong>Term & Condition deleted successfully.</strong>',
                                    'progress': 75
                                });
                            }, 2000);
                            /* End alert ***/

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('ItemGetter');
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
            /* ici c'est l'activation de la couleur  **/
            activeItem(id) {
                //Start Progress bar
                this.$Progress.start();
                axios.get('/dashboard/active_condition/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Term & Condition activated Successfully.</strong>', {
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
                    /** End alert **/

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit('ItemGetter');
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
            /* Ici c'est la desactivation de la couleur **/
            disableItem(id) {
                //Start Progress bar
                this.$Progress.start();

                axios.get('/dashboard/unactive_condition/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Term & Condition desactivated Successfully.</strong>', {
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

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit('ItemGetter');
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
                const url = "/api/conditions";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.conditions = response.data.data;
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
            Fire.$on('ItemGetter', () => {
                this.loadItems();
            });
        }
    }
</script>

<style scoped>

</style>
