import React, {Component} from "react";
import {Link} from 'react-router-dom'
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
        const composantTitle = 'Technicians services to particulars | Kazoutech';
        document.title = `${composantTitle}`;
    }

    render() {
        return (
            <>
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
                                    <h3 className="display-3">Le service entre particuliers jamais aussi façile</h3>
                                    <p className="lead">Pour tout vos bésoins immediat des service d'un technicien en un
                                        domaine spécifique n'hesitez plus des prestataires
                                        de services plus de vous que jamais lançez vous et profitez en.</p>
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
                                                    <h6 className="text-primary text-uppercase">Des profile évalués</h6>
                                                    <p className="description mt-3">Les profiles de nos prestataires
                                                        sont controller et évaluer en permenance pour vous assurer de
                                                        vous apporter le meilleur qui sois en cequi conçerne leur
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
                                                    <p className="description mt-3">Kazoutech est une plateform vrai
                                                        nous avons un siege sociale des bureaux et une licence des
                                                        personne de bonne moralité toujours prés a vous
                                                        rendre le meilleur donc pour tout vos problem contactez ou
                                                        rapprochez vous de nos locaux nous serons ravis de vous reçevoir
                                                        et d'effaçer vos doutes.</p>
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
                                                        et en parlent vous savez le bouche à bouche a été la prémiere
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
