<template>
     <div>
        <NavSite/>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Register</div>
                            <div class="card-body">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="profile">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="profileUserIndex-group">
                                                            <label class="bmd-label-floating">Company - kazoutech</label>
                                                            <input type="text" class="form-control" disabled/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Pseudo</label>
                                                            <input v-model="profileUserIndex.username" type="text" name="username" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="profileUserIndex-group">
                                                            <label>Last Name</label>
                                                            <input v-model="profileUserIndex.name" type="text" name="name" maxlength="25" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input v-model="profileUserIndex.first_name" type="text" maxlength="25" name="first_name" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Sex</label>
                                                            <input name="sex" v-model="profileUserIndex.sex" id="sex" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Your Country</label>
                                                            <input name="country_id" v-model="profileUserIndex.country_id" id="country_id" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="profileUserIndex-group">
                                                            <label>Header Color Card</label>
                                                            <input name="color_name" v-model="profileUserIndex.color_name" id="color_name" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Sidebar Filters Color Menu</label>
                                                            <input name="color_style" v-model="profileUserIndex.color_style" id="color_style" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Age</label>
                                                            <input type="text" v-model="profileUserIndex.age" name="my_birthday" maxlength="2" class="form-control" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Your Phone Number</label>
                                                            <input v-model="profileUserIndex.phone" type="number" name="phone"  class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input v-model="profileUserIndex.email" type="email" name="email"  class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Street Address</label>
                                                            <input v-model="profileUserIndex.address" type="text" name="address"  class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input v-model="profileUserIndex.cap" type="number" name="cap"  class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Professional Work</label>
                                                            <input v-model="profileUserIndex.work" type="text" name="work"  class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="tab-pane" id="settings">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="media-body">
                                                                <label class="bmd-label-floating"></label>
                                                                <vue-editor v-model="profileUserIndex.body" disabled
                                                                            :editorToolbar="customToolbar"></vue-editor>
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
            </div>
        </main>
    </div>
</template>

<script>
   import NavSite from "../../inc/user/NavSite";
    export default {
        name: "RegisterIndex",
        components: {NavSite},
        data() {
            return {
                colors:{},
                countries:{},
                 profileUserIndex: {
                
                },
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
                    this.profileUserIndex.avatar = reader.result;
                };
                reader.readAsDataURL(file);
            },
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