<template>
    <div class="landing-page">
        <div class="wrapper">
            <div class="page-header page-header-small header-filter">
                <div class="page-header-image" style="background-image: url('/assets/vendor_site/img/pages/georgie.jpg');"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 mx-auto text-center">
                            <h2 class="display-2 text-white">Du service a la personne et du main à main entre particuliers</h2>
                            <a href="/service" class="btn btn-success btn-lg mt-500" name="button">
                                <span class="button-inner--text pt-40 text-uppercase">Demande un service</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section features">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mx-auto text-center">
                            <h3 class="display-3">Comment sa marche?</h3>
                            <p class="lead">Kazoutech vous offre l'opportunité de travailler tout en restant auto-entreprenuer. Quesque vous attendez? devenez un des notre</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                                    <i class="ni ni-settings-gear-65"></i>
                                </div>
                                <h6 class="info-title text-uppercase text-primary">Créez votre profile</h6>
                                <p class="description opacity-8">We get insulted by others, lose trust for those others. We get back stabbed by friends. It becomes harder for us to give others a hand.</p>
                                <a href="..." class="btn btn-primary" name="button">
                                    <span class="nav-link-inner--text pt-40">Inscription</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                                    <i class="ni ni-atom"></i>
                                </div>
                                <h6 class="info-title text-uppercase text-success">Dévenez bosseur</h6>
                                <p class="description opacity-8">Don't get your heart broken by people we love, even that we give them all we have. Then we lose family over time. As we live, our hearts turn colder.</p>
                                <a href="..." class="btn btn-success" name="button">
                                    <span class="nav-link-inner--text pt-40">Inscription</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                                    <i class="ni ni-world"></i>
                                </div>
                                <h6 class="info-title text-uppercase text-warning">Faite vous de l'argent</h6>
                                <p class="description opacity-8">What else could rust the heart more over time? Blackgold. The time is now for it to be okay to be great. or being a bright color. For standing out.</p>
                                <a href="..." class="btn btn-warning" name="button">
                                    <span class="nav-link-inner--text pt-40">Inscription</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container text-center">
                <div class="row mb-5">
                    <div class="col-md-8 mx-auto">
                        <h3 class="display-4">Nos offres en quelques clicks choisissez votre categorie</h3>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div v-for="item in occupations" :key="item.id" class="col-lg-3">
                        <div class="card card-blog card-background" data-animation="zooming">
                            <div class="full-background" :style="{ backgroundImage: 'url(' + item.photo + ')' }"></div>
                            <a href="javascript:;">
                                <div class="card-body">
                                    <div class="content-bottom">
                                        <h5 class="card-title text-center" v-html="item.name"></h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <br/>
          <div class="section features-7 bg-secondary">
              <div class="container">
                <div class="row">
                    <div class="col-md-8 text-center mx-auto">
                    <h4 class="display-5">Le service entre particuliers jamais aussi facile</h4>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-12">
                    <div class="row row-grid">
                        <div class="col-lg-4">
                        <div class="card card-lift--hover shadow border-0">
                            <div class="card-body py-5">
                            <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                                <i class="ni ni-check-bold"></i>
                            </div>
                            <h6 class="text-primary text-uppercase">Kazoutech plateforme par excelence</h6>
                            <p class="description mt-3">Because I’m here to follow my dreams and inspire other people to follow their dreams, too. That’s what I’m here for. </p>
                            <a href="#" class="btn btn-primary mt-4">Learn more</a>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="card card-lift--hover shadow border-0">
                            <div class="card-body py-5">
                            <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                                <i class="ni ni-istanbul"></i>
                            </div>
                            <h6 class="text-success text-uppercase">Confiance absolut</h6>
                            <p class="description mt-3">Society has put up so many boundaries, so many limitations on what’s right and wrong that it’s almost impossible.</p>
                            <a href="#" class="btn btn-success mt-4">Learn more</a>
                            </div>
                        </div>
                        </div>
                     <div class="col-lg-4">
                        <div class="card card-lift--hover shadow border-0">
                            <div class="card-body py-5">
                            <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                                <i class="ni ni-planet"></i>
                            </div>
                            <h6 class="text-warning text-uppercase">Tout vos bésoins en quelques minute</h6>
                            <p class="description mt-3">Why would anyone pick blue over pink? Pink is obviously a better color.Everyone’s born confident, and everything’s...</p>
                            <a href="#" class="btn btn-warning mt-4">Learn more</a>
                            </div>
                        </div>
                        </div>
                    </div>
                     <div class="section pub-cities">
                         <div class="container">
                             <div class="row">
                              <div class="col-md-8 text-center mx-auto">
                           <h4 class="display-5">Nous somme partout et beaucoups en parlent</h4>
                           </div>
                      </div>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <small class="d-block text-uppercase font-weight-bold mb-4">Douala</small>
                            <img src="/assets/vendor_site/img/faces/team-1.jpg" alt="Rounded image" class="img-fluid rounded shadow" style="width: 150px;">
                        </div>
                        <div class="col-sm-3 col-6">
                            <small class="d-block text-uppercase font-weight-bold mb-4">Yaoundé</small>
                            <img src="/assets/vendor_site/img/faces/team-2.jpg" alt="Circle image" class="img-fluid rounded-circle shadow" style="width: 150px;">
                        </div>
                        <div class="col-sm-3 col-6 mt-5 mt-sm-0">
                            <small class="d-block text-uppercase font-weight-bold mb-4">Bafoussam</small>
                            <img src="/assets/vendor_site/img/faces/team-3.jpg" alt="Raised image" class="img-fluid rounded shadow-lg" style="width: 150px;">
                        </div>
                        <div class="col-sm-3 col-6 mt-5 mt-sm-0">
                            <small class="d-block text-uppercase font-weight-bold mb-4">Bamenda</small>
                            <img src="/assets/vendor_site/img/faces/team-4.jpg" alt="Raised circle image" class="img-fluid rounded-circle shadow-lg" style="width: 150px;">
                        </div>
                        </div>
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
    </div>
</template>

<script>
    import FooterUserSite from "../inc/user/FooterUserSite";
    export default {
        components: {FooterUserSite},
        data() {
            //here get title of the site
            let composantTitle = 'Technicians services to particulars';
            document.title = `${composantTitle}`;
            return {
                occupations: {},
            };
        },

        methods:{
            loadItems(){
                dyaxios.get(route('api_active.occupations')).then(response => ( this.occupations = response.data))
            }
        },

        created() {
            this.loadItems();
        }
    }
</script>

<style scoped>

</style>
