<template>
    <div class="services-page">
        <div class="wrapper">
            <div class="page-header page-header-small header-filter">
                <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/nathan-dumlao.jpg');"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center">
                            <h2 class="display-2 text-white">Occupation description</h2>
                            <a href="/service" class="btn btn-success btn-lg mt-500">
                                <span class="button-inner--text pt-40 text-uppercase">Devenez bosseur</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subscribe-line subscribe-line-white">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 mr-auto">
                            <h4 class="title">Restez a l'affue chaque semaine!</h4>
                            <p class="description">
                                Rejoigniez notre newsletter et ayez de nos nouvelle chaque semaine n ayez craint nous detestons aussi les spam
                            </p>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center flex-column ml-auto">
                            <form method="" action="">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="votre Email..." type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-success btn-block">souscrivez</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <FooterUserSite/>
        </div>
    </div>
</template>

<script>
    import FooterUserSite from "../../../inc/user/FooterUserSite";
    export default {
        components: {FooterUserSite},
        data() {
            let composantTitle = `${this.$route.params.slug}`;
            document.title = `${composantTitle}`;
            return {
                occupation: {},
            };
        },

        methods:{
            loadItems() {
               dyaxios.get(route('occupations.view',this.$route.params.slug))
                    .then(response => {
                        this.occupation = response.data
                    }).catch(error => {
                    this.errored = true
                });
            },
        },

        created() {
            this.loadItems();
        }
    }
</script>

<style scoped>

</style>
