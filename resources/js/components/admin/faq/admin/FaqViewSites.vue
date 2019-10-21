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

                                            <div v-for="item in faqs" :key="item.id" class="card card-collapse">
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

                                        <button :disabled="! prevPage" @click.prevent="goToPrev" type="button" id="button_hover" class="btn btn-outline-primary btn-raised btn-sm">
                                                  <span class="btn-label">
                                        <i class="material-icons">keyboard_arrow_left</i>
                                    </span>
                                            <b class="title_hover">Previous</b>
                                        </button>

                                        <span v-html="paginationCount"></span>

                                        <button :disabled="! nextPage" @click.prevent="goToNext" type="button" id="button_hover" class="btn btn-outline-primary btn-raised btn-sm">
                                            <b class="title_hover">Next</b>
                                            <span class="btn-label">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                    </span>
                                        </button>
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

    const getItems = (page, callback) => {
        const params = { page };

        axios.get('/api/faqs/sites', { params }).then(response => {
            callback(null, response.data);
        }).catch(error => {
            callback(error, error.response.data);
        });
    };

    export default {
        components: {StatusAdmin},
        data() {
            return {
                user: {},
                categoryfaqs: {},
                faqs: {categoryfaq:'',},
                meta: null,
                links: {
                    first: null,
                    last: null,
                    next: null,
                    prev: null,
                },
                error: null,
            }
        },
        computed: {
            nextPage() {
                if (! this.meta || this.meta.current_page === this.meta.last_page) {
                    return;
                }
                return this.meta.current_page + 1;
            },
            prevPage() {
                if (! this.meta || this.meta.current_page === 1) {
                    return;
                }
                return this.meta.current_page - 1;
            },
            paginationCount() {
                if (! this.meta) {
                    return;
                }
                const { current_page, last_page } = this.meta;

                return`<button type="button" class="btn btn-primary btn-raised btn-sm">
                    ${current_page}
                    </button>

                    <button type="button" class="btn btn-secondary btn-raised btn-sm">
                    <span class="btn-label">
                    <i class="material-icons">swap_horiz</i>
                    </span>
                    </button>

                    <button type="button" class="btn btn-primary btn-raised btn-sm">
                    ${last_page}
                    </button>`
            },
        },
        beforeRouteEnter (to, from, next) {
            next(vm => {
                getItems(to.query.page, (err, data) => {
                     vm.setData(err, data);
                });
                api.categoryfaqbystatus(vm.$route.params).then(response => {
                    vm.categoryfaqs = response.data;
                });
            })

        },
        // when route changes and this component is already rendered,
        // the logic will be slightly different.
        beforeRouteUpdate (to, from, next) {
            this.faqs = this.links = this.meta = null
            getItems(to.query.page, (err, data) => {
                this.setData(err, data);
                next();
            });
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

            /*** Pagination*/
            goToNext() {
                this.$router.push({
                    query: {
                        page: this.nextPage,
                    },
                });
            },
            goToPrev() {
                this.$router.push({
                    name: 'faqs.dashboard_sites',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, { data: faqs, links, meta }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.faqs = faqs;
                    this.links = links;
                    this.meta = meta;
                }
            },
        },

    }
</script>

<style scoped>

</style>
