<template>
    <div>
        <vue-progress-bar/>
        <NavAdmin/>
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
                                        <i class="material-icons">email</i>
                                    </div>
                                    <p class="card-category"><b>All Messages Contact Us</b>
                                    <h3 class="card-title" style="color:red;"><b>{{contacts.length}}</b></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">email</i><b>All Messages Contact Us</b>
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
                                                <b>Datatables Messages Contact Us</b>
                                            </h4>
                                            <p class="card-title">
                                                Request informations
                                            </p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                <span>
                                    <i id="tooltipSize" class="material-icons">email</i>
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
                                                <td><b>{{ item.created_at | myDate }}</b></td>
                                                <td class="td-actions text-right">
                                                    <a  href="javascript:void(0)" v-if="item.status === 1" @click="disableItem(item.id)" class="btn btn-link btn-success btn-round btn-just-icon" title="Disable Read">
                                                        <i class="material-icons">done_all</i>
                                                    </a>
                                                    <a href="javascript:void(0)" v-else-if="item.status === 0" @click="activeItem(item.id)" class="btn btn-link btn-danger btn-round btn-just-icon " title="Confirm Read">
                                                        <i class="material-icons">done</i>
                                                    </a>
                                                    <!--<router-link  :to="{ path: `/dashboard/contacts/msg/${item.slug}` }" class="btn btn-link  btn-warning btn-round btn-just-icon" title="View message">
                                                        <i class="material-icons">visibility</i>
                                                    </router-link>-->
                                                    <a href="javascript:void(0)" @click="redItem(item.slug)"
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
    import NavAdmin from "../../inc/admin/NavAdmin";
    import TopNav from "../../inc/admin/TopNav";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    import LoaderLdsDefault from "../../inc/animation/LoaderLds-default";
    export default {
        components: {LoaderLdsDefault, StatusAdmin, FooterAdmin, TopNav, NavAdmin},
        data() {
            return {
                loaded: false,
                editmode: false,
                user: {},
                contacts: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    message: '',
                    subject: '',
                    last_name: '',
                    first_name: '',
                    slug: '',
                    status: ''
                })
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
                let colorCard = 'card-header card-header-icon card-header-' + this.user.color_name;
                return colorCard;
            },
            getColorHeaderUser(){
                let colorHeader = 'card-header card-header-' + this.user.color_name;
                return colorHeader;
            },
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Message Contact-us?',
                    text: "Are you sure you want to delete this message?",
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
                    //Envoyer la requete au server
                    if (result.value) {
                        //Start Progress bar
                        this.$Progress.start();
                        this.form.delete('/dashboard/contacts/' + id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Message contact-us deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            //Redirect after create
                            setTimeout(() => this.$router.push({ name: 'contacts.index' }), 2000);
                            /* End alert ***/

                            //End Progress bar
                            this.$Progress.finish();

                            Fire.$emit('AfterCreate');
                        }).catch(() => {
                            //Failled message
                            this.$Progress.fail();
                            toastr.error('', 'Ooop! Something wrong. Try later');
                        })
                    }
                })
            },
            /** Ici c'est la désactivation de la couleur **/
            disableItem(id) {
                //Start Progress bar
                this.$Progress.start();

                this.form.get('/dashboard/contacts/red_confirm/' + id).then(() => {

                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Message contact unread.</strong>', 'progress': 75});
                    }, 2000);
                    /** End alert **/

                    //End Progress bar
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    toastr.error('', 'Ooop! Something wrong. Try later');
                })
            },
            /** Ici c'est la désactivation de la couleur **/
            redItem(slug) {
                //Start Progress bar
                this.$Progress.start();

                this.form.get('/dashboard/contacts/discard_red/' + slug).then(() => {

                    //Redirect after create
                    setTimeout(() => this.$router.push({  path: `/dashboard/contacts/msg/${slug}` }));

                    //End Progress bar
                    this.$Progress.finish();
                    Fire.$emit('AfterCreate');
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    toastr.error('', 'Ooop! Something wrong. Try later');
                })
            },
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                const url = "/api/contacts";
                axios.get(url).then(response => {
                    this.loaded = true;
                    this.contacts = response.data.data;
                    this.mydatatables();
                    //End Progress bar
                    this.$Progress.finish();
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
            },
        },
        created() {
            this.loadItems();
            Fire.$on('AfterCreate', () => {
                this.loadItems();
            });
        }
    }
</script>

<style scoped>

</style>
