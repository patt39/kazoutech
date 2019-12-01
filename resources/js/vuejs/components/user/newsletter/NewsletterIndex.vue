<template>
    <div>
        <form method="post" action="" @submit.prevent="createItem" accept-charset="UTF-8" @keydown="form.onKeydown($event)">
            <div class="row justify-content-center text-center mb-lg">
                <div class="col-lg-8 col-12">
                    <h6 class="display-4">Abonnez vous à notre newsletter pour etre notifié des derniers mise a jour!</h6>
                    <div class="row row-input">
                        <div  id="fooDiv" class="fooDiv col-sm-8 col-12">
                            <input type="text"  class="form-control" placeholder="Votre adresse e-mail"  name="foo" id="foo">
                        </div>
                        <div class="col-sm-8 col-12">
                            <input v-model="form.user_email" type="email" name="user_email" class="form-control" :class="{ 'is-invalid': form.errors.has('user_email') }" placeholder="Votre adresse e-mail" aria-label="Your email" required>
                            <has-error :form="form" field="user_email"></has-error>
                        </div>
                        <div class="col-sm-4 col-12 pl-lg-0">
                            <button :disabled="form.busy" type="submit" class="btn btn-primary btn-block">S'abonner</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    user_email: ""
                })
            };
        },

        methods: {
            createItem() {
                //Start Progress bar
                this.$Progress.start();

                this.form.post("subscribers").then(() => {
                        /** Dèbut de l'alert **/
                        $.notify('<strong>Merci de vous inscrire à la newsletter !</strong>', {
                            allow_dismiss: false,
                            type: 'primary',
                            placement: {
                                from: 'bottom',
                                align: 'center'
                            },
                            animate: {
                                enter: "animated fadeInUp",
                                exit: "animated fadeOutDown"
                            },
                        });
                        /** Fin de l'alert **/

                        //End Progress bar
                        this.$Progress.finish();

                        this.form.reset();
                    }).catch(error => {
                    //Failled message
                    this.$Progress.fail();
                    //Alert
                    $.notify("Ooop! Something wrong. Try later", {
                        allow_dismiss: false,
                        type: 'danger',
                        placement: {
                            from: 'bottom',
                        },
                        animate: {
                            enter: "animated fadeInUp",
                            exit: "animated fadeOutDown"
                        },
                    });
                });
            }
        },

    }
</script>

<style scoped>

</style>
