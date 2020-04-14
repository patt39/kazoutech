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
                            <div class="card">
                                <div :class="getColorHeaderUser()">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="nav-tabs-navigation">
                                                <div class="nav-tabs-wrapper">
                                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                                        <li class="nav-item">
                                                            <router-link :to="{ name: 'contacts.bookmarks' }" class="nav-link" style="cursor:pointer;" data-toggle="tab" title="bookmarks" exact>
                                                                <i class="material-icons">bookmarks</i>
                                                            </router-link>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 text-right">
                                <span>
                                    <i id="tooltipSize" class="material-icons">email</i>
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card-body">
                                    <div class="header text-right">
                                        <button  @click="reload" class="btn btn-success btn-raised button_note btn-sm"
                                                 title="Refresh Page">
                                            <i class="material-icons">replay</i>
                                            <b class="title_hover">Refresh</b>
                                        </button>
                                    </div>
                                    <br>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover"
                                               cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th><b>Status</b></th>
                                                <th><b>Sender Name</b></th>
                                                <th><b>Sender Email</b></th>
                                                <th><b>Date Reception</b></th>
                                                <th class="disabled-sorting text-right"><b>Actions</b></th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <th><b>Status</b></th>
                                                <th><b>Sender Name</b></th>
                                                <th><b>Sender Email</b></th>
                                                <th><b>Date Reception</b></th>
                                                <th class="text-right"><b>Actions</b></th>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            <tr v-for="(item,index) in contacts" :key="item.id">
                                                <td>
                                                    <span v-if="item.status === 1" class="badge badge-success">Read</span>
                                                    <span v-else-if="item.status === 0"  class="badge badge-rose">New</span>
                                                </td>
                                                <td>{{ (item.first_name.length > 15 ? item.first_name.substring(0,15)+ "..." : item.first_name) | upText }}</td>
                                                <td>{{ item.email}}</td>
                                                <td><b>{{ item.created_at | dateAgo }}</b></td>
                                                <td class="td-actions text-right">
                                                    <!--<a href="javascript:void(0)" @click="bookmarkItem(item.id)"
                                                       class="btn btn-link  btn-primary btn-round btn-just-icon" title="Bookmark message">
                                                        <i class="material-icons">bookmarks</i>
                                                    </a>-->
                                                    <!--<router-link  :to="{ path: `/dashboard/contacts/msg/${item.slug}` }" class="btn btn-link  btn-warning btn-round btn-just-icon" title="View message">
                                                        <i class="material-icons">visibility</i>
                                                    </router-link>-->
                                                    <a href="javascript:void(0)" @click="redItem(item)"
                                                       class="btn btn-link  btn-warning btn-round btn-just-icon" title="View message">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    <a href="javascript:void(0)" @click="deleteItem(item)"
                                                       class="btn btn-link btn-danger btn-round btn-just-icon" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="toolbar">
                                        <div class="submit text-center" >
                                            <infinite-loading spinner="waveDots" @infinite="infiniteHandler">
                                            <span slot="no-more">No results :(</span>
                                            </infinite-loading>
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
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                page: 1,
                contacts: [],
                user: {},
            }
        },
        created() {
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
        },
        methods: {
            getColorCardUser(){
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser(){
                let colorHeader = 'card-header card-header-' + this.user.color_name;
                return colorHeader;
            },
            deleteItem(item) {
                //Start Progress bar
                this.$Progress.start();

                axios.delete(`/dashboard/contacts/${item.id}`).then(() => {
                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Message contact-us deleted successfully.</strong>', {
                        allow_dismiss: false,
                        type: 'success',
                        placement: {
                            from: 'bottom',
                        },
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        },
                    });
                    /* End alert ***/
                    //End Progress bar
                    this.$Progress.finish();

                    let index = this.contacts.indexOf(item);
                    this.contacts.splice(index, 1);
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
            /** Ici c'est la désactivation de la couleur **/
            redItem(item) {
                //Start Progress bar
                this.$Progress.start();
                axios.get(`/dashboard/contacts/discard_red/${item.id}`).then(() => {

                    //Redirect after create
                    setTimeout(() => this.$router.push({  path: `/dashboard/contacts/msg/${item.slug}` }));

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
            infiniteHandler($state) {
                axios.get(`/api/contacts`, {
                    params: {
                        page: this.page,
                    },
                }).then(response => {
                    if (response.data.length) {
                        this.page += 1;
                        this.contacts.push(...response.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                });
            },
            reload(){
                console.log('okk')
            },
        },
    }
</script>

<style scoped>

</style>
