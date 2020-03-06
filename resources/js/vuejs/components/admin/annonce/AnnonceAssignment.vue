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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 expo">
                                        <div class="card">
                                            <div :class="getColorCardUser()" style="margin-top: -5px;">
                                                <div class="card-icon">
                                                    <i class="material-icons">assignment</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Assigne new job</b> -
                                                    <small class="category">To technician</small>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <form id="RegisterValidation" @submit.prevent="createItem()" role="form"
                                                      method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                    <!-- User Data -->
                                                    <div class="col-md-12">
                                                        <div class="card card-nav-tabs">
                                                            <div :class="getColorHeaderUser()">
                                                                <div class="nav-tabs-navigation">
                                                                    <div class="nav-tabs-wrapper">
                                                                        <ul class="nav nav-tabs" data-tabs="tabs">
                                                                            <li class="nav-item">
                                                                                <router-link :to="{ name: 'categories.index' }" class="nav-link" style="cursor:pointer;" data-toggle="tab">
                                                                                    <i class="material-icons">create</i>
                                                                                    <b>all categories</b>
                                                                                </router-link>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane active" id="profile">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Title</label>
                                                                                    <input type="text" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>Name category</label>
                                                                                    <input v-model="form.name" type="text" name="name"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                                                                    <has-error :form="form" field="name"></has-error>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label>City</label>
                                                                                    <input type="text" v-model="form.icon" name="icon"
                                                                                           class="form-control" :class="{ 'is-invalid': form.errors.has('icon') }">
                                                                                    <has-error :form="form" field="icon"></has-error>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <div class="form-group">
                                                                            <label>Technician</label>
                                                                            <select name="color_name" v-model="form.color_name" id="color_name" class="form-control"
                                                                                    :class="{ 'is-invalid': form.errors.has('color_name') }" style="margin-top: 15px;">
                                                                                <option value="" disabled>Choose a technician</option>
                                                                                <option v-for="color in colors" :key="color.id" :value="color.slug">{{color.color_name}}</option>
                                                                            </select>
                                                                            <br>
                                                                            <has-error :form="form" field="color_name"></has-error>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="submit">
                                                        <div class="text-center">
                                                            <router-link :to="{ name: 'categories.index' }" class="btn btn-primary btn-raised btn-round" data-toggle="tab">
                                                                <i class="material-icons">forum</i>
                                                                <b>All categories</b>
                                                            </router-link>

                                                            <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised btn-round">
                                        <span class="btn-label">
                                            <i class="material-icons">save_alt</i>
                                        </span>
                                                                <b class="title_hover">Create category</b>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
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
            <FooterAdmin/>
        </div>
    </div>
</template>

<script>
    import NavAdmin from "../../inc/admin/NavAdmin";
    import TopNav from "../../inc/admin/TopNav";
    import FooterAdmin from "../../inc/admin/FooterAdmin";
    import StatusAdmin from "../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin, FooterAdmin, TopNav, NavAdmin},
        data() {
            return {
                colors:[],
                form: new Form({
                    id: '',
                    name: '',
                    icon: '',
                    color_name: '',
                    user_id: '',
                    status: '',
                    slug: ''
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
            createItem() {
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/dashboard/categories")
                    .then(() => {

                        //Insertion de l'alert !
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true,
                            animate: {
                                enter: 'animated bounceInDown',
                                exit: 'animated bounceOutUp'
                            },
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Category Created Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        //Redirect after create
                        setTimeout(() => this.$router.push({ name: 'categories.index' }), 2000);
                        //Fin insertion de l'alert !

                        //End Progress bar
                        this.$Progress.finish()
                    }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    toastr.error('', 'Ooop! Something wrong. Try later');
                })
            }
        },
        created() {
            //Start Progress bar
            this.$Progress.start();
            const urlColors = "/api/colors";
            axios.get(urlColors).then(({data}) => (this.colors = data.data));
            //End Progress bar
            this.$Progress.finish();
        }
    }
</script>

<style scoped>

</style>