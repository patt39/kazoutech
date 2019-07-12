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
                                                    <i class="material-icons">meeting_room</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Create</b> -
                                                    <small class="category">New Task Technicians</small>
                                                </h4>
                                            </div>
                                            <br>
                                            <div class="card-body">
                                                <form id="RegisterValidation" @submit.prevent="createItem()" role="form"
                                                      method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <select name="technician_id" v-model="form.technician_id" id="technician_id" class="form-control"
                                                                        :class="{ 'is-invalid': form.errors.has('technician_id') }">
                                                                    <option value="" disabled>Choisir un technicien</option>
                                                                    <option v-for="technician in technicians" :key="technician.id" :value="technician.id">{{technician.user.name}}</option>
                                                                </select>
                                                                <has-error :form="form" field="technician_id"></has-error>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <select name="user_id" v-model="form.user_id" id="user_id" class="form-control"
                                                                        :class="{ 'is-invalid': form.errors.has('user_id') }">
                                                                    <option value="" disabled>Choisir un technicien</option>
                                                                    <option v-for="technician in technicians" :key="technician.id" :value="technician.id">{{technician.user.name}}</option>
                                                                </select>
                                                                <has-error :form="form" field="user_id"></has-error>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <select name="city_id" v-model="form.city_id" id="city_id" class="form-control"
                                                                        :class="{ 'is-invalid': form.errors.has('city_id') }">
                                                                    <option value="" disabled>Choisir la ville</option>
                                                                    <option v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
                                                                </select>
                                                                <has-error :form="form" field="city_id"></has-error>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card card-nav-tabs">
                                                                <div class="card-body">
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane active" id="profile">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Task technician <span style="color:red;">*</span></label>
                                                                                <br>
                                                                                <vue-editor v-model="form.task" :editorToolbar="customToolbar"></vue-editor>
                                                                                <div class="form-check">
                                                                                    <label class="form-check-label pull-right">
                                                                                        You can use the
                                                                                        <a href="https://help.github.com/articles/getting-started-with-writing-and-formatting-on-github/" class="text-danger" target="_blank">
                                                                                            Markdown here
                                                                                        </a>
                                                                                        <span class="form-check-sign"></span>
                                                                                    </label>
                                                                                </div>
                                                                                <has-error :form="form" field="task"></has-error>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="submit">
                                                        <div class="text-center">
                                                            <router-link :to="{ name: 'technicians.index' }" class="btn btn-danger btn-round" id="button_hover">
                                                                <i class="material-icons">chevron_left</i>
                                                                <b class="title_hover">Back</b>
                                                            </router-link>
                                                            <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised btn-round">
                                                                <i class="material-icons">save_alt</i>
                                                                <b class="title_hover">Save</b>
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
                user: {},
                cities:{},
                users:{},
                technicians: {},
                form: new Form({
                    id: '',
                    district: '',
                    task: '',
                    ip: '',
                    city_id: '',
                    technician_id:'',
                    user_id: '',
                    status: '',
                    slug: ''
                }),
                customToolbar: [
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'font': [] }],
                    //[{ 'header': [false, 1, 2, 3, 4, 5, 6, ] }],
                    //[{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'align': [] }],
                    //[{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    //['blockquote', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
                    //[{ 'script': 'sub'}, { 'script': 'super' }],
                    //[{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'color': [] }, { 'background': [] }],
                    //['link', 'image', 'video', 'formula'],
                    ['link'],
                    //[{ 'direction': 'rtl' }],
                    ['clean'],
                    //['emoji'],
                ]
            }
        },
        methods: {
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },
            getColorHeaderUser(){
                return 'card-header card-header-' + this.user.color_name;
            },
            createItem() {
                //Start Progress bar
                this.$Progress.start();
                // Submit the form via a POST request
                this.form.post("/dashboard/task_technicians")
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
                            notify.update({'type': 'success', 'message': '<strong>Task Technicians Created Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'task_technicians.index' }));

                        //End Progress bar
                        this.$Progress.finish();
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
            }
        },
        created() {
            this.$Progress.start();
            axios.get("/api/technicians").then(({data}) => (this.technicians = data.data));
            axios.get("/api/cities").then(({data}) => (this.cities = data.data));
            axios.get("/api/users").then(({data}) => (this.users = data.data));
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish()
        }
    }
</script>

<style scoped>

</style>
