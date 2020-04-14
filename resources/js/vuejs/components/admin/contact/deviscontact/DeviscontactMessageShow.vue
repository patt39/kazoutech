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
                                                    <router-link  title="back messages" :to="{ name: 'deviscontacts.index' }" class="btn btn-secondary btn-round btn-just-icon btn-sm">
                                                     <span class="btn-label">
                                                        <i class="material-icons">keyboard_return</i>
                                                     </span>
                                                    </router-link>
                                                    <a href="javascript:void(0)" @click="deleteItem(deviscontact.id)"
                                                       class="btn btn-danger btn-round btn-just-icon btn-sm" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>

                                                    <a  href="javascript:void(0)" v-if="deviscontact.status" @click="disableItem(deviscontact.id)" class="btn btn-success btn-round btn-just-icon btn-sm" title="Mask as unread">
                                                        <i class="material-icons">done_all</i>
                                                    </a>
                                                    <a href="javascript:void(0)" v-else-if="!deviscontact.status" @click="activeItem(deviscontact.id)" class="btn btn-info btn-round btn-just-icon btn-sm" title="Mask as read">
                                                        <i class="material-icons">done</i>
                                                    </a>

                                                </div>
                                                <div class="card-icon">
                                                    <i class="material-icons">message</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Message {{ deviscontact.full_name}}</b> -
                                                    <small class="category" v-text="deviscontact.email"></small>
                                                </h4>
                                                <h4 class="card-title text-right" style="margin-top: 0px;">
                                                    <small class="category">
                                                        {{ deviscontact.created_at | myDate }} ({{ deviscontact.created_at | dateAgo }})
                                                        <a :href="`mailto:${deviscontact.email}`" class="btn  btn-dribbble btn-round btn-just-icon btn-sm" title="reply">
                                                            <i class="material-icons">reply</i>
                                                        </a>
                                                    </small>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="toolbar">
                                                    <div class="submit text-center">
                                                        <button type="button" class="btn btn-primary btn-raised " >
                                                            <b class="title_hover">{{deviscontact.occupation.name}}</b>
                                                        </button>
                                                        <button type="button" class="btn btn-info btn-raised " >
                                                            <b class="title_hover">{{deviscontact.city.name}}</b>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- User Data -->
                                                <div class="col-md-12">
                                                    <h5 class="card-title">
                                                        <b>{{ deviscontact.subject}}</b>
                                                    </h5>
                                                    <div class="card card-nav-tabs">
                                                        <div class="card-body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="profile">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Full name</label>
                                                                                <input v-model="deviscontact.full_name" type="text" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Email</label>
                                                                                <input type="email" v-model="deviscontact.email" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label>Phone</label>
                                                                                <input type="text" v-model="deviscontact.phone" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group text-justify">
                                                                        <p class="title" v-html="deviscontact.message"></p>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="text-center">
                                                                        <router-link  :to="{ name: 'deviscontacts.index' }" class="btn btn-secondary btn-raised button_profile">
                                                                                <span class="btn-label">
                                                                                    <i class="material-icons">keyboard_return</i>
                                                                                </span>
                                                                            <b class="title_hover">Back all messages</b>
                                                                        </router-link>
                                                                        <a :href="`mailto:${deviscontact.email}`" class="btn btn-dribbble btn-raised button_profile">
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
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin},
        data() {
            return {
                errored: false,
                loaded: false,
                user: {},
                deviscontact: {},
            }
        },
        methods: {
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
            },
            getMaterialIcon(color){
                return 'material-icons text-' + color;
            },
            deleteItem(id) {
                //Alert delete
                Swal.fire({
                    title: 'Delete Message Contact?',
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
                        dyaxios.delete(route('deviscontacts.destroy',[id])).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Message contact-us deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            //Redirect after create
                            setTimeout(() => this.$router.push({ name: 'deviscontacts.index' }));
                            /* End alert ***/

                            //End Progress bar
                            this.$Progress.finish();
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
                    }
                })
            },
            /** Ici c'est l'activation de la couleur  **/
            activeItem(id) {
                //Start Progress bar
                this.$Progress.start();

                dyaxios.get(route('deviscontacts.active',id)).then(() => {

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
            /** Ici c'est la désactivation de la couleur **/
            disableItem(id) {
                //Start Progress bar
                this.$Progress.start();

                dyaxios.get(route('deviscontacts.disable',id)).then(() => {

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
                dyaxios.get(route('deviscontacts.view',[this.$route.params.deviscontact]))
                    .then(response => {
                        this.deviscontact = response.data
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
