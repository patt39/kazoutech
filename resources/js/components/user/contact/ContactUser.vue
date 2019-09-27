<template>
    <div>
        <vue-progress-bar/>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Contact Us</div>
                             <div class="card-body">
                                <form id="RegisterValidation" accept-charset="UTF-8" @keydown="form.onKeydown($event)" method="POST" @submit.prevent="createItem()" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                        <div class="col-md-6">
                                            <input v-model="form.name"  id="name" type="text" :class="{ 'is-invalid': form.errors.has('name') }"  class="form-control" name="name">
                                            <has-error :form="form" field="name"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                        <div class="col-md-6">
                                            <input v-model="form.email"  id="email" type="email" :class="{ 'is-invalid': form.errors.has('email') }"  class="form-control" name="email">
                                            <has-error :form="form" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="first_name" class="col-md-4 col-form-label text-md-right">First name</label>

                                        <div class="col-md-6">
                                            <input v-model="form.first_name"  id="first_name" type="text" :class="{ 'is-invalid': form.errors.has('first_name') }" class="form-control" name="first_name">
                                            <has-error :form="form" field="first_name"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name</label>

                                        <div class="col-md-6">
                                            <input v-model="form.last_name"  :class="{ 'is-invalid': form.errors.has('last_name') }" id="last_name" type="text" class="form-control" name="last_name">
                                            <has-error :form="form" field="last_name"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name" class="col-md-4 col-form-label text-md-right">Subject</label>

                                        <div class="col-md-6">
                                            <input v-model="form.subject" type="text" name="subject" class="form-control" :class="{ 'is-invalid': form.errors.has('subject') }">
                                            <has-error :form="form" field="subject"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name" class="col-md-4 col-form-label text-md-right">Last name</label>

                                        <div class="col-md-6">
                                            <textarea v-model="form.message" rows="8" name="message" class="form-control" :class="{ 'is-invalid': form.errors.has('message') }" style="height:200px;"></textarea>
                                            <has-error :form="form" field="message"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button :disabled="form.busy" type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <vue-recaptcha
                                                ref="recaptcha"
                                                @verify="onVerify"
                                                sitekey="6Lf_oboUAAAAADoIGJb7c_JQ6oONZlMuov2Fi0k_"></vue-recaptcha>
                                        </div>
                                        <has-error :form="form" field="recaptcha"></has-error>
                                        <ul class="alert alert-danger" v-if="errors.length != 0">
                                            <li v-for="error in errors">
                                                {{ error[0] }}
                                            </li>
                                        </ul>

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

 import VueRecaptcha from 'vue-recaptcha'
export default {
    components: { VueRecaptcha },
    data() {
        return {
            errors: [],
            form: new Form({
                first_name: "",
                last_name: "",
                email: "",
                phone: "",
                subject: "",
                message: "",
                recaptcha: '',
            })
        };
    },

    methods: {
        onVerify(response) {
            this.form.recaptcha = response;
        },
        createItem() {
            //Progress bar star
            this.$Progress.start();

            this.form.post('/contact-cm/save').then(() => {
                this.errors = [];
                this.$refs.recaptcha.reset();
                    /* debut de l'alert **/
                    var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                        allow_dismiss: false,
                        showProgressbar: true,
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp',
                            align: 'center'
                        },
                    });
                    setTimeout(function () {
                        notify.update({
                            'type': 'success',
                            'message': '<strong>Thanks for your message...</strong>',
                            'progress': 100
                        });
                    }, 2000);

                    /* fin **/

                    //Progres bar
                    this.$Progress.finish();

                    this.form.reset();
                })
                .catch(error => {
                    if(error)
                    {
                        this.errors = error.response.data.errors;
                    }
                    this.$Progress.fail();
                    //console.log(data)
                });

            //console.log('mise a jour des donnees')
        }
    },

    created() {
        //Start Progress bar
        this.$Progress.start();

        //End Progress bar
        this.$Progress.finish();
    }
};
</script>

<style scoped>

</style>
