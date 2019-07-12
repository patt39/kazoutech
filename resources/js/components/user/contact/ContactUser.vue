<template>
    <div class="col-md-7 ml-auto">
        <vue-progress-bar/>
        <br>
        <br>
        <div class="card card-contact">
            <form
                    id="RegisterValidation"
                    accept-charset="UTF-8"
                    @keydown="form.onKeydown($event)"
                    method="POST"
                    @submit.prevent="createItem()"
                    enctype="multipart/form-data"
            >
                <div class="card-header card-header-raised card-header-warning text-center">
                    <h4 class="card-title">
                        <i class="material-icons">call</i>
                        <h4 class="card-title">
                            <b>Contact Us</b>
                        </h4>
                    </h4>
                </div>

                <div class="card-body">
                    <div class="submit text-center"></div>
                    <div id="fooDiv">
                        <label for="foo">Ce champ m'evite les spam dans le server</label>
                        <input type="text" name="foo" id="foo">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="bmd-label-floating">Prenom *</label>
                                <input
                                        v-model="form.last_name"
                                        type="text"
                                        name="last_name"
                                        class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('last_name') }"
                                        required
                                >
                                <has-error :form="form" field="last_name"></has-error>
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating is-empty">
                                <label class="bmd-label-floating">Nom *</label>
                                <input
                                        v-model="form.first_name"
                                        type="text"
                                        name="first_name"
                                        class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('first_name') }"
                                        required
                                >
                                <has-error :form="form" field="first_name"></has-error>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group label-floating is-empty">
                                <label class="bmd-label-floating">youremail@example.com *</label>
                                <input
                                        v-model="form.email"
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('email') }"
                                        required
                                >
                                <has-error :form="form" field="email"></has-error>
                                <span class="material-input"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group label-floating is-empty">
                                <label class="bmd-label-floating">Phone Number</label>
                                <input
                                        v-model="form.phone"
                                        type="number"
                                        name="phone"
                                        class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('phone') }"
                                >
                                <has-error :form="form" field="phone"></has-error>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating is-empty">
                                <label class="bmd-label-floating">Objet *</label>
                                <input
                                        v-model="form.subject"
                                        type="text"
                                        name="subject"
                                        class="form-control"
                                        :class="{ 'is-invalid': form.errors.has('subject') }"
                                        required
                                >
                                <has-error :form="form" field="subject"></has-error>
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group label-floating is-empty">
                        <label class="bmd-label-floating">Your Message *</label>
                        <textarea
                                v-model="form.message"
                                rows="8"
                                name="message"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.has('message') }"
                                style="height:200px;"
                                required
                                autofocus
                        ></textarea>
                        <has-error :form="form" field="message"></has-error>
                        <span class="material-input"></span>
                    </div>
                    <br>
                    <div class="submit text-center">
                        <!--<vue-recaptcha sitekey="6LeYMZcUAAAAAC2KlJhO2hFgumdV-3f7tLt_fEUj">
                        </vue-recaptcha>-->
                        <button id="button_hover" :disabled="form.busy" class="btn btn-warning btn-raised btn-round" type="submit">
                <span class="btn-label">
                  <i class="material-icons">drafts</i>
                </span>
                            <b class="title_hover">Send Message</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
//import VueRecaptcha from "vue-recaptcha";
export default {
    //components: { VueRecaptcha },
    data() {
        return {
            colors: {},
            menucategoryorders: {},
            form: new Form({
                first_name: "",
                last_name: "",
                email: "",
                phone: "",
                subject: "",
                message: ""
            })
        };
    },

    methods: {
        createItem() {
            //Progress bar star
            this.$Progress.start();

            this.form
                .post("contact-us/save")
                .then(() => {
                    /* debut de l'alert **/
                    //var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                    //    allow_dismiss: false,
                    //    showProgressbar: true,
                    //    animate: {
                    //        enter: 'animated bounceInDown',
                    //        exit: 'animated bounceOutUp',
                    //        align: 'center'
                    //    },
                    //});
                    //setTimeout(function () {
                    //    notify.update({
                    //        'type': 'success',
                    //        'message': '<strong>Thanks for your message...</strong>',
                    //        'progress': 100
                    //    });
                    //}, 2000);

                    /* fin **/

                    //Progres bar
                    this.$Progress.finish();

                    this.form.reset();
                })
                .catch(error => {
                    this.$Progress.fail();
                    this.onFail(error.response.data);

                    reject(error.response.data);
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