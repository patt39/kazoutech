<template>
    <div class="about-page">
        <div class="wrapper">
           <div class="row">
            <div class="col-lg-10 mx-auto text-center">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-left: 0">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                   <div class="page-header page-header-small header-filter">
              <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/nathan-dumlao.jpg');"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center">
                            <h2 class="display-2 text-white">A propos de nous...</h2>
                        </div>
                    </div>
                </div>
            </div>
                </div>
                 <div class="carousel-item">
                    <div class="page-header page-header-small header-filter" style="margin-left: 0">
                        <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/nathan-dumlao.jpg');"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto text-center">
                                        <h2 class="display-2 text-white">A propos de nous...</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                   <div class="page-header page-header-small header-filter">
                        <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/nathan-dumlao.jpg');"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-10 mx-auto text-center">
                                        <h2 class="display-2 text-white">A propos de nous...</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
            </div>
            </div>
        </div>
    </div>    
</template>

<script>
    import FooterUserSite from "../../inc/user/FooterUserSite";
    export default {
        components: {FooterUserSite},
        data() {
            //here get title of the site
            let composantTitle = 'Faqs page';
            document.title = `${composantTitle}`;
            return {
                
            };
        },

        methods:{

        },

        created() {
        
        }
    }
</script>

<style scoped>

</style>
