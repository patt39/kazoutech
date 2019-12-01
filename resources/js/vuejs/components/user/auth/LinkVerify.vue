<template>
    <div>
        <div class="container">
            <div class="row row-grid justify-content-center">
                <div class="col-lg-8 text-center">
                    <a  class="btn btn-lg" href="javascript:void(0)" @click="emailVerify">
                        <div class="alert alert-danger text-center">
                            <div class="container">
                                <b>Info alert:</b> Your account is not yet activated. Click on this link to activate it.
                            </div>
                        </div>
                    </a>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                //
            };
        },

        methods: {
            emailVerify () {
                //Progress bar star
                this.$Progress.start();
                axios.post(`/email/resend`)
                    .then(() => {
                    /* debut de l'alert **/
                        $.notify('<strong>Un nouveau lien de vérification a été envoyé à votre adresse e-mail.</strong>', {
                            allow_dismiss: false,
                            type: 'primary',
                            placement: {
                                from: 'bottom',
                                align: 'right'
                            },
                            animate: {
                                enter: 'animated bounceInDown',
                                exit: 'animated bounceOutUp'
                            },
                        });
                    /* fin **/
                    //End Progress bar
                    this.$Progress.finish();
                }).catch(error => {
                        this.$Progress.fail();
                        toastr.error('The information is incorrect', '', {timeOut: 5000})
                    });
            }
        },

        created() {
           //
        }
    };
</script>

<style scoped>

</style>
