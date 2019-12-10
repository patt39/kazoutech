<template>
    <div class="contact-page">
        <div class="wrapper">

            <div class="page-header page-header-small header-filter">
                <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/photo-15.jpg');"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center">
                            <h2 class="display-2 text-white">Contactez nous ici.</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="container-fluid">
                    <div class="row mt-5 mb-4 pt-5">
                        <div class="col-md-8 ml-auto mr-auto text-center mt-5">
                            <span class="badge badge-info">Laissez un message</span>
                            <h1 class="title">Dites nous tout à propos de <b>vous</b></h1>
                            <h4 class="desc">Si vous avez des questions ou  just saluez nous somme toujous a votre disposition.</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto ">
                            <form role="form" class="card  p-3" id="contact-form" @submit.prevent="createItem()"
                                  method="POST" action="" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nom<span style="color: red">*</span></label>
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" v-model="form.first_name" :class="{ 'is-invalid': form.errors.has('first_name') }" placeholder="Votre nom..." aria-label="First Name...">
                                                    <has-error :form="form" field="first_name"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Prénom<span style="color: red">*</span></label>
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-tag"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" v-model="form.last_name" :class="{ 'is-invalid': form.errors.has('last_name') }" placeholder="Prénom..." aria-label="Last Name...">
                                                    <has-error :form="form" field="last_name"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Addresse émail<span style="color: red">*</span></label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input type="email" class="form-control" v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }"  placeholder="Email...">
                                            <has-error :form="form" field="email"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject<span style="color: red">*</span></label>
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Object..." v-model="form.subject" :class="{ 'is-invalid': form.errors.has('subject') }">
                                            <has-error :form="form" field="subject"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Votre message<span style="color: red">*</span></label>
                                        <textarea name="message" v-model="form.message" :class="{ 'is-invalid': form.errors.has('message') }" class="form-control form-control-alternative" id="message" rows="6"></textarea>
                                        <has-error :form="form" field="message"></has-error></div>
                                    <div class="row">
                                        <div class="col-md-6 ml-auto">
                                            <button type="submit"  :disabled="form.busy" class="btn btn-primary pull-right">Envoyer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="info info-hover">
                            <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                <i class="ni ni-square-pin"></i>
                            </div>
                            <h4 class="info-title">Addresse</h4>
                            <p class="description px-0">12124 First Street, nr 54</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="info info-hover">
                            <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                <i class="ni ni-email-83"></i>
                            </div>
                            <h4 class="info-title">Email</h4>
                            <p class="description px-0">hello@email.com</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="info info-hover">
                            <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                <i class="ni ni-mobile-button"></i>
                            </div>
                            <h4 class="info-title">Phone</h4>
                            <p class="description px-0">+1(424) 535 3523</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="info info-hover">
                            <div class="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                <i class="ni ni-circle-08"></i>
                            </div>
                            <h4 class="info-title">Contact</h4>
                            <p class="description px-0">Andrew Samian</p>
                        </div>
                    </div>
                </div>
            </div>

      <FooterUserSite/>
      </div>
    </div>
</template>

<script>
    import FooterUserSite from "../../inc/user/FooterUserSite";
    export default {
        components: {FooterUserSite},
        data() {
            //here get title of the site
            let composantTitle = 'Contact page';
            document.title = `${composantTitle}`;
            return {

                form: new Form({
                    first_name: '',
                    last_name: '',
                    email: '',
                    subject: '',
                    message: '',
                }),
            };
        },

        methods:{

            createItem() {
                //Start Progress bar
                this.form.busy = true;
                // Submit the form via a POST request
                this.form.post(route('contact.save'))
                    .then(() => {

                        //Insertion de l'alert !
                        var notify = $.notify('<strong>Please wait a moment</strong> ...', {
                            allow_dismiss: false,
                            showProgressbar: true,
                            animate: {
                                enter: 'animated bounceInDown',
                                exit: 'animated bounceOutUp'
                            },
                        });
                        setTimeout(function() {
                            notify.update({'type': 'success', 'message': '<strong>Faq Created Successfully.</strong>', 'progress': 75});
                        }, 2000);
                        setTimeout(() => this.$router.push({ name: 'faqs.index' }));

                    }).catch(() => {
                    //Failled message
                    $.notify("Ooop! Something wrong. Try later", {
                        type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
                })
            }
        },

        created() {

        }
    }
</script>

<style scoped>

</style>
