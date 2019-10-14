<template>
   <div>

       <main class="py-4">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-md-8">
                       <div class="card">
                           <div class="card-header">Register</div>
                           <div class="card-body">
                               <form @keydown="form.onKeydown($event)" method="POST" @submit.prevent="createItem()">
                                   <div class="form-group row">
                                       <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                       <div class="col-md-6">
                                           <input v-model="form.email" id="email" type="email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-control" name="email" required>
                                           <has-error :form="form" field="email"></has-error>
                                       </div>
                                   </div>

                                   <div class="form-group row">
                                       <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                       <div class="col-md-6">
                                           <input v-model="form.password" id="password" :class="{ 'is-invalid': form.errors.has('password') }" type="password" class="form-control" name="password" required>
                                           <has-error :form="form" field="password"></has-error>
                                       </div>
                                   </div>

                                   <div class="form-group row mb-0">
                                       <div class="col-md-6 offset-md-4">
                                           <button :disabled="form.busy" type="submit" class="btn btn-primary">
                                               Login
                                           </button>
                                       </div>
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
    import NavSite from "../../inc/user/NavUserSite";
    export default {
        name: "RegisterIndex",
        components: {NavSite},
        data() {
            return {
                form: new Form({
                    email: "",
                    password: "",
                })
            };
        },

        methods: {
            createItem() {
                //Progress bar star

                this.$Progress.start();

                this.form.post('/login').then(() => {
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

                    location.replace(`/`);
                })
                    .catch(error => {
                        this.$Progress.fail();
                        //console.log(data)
                    });

                //console.log('mise a jour des donnees')
            }
        },

        created() {
            //Start Progress bar
        }

    }
</script>

<style scoped>

</style>
