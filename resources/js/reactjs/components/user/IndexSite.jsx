import React, {Component} from "react";
import {Link} from 'react-router-dom'
import NavUserSIte from "../inc/NavUserSIte";
import FooterUserSite from "../inc/FooterUserSite";
import OccupationList from "./occupation/OccupationList";
import CitySite from "./city/CitySite";
import AllOccupation from "../inc/AllOccupation";


class IndexSite extends Component {
    constructor(props) {
        super(props);
        this.state = {
            //
        }
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Technicians services to particulars | Kazoutech';
        document.title = `${composantTitle}`;
    }

    render() {
        return (
            <>
                <div className="landing-page">
                    <NavUserSIte/>

                    <div className="wrapper">
                        <div className="page-header page-header-small header-filter">
                            <div className="page-header-image"
                                 style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}/>
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto text-center">
                                        <h3
                                            className="display-2 text-white"
                                        >Du service a la personne et du main à main entre particuliers</h3>
                                        <Link to={'/occupations/'} className="btn btn-success btn-lg mt-500"
                                              name="button">
                                            <span
                                                className="button-inner--text pt-40 text-uppercase">Demandez un service</span>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="section features">
                            <div className="container">
                                <div className="row">
                                    <div className="col-md-8 mx-auto text-center">
                                        <h3 className="display-3">Comment sa marche?</h3>
                                        <p className="lead">Kazoutech vous offre l'opportunité de travailler tout en
                                            restant auto-entreprenuer. Quesque vous attendez? devenez un des notre</p>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-4">
                                        <div className="info">
                                            <div
                                                className="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                                                <i className="ni ni-settings-gear-65"/>
                                            </div>
                                            <h6 className="info-title text-uppercase text-primary">Créez votre
                                                profile</h6>
                                            <p
                                                className="description opacity-8"
                                            >Votre profile technicien(ne) est est votre vitrine cequi va vous permettre d'etre visible
                                                sur le site tout en vous valorisant donc prenez la peinne de bien la rediger en y entrant tout les informations nécessaire.</p>
                                        </div>
                                    </div>
                                    <div className="col-md-4">
                                        <div className="info">
                                            <div
                                                className="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                                                <i className="ni ni-atom"/>
                                            </div>
                                            <h6 className="info-title text-uppercase text-success">Dévenez un Webtech</h6>
                                            <p className="description opacity-8"
                                            >Acronyme <em style={{color: "black"}}>webtech</em> est le dimunitif du mot <em style={{color: "black"}}>web-technicien</em> qui veux tout simplement dire
                                                dévenir technicien(ne) a partir du web tout en gardant votre statut d'auto-entrepreuneur.</p>
                                        </div>
                                    </div>
                                    <div className="col-md-4">
                                        <div className="info">
                                            <div
                                                className="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                                                <i className="ni ni-world"/>
                                            </div>
                                            <h6 className="info-title text-uppercase text-warning">Faite vous de
                                                l'argent</h6>
                                            <p
                                                className="description opacity-8"
                                            >Le but de la plateforme est de mettre en contact des demandeur de service et des prestataires de service
                                                contre rémuneration pour pourvoire vous permettre d'affuter vos conaissance et vous arrondire vos fin de mois difficile</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <AllOccupation/>

                    </div>
                    <div className="section features-7 bg-secondary">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-10 text-center mx-auto">
                                    <h3 className="display-3">Le service entre particuliers jamais aussi façile</h3>
                                    <p className="lead">Pour tout vos bésoins immediat des service d'un technicien en un domaine spécifique n'hesitez plus des prestataires
                                        de services plus de vous que jamais lançez vous et profitez en.</p>
                                </div>
                            </div>
                            <div className="row justify-content-center mt-5">
                                <div className="col-lg-12">
                                    <div className="row row-grid">
                                        <div className="col-lg-4">
                                            <div className="card card-lift--hover shadow border-0">
                                                <div className="card-body py-5">
                                                    <div className="icon icon-shape icon-shape-primary rounded-circle mb-4">
                                                        <i className="ni ni-check-bold"></i>
                                                    </div>
                                                    <h6 className="text-primary text-uppercase">Des profile évalués</h6>
                                                    <p className="description mt-3">Les profiles de nos prestataires sont controller et évaluer en permenance pour vous assurer de vous apporter le meilleur qui sois en cequi conçerne leur service
                                                        et nous nous assurons aussi de leur bonne moralité donc ne vous mefiez pas.</p>
                                                    <a href="/charbonneur" className="btn btn-primary mt-4">Webtechnicien</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-lg-4">
                                            <div className="card card-lift--hover shadow border-0">
                                                <div className="card-body py-5">
                                                    <div className="icon icon-shape icon-shape-success rounded-circle mb-4">
                                                        <i className="ni ni-istanbul"></i>
                                                    </div>
                                                    <h6 className="text-success text-uppercase">Kazoutech le meilleur</h6>
                                                    <p className="description mt-3">Kazoutech est une plateform vrai nous avons un siege sociale des bureaux et une licence des personne de bonne moralité toujours prés a vous
                                                        rendre le meilleur donc pour tout vos problem contactez ou rapprochez vous de nos locaux nous serons ravis de vous reçevoir et d'effaçer vos doutes.</p>
                                                    <a href="#" className="btn btn-success mt-4">Contactez nous</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-lg-4">
                                            <div className="card card-lift--hover shadow border-0">
                                                <div className="card-body py-5">
                                                    <div className="icon icon-shape icon-shape-warning rounded-circle mb-4">
                                                        <i className="ni ni-planet"></i>
                                                    </div>
                                                    <h6 className="text-warning text-uppercase">Des utilisateurs comblés</h6>
                                                    <p className="description mt-3">Des personnes nous on fait confiance et en parlent vous savez le bouche à bouche a été la prémiere forme de marketing et nous
                                                        nous en passons pas écoutez cequon dit à propos de kazoutech et faite nous confiance</p>
                                                    <a href="/temoignages" className="btn btn-warning mt-4">Temoignage</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div className="section features-7">
                        <div className="container">
                            <div className="row justify-content-center mt-5">
                                <div className="col-lg-12">

                                    <div className="container">
                                        <div className="row">
                                            <div className="col-md-8 mr-auto ml-auto text-center">
                                                <h3 className="title mb-5">Nous sommes Partout au Cameroun</h3>
                                            </div>
                                        </div>
                                        <CitySite/>
                                        <Link to={'/toutes-les-villes/'}
                                              className="font-size-3 font-weight-medium d-block">
                                            Voir toutes les villes
                                            <i className="fas fa-chevron-right pl-1 font-size-1"/>
                                        </Link>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="subscribe-line subscribe-line-white">
                        <div className="container">
                            <div className="row">
                                <div className="col-lg-5 mr-auto">
                                    <h4 className="title">Restez a l'affue chaque semaine!</h4>
                                    <p className="description">
                                        Rejoigniez notre newsletter et ayez de nos nouvelle chaque semaine n ayez craint
                                        nous detestons aussi les spam
                                    </p>
                                </div>
                                <div className="col-lg-6 d-flex justify-content-center flex-column ml-auto">
                                    <form method="" action="">
                                        <div className="row">
                                            <div className="col-sm-8">
                                                <div className="form-group">
                                                    <div className="input-group mb-4">
                                                        <div className="input-group-prepend">
                                                            <span className="input-group-text">
                                                                <i className="ni ni-email-83"/></span>
                                                        </div>
                                                        <input className="form-control" placeholder="votre Email..."
                                                               type="text"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-sm-4">
                                                <button type="button" className="btn btn-success btn-block">souscrivez
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <FooterUserSite/>
            </>
        )
    }
}

export default IndexSite;
