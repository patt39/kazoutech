<template>
    <div>

        <vue-progress-bar/>
        <div class="main-panel">
            <top-nav></top-nav>
            <div class="content">
                <div class="container-fluid">
                    <br>
                    <StatusAdmin/>
                    <div  class="row">
                        <div class="col-md-12 expo">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="toolbar">
                                           <!--  -->
                                        </div>

                                        <ul v-if="tasks">


                                            <li v-for="item in tasks" :key="item.id">
                                                <strong>Date mise a jour:</strong> {{ item.updated_at | myDate }}
                                            </li>


                                        </ul>

                                        <div class="pagination">
                                            <button :disabled="! prevPage" @click.prevent="goToPrev">Previous</button>
                                            {{ paginationCount }}
                                            <button :disabled="! nextPage" @click.prevent="goToNext">Next</button>
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
    import StatusAdmin from "../../../inc/admin/StatusAdmin";

    const getItems = (page, callback) => {
        const params = { page };

        axios.get('/api/tasks', { params }).then(response => {
                callback(null, response.data);
            }).catch(error => {
            callback(error, error.response.data);
        });
    };

    export default {
        components: {StatusAdmin},
        data() {
            return {
                tasks: null,
                meta: null,
                links: {
                    first: null,
                    last: null,
                    next: null,
                    prev: null,
                },
                error: null,
            };
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

                return `${current_page} of ${last_page}`;
            },
        },
        beforeRouteEnter (to, from, next) {
            getItems(to.query.page, (err, data) => {
                next(vm => vm.setData(err, data));
            });
        },
        // when route changes and this component is already rendered,
        // the logic will be slightly different.
        beforeRouteUpdate (to, from, next) {
            this.tasks = this.links = this.meta = null
            getItems(to.query.page, (err, data) => {
                this.setData(err, data);
                next();
            });
        },
        methods: {
            goToNext() {
                this.$router.push({
                    query: {
                        page: this.nextPage,
                    },
                });
            },
            goToPrev() {
                this.$router.push({
                    name: 'tasks.database',
                    query: {
                        page: this.prevPage,
                    }
                });
            },
            setData(err, { data: tasks, links, meta }) {
                if (err) {
                    this.error = err.toString();
                } else {
                    this.tasks = tasks;
                    this.links = links;
                    this.meta = meta;
                }
            },
        }
    }
</script>
