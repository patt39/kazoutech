<template>
    <div>
        <vue-progress-bar/>
        <div class="main-panel" id="javascriptComponents">
            <TopNav/>
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
                                        <i class="material-icons">people</i>
                                    </div>
                                    <p class="card-category">Followers <b v-text="user.name"></b>
                                    <h3 class="card-title" style="color:red;"><b>{{followers.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">people</i>Followers <b v-text="user.name"></b>
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
                                                Followers <b v-text="user.name"></b>
                                            </h4>
                                        </div>
                                        <div class="col-md-6 text-right">
                                <span>
                                    <i id="tooltipSize" class="material-icons">people</i>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <br>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Profile</b></th>
                                                <th><b>Name</b></th>
                                                <th><b>Username</b></th>
                                                <th><b>Followers</b></th>
                                                <th><b>Followings</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Profile</b></th>
                                                <th><b>Name</b></th>
                                                <th><b>Username</b></th>
                                                <th><b>Followers</b></th>
                                                <th><b>Followings</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in followers" :key="item.id">
                                                <td><img :src="item.avatar" :alt="item.username" style="width: 40px; height: 40px;  top: 15px; left: 15px; border-radius: 50%"></td>
                                                <td>{{ (item.name.length > 15 ? item.name.substring(0,15)+ "..." : item.name) | upText }}</td>
                                                <td>{{ (item.username.length > 15 ? item.username.substring(0,15)+ "..." : item.username) }}</td>
                                                <td>
                                                    <router-link  :to="{ path: `/dashboard/users/p/${item.username}/followers/` }">
                                                        <h6 class="card-title">{{item.followers}}</h6>
                                                    </router-link>
                                                </td>
                                                <td>
                                                    <router-link  :to="{ path: `/dashboard/users/p/${item.username}/followings/` }">
                                                        <h6 class="card-title">{{item.followings}}</h6>
                                                    </router-link>
                                                </td>
                                                <td class="td-actions text-right">
                                                    <router-link  :to="{ path: `/dashboard/users/p/${item.username}/` }" class="btn btn-link btn-warning btn-round btn-just-icon" title="View">
                                                        <i class="material-icons">visibility</i>
                                                    </router-link>
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
            <FooterAdmin/>
        </div>
    </div>
</template>

<script>
    import api from '../../../api/mixins/collections';
    import TopNav from "../../inc/admin/TopNav";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin, FooterAdmin, TopNav},
        data() {
            return {
                loaded: false,
                followers:{},
                user:{},
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
                        order: [[ 0, 'desc' ], [ 3, 'asc' ]],
                        responsive: true,
                        stateSave: true,
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
            /* End script */
            loadItems(){
                //Start Progress bar
                this.$Progress.start();
                api.followerUsername(this.$route.params.username).then(response => {
                    this.loaded = true;
                    this.followers = response.data.data;
                    this.mydatatables();
                    //End Progress bar
                    this.$Progress.finish();
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
                //End Progress bar
                this.$Progress.finish();
            },
            intervalFetchData: function () {
                setInterval(() => {
                    this.loadItems();
                }, 120000);
            },
        },
        created() {
            this.loadItems();
            Fire.$on('AfterCreate', () => {
                this.loadItems();
            });
            this.intervalFetchData();
        }
    }
</script>

<style scoped>

</style>
