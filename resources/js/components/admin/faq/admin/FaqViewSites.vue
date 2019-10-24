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
                                <div class="toolbar">
                                    <div class="submit text-center" >
                                        <router-link :to="{ name: 'faqs.index' }" id="button_hover" class="btn btn-info btn-raised">
                                            <b class="title_hover">FAQS Datable</b>
                                        </router-link>
                                    </div>
                                </div>
                                <div class="toolbar">
                                    <div class="submit text-center">
                                        <router-link v-for="item in categoryfaqs" :key="item.id" id="button_hover" :to="{ name: 'faqs.dashboard_categoryfaq_sites', params:{ categoryfaq: item.slug}}" class="btn btn-raised btn-sm btn-info">
                                            <i class="material-icons" v-text="item.icon"></i>
                                            <b class="title_hover" v-text="item.name"></b>
                                        </router-link>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-11 ml-auto mr-auto">
                                        <div id="accordion" role="tablist">

                                            <div v-for="(item,index) in faqs" :key="index" class="card card-collapse">
                                                <div class="card-header" role="tab" :id="HeadingFaq(item)">
                                                    <h5 class="mb-0">
                                                        <a class="collapsed" data-toggle="collapse" :href="collapseFaqHr(item)" aria-expanded="false" :aria-controls="collapseFaq(item)">
                                                           {{item.title}}
                                                            <i class="material-icons">keyboard_arrow_down</i>
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div :id="collapseFaq(item)" class="collapse" role="tabpanel" :aria-labelledby="HeadingFaq(item)" data-parent="#accordion">
                                                    <div class="card-body text-justify" v-html="item.body"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="toolbar">
                                    <div class="submit text-center" >
                                        <infinite-loading spinner="waveDots" @infinite="infiniteHandler">
                                            <span slot="no-more">:(</span>
                                        </infinite-loading>
                                    </div>
                                </div>

                                <br>
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
    import api from '../../../../routes/admin/categoryfaq';
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin},
        data() {
            return {
                page: 1,
                faqs: [],
                user: {},
                categoryfaqs: {},

            }
        },
        methods: {
            /**
             * @return {string}
             */
            HeadingFaq(item){
                return `headingFaq-${item.id}`;
            },
            collapseFaq(item){
                return `collapseFaq-${item.id}`;
            },
            collapseFaqHr(item){
                return `#collapseFaq-${item.id}`;
            },
            infiniteHandler($state) {
                axios.get(`/api/faqs/sites`, {
                    params: {
                        page: this.page,
                    },
                }).then(response => {
                    if (response.data.length) {
                        this.page += 1;
                        this.faqs.push(...response.data);
                        $state.loaded();
                    } else {
                        $state.complete();
                    }
                });
            },
        },
        created() {
            api.categoryfaqbystatus(this.$route.params).then(response => {
                this.categoryfaqs = response.data
            });
        },

    }
</script>

<style scoped>

</style>
