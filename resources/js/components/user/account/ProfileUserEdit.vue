<template>
    <div>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Register</div>

                            <div class="card-body">
                                <form @keydown="form.onKeydown($event)" method="POST" @submit.prevent="updateItem()">

                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="profile">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Pseudo</label>
                                                            <input v-model="form.username" type="text" name="username"
                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('username') }"/>
                                                            <has-error :form="form" field="username"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input v-model="form.name" type="text" name="name" maxlength="25"
                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('name') }"/>
                                                            <has-error :form="form" field="name"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input v-model="form.first_name" type="text" maxlength="25" name="first_name" class="form-control" :class="{ 'is-invalid': form.errors.has('first_name') }"/>
                                                            <has-error :form="form" field="first_name"></has-error>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Sex</label>
                                                            <select name="sex" v-model="form.sex" id="sex" class="form-control"
                                                                    :class="{ 'is-invalid': form.errors.has('sex') }" style="margin-top: 15px;">
                                                                <option value="" disabled>Choose Your Sex</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                            <has-error :form="form" field="sex"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Your Country</label>
                                                            <select name="country_id" v-model="form.country_id"
                                                                    id="country_id" class="form-control"
                                                                    :class="{ 'is-invalid': form.errors.has('country_id') }"
                                                                    style="margin-top: 15px;">
                                                                <option value="" disabled>Choose Your Country
                                                                </option>
                                                                <option v-for="country in countries"
                                                                        :key="country.name"
                                                                        :value="country.id">{{country.name}}
                                                                </option>
                                                            </select>
                                                            <has-error :form="form" field="country_id"></has-error>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Age</label>
                                                            <input type="text" v-model="form.age" name="my_birthday" maxlength="2"
                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('age') }"/>
                                                            <has-error :form="form" field="age"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Your Phone Number</label>
                                                            <input v-model="form.phone" type="number" name="phone"
                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('phone') }"/>
                                                            <has-error :form="form" field="phone"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input v-model="form.email" type="email" name="email"
                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('email') }"/>
                                                            <has-error :form="form" field="email"></has-error>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Street Address</label>
                                                            <input v-model="form.address" type="text" name="address"
                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('adress') }"/>
                                                            <has-error :form="form" field="address"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input v-model="form.cap" type="number" name="cap"
                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('cap') }"/>
                                                            <has-error :form="form" field="cap"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Professional Work</label>
                                                            <input v-model="form.work" type="text" name="work"
                                                                   class="form-control" :class="{ 'is-invalid': form.errors.has('work') }"/>
                                                            <has-error :form="form" field="work"></has-error>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="tab-pane" id="settings">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="media-body">
                                                                <label class="bmd-label-floating"></label>
                                                                <vue-editor v-model="form.body" :class="{ 'is-invalid': form.errors.has('body') }"
                                                                            :editorToolbar="customToolbar"></vue-editor>
                                                                <has-error :form="form" field="body"></has-error>
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
                                             <router-link  :to="{ path: `/${form.username}` }" class="btn btn-info btn-round btn-raised" title="View">
                                                <b class="title_hover">view profile</b>
                                             </router-link>
                                            <button id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised btn-round">
                                                <b class="title_hover">Update profile</b>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    export default {
        name: "RegisterIndex",
        data() {
            return {
                colors:{},
                countries:{},
                form: new Form({
                    id: '',
                    name: '',
                    first_name: '',
                    last_name: '',
                    work: '',
                    sex: '',
                    age: '',
                    email: '',
                    body: '',
                    username: '',
                    color_name: '',
                    color_style: '',
                    phone: '',
                    cap: '',
                    avatar: '',
                    avatarcover: '',
                    address: '',
                    country_id: '',
                }),
                customToolbar: [
                    [{'header': [1, 2, 3, 4, 5, 6, false]}],
                    [{'font': []}],
                    //[{ 'header': [false, 1, 2, 3, 4, 5, 6, ] }],
                    //[{ 'size': ['small', false, 'large', 'huge'] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{'align': []}],
                    //[{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['blockquote', 'code-block'],
                    //['blockquote', 'code-block'],
                    //[{'list': 'ordered'}, {'list': 'bullet'}, {'list': 'check'}],
                    //[{ 'script': 'sub'}, { 'script': 'super' }],
                    //[{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{'color': []}, {'background': []}],
                    //['link', 'image', 'video', 'formula'],
                    ['link'],
                    //[{ 'direction': 'rtl' }],
                    ['clean'],
                    //['emoji'],
                ],
            };
        },

        methods: {

            updateImage(e){
                let file = e.target.files[0];
                let reader = new FileReader();
                let limit = 1024 * 1024 * 2;
                if(file['size'] > limit){
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You are uploading a large file',
                    });
                    return false;
                }
                reader.onloadend = (file) => {
                    this.form.avatar = reader.result;
                };
                reader.readAsDataURL(file);
            },
            updateItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.put('/user/update/')
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
                            notify.update({'type': 'success', 'message': '<strong>Profile updated Successfully.</strong>', 'progress': 75});
                        }, 2000);

                        //End Progress bar
                        this.$Progress.finish();
                    }).catch(() => {
                    //Failled message
                    this.$Progress.fail();
                    //Alert
                    $.notify("Ooop! Something wrong. Try later", {
                        type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
                })
            },
        },

        beforeRouteEnter (to, from, next) {
            axios.get('/api/account/profile')
                .then(({data}) =>  {
                    next(vm => {
                        vm.$Progress.start();
                        vm.form.fill(data);
                        vm.$Progress.finish()
                    })
                });
        },
        created(){
            //Start Progress bar
            this.$Progress.start();
            axios.get("/api/colors").then(({data}) => (this.colors = data.data));
            axios.get("/api/countries").then((response) => ( this.countries = response.data.data));
            //End Progress bar
            this.$Progress.finish()
        }

    }
</script>

<style scoped>

</style>