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
                    <errored-loading v-if="errored"/>
                    <div v-if="!loaded" class="submit">
                        <LoaderLdsDefault/>
                    </div>
                    <div v-if="loaded" class="row">
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
                                        <button  @click="reload" class="btn btn-success btn-raised btn-round button_note btn-sm"
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
                                            <tr v-for="item in contacts" :key="item.id">
                                                <td>
                                                    <span v-if="item.status === 1" class="badge badge-success">Read</span>
                                                    <span v-else-if="item.status === 0"  class="badge badge-rose">New</span>
                                                </td>
                                                <td>{{ (item.first_name.length > 15 ? item.first_name.substring(0,15)+ "..." : item.first_name) | upText }}</td>
                                                <td>{{ item.email}}</td>
                                                <td><b>{{ item.created_at | dateAgo }}</b></td>
                                                <td class="td-actions text-right">
                                                    <a href="javascript:void(0)" @click="bookmarkItem(item.id)"
                                                       class="btn btn-link  btn-primary btn-round btn-just-icon" title="Bookmark message">
                                                        <i class="material-icons">bookmarks</i>
                                                    </a>
                                                    <a  href="javascript:void(0)" v-if="item.status === 1" @click="disableItem(item.id)" class="btn btn-link btn-success btn-round btn-just-icon" title="Disable Read">
                                                        <i class="material-icons">done_all</i>
                                                    </a>
                                                    <a href="javascript:void(0)" v-else-if="item.status === 0" @click="activeItem(item.id)" class="btn btn-link btn-danger btn-round btn-just-icon " title="Confirm Read">
                                                        <i class="material-icons">done</i>
                                                    </a>
                                                    <!--<router-link  :to="{ path: `/dashboard/contacts/msg/${item.slug}` }" class="btn btn-link  btn-warning btn-round btn-just-icon" title="View message">
                                                        <i class="material-icons">visibility</i>
                                                    </router-link>-->
                                                    <a href="javascript:void(0)" @click="redItem(item)"
                                                       class="btn btn-link  btn-warning btn-round btn-just-icon" title="View message">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    <a href="javascript:void(0)" @click="deleteItem(item.id)"
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
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin},
        data() {
            return {
                loaded: false,
                errored: false,
                editmode: false,
                contacts: [],
                user: {},
            }
        },
        created() {
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            this.loadItems();
            Fire.$on('LoadData', () => {
                this.loadItems();
            });
            this.intervalFetchData();
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
            deleteItem(id) {
                //Start Progress bar
                this.$Progress.start();

                axios.delete('/dashboard/contacts/' + id).then(() => {
                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Message contact-us deleted successfully.</strong>', 'progress': 75});
                    }, 2000);
                    /* End alert ***/

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit('LoadData');
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
            /** Ici c'est l'activation de la couleur  **/
            activeItem(id) {
                //Start Progress bar
                this.$Progress.start();

                axios.get(`/dashboard/contacts/discard_red/${id}`).then(() => {

                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Message contact read.</strong>', {
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

                    Fire.$emit('LoadData');
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
            /** Ici c'est la désactivation de la couleur **/
            disableItem(id) {
                //Start Progress bar
                this.$Progress.start();

                axios.get(`/dashboard/contacts/red_confirm/${id}`).then(() => {

                    /** Alert notify bootstrapp **/
                    $.notify('<strong>Message contact unread.</strong>', {
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
                    Fire.$emit('LoadData');
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
            /** Ici c'est la désactivation de la couleur **/
            redItem(item) {
                //Start Progress bar
                this.$Progress.start();
                axios.get(`/dashboard/contacts/discard_red/${item.id}`).then(() => {

                    //Redirect after create
                    setTimeout(() => this.$router.push({  path: `/dashboard/contacts/msg/${item.slug}` }));

                    //End Progress bar
                    this.$Progress.finish();
                    Fire.$emit('LoadData');
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
            /** Ici c'est la pour bookmarker le message **/
            bookmarkItem(id) {
                //Start Progress bar
                this.$Progress.start();
                axios.get(`/dashboard/contacts/bookmark/${id}`).then(() => {

                    /** Alert notify bootstrapp **/
                    $.notify("Bookmark successfully", {
                        type: 'success',
                        animate: {
                            enter: 'animated bounceIn',
                            exit: 'animated bounceOut'
                        }
                    });
                    this.$Progress.finish();
                    Fire.$emit('LoadData');
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
                axios.get("/api/contacts").then(response => {
                    this.loaded = true;
                    this.contacts = response.data.data;
                }).catch(error => {
                    console.log(error);
                    this.errored = true
                });
            },
            infiniteHandler($state) {
                let limit = this.contacts.length / 10 + 1;
                axios.get('/api/contacts', { params: { page: limit } }).then(response => {
                    this.loadMore($state, response);
                });
            },
            loadMore($state, response) {
                if ( response.data.data.length ) {
                    this.contacts = this.contacts.concat(response.data.data);
                    setTimeout(() => {
                        $state.loaded();
                    }, 500);
                    if ( response.data.total === this.contacts.length ) {
                        $state.complete();
                    }
                }else{
                    $state.complete();
                }
            },
            reload(){
                this.loadItems();
            },
            intervalFetchData: function () {
                setInterval(() => {
                    this.loadItems();
                }, 120000);
            },
        },
    }
</script>

<style scoped>

</style>
