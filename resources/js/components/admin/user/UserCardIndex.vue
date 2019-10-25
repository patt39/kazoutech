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
                                                <div class="card-body">
                                                    <h6 v-if="item.statusOnline"><span class="badge badge-success" title="User online">Online</span></h6>
                                                    <h6 v-else="item.statusOnline"><span class="badge badge-danger" title="user offline">Offline</span></h6>
                                                    <h4 class="card-title"><b>Sex:</b> {{ item.sex }}</h4>
                                                    <h4 class="card-title"><b>Age:</b> 12 ans</h4>
                                                    <h4 class="card-title"><b>{{ item.name }} {{ item.first_name }}</b></h4>
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
            }
        },
        methods:{
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
