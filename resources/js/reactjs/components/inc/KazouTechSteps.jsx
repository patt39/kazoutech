import React, {Component} from "react";

class KazouTechSteps extends Component {

    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div className="project-2 my-5">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-8 mx-auto text-center my-5">
                            <h3 className="display-3">Comment ça marche chez KazouTech?</h3>
                            <p className="lead">3 simples étapes pour devenir webtechnicien sur notre plateforme et vous faire contactez pas les demandeurs de services en ligne. </p>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-lg-4 col-md-6">
                            <div className="card card-project">
                                <a href="#">
                                    <div className="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle mx-auto">
                                        <i className="ni ni-circle-08"></i>
                                    </div>
                                </a>
                                <div className="card-body">
                                    <h4 className="card-title mt-3">Créez votre profil</h4>
                                    <p className="card-description">Remplissez le formulaire d'inscription en ligne en précisant vos informations personnelles pour vous faire boostez par les entreprises qui valoriseront vos prestations de services.</p>
                                    <div className="card-footer">
                                        <a href="#" className="btn btn-link text-primary">
                                            <i className="ni ni-bold-right icon-position"></i> Je m'inscris
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-4 col-md-6">
                            <div className="card card-project">
                                <a href="#">
                                    <div className="icon icon-lg icon-shape icon-shape-success shadow rounded-circle mx-auto">
                                        <i className="ni ni-check-bold"></i>
                                    </div>
                                </a>
                                <div className="card-body">
                                    <h4 className="card-title mt-3">Choisissez votre webtechnicien(ne)</h4>
                                    <p className="card-description">Des jobeurs compétents et proches de votre localité, de chez vous vous proposent leurs prestations de services à tout moments.</p>
                                    <div className="card-footer">
                                        <a href="#" className="btn btn-link text-success"><i
                                            className="ni ni-bold-right icon-position"></i> J'ai besoin d'un webtech
                                        </a>
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
                                    <p className="card-description">KazouTech s'assure de vous proposez le webtechnicien(ne) compétent pour
                                    votre satisfaction, la qualité de la prestation de service attendu et le meilleur prix que vous pouvez débourser pour votre travail.</p>
                                    <div className="card-footer">
                                        <a href="#" className="btn btn-link text-warning"><i
                                            className="ni ni-bold-right icon-position"></i> Je sonde
                                        </a>
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
