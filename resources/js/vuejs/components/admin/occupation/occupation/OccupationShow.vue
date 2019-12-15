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
                                    <p class="card-category"><b v-text="occupation.name"/></p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">assignment</i><b v-text="occupation.name"/>
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
                                                <b v-text="occupation.name"/>
                                            </h4>
                                            <p class="card-title" v-text="occupation.name"/>
                                        </div>
                                        <div class="col-md-6 text-right">
                                        <span>
                                            <i id="tooltipSize" class="material-icons">color_lens</i>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="card-body">
                                    <div class="header text-left">
                                        <router-link :to="{ name: 'occupations.index' }" class="btn btn-primary btn-sm btn-raised " >
                                                     <span class="btn-label">
                                                        <i class="material-icons">chevron_left</i>
                                                    </span>
                                            <b class="title_hover">Back</b>
                                        </router-link>
                                    </div>
                                    <br>
                                    <div v-if="$auth.can('create-occupation')" class="toolbar">
                                        <div class="submit text-center">
                                            <router-link :to="{ name: 'occupations.show_dashboard_create', params: { occupation: occupation.slug  } }" class="btn btn-success btn-raised " >
                                                     <span class="btn-label">
                                                        <i class="material-icons">assignment</i>
                                                    </span>
                                                <b class="title_hover">New Category Occupations for {{occupation.name}}</b>
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Image</b></th>
                                                <th><b>Name Category</b></th>
                                                <th><b>Occupation</b></th>
                                                <th><b>Status</b></th>
                                                <th class="disabled-sorting text-right"><b v-if="($auth.can('publish-occupation') || $auth.can('edit-occupation') || $auth.can('delete-occupation'))">Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Image</b></th>
                                                <th><b>Name Category</b></th>
                                                <th><b>Occupation</b></th>
                                                <th><b>Status</b></th>
                                                <th class="text-right"><b v-if="($auth.can('publish-occupation') || $auth.can('edit-occupation') || $auth.can('delete-occupation'))">Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in occupation.categoryoccupations" :key="item.id">
                                                <td><img :src="item.photo" style="height: 50px; width: 80px;border-radius: 5px"></td>
                                                <td><b>{{item.name}}</b></td>
                                                <td>
                                                    <router-link  :to="{ path: `/dashboard/occupations/` }">
                                                        <b>{{ (item.occupation.name.length > 15 ? item.occupation.name.substring(0,15)+ "..." : item.occupation.name) | upText }}</b>
                                                    </router-link>
                                                </td>
                                                <td>
                                                    <div class="timeline-heading">
                                                        <span v-if="item.status" class="badge badge-info"><b>Active</b></span>
                                                        <span v-else-if="!item.status"  class="badge badge-danger"><b>Deactive</b></span>
                                                    </div>
                                                </td>
                                                <td class="td-actions text-right">
                                                    <button v-if="$auth.can('edit-occupation')" type="button" class="togglebutton btn btn-link btn-sm btn-sm">
                                                        <label>
                                                            <input type="checkbox" name="status" v-model="item.status"
                                                                   @change="changeStatus(item)"/>
                                                            <span class="toggle"/>
                                                        </label>
                                                    </button>
                                                    <router-link :to="{ name: 'categoryoccupations.edit', params: { id: item.id  } }" v-if="$auth.can('edit-occupation')"
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
                occupation: {
                    categoryoccupations: {
                        occupation:'',
                    }
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
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Category Occupation?',
                    text: "Are you sure you want to delete this category occupation?",
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
                        let url = route('categoryoccupations.destroy',id);
                        dyaxios.delete(url).then(() => {
                            Fire.$emit('ItemGetter');
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Category deleted successfully.</strong>', 'progress': 75});
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
                dyaxios.get(route('status_categoryoccupations',item.id), {
                    status: item.status,
                }).then(res => {

                    $.notify('<strong>Category updated Successfully.</strong>', {
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
                dyaxios.get(route('occupations.apioccupationbyslug',this.$route.params.occupation)).then(response => {
                    this.loaded = true;
                    this.occupation = response.data;
                    this.mydatatables()
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
                //End Progress bar
                this.$Progress.finish();

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
