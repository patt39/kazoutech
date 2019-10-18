<template>
     <div>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Register</div>
                            <div class="card-body">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="profile">

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Pseudo</label>
                                                            <input v-model="userProfile.username" type="text" name="username" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="profileUserIndex-group">
                                                            <label>Last Name</label>
                                                            <input v-model="userProfile.name" type="text" name="name" maxlength="25" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input v-model="userProfile.first_name" type="text" maxlength="25" name="first_name" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="padding-top: 10px; padding-bottom: 15px;">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Sex</label>
                                                            <input name="sex" v-model="userProfile.sex" id="sex" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Your Country</label>
                                                            <input name="country_id" v-model="userProfile.country_id" id="country_id" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="profileUserIndex-group">
                                                            <label>Header Color Card</label>
                                                            <input name="color_name" v-model="userProfile.color_name" id="color_name" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Sidebar Filters Color Menu</label>
                                                            <input name="color_style" v-model="userProfile.color_style" id="color_style" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Age</label>
                                                            <input type="text" v-model="userProfile.age" name="my_birthday" maxlength="2" class="form-control" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Your Phone Number</label>
                                                            <input v-model="userProfile.phone" type="number" name="phone"  class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input v-model="userProfile.email" type="email" name="email"  class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Street Address</label>
                                                            <input v-model="userProfile.address" type="text" name="address"  class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input v-model="userProfile.cap" type="number" name="cap"  class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Professional Work</label>
                                                            <input v-model="userProfile.work" type="text" name="work"  class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="tab-pane" id="settings">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="media-body">
                                                                <label class="bmd-label-floating"></label>
                                                                <vue-editor v-model="userProfile.body" disabled
                                                                            :editorToolbar="customToolbar"></vue-editor>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="submit">
                                                    <div class="text-center">
                                                        <router-link :to="{ path: `/profile/t/${userProfile.username}` }" class="btn btn-danger btn-round">
                                                            <b>Technician profile</b>
                                                        </router-link>
                                                       <template v-if="!guest">
                                                           <router-link v-if="userProfile.id === user.id" :to="{ name: 'profile.edit' }" class="btn btn-success btn-round" id="button_hover">
                                                               <b class="title_hover">Edit profile</b>
                                                           </router-link>
                                                       </template>
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
    import api from '../../../api/mixins/collections';
    export default {
        data() {
            return {
                colors:{},
                userProfile:{},
                countries:{},
            };
        },

        methods: {

        },
        created(){
            //Start Progress bar
            this.$Progress.start();
            api.userUsername(this.$route.params.username).then(response => {
                this.userProfile = response.data.data
            });
            //End Progress bar
            this.$Progress.finish()
        }

    }
</script>

<style scoped>

</style>
