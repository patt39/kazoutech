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
                    <div v-if="!loaded" class="submit">
                        <LoaderEllipsis/>
                    </div>
                    <div v-if="loaded" class="row">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 expo">
                                        <div class="card">
                                            <div :class="getColorCardUser()" style="margin-top: -5px;">
                                                <div class="card-icon">
                                                    <i class="material-icons">forum</i>
                                                </div>
                                                <br>
                                                <h4 class="card-title" style="margin-top: 0px;"><b>Edit</b> -
                                                    <small class="category">Update OccupationFaq</small>
                                                </h4>
                                            </div>

                                            <div class="card-body">
                                                <form id="RegisterValidation" @submit.prevent="updateItem()" role="form"
                                                      method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <input v-model="form.title" type="text" name="title" placeholder="Title Faq" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                                                                <has-error :form="form" field="title"></has-error>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating"></label>
                                                                <select name="occupation_id" v-model="form.occupation_id" id="occupation_id" class="form-control"
                                                                        :class="{ 'is-invalid': form.errors.has('occupation_id') }">
                                                                    <option value="" disabled>Choose Category</option>
                                                                    <option v-for="occupation in occupations" :key="occupation.id" :value="occupation.id">{{occupation.name}}</option>
                                                                </select>
                                                                <has-error :form="form" field="occupation_id"></has-error>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Description <span style="color:red;">*</span></label>
                                                                <br>
                                                                <quill-editor v-model="form.body"
                                                                              :class="{ 'is-invalid': form.errors.has('body') }"
                                                                              :options="editorOption">
                                                                </quill-editor>
                                                                <div class="form-check">
                                                                    <label class="form-check-label pull-right">
                                                                        Created by
                                                                        <router-link :to="{ path: `/admin/profile/${form.user.username}` }" class="text-danger">
                                                                            {{ form.user.name }}
                                                                        </router-link>
                                                                    </label>
                                                                </div>
                                                                <has-error :form="form" field="body"></has-error>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="submit">
                                                        <div class="text-center">
                                                            <router-link :to="{ name: 'faqsoccupation.index' }" class="btn btn-danger btn-raised" id="button_hover">
                                                                <i class="material-icons">chevron_left</i>
                                                                <b class="title_hover">Back</b>
                                                            </router-link>
                                                            <button v-if="$auth.can('edit-faq')" id="button_hover" :disabled="form.busy" type="submit" class="btn btn-success btn-raised">
                                                                <i class="material-icons">save_alt</i>
                                                                <b class="title_hover">Update</b>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
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
    import LoaderEllipsis from "../../../inc/animation/LoaderEllipsis";
    export default {
        components: {LoaderEllipsis, StatusAdmin},
        data() {
            return {
                loaded: false,
                user: {},
                occupations: {},
                form: new Form({
                    id: '',
                    title: '',
                    body: '',
                    user: '',
                    occupation_id:'',
                }),
                editorOption: {
                    // some quill options
                    modules: {
                        toolbar: [
                            [{ 'font': [] }],
                            [{ 'size': ['small', false, 'large', 'huge'] }],
                            ['bold', 'italic', 'underline'],
                            [{'list': 'ordered'}, {'list': 'bullet'}],
                            [{ 'align': [] }],
                            [{ 'color': [] }, { 'background': [] }],
                            ['clean']
                        ]
                    }
                }
            }
        },
        methods: {
            getColorCardUser(){
                return 'card-header card-header-icon card-header-' + this.user.color_name;
            },

            updateItem() {
                //Start Progress bar
                this.$Progress.start();
                this.form.busy = true;

                this.form.put(route('faqs_occupation.update',[this.form.id]))
                    .then(() => {

                        /** Debut de l'alert **/
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>FAQs updated successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'faqsoccupation.index' }));
                        /** Fin alert **/

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
        mounted() {
            this.$Progress.start();
            let ID = this.$route.params.id;
            axios.get(route('faqs_occupation.show',[ID])).then(({data}) => {
                this.loaded = true;
                this.form.fill(data);
            });
            axios.get("/api/occupations").then(({data}) => (this.occupations = data.data));
            axios.get("/api/account/user").then(response => {this.user = response.data.data});
            //End Progress bar
            this.$Progress.finish()
        }
    }
</script>
<style scoped>

</style>

