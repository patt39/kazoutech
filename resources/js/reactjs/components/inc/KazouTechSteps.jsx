import React, {Component} from "react";
import {Link} from "react-router-dom";

class KazouTechSteps extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div className="kazouTechSteps-wrapper bg-default">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-8 mx-auto text-center my-5">
                            <h3 className="display-3 kazouTech-red-color">Comment ça marche chez KazouTech?</h3>
                            <p className="lead kazouTech-white-color">3 étapes simples pour devenir charbonneur(euse) sur notre plateforme et vous faire contactez par nous pour des eventuel charbons. </p>
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
                                    <p className="card-description">Remplissez le formulaire d'inscription en ligne en précisant vos informations personnelles pour vous faire boostez par les entreprises qui valoriseront vos prestations de services.</p>
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
                                    <h4 className="card-title mt-3">Demandez un service</h4>
                                    <p className="card-description">Rédigez votre annonce sur notre formulaire en ligne et des charbonneurs compétents et proches de votre localité, de chez vous vous proposent leurs services à tout moment.</p>
                                    <div className="card-footer">
                                        <Link to={'/annonces/'} className="btn btn-link text-success">
                                            <i className="ni ni-bold-right icon-position"/> Faite votre annonce
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
                                    <p className="card-description">KazouTech s'assure de vous proposez le charbonneur(euse) compétent pour
                                    votre satisfaction, la qualité de la prestation de service attendu et le meilleur prix que vous pouvez débourser pour votre travail.</p>
                                    <div className="card-footer">
                                        <Link to={'/charbonneurs/'} className="btn btn-link text-success">
                                            <i className="ni ni-bold-right icon-position"/> Je sonde
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
