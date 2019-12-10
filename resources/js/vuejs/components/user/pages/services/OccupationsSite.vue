<template>
    <div class="services-page">
        <div class="wrapper">
            <div class="page-header page-header-small header-filter">
                <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/nathan-dumlao.jpg');"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center">
                            <h2 class="display-2 text-white">Du service a la personne et du main à main entre particuliers</h2>
                            <a href="/service" class="btn btn-success btn-lg mt-500" name="button">
                                <span class="button-inner--text pt-40 text-uppercase">Devenez bosseur</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
           <br /><br />
            <div class="container text-center">
                <div class="row mb-5">
                    <div class="col-md-8 mx-auto">
                        <h3 class="display-3">Nos offres en quelque clicks choisissez votre categorie</h3>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div v-for="item in occupations" :key="item.id" class="col-lg-3">
                        <div class="card card-blog card-background" data-animation="zooming">
                            <div class="full-background" :style="{ backgroundImage: 'url(' + item.photo + ')' }"></div>
                            <router-link :to="{ name: 'occupations.slug', params: { slug: item.slug  } }" exact>
                                <div class="card-body">
                                    <div class="content-bottom">
                                        <h5 class="card-title text-center" v-html="item.name"></h5>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                </div>
                <br /><br />
            </div>
            <br/>
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
            return {
                occupations: {},
            };
        },

        methods:{
            //
        },
        beforeRouteEnter(to, from, next) {
            document.title = to.meta.title;
            dyaxios.get(route('api_active.occupations')).then(response => {
                    next(vm => {vm.occupations = response.data;})
            });
        }
    }
</script>

<style scoped>

</style>
