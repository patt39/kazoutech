<template>
    <div class="services-page">
        <div class="wrapper">
            <div class="section-shaped my-0 skew-separator skew-mini">
                <div class="page-header page-header-small header-filter">
                    <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/nathan-dumlao.jpg');">
                    </div>
                    <div class="container">
                        <div class="header-body text-center mb-7">
                            <div class="row justify-content-center">
                                <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                                    <h1 class="text-white">Occupations </h1>
                                    <p class="text-lead text-white">Du service a la personne et du main à main entre particuliers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="container text-center">
                <div class="row mb-5">
                    <div class="col-md-10 mx-auto">
                        <h5 class="display-3">Nos offres en quelque clicks choisissez votre occupations</h5>
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
