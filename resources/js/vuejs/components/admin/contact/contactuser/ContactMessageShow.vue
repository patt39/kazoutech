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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 expo">
                                        <div class="card">
                                            <div :class="getColorCardUser()" style="margin-top: -18px;">
                                                <div class="text-center">
                                                    <router-link  title="back messages" :to="{ name: 'contacts.index' }" class="btn btn-secondary btn-round btn-just-icon btn-sm">
                                                     <span class="btn-label">
                                                        <i class="material-icons">keyboard_return</i>
                                                     </span>
                                                    </router-link>
                                                    <a href="javascript:void(0)" @click="deleteItem(contact.id)"
                                                       class="btn btn-danger btn-round btn-just-icon btn-sm" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>

                                                    <a  href="javascript:void(0)" v-if="contact.status === 1" @click="disableItem(contact.id)" class="btn btn-success btn-round btn-just-icon btn-sm" title="Mask as unread">
                                                        <i class="material-icons">done_all</i>
                                                    </a>
                                                    <a href="javascript:void(0)" v-else-if="contact.status === 0" @click="activeItem(contact.id)" class="btn btn-info btn-round btn-just-icon btn-sm" title="Mask as read">
                                                        <i class="material-icons">done</i>
                                                    </a>
                                                    <template>
                                                        <a v-if="contact.bookmark === 0" href="javascript:void(0)" @click="bookmarkItem(contact.id)"
                                                           class="btn btn-primary btn-round btn-just-icon btn-sm" title="Bookmark message">
                                                            <i class="material-icons">bookmarks</i>
                                                        </a>
                                                        <a v-else="contact.bookmark !== 0" href="javascript:void(0)" @click="unbookmarkItem(contact.id)"
                                                           class="btn btn-success btn-round btn-just-icon btn-sm" title="Cancel bookmark message">
                                                            <i class="material-icons">bookmarks</i>
                                                        </a>
                                                    </template>

                                                </div>
                                                <div class="card-icon">
                                                    <i class="material-icons">message</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Message {{ contact.first_name}}</b> -
                                                    <small class="category" v-text="contact.email"></small>
                                                </h4>
                                                <h4 class="card-title text-right" style="margin-top: 0px;">
                                                    <small class="category">
                                                        {{ contact.created_at | myDate }} ({{ contact.created_at | dateAgo }})
                                                        <a :href="`mailto:${contact.email}`" class="btn  btn-dribbble btn-round btn-just-icon btn-sm" title="reply">
                                                            <i class="material-icons">reply</i>
                                                        </a>
                                                    </small>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- User Data -->
                                                <div class="col-md-12">
                                                    <h5 class="card-title">
                                                        <b>{{ contact.subject}}</b>
                                                    </h5>
                                                    <div class="card card-nav-tabs">
                                                        <div class="card-body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="profile">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>First name</label>
                                                                                <input v-model="contact.first_name" type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Last name</label>
                                                                                <input type="text" v-model="contact.last_name" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Email</label>
                                                                                <input type="email" v-model="contact.email" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group text-justify">
                                                                        <p class="title" v-html="contact.message"></p>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="text-center">
                                                                        <router-link  :to="{ name: 'contacts.index' }" class="btn btn-secondary btn-raised button_profile">
                                                                                <span class="btn-label">
                                                                                    <i class="material-icons">keyboard_return</i>
                                                                                </span>
                                                                            <b class="title_hover">Back all messages</b>
                                                                        </router-link>
                                                                        <a :href="`mailto:${contact.email}`" class="btn btn-dribbble btn-raised button_profile">
                                                                         <span class="btn-label">
                                                                            <i class="material-icons">reply</i>
                                                                        </span>
                                                                            <b class="title_hover">Reply message</b>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>
            </div>
            <footer-admin></footer-admin>
        </div>

    </div>
</template>

<script>
    import api from '../../../../api/mixins/collections';
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin},
        data() {
            return {
                errored: false,
                loaded: false,
                user: {},
                contact: {},
            }
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
            getMaterialIcon(color){
                let icon = 'material-icons text-' + color;
                return icon;
            },
            /** Ici c'est la pour bookmarker le message **/
            unbookmarkItem(id) {
                //Start Progress bar
                this.$Progress.start();
                axios.get(`/dashboard/contacts/unbookmark/${id}`).then(() => {

                    /** Alert notify bootstrapp **/
                    $.notify("Bookmark cancel successfully", {
                        type: 'success',
                        animate: {
                            enter: 'animated bounceIn',
                            exit: 'animated bounceOut'
                        }
                    });
                    this.$Progress.finish();
                    setTimeout(() => this.$router.push({ name: 'contacts.bookmarks' }));
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
                    //Redirect after create
                    setTimeout(() => this.$router.push({ name: 'contacts.index' }));
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
                        axios.delete(`/dashboard/contacts/${id}`).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Message contact-us deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            //Redirect after create
                            setTimeout(() => this.$router.push({ name: 'contacts.index' }));
                            /* End alert ***/

                            //End Progress bar
                            this.$Progress.finish();
                        }).catch(() => {
                            //Failled message
                            this.$Progress.fail();
                            toastr.error('', 'Ooop! Something wrong. Try later');
                        })
                    }
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
                        type: 'success',
                        placement: {
                            from: 'bottom',
                            align: 'right'
                        },
                        animate: {
                            enter: 'animated fadeInRight',
                            exit: 'animated fadeOutRight'
                        },
                    });
                    /** End alert **/

                    //End Progress bar
                    this.$Progress.finish();

                    Fire.$emit('LoadData');
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    toastr.error('', 'Ooop! Something wrong. Try later');
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
                    /** End alert **/

                    //End Progress bar
                    this.$Progress.finish();
                    Fire.$emit('LoadData');
                }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    $.notify("Ooop! Something wrong. Try later...", {
                        allow_dismiss: false,
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
                api.contactshow(this.$route.params.contact)
                    .then(response => {
                        this.contact = response.data.data
                    }).catch(error => {
                    this.errored = true
                });
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
                //End Progress bar
                this.$Progress.finish();
            },

        },
        mounted() {
            this.loadItems();
            Fire.$on('LoadData', () => {
                this.loadItems();
            });
        }
    }
</script>

<style scoped>

</style>
