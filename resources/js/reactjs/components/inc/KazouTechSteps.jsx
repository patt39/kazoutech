import React, {Component} from "react";
import {Link} from "react-router-dom";

class KazouTechSteps extends Component {

    render() {
        return (
            <div className="kazouTechSteps-wrapper bg-default">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-8 mx-auto text-center my-5">
                            <h3 className="display-3 kazouTech-red-color">Comment ça marche chez KazouTech?</h3>
                            <p className="lead kazouTech-white-color">3 étapes simples pour devenir collaborateur et booster le chiffre d'affaire de votre entreprise rapidement </p>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-lg-4 col-md-6">
                            <div className="card card-project">
                                <a href="#">
                                    <div className="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle mx-auto">
                                        <i className="ni ni-circle-08"/>
                                    </div>
                                </a>
                                <div className="card-body">
                                    <h4 className="card-title mt-3">Créez votre profil</h4>
                                    <p className="card-description">Remplissez le formulaire d'inscription en ligne en renseignant vos informations personnelles et celle de votre entreprise 
                                       pour la validation et la confirmation de votre profil </p>
                                    <div className="card-footer">
                                        <a href="/register" className="btn btn-link text-primary">
                                            <i className="ni ni-bold-right icon-position"/> Je m'inscris
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-4 col-md-6">
                            <div className="card card-project">
                                <Link to={'/charbonneurs/'}>
                                    <div className="icon icon-lg icon-shape icon-shape-success shadow rounded-circle mx-auto">
                                        <i className="ni ni-check-bold"></i>
                                    </div>
                                </Link>
                                <div className="card-body">
                                    <h4 className="card-title mt-3">Signez votre contrat</h4>
                                    <p className="card-description">Patientez qu'un de nos commerciaux vous contact pour une prise de rendez-vous pour la signature de notre contrat de collaboration</p>
                                    <div className="card-footer">
                                        <Link to={'/annonces/'} className="btn btn-link text-success">
                                            <i className="ni ni-bold-right icon-position"/> Je visite
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-4 col-md-6">
                            <div className="card card-project">
                                <a href="#">
                                    <div className="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle mx-auto">
                                        <i className="ni ni-satisfied"></i>
                                    </div>
                                </a>
                                <div className="card-body">
                                    <h4 className="card-title mt-3">Satisfaction Totale</h4>
                                    <p className="card-description">KazouTech s'assure de mettre en avant votre entreprise sur notre plateforme et d'assurer une communication effective sur nos reseaux sociaux pour vous apporter 
                                        le plus de prospect possible et vous donner la possibilité de vendre plus et booster votre chiffre d'affaire</p>
                                    <div className="card-footer">
                                        <Link to={'/charbonneurs/'} className="btn btn-link text-success">
                                            <i className="ni ni-bold-right icon-position"/> Je me rassure
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default KazouTechSteps;
