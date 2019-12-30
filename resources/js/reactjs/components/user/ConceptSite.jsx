import React, {Component} from "react";
import FooterUserSite from "../inc/FooterUserSite";
import NavUserSIte from "../inc/NavUserSIte";
import SubscribeLine from "./SubscribeLine";


class ConceptSite extends Component {
    constructor(props) {
        super(props);
        this.state = {}
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Concept';
        document.title = `${composantTitle} | Kazoutech`;
    }

    render() {
        return (
            <>
                <div className="about-us">
                    <NavUserSIte/>
                    <div className="wrapper">
                    <div className="page-header  header-filter">
                <div className="page-header-image" style={{backgroundImage: "url(" + '/assets/vendor_site/img/sections/broofoac.jpg' + ")"}}></div>
                <div className="container">
                    <div className="row">
                    <div className="col-lg-10 mx-auto text-center">
                        <h2 className="display-2 text-white">Concept Kazoutech</h2>
                    </div>
                    </div>
                    <div className="row">
                    <div className="floating-box bg-default">
                        <div className="box text-center">
                        <div className="icon icon-shape bg-primary icon-xl rounded-circle text-white">
                            <i className="ni ni-spaceship"></i>
                        </div>
                        </div>
                        <blockquote className="blockquote text-center mt-4">
                        <p className="title mb-0 text-white" stlyle="font-size: 60px">Bienvenue</p>
                        </blockquote>
                        <h2 className="lead text-white p-5"><em style={{color: "red"}}>Kazoutech </em> est une plateforme de demande et de prestation de services en ligne.Principalement nous mettons en contact des particuliers et des technicien(ne) pour des services precis.Nous travaillons aussi avec des entreprises de dans le batiment et le genie civile.A noter que  sur notre plateforme, le prestataire a le status d'auto-entrepreneur et travail a sa guise.</h2>
                    </div>
                    </div>
                </div>
            </div>
                        <div className="section features features-5">
                            <div className="container">
                                <div className="row">
                                        <div className="col-md-8 text-center mx-auto">
                                            <h3 className="display-3" style={{color: "red"}}>Nos Valeurs</h3>
                                            <p className="lead">La capacité de faire confiance a des gens rencontrer sur le net est un atout quon aquiet avec le temp.</p>
                                            </div>
                                        </div>
                                        <div className="row align-items-center">
                                            <div className="col-lg-12 mt-md-5">
                                            <div className="row">
                                                <div className="col-md-6">
                                                <div className="info">
                                                    <div className="pr-md-5">
                                                    <div className="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                                                        <i className="ni ni-atom"></i>
                                                    </div>
                                                    <h5 className="display-5">Confidentialité et sécurité</h5>
                                                    <p>La confaince est à la base meme de notre de notre bussiness plan.</p>
                                                    <ul className="list-unstyled">
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Charbonneurs controller et confirmer</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Taches suivit du debut à la fin</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Obligations du respect des consigns de sécurité</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div className="col-md-6">
                                                <div className="info">
                                                    <div className="pr-md-5">
                                                    <div className="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                                                        <i className="ni ni-money-coins"></i>
                                                    </div>
                                                    <h5 className="display-5">Meilleur prix</h5>
                                                    <p>Une fois le Charbonneurs(euse) mis en relation, le devi de la tache est decider entre deux mais nous assurouns</p>
                                                    <ul className="list-unstyled">
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Une rémuneration juste selon le marché</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Des services selon votre bourse</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Et des avantage selon votre activité sur le site</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div className="row mt-5">
                                                <div className="col-md-6">
                                                <div className="info">
                                                    <div className="pr-md-5">
                                                    <div className="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                                                        <i className="ni ni-support-16"></i>
                                                    </div>
                                                    <h5 className="display-5">Sponsor</h5>
                                                    <p>Des sponsors mercenes et tuteurs reconnu pour booster le services et toujour apporter le meilleur</p>
                                                    <ul className="list-unstyled">
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Beautiful elements</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Amazing page examples</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Super friendly support team</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div className="col-md-6">
                                                <div className="info">
                                                    <div className="pr-md-5">
                                                    <div className="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                                                        <i className="ni ni-laptop"></i>
                                                    </div>
                                                    <h5 className="display-5">Meilleur services</h5>
                                                    <p>Le jobbing jamais ausi façile et jamis aussi utile.</p>
                                                    <ul className="list-unstyled">
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Des Charbonneurs évaluer et identifier</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Des utilisateurs comblés et heureux</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Un avenir du jobbing meilleur en Afrique</p>
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
                                        </div>
                                        <div className="section features-3 my-5" style={{backgroundImage: "url(" + '/assets/vendor_site/img/ill/p31.svg' + ")"}}>
                                            <div className="container">
                                            <div className="row text-center justify-content-center">
                                                <div className="col-lg-8">
                                                <h3 className="display-3 text-white">Quelques conseils jobbing<span className="text-success">Pour jobbeurs</span></h3>
                                                <p className="lead text-white">Le jobbing n'as jamais été facile mais pour vous apportez le meilleurs des services et assurez votre sécurité et integrité,
                                                voiçi quelque conseils pratique.</p>
                                                </div>
                                            </div>
                                            <div className="row row-grid mt-5">
                                                <div className="col-lg-6">
                                                <div className="info info-horizontal bg-white">
                                                    <div className="icon icon-shape icon-shape-info rounded-circle text-white">
                                                    <i className="ni ni-hat-3 text-info"></i>
                                                    </div>
                                                    <div className="description pl-4">
                                                    <h5 className="title text-info">Respect de l'heure</h5>
                                                    <p>Honorer toujour a vos rendez-vous en arrivant a l'heure chez votre clients et fixer préalablement avec se dernier toutes les taches à accomplir et a la fin verifiez bien quelles ont été
                                                        accomplit come il le fallait pour éviter des mal-entendu cela fait partit du professionalisme.</p>
                                                    </div>
                                                </div>
                                                </div>
                                                <div className="col-lg-6">
                                                <div className="info info-horizontal bg-white">
                                                    <div className="icon icon-shape icon-shape-warning rounded-circle text-white">
                                                    <i className="ni ni-istanbul text-warning"></i>
                                                    </div>
                                                    <div className="description pl-4">
                                                    <h5 className="title text-warning">Equipement</h5>
                                                    <p>votre équipement fait partit de l 'extension de votre talent donc n'hesitez pas de toujours vous munir du meilleur materiel pour chaque tache sans oublier votre équipement de sécurité
                                                        pour faciliter votre travail et vous permettre de rester en forme pour votre job.</p>
                                                    
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div className="row row-grid">
                                                <div className="col-lg-6">
                                                <div className="info info-horizontal bg-white">
                                                    <div className="icon icon-shape icon-shape-danger rounded-circle text-white">
                                                    <i className="ni ni-trophy text-danger"></i>
                                                    </div>
                                                    <div className="description pl-4">
                                                    <h5 className="title text-danger">Rémuneration</h5>
                                                    <p>Assurez-vous que la rémuneration établit avec votre client sois claire pour eviter des malentendu après le travail accomplit en cas d'heure supplementaire définissez avec votre client ceaui vous revient de droit.</p>
                                                    </div>
                                                </div>
                                                </div>
                                                <div className="col-lg-6">
                                                <div className="info info-horizontal bg-white">
                                                    <div className="icon icon-shape icon-shape-success rounded-circle text-white">
                                                    <i className="ni ni-image text-success"></i>
                                                    </div>
                                                    <div className="description pl-4">
                                                    <h5 className="title text-success">Réalisation</h5>
                                                    <p>Offrez toujours le meilleur de vos service pendant vos job cela boostera votre notorieté a la fois sur la plateforme et le marché du jobbing n'hesitez pas de nettoyer votre site aprés le job accomplit et demander a votre client de vous évaluez.</p>
                                                    </div>
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
                                                <SubscribeLine/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <FooterUserSite/>
                    </div>
                </div>
            </>
        )
    }

}

export default ConceptSite;
