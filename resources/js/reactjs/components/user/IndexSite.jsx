import React, {Component} from "react";
import {Link} from 'react-router-dom';
import { Helmet } from 'react-helmet';
import NavUserSIte from "../inc/NavUserSIte";
import FooterUserSite from "../inc/FooterUserSite";
import PageCitySite from "./city/PageCitySite";
import AllOccupation from "./occupation/AllOccupation";
import KazouTechSteps from "../inc/KazouTechSteps";
import SlideHomeList from "./slide/SlideHomeList";
import SubscribeLine from "./SubscribeLine";


class IndexSite extends Component {
    constructor(props) {
        super(props);
        this.state = {
            //
        }
    }

    // lifecycle method
    componentDidMount() {
        //
    }

    render() {
        return (
            <>
                <Helmet title={`Trouver des techniciens de tout domaine au cameroun pour vous rendre des service à domocile | Kazoutech`}/>
                
                <div className="landing-page">
                    <NavUserSIte/>
                    <div className="wrapper">
                        <SlideHomeList/>
                    </div>
                    <KazouTechSteps/>
                    <AllOccupation/>
                    <div className="section features-7 bg-secondary">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-10 text-center mx-auto">
                                    <h3 className="display-3">Le service entre particuliers jamais aussi facile</h3>
                                    <p className="lead">Pour tout vos bésoins immédiat des services d'un technicien(ne) en un
                                        domaine spécifique n'hesitez plus. Des prestataires
                                        de services proche de vous que jamais lançez vous et profitez en.</p>
                                </div>
                            </div>
                            <div className="row justify-content-center mt-5">
                                <div className="col-lg-12">
                                    <div className="row row-grid">
                                        <div className="col-lg-4">
                                            <div className="card card-lift--hover shadow border-0 text-center">
                                                <div className="card-body py-5">
                                                    <div
                                                        className="icon icon-shape icon-shape-primary rounded-circle mb-4">
                                                        <i className="ni ni-check-bold"/>
                                                    </div>
                                                    <h6 className="text-primary text-uppercase">Des profils évalués</h6>
                                                    <p className="description mt-3">Les profils de nos prestataires
                                                        sont controller et évaluer en permenance pour vous rassurer et
                                                        vous apporter seulement les meilleurs qui soit en ce qui conçerne leur
                                                        service
                                                        et nous nous assurons aussi de leur bonne moralité donc ne vous
                                                        mefiez pas.</p>
                                                    <Link to={`/charbonneurs/`} className="btn btn-primary mt-4">charbonneurs</Link>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-lg-4">
                                            <div className="card card-lift--hover shadow border-0 text-center">
                                                <div className="card-body py-5">
                                                    <div
                                                        className="icon icon-shape icon-shape-success rounded-circle mb-4">
                                                        <i className="ni ni-istanbul"/>
                                                    </div>
                                                    <h6 className="text-success text-uppercase">Kazoutech le
                                                        meilleur</h6>
                                                    <p className="description mt-3">Kazoutech est une plateforme vrai
                                                        nous avons un siége sociale, des bureaux et une licence. Des
                                                        personnes de bonne moralité toujours prét a vous
                                                        rendre le meilleur. Donc, pour tout vos problemes contactez ou
                                                        rapprochez vous de nos locaux nous serons ravis de vous recevoir
                                                        et d'éffacer vos doutes.</p>
                                                    <Link to={'/contacts/'} className="btn btn-success mt-4">Contactez nous</Link>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="col-lg-4">
                                            <div className="card card-lift--hover shadow border-0 text-center">
                                                <div className="card-body py-5">
                                                    <div
                                                        className="icon icon-shape icon-shape-warning rounded-circle mb-4">
                                                        <i className="ni ni-planet"/>
                                                    </div>
                                                    <h6 className="text-warning text-uppercase">Des utilisateurs
                                                        comblés</h6>
                                                    <p className="description mt-3">Des personnes nous on fait confiance
                                                        et en parlent. Vous savez le bouche à bouche a été la prémiere
                                                        forme de marketing et nous
                                                        nous en passons pas écoutez cequon dit à propos de kazoutech et
                                                        faite nous confiance</p>
                                                    <Link to={'/temoignages/'}
                                                       className="btn btn-warning">Temoignage</Link>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <PageCitySite/>
                    <SubscribeLine/>
                    <FooterUserSite/>

                </div>
            </>
        )
    }
}

export default IndexSite;
