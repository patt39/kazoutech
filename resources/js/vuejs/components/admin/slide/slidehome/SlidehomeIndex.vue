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
                                        <i class="material-icons">slideshow</i>
                                    </div>
                                    <p class="card-category"><b>All Slide Home page</b></p>
                                    <h3 class="card-title" style="color:red;"><b>{{slidehomes.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">slideshow</i><b>All Slide Home page</b>
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
                                                <b>Datatables Members</b>
                                            </h4>
                                            <p class="card-title">
                                                Platform Creators
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">slideshow</i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="header text-right">
                                        <button @click="reload"
                                                class="btn btn-success btn-raised button_note btn-sm"
                                                title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                    <div v-if="$auth.can('slide_image')" class="toolbar">
                                        <div class="submit text-center">
                                            <router-link :to="{ name: 'slidehomes.create' }" id="button_hover"
                                                         class="btn btn-success btn-raised ">
                                               <span class="btn-label">
                                                   <i class="material-icons">slideshow</i>
                                               </span>
                                                <b class="title_hover">New Image slide home</b>
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Image</b></th>
                                                <th><b>Title</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Edit By</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Image</b></th>
                                                <th><b>Title</b></th>
                                                <th><b>Status</b></th>
                                                <th><b>Edit By</b></th>
                                                <th><b>Last Update</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in slidehomes" :key="item.id">
                                                <td><img :src="item.photo" style="height: 50px; width: 80px;border-radius: 5px"></td>
                                                <td v-if="item.title !== null">{{ (item.title.length > 15 ? item.title.substring(0,15)+
                                                    "..." : item.title) | upText }}</td>
                                                <td v-else>...</td>
                                                <td>
                                                    <div class="timeline-heading">
                                                        <span v-if="item.status" class="badge badge-info"><b>Active</b></span>
                                                        <span v-else-if="!item.status"
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
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+
                                                        "..." : item.user.name) | upText }}
                                                    </a>
                                                </td>
                                                <td><b>{{ item.updated_at | myDate }}</b></td>
                                                <td class="td-actions text-right">
                                                    <button type="button" class="togglebutton btn btn-link btn-sm btn-sm">
                                                        <label>
                                                            <input type="checkbox" name="status" v-model="item.status"
                                                                   @change="changeStatus(item)"/>
                                                            <span class="toggle"></span>
                                                        </label>
                                                    </button>
                                                    <router-link v-if="$auth.can('slide_image')"
                                                                 :to="{ path: `/dashboard/slidehomes/${item.id}/edit` }"
                                                                 class="btn btn-link  btn-success btn-round btn-just-icon"
                                                                 title="Edit">
                                                        <i class="material-icons">edit</i>
                                                    </router-link>

                                                    <button v-if="$auth.can('slide_image')"
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
            <footer-admin></footer-admin>
        </div>

    </div>
</template>

<script>
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";

    export default {
        props: {
            checked: Boolean
        },
        components: {
            LoaderLdsDefault,
            StatusAdmin,
        },
        data() {
            return {
                loaded: false,
                editmode: false,
                slidehomes: {},
                user: {},
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
                            searchPlaceholder: "Search Record",
                        },
                        "sPaginationType": "full_numbers",

                    });
                });
            },
            getColorCardUser() {
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser() {
                return 'card-header card-header-' + this.user.color_name;
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
                    title: 'Delete Slide image ?',
                    text: "Are you sure you want to delete this slide ?",
                    type: 'warning',
                    animation: false,
                    customClass: 'animated shake',
                    buttonsStyling: false,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel',
                    showCancelButton: true,
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();
                        //Envoyer la requete au server
                        axios.delete("/dashboard/slidehomes/" + id).then(() => {

                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true,
                                animate: {
                                    enter: 'animated bounceInDown',
                                    exit: 'animated bounceOutUp'
                                },
                            });
                            setTimeout(function () {
                                notify.update({
                                    'type': 'success',
                                    'message': '<strong>Image slide home deleted Successfully.</strong>',
                                    'progress': 75
                                });
                            }, 2000);
                            /** End alert ***/

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('ItemGetter');
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
                    }
                })
            },

            /** Ici c'est l'activation de la data  **/
            changeStatus(item){
                //Start Progress bar
                this.$Progress.start();
                axios.get(`/dashboard/change_status_slidehomes/${item.id}`, {
                    status: item.status,
                }).then(res => {

                    $.notify('<strong>Data updated Successfully.</strong>', {
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
                let vm = this;
                //Start Progress bar
                vm.$Progress.start();
                axios.get("/api/slidehomes").then(response => {
                    vm.loaded = true;
                    vm.slidehomes = response.data;
                    vm.mydatatables();
                    //End Progress bar
                    vm.$Progress.finish();
                });
                axios.get("/api/account/user").then(response => {
                    vm.user = response.data.data
                });

            },
            reload() {
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
