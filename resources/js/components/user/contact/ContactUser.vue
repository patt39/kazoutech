<template>
    <div>
        <vue-progress-bar/>
        <section class="section section-lg pt-lg-0 section-contact-us">
            <div class="container">
                <div class="row justify-content-center mt--300">
                    <div class="col-lg-8">
                        <form accept-charset="UTF-8" @keydown="form.onKeydown($event)" method="POST" @submit.prevent="createItem" enctype="multipart/form-data">
                            <div class="card bg-gradient-secondary shadow">
                                <div class="card-body p-lg-5">
                                    <h4 class="mb-1">Want to work with us?</h4>
                                    <p class="mt-0">Your project is very important to us.</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group mt-5">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                                    </div>
                                                    <input v-model="form.last_name"  id="last_name" type="text" placeholder="Last Name" :class="{ 'is-invalid': form.errors.has('last_name') }"  class="form-control" name="last_name">
                                                    <has-error :form="form" field="last_name"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group mt-5">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-user-run"></i></span>
                                                    </div>
                                                    <input v-model="form.first_name"  id="first_name" type="text" placeholder="Last Name" :class="{ 'is-invalid': form.errors.has('first_name') }"  class="form-control" name="first_name">
                                                    <has-error :form="form" field="first_name"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input v-model="form.email" placeholder="Email" id="email" type="email" :class="{ 'is-invalid': form.errors.has('email') }"  class="form-control" name="email">
                                            <has-error :form="form" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
                                            </div>
                                            <input v-model="form.subject" placeholder="Subject" id="subject" type="text" :class="{ 'is-invalid': form.errors.has('subject') }"  class="form-control" name="subject">
                                            <has-error :form="form" field="subject"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">

                                        <textarea v-model="form.message" rows="4" cols="80" placeholder="Type a message..." name="message" class="form-control form-control-alternative" :class="{ 'is-invalid': form.errors.has('message') }"></textarea>
                                        <has-error :form="form" field="message"></has-error>
                                    </div>
                                    <div class="form-group mb-4">
                                        <has-error :form="form" field="recaptcha"></has-error>
                                        <ul class="alert alert-danger" v-if="errors.length != 0">
                                            <li v-for="error in errors">
                                                {{ error[0] }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <button type="submit" :disabled="form.busy" class="btn btn-default btn-round btn-block btn-lg">
                                            Send Message
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        <!--<main class="py-4">
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
                                                sitekey="6Lc5kroUAAAAACixvuqpSKI9hzo6g1He4obDGHkw"></vue-recaptcha>
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
        </main>-->
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
        //onVerify(response) {
        //    this.form.recaptcha = response;
        //},
        createItem() {
            //Progress bar star
            this.$Progress.start();

            this.form.post('/contact-cm/save').then(() => {
                this.errors = [];
                //this.$refs.recaptcha.reset();
                    /* debut de l'alert **/
                    $.notify('<strong>Merci pour votre message, nous vous répondrons d\'ici peux </strong>', {
                        allow_dismiss: false,
                        type: 'success',
                        placement: {
                            from: 'bottom',
                            align: 'right'
                        },
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        },
                    });
                    //Progres bar
                    this.$Progress.finish();
                    /* fin **/
                    this.form.reset();
                }).catch(() => {
                    this.$Progress.fail();
                    $.notify('<strong>Ooop! Something wrong. Try later.</strong>', {
                        allow_dismiss: false,
                        type: 'danger',
                        placement: {
                            from: 'bottom',
                            align: 'right'
                        },
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        },
                    });
                });
        }
    },

    created() {
        //Start Progress bar
        this.$Progress.start();
        //
        //End Progress bar
        this.$Progress.finish();
    }
};
</script>

<style scoped>

</style>
