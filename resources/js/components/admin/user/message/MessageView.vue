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
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 expo">
                                        <div class="card">
                                            <div :class="getColorCardUser()" style="margin-top: -18px;">
                                                <div class="text-center">
                                                    <router-link  title="back messages" :to="{ name: 'messages.index' }" class="btn btn-secondary btn-round btn-just-icon btn-sm">
                                                     <span class="btn-label">
                                                        <i class="material-icons">keyboard_return</i>
                                                     </span>
                                                    </router-link>
                                                    <a href="javascript:void(0)" @click="deleteItem(form.id)"
                                                       class="btn btn-danger btn-round btn-just-icon btn-sm" title="Delete">
                                                        <i class="material-icons">delete_forever</i>
                                                    </a>

                                                    <a  href="javascript:void(0)" v-if="form.status === 1" @click="disableItem(form.id)" class="btn btn-success btn-round btn-just-icon btn-sm" title="Mask as unread">
                                                        <i class="material-icons">done_all</i>
                                                    </a>
                                                    <a href="javascript:void(0)" v-else-if="form.status === 0" @click="activeItem(form.slug)" class="btn btn-info btn-round btn-just-icon btn-sm" title="Mask as read">
                                                        <i class="material-icons">done</i>
                                                    </a>

                                                </div>
                                                <div class="card-icon">
                                                    <i class="material-icons">message</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>{{ form.from.name}}</b> -
                                                    <small class="category" v-text="form.from.email"></small>
                                                </h4>
                                                <h4 class="card-title text-right" style="margin-top: 0px;">
                                                    <!--<small class="category">
                                                        {{ form.created_at | myDate }} ({{ form.created_at | dateAgo }})
                                                        <a :href="`mailto:${form.email}`" class="btn  btn-dribbble btn-round btn-just-icon btn-sm" title="reply">
                                                            <i class="material-icons">reply</i>
                                                        </a>
                                                    </small>-->
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <!-- User Data -->
                                                <div class="col-md-12">
                                                    <h5 class="card-title">
                                                        <b>{{ form.subject}}</b>
                                                    </h5>
                                                    <div class="card card-nav-tabs">
                                                        <div class="card-body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="profile">
                                                                    <div class="form-group text-justify">
                                                                        <p class="title" v-html="form.object"></p>
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group text-justify">
                                                                        <p class="title" v-html="form.message"></p>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="text-center">
                                                                        <router-link  :to="{ name: 'messages.index' }" class="btn btn-secondary btn-raised button_profile">
                                                                                <span class="btn-label">
                                                                                    <i class="material-icons">keyboard_return</i>
                                                                                </span>
                                                                            <b class="title_hover">Back your messages</b>
                                                                        </router-link>
                                                                        <a :href="`mailto:${form.from.email}`" class="btn btn-dribbble btn-raised button_profile">
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
                loaded: false,
                user:{},
                form: new Form({
                    id: '',
                    object: '',
                    message: '',
                    to_id: '',
                    slug: '',
                    from: '',
                    status: '',
                    created_at: '',
                })
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
            deleteItem() {
                //Alert delete
                Swal.fire({
                    title: 'Delete Message?',
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
                        this.form.delete('/dashboard/messages/' + this.form.id).then(() => {
                            /** Alert notify bootstrapp **/
                            var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                                allow_dismiss: false,
                                showProgressbar: true
                            });
                            setTimeout(function() {
                                notify.update({'type': 'success', 'message': '<strong>Message deleted successfully.</strong>', 'progress': 75});
                            }, 2000);
                            //Redirect after create
                            setTimeout(() => this.$router.push({ name: 'messages.index' }), 2000);
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
            /** Ici c'est l'activation de la couleur  **/
            activeItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.get('/messages/discard_red/' + this.form.slug).then(() => {

                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Message read.</strong>', 'progress': 75});
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
            disableItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.get('/messages/red_confirm/' + this.form.id).then(() => {

                    /** Alert notify bootstrapp **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                    setTimeout(function() {
                        notify.update({'type': 'success', 'message': '<strong>Message unread.</strong>', 'progress': 75});
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
            loadItems() {
                //Start Progress bar
                this.$Progress.start();
                api.messageshow(this.$route.params.message).then(({data}) => this.form.fill(data.data));
                axios.get("/api/account/user").then(response => {this.user = response.data.data});
                //End Progress bar
                this.$Progress.finish();
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
