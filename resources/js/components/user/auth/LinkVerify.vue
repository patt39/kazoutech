<template>
    <div class="row" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="col-md-6 mr-auto ml-auto">
            <div class="card">
                <div class="card-header text-center card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <h4 class="card-title">Email Verification</h4>
                </div>
                <div class="card-body">
                    Before proceding in our platform, please check your registration email for a secure verification.
                    <br>
                </div>
                <div class="card-footer text-right">
                    <div class="form-check mr-auto">
                        Have not received the confirm link ?
                    </div>
                    <div class="submit text-center">
                        <a id="button_hover" href="javascript:void(0)" @click="emailVerify" class="btn btn-success btn-raised btn-round">
									<span class="btn-label">
										<i class="material-icons">email</i>
									</span>
                            <b class="title_hover">Send Again</b>
                        </a>
                    </div>
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
