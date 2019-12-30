import React, { Component } from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";


class AboutSite extends Component {
    constructor(props) {
        super(props);
        this.state = {}
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'About';
        document.title = `${composantTitle} | Kazoutech`;
    }

    render() {
        return (
            <>
                <div className="about-us">
                    <NavUserSIte />
                    <div className="wrapper">
                        <div className="page-header page-header-mini header-filter">
                            <div className="page-header-image page-header-mini"
                                style={{ backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")" }} />
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto text-center">
                                        <h2 className="display-2 text-white">A propos de nous...</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="section features-4">
                            <div className="container">
                                <div className="row align-items-center">
                                    <div className="col-lg-4 mr-auto text-left mt-4">
                                        <div className="card bg-default shadow border-0">
                                            <img src="/assets/vendor_site/img/theme/img-1-1200x1000.jpg"
                                                className="card-img-top" />
                                            <blockquote className="card-blockquote">
                                                <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 583 95" className="svg-bg">
                                                    <polygon points="0,52 583,95 0,95"
                                                        className="fill-default"></polygon>
                                                    <polygon points="0,42 583,95 683,0 0,95" opacity=".2"
                                                        className="fill-default"></polygon>
                                                </svg>
                                                <h4 className="display-4 text-white">Technologies pour tous</h4>
                                                <p className="lead text-italic text-white">Les nouvelles technologies
                                                    pour et a la porter de tous pour amegliorer les relation humaines et
                                                    le service entre voisin.</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div className="col-lg-7 p-sm-0">
                                        <div className="row">
                                            <div className="col-md-6">
                                                <div className="info info-hover-warning">
                                                    <div
                                                        className="icon icon-shape bg-warning shadow rounded-circle text-primary">
                                                        <i className="ni ni-satisfied text-white"></i>
                                                    </div>
                                                    <h5 className="info-title">Meilleur des services</h5>
                                                    <p className="description opacity-8">Sur notre plateforme nous
                                                        travaillons avec des personne honnete et digne de confiance qui
                                                        saurons vous apporter les meilleur des services qui sois dans de
                                                        bréf délais.</p>
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <div className="info info-hover-info">
                                                    <div
                                                        className="icon icon-shape bg-info shadow rounded-circle text-primary">
                                                        <i className="ni ni-palette text-white"></i>
                                                    </div>
                                                    <h5 className="info-title">Pèspectifs de travail</h5>
                                                    <p className="description opacity-8">Nous nous assurons du bon
                                                        déroulement de votre tache tout en réspectant les consigne de
                                                        securité et le droit du travail.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row mt-lg-4">
                                            <div className="col-md-6">
                                                <div className="info info-hover-danger">
                                                    <div
                                                        className="icon icon-shape bg-danger shadow rounded-circle text-primary">
                                                        <i className="ni ni-user-run text-white"></i>
                                                    </div>
                                                    <h5 className="info-title">Transparence</h5>
                                                    <p className="description opacity-8">La transparence et la
                                                        reconnaisançe sont de valeurs que nous mettons a avant et
                                                        cherchons a amegliorer sans cèsse pour un avenir meilleur.</p>
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <div className="info info-hover-success">
                                                    <div
                                                        className="icon icon-shape bg-success shadow rounded-circle text-primary">
                                                        <i className="ni ni-glasses-2 text-white"></i>
                                                    </div>
                                                    <h5 className="info-title">Révenue garantit</h5>
                                                    <p className="description opacity-8">En fin mais pas de moindre nous
                                                        voulons apporter une assurance de revenue pour arrondir les fin
                                                        de mois difficile tout en conservant votre statut
                                                        d'auto-entrepreneur.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section className="blogs-6">
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto">
                                        <h3 className="display-3 mb-5">Notre Derniér Blogpost</h3>
                                        <div className="card card-blog card-background card-grande"
                                            data-animation="zooming">
                                            <div className="full-background"
                                                style={{ backgroundImage: "url(" + '/assets/vendor_site/img/sections/unsplashs.jpg' + ")" }}></div>
                                            <a href="..">
                                                <div className="card-body mb-4">
                                                    <h2 className="card-title">Miami Vice</h2>
                                                    <p className="card-description text-white">Une simple illustration
                                                        de comment nous travaillons pour toujours vous apporter le
                                                        meilleur de nos service</p>
                                                    <br />
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section className="team">
                            <div className="container">
                                <div className="row">
                                    <div className="col-md-8 ml-auto mr-auto text-center">
                                        <h3 className="display-3">Notre super Equipe</h3>
                                        <p className="lead">En quelque mots les artisans derriere cette ingenieuse
                                            immagination se presente. Nhesitez pas de nous contacter pour mieux nous
                                            conaitre nous somme toujours a votre disposition </p>
                                    </div>
                                </div>


                                <div className="row">
                                    <div className="col-lg-4 col-md-6">
                                        <div className="card card-profile" data-image="profile-image">
                                            <div className="card-header">
                                                <div className="card-image">
                                                    <a href="..">
                                                        <img className="img rounded"
                                                            src="/assets/vendor_site/img/faces/ali-pazani.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div className="card-body pt-0">
                                                <h4 className="display-4 mb-0">Boclair Temgoua</h4>
                                                <p className="lead">UX Designer</p>
                                                <div className="table-responsive">
                                                    <ul className="list-unstyled ">
                                                        <li className="py-1">
                                                            <div className="d-flex align-items-center">
                                                                <div>
                                                                    <div
                                                                        className="badge badge-circle badge-info mr-3">
                                                                        <i className="ni ni-atom"></i>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h6 className="mb-1">Keen on great
                                                                                design</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li className="py-1">
                                                            <div className="d-flex align-items-center">
                                                                <div>
                                                                    <div
                                                                        className="badge badge-circle badge-success mr-3">
                                                                        <i className="ni ni-user-run"></i>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h6 className="mb-1">Outdors lover</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li className="py-1">
                                                            <div className="d-flex align-items-center">
                                                                <div>
                                                                    <div
                                                                        className="badge badge-circle badge-danger mr-3">
                                                                        <i className="ni ni-chart-bar-32"></i>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h6 className="mb-1">Super friendly support
                                                                                team</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-lg-4 col-md-6">
                                        <div className="card card-profile" data-image="profile-image">
                                            <div className="card-header">
                                                <div className="card-image">
                                                    <a href="..">
                                                        <img className="img rounded"
                                                            src="/assets/vendor_site/img/faces/team-5.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div className="card-body pt-0">
                                                <h4 className="display-4 mb-0">Patrick Noubissi</h4>
                                                <p className="lead">Team Lead</p>
                                                <div className="table-responsive">
                                                    <ul className="list-unstyled ">
                                                        <li className="py-1">
                                                            <div className="d-flex align-items-center">
                                                                <div>
                                                                    <div
                                                                        className="badge badge-circle badge-info mr-3">
                                                                        <i className="ni ni-atom"></i>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h6 className="mb-1">Dedicated
                                                                                entrepreneur</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li className="py-1">
                                                            <div className="d-flex align-items-center">
                                                                <div>
                                                                    <div
                                                                        className="badge badge-circle badge-success mr-3">
                                                                        <i className="ni ni-user-run"></i>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h6 className="mb-1">Urban exploration</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li className="py-1">
                                                            <div className="d-flex align-items-center">
                                                                <div>
                                                                    <div
                                                                        className="badge badge-circle badge-danger mr-3">
                                                                        <i className="ni ni-chart-bar-32"></i>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h6 className="mb-1">Able to get good at
                                                                                everything</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-lg-4 col-md-6">
                                        <div className="card card-profile" data-image="profile-image">
                                            <div className="card-header">
                                                <div className="card-image">
                                                    <a href="..">
                                                        <img className="img rounded"
                                                            src="/assets/vendor_site/img/faces/atikh.jpg" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div className="card-body pt-0">
                                                <h4 className="display-4 mb-0">Randrin</h4>
                                                <p className="lead">Content Creator</p>
                                                <div className="table-responsive">
                                                    <ul className="list-unstyled ">
                                                        <li className="py-1">
                                                            <div className="d-flex align-items-center">
                                                                <div>
                                                                    <div
                                                                        className="badge badge-circle badge-info mr-3">
                                                                        <i className="ni ni-atom"></i>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h6 className="mb-1">High quality
                                                                                publication</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li className="py-1">
                                                            <div className="d-flex align-items-center">
                                                                <div>
                                                                    <div
                                                                        className="badge badge-circle badge-success mr-3">
                                                                        <i className="ni ni-user-run"></i>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h6 className="mb-1">Storytelling</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li className="py-1">
                                                            <div className="d-flex align-items-center">
                                                                <div>
                                                                    <div
                                                                        className="badge badge-circle badge-danger mr-3">
                                                                        <i className="ni ni-chart-bar-32"></i>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <h6 className="mb-1">Master of words
                                                                                qualification</h6>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <FooterUserSite />
                    </div>
                </div>
            </>
        )
    }

}

export default AboutSite;
