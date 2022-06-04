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
                                        <i class="material-icons">color_lens</i>
                                    </div>
                                    <p class="card-category"><b>All Colors</b></p>
                                    <h3 class="card-title" style="color:red;"><b>{{colors.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">color_lens</i><b>All Colors</b>
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
                                                <b>Datatables Colors</b>
                                            </h4>
                                            <p class="card-title">
                                                Color Choice For Buttons
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <span>
                                                <i id="tooltipSize" class="material-icons">color_lens</i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Event</b></th>
                                                <th><b>Old data</b></th>
                                                <th><b>New data</b></th>
                                                <th><b>By</b></th>
                                                <th><b>Created date</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Event</b></th>
                                                <th><b>Old data</b></th>
                                                <th><b>New data</b></th>
                                                <th><b>By</b></th>
                                                <th><b>Created date</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="item in orderByItems" :key="item.id">
                                                <td><b>{{ item.event }}</b></td>
                                                <td>{{ item.old_values }}</td>
                                                <td><b>{{ item.new_values }}</b></td>
                                                <td>
                                                    <a href="javascript:void(0)" @click="getUser(item)">
                                                        <button v-if="item.statusOnline" type="button" class="btn btn-success btn-round btn-just-icon btn-sm" title="Administrator Online"></button>
                                                        <button v-else="item.statusOnline" type="button" class="btn btn-danger btn-round btn-just-icon btn-sm" title="Administrator Offline"></button>
                                                        {{ (item.user.name.length > 15 ? item.user.name.substring(0,15)+ "..." : item.user.name) | upText }}
                                                    </a>
                                                </td>
                                                <td><b>{{ item.created_at| dateAgo }}</b></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Export Excel Users -->
                                    <div class="submit text-center">
                                        <router-link to="/dashboard/colors" class="btn btn-success btn-raised btn-round">
                                            <i class="material-icons">chevron_left</i>
                                            <b>Back</b>
                                        </router-link>
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
    import api from '../../../../../routes/admin/color';
    import StatusAdmin from "../../../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../../../inc/animation/LoaderLds-default";

    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                loaded: false,
                errored: false,
                editmode: false,
                user: {},
                colors: {},
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
        },
        created() {
            this.$Progress.start();
            api.colorAuditing(this.$route.params.color).then(response => {
                this.loaded = true;
                this.colors = response.data.data;
                this.mydatatables();
            }).catch(error => {
                console.log(error);
                this.errored = true
            });
            axios.get("/api/account/user").then(response => {
                this.user = response.data.data
            });
            this.$Progress.finish()
        },
        computed: {
            orderByItems() {
                return _.orderBy(this.colors, ['created_at'], ['desc'])
            },
        },
    }

</script>

<style scoped>

</style>
