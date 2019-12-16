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
                                                className="button-inner--text pt-40 text-uppercase">Demande un service</span>
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
                                            >We get insulted by others, lose trust for those others. We get back stabbed
                                                by friends. It becomes harder for us to give others a hand.</p>
                                            <a href="..." className="btn btn-primary" name="button">
                                                <span className="nav-link-inner--text pt-40">Inscription</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div className="col-md-4">
                                        <div className="info">
                                            <div
                                                className="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                                                <i className="ni ni-atom"/>
                                            </div>
                                            <h6 className="info-title text-uppercase text-success">Dévenez bosseur</h6>
                                            <p className="description opacity-8"
                                            >Don't get your heart broken by people we love, even that we give them all
                                                we have. Then we lose family over time. As we live, our hearts turn
                                                colder.</p>
                                            <a href="..." className="btn btn-success" name="button">
                                                <span className="nav-link-inner--text pt-40">Inscription</span>
                                            </a>
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
                                            >What else could rust the heart more over time? Blackgold. The time is now
                                                for it to be okay to be great. or being a bright color. For standing
                                                out.</p>
                                            <a href="..." className="btn btn-warning" name="button">
                                                <span className="nav-link-inner--text pt-40">Inscription</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <AllOccupation/>

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
                </div>
            </>
        )
    }
}

export default IndexSite;
