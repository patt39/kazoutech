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
                                        <h2 className="display-2 text-white">A Propos de nous ...</h2>
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
                                                <h4 className="display-4 text-white">Comment KazouTech est né ?</h4>
                                                <p className="lead text-italic text-white">KazouTech est né d’un besoin identifié
                                                    sur des personnes compétentes, invisibles au public, qui ont du savoir-faire et à un prix accessible à tous.
                                                    D'où le site dédié aux services à domicile ...</p>
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
                                                    <h5 className="info-title">Meilleurs des services</h5>
                                                    <p className="description text-justify">Nous sommes un site dédié aux services à domicile.
                                                        Nous nous sommes donné comme mission d’améliorer le quotidien des gens, en rendant le service à domicile accessible par l’usage et par le prix.</p>
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <div className="info info-hover-info">
                                                    <div
                                                        className="icon icon-shape bg-info shadow rounded-circle text-primary">
                                                        <i className="ni ni-palette text-white"></i>
                                                    </div>
                                                    <h5 className="info-title">perspectives de travail</h5>
                                                    <p className="description text-justify">
                                                        Nous permettons à des gens de se simplifier la vie et à d’autres de changer leur réalité économique pour la rendre plus confortable.
                                                        Nous nous assurons du bon déroulement de votre tâche tout en respectant les consignes de
                                                        sécurité et le droit du travail.</p>
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
                                                    <p className="description text-justify">En choisissant KazouTech, vous choisissez la sérénité.
                                                        Nous vous accompagnons de l’expression de votre besoin à la réalisation de celui-ci en vous permettant
                                                        de rencontrer des Charbonneurs (Prestataires de service) dans un cade légal et sécurisé.</p>
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <div className="info info-hover-success">
                                                    <div
                                                        className="icon icon-shape bg-success shadow rounded-circle text-primary">
                                                        <i className="ni ni-glasses-2 text-white"></i>
                                                    </div>
                                                    <h5 className="info-title">Révenue garantit</h5>
                                                    <p className="description text-justify">Sur notre plateforme, nous permettons à certains de gagner du temps
                                                        et de se simplifier la vie et à d’autres de développer une activité de service pour réaliser un complément
                                                        de revenu ou un revenu complet.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section className="kazouTechAbout-wrapper blogs-6">
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-12 mx-auto">
                                        <h3 className="display-3 mb-5">Notre Dernier Article de Blog</h3>
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
                        <section className="kazouTechAbout-wrapper team">
                            <div className="container">
                                <div className="row">
                                    <div className="col-md-12 ml-auto mr-auto text-center">
                                        <h3 className="display-3">Notre Equipe</h3>
                                        <p className="lead">En quelque mots les fondateurs derrière cette ingénieuse imagination se présente.
                                            N'hesitez pas à nous contacter pour mieux en savoir sur nos services.</p>
                                    </div>
                                </div>
                                <div className="section features-4">
                            <div className="container">
                                <div className="row align-items-center">
                                    <div className="col-lg-12 mx-auto mt-4">
                                        <div className="row">
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src="/assets/vendor_site/img/faces/team-1.jpg" />
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">Project Manager</h6>
                                                        <h4 className="card-title">Boclair Temgoua</h4>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                        <div className="btn-wrapper profile text-center mt-3">
                                                            <a target="_blank" href="https://twitter.com/creativetim" className="btn btn-sm"
                                                               data-toggle="tooltip" data-original-title="Follow me">
                                                                <i className="fab fa-twitter"/>
                                                            </a>
                                                            <a target="_blank" href="https://www.facebook.com/creativetim"
                                                               className="btn btn-sm" data-toggle="tooltip" data-original-title="Like me">
                                                                <i className="fab fa-facebook-square"/>
                                                            </a>
                                                            <a target="_blank" href="https://dribbble.com/creativetim"
                                                               className="btn btn-sm" data-toggle="tooltip" data-original-title="Follow me">
                                                                <i className="fab fa-instagram"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src="/assets/vendor_site/img/faces/team-1.jpg" />
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">Project Manager</h6>
                                                        <h4 className="card-title">Patrick Noubissi</h4>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                        <div className="btn-wrapper profile text-center mt-3">
                                                            <a target="_blank" href="https://twitter.com/creativetim" className="btn btn-sm"
                                                               data-toggle="tooltip" data-original-title="Follow me">
                                                                <i className="fab fa-twitter"/>
                                                            </a>
                                                            <a target="_blank" href="https://www.facebook.com/creativetim"
                                                               className="btn btn-sm" data-toggle="tooltip" data-original-title="Like me">
                                                                <i className="fab fa-facebook-square"/>
                                                            </a>
                                                            <a target="_blank" href="https://dribbble.com/creativetim"
                                                               className="btn btn-sm" data-toggle="tooltip" data-original-title="Follow me">
                                                                <i className="fab fa-instagram"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src="/assets/vendor_site/img/faces/team-1.jpg" />
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">Project Manager</h6>
                                                        <h4 className="card-title">Randrin Nzeukang</h4>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                        <div className="btn-wrapper profile text-center mt-3">
                                                            <a target="_blank" href="https://twitter.com/creativetim" className="btn btn-sm"
                                                               data-toggle="tooltip" data-original-title="Follow me">
                                                                <i className="fab fa-twitter"/>
                                                            </a>
                                                            <a target="_blank" href="https://www.facebook.com/creativetim"
                                                               className="btn btn-sm" data-toggle="tooltip" data-original-title="Like me">
                                                                <i className="fab fa-facebook-square"/>
                                                            </a>
                                                            <a target="_blank" href="https://dribbble.com/creativetim"
                                                               className="btn btn-sm" data-toggle="tooltip" data-original-title="Follow me">
                                                                <i className="fab fa-instagram"/>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
