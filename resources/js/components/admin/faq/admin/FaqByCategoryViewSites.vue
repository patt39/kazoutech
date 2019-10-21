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
                                            <b class="title_hover">FAQS Datable {{categoryfaqs.length}}</b>
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

                                            <div  v-for="(item, i) in faqs" :key="`${i}-${item.id}`" class="card card-collapse">
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
                                        <infinite-loading @infinite="infiniteHandler">
                                             <span slot="no-more">
                                               Plus de donner :(
                                            </span>
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
    import api from '../../../../routes/admin/faq';
    import StatusAdmin from "../../../inc/admin/StatusAdmin";
    export default {
        components: {StatusAdmin},
        data() {
            return {
                page: 1,
                faqs: {categoryfaq:'',},
                categoryfaqs: {},
            };
        },
        created() {
            this.loadItems();
        },
        methods: {
            HeadingFaq(item){
                return `headingFaq-${item.id}`;
            },
            collapseFaq(item){
                return `collapseFaq-${item.id}`;
            },
            collapseFaqHr(item){
                return `#collapseFaq-${item.id}`;
            },
            loadItems() {
               this.$Progress.start();
               api.faqByCatagoryStatus(this.$route.params.categoryfaq).then(response => {
                   console.log(response.data)
                   if (response.data.data.length > 0) {
                       this.loaded = true;
                       this.faqs = response.data.data;
                   }else{
                       console.log('No users found.');
                   }
               });
                api.categoryfaqbystatus(this.$route.params).then(response => {
                   this.categoryfaqs = response.data
               });
                this.$Progress.finish();
           },
            infiniteHandler: function ($state) {
                let limit = this.faqs.length / 6 + 1;
                api.faqByCatagoryStatus(this.$route.params.categoryfaq,
                    { params: { page: limit } }).then(response => {
                    this.loadMore($state, response);
                });
            },
            loadMore: function ($state, response) {
                if (response.data.data.length) {
                    this.faqs = this.faqs.concat(response.data.data);
                    setTimeout(() => {
                        $state.loaded();
                    }, 3000);
                    console.log(this.faqs.length)
                    if (response.data.meta.total == 11 ) {
                        $state.complete();
                    }
                } else {
                    $state.complete();
                }
            },
        },
    };
</script>

<style scoped>

</style>
