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
                        <div class="col-md-12 expo">
                            <div class="card">
                                <br>
                                <div class="card-body">
                                    
                                    <div class="row">
                                        <div v-for="(item,index) in users" :key="index" class="col-md-4 col-sm-4 ">
                                            <div class="card card-profile">
                                                <div class="card-avatar">
                                                    <a href="#pablo">
                                                        <img class="img" :src="item.avatar" :alt="item.name"/>
                                                    </a>
                                                </div>
                                                <div class="stats text-center">
                                                    <button @click="viewItem(item)" class="btn btn-warning btn-just-icon btn-fill btn-round btn-sm">
                                                        <i class="material-icons">visibility</i>
                                                    </button>
                                                     <router-link  v-if="$auth.can('edit-user')" :to="{ name: 'users.edit', params: { id: item.id  } }" class="btn btn-success btn-just-icon btn-fill btn-sm btn-round btn-wd" title="Edit">
                                                        <i class="material-icons">mode_edit</i>
                                                    <div class="ripple-container"></div>
                                                    </router-link>
                                                </div>
                                                <div class="card-body">
                                                    <h6 v-if="item.statusOnline"><span class="badge badge-success" title="User online">Online</span></h6>
                                                    <h6 v-else="item.statusOnline"><span class="badge badge-danger" title="user offline">Offline</span></h6>
                                                     <h4 class="card-title"><b>{{ item.name }} {{ item.first_name }}</b></h4>
                                                    <h4 class="card-title"><b>Sex:</b> {{ item.sex }}</h4>
                                                    <h4 class="card-title"><b>Age:</b> 12 ans</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="toolbar">
                                        <div class="submit text-center" >
                                            <infinite-loading spinner="waveDots" @infinite="infiniteHandler">
                                                <span slot="no-more">:(</span>
                                            </infinite-loading>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                       <!-- Modal view technician -->
                                    <div class="modal fade" id="viewNew" role="dialog" tabindex="-1">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addNewLabel"><b>Profile user</b></h5>
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                            type="button">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- profile Image -->
                                                    <div class="row">
                                                        <div class="col-md-6 ml-auto mr-auto">
                                                            <div class="profile text-center "
                                                                 style="padding-top: -100px;">
                                                                <div class="avatar">
                                                                    <div class="fileinput fileinput-new text-center"
                                                                         data-provides="fileinput">
                                                                        <div
                                                                            class="fileinput-new thumbnail img-circle img-raised">
                                                                            <img :alt="userProfile.name"
                                                                                 :src="userProfile.avatar">
                                                                        </div>
                                                                        <div
                                                                            class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Pseudo</label>
                                                                <input class="form-control" name="username"
                                                                       type="text" v-model="userProfile.username">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input class="form-control" maxlength="25"
                                                                       name="name" type="text" v-model="userProfile.name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input class="form-control" maxlength="25"
                                                                       name="first_name" type="text"
                                                                       v-model="userProfile.first_name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Sex</label>
                                                                <input class="form-control" maxlength="25"
                                                                       name="first_name" type="text"
                                                                       v-model="userProfile.sex">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Age</label>
                                                                <input class="form-control" maxlength="2"
                                                                       name="my_birthday" type="text"
                                                                       v-model="userProfile.age">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Your Phone Number</label>
                                                                <input class="form-control" name="phone"
                                                                       type="number"
                                                                       v-model="userProfile.phone">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input class="form-control" name="email"
                                                                       type="email"
                                                                       v-model="userProfile.email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Street Address</label>
                                                                <input class="form-control" name="address"
                                                                       type="text"
                                                                       v-model="userProfile.address">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Postal Code</label>
                                                                <input class="form-control" name="cap"
                                                                       type="number"
                                                                       v-model="userProfile.cap">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Professional Work</label>
                                                                <input class="form-control" name="work"
                                                                       type="text" v-model="userProfile.work">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" data-dismiss="modal" type="button">
                                                        <span class="btn-label">
                                                            <i class="material-icons">clear</i>
                                                            <b>Close</b>
                                                        </span>
                                                    </button>
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
    export default {
        components: {StatusAdmin},
        data(){
            return {
                page: 1,
                users: [],
                userProfile:[],
            }
        },
        methods:{
              viewItem(item) {
                //Masquer le modal après la création
                $("#viewNew").modal("show");
                //On passe les informations
                this.userProfile = item;
            },
            infiniteHandler($state) {
                axios.get(`/api/users`, {
                    params: {
                        page: this.page,
                    },
                }).then(response => {
                    if (response.data.length) {
                        this.page += 1;
                        this.users.push(...response.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                });
            },
        },
        created() {
            Fire.$on('searching',() => {
                let query = this.$parent.search;
                axios.get('api/usersfind?q=' + query)
                    .then((data) => {
                        this.users = data.data
                    })
                    .catch(() => {
                    })
            });
        }
    }
</script>

<style scoped>

</style>
