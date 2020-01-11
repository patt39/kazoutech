import React, { Component } from "react";
import NavUserSIte from "../../../inc/NavUserSIte";
import { Link, NavLink } from 'react-router-dom';
import FooterUserSite from "../../../inc/FooterUserSite";
import CategoryOcupationHeader from "../../../inc/CategoryOcupationHeader";
import CitySite from "../../city/CitySite";


class CategoryOccupationShow extends Component {
    constructor(props) {
        super(props);
        this.state = {
            categoryoccupation: { user: [], occupation: [] }
        }
    }


    componentDidMount() {
        let itemoccupation = this.props.match.params.occupation;
        let itemcategoryoccupation = this.props.match.params.categoryoccupation;
        let url = route('categoryoccupations.view', [itemoccupation, itemcategoryoccupation]);
        dyaxios.get(url).then(response => this.setState({ categoryoccupation: response.data, }));
    }

    render() {
        const { categoryoccupation } = this.state;
        const composantTitle = `${categoryoccupation.name}`;
        document.title = `${composantTitle} | Kazoutech`;
        return (

            <>
                <div className="landing-page">
                    <NavUserSIte />

                    <div className="wrapper">
                        <CategoryOcupationHeader {...categoryoccupation} />
                        <div className="container">

                            <div className={'row'}>

                                <div className="container">
                                    <div className="row mb-5">
                                        <div className="col-lg-12 mr-auto mb-2">
                                            <br/>
                                            <h3 className="display-3">Pour tout vos bésoin <b>{categoryoccupation.name}</b></h3>
                                            <div className="description mb-2" dangerouslySetInnerHTML={{ __html: categoryoccupation.description }} />
                                            <br/>
                                            <div>
                                                <Link to={'/'} className="btn btn-success btn-lg">Demander un services en {categoryoccupation.name}
                                                </Link>
                                            </div>
                                            <br />
                                            <h3 className="display-4">Dérnier annonces en  <b>{categoryoccupation.name}</b></h3>
                                            <div className="row">

                                                <div className="col-md-4">
                                                    <div className="card card-blog">
                                                        <div className="d-flex flex-column justify-content-between border rounded p-3">
                                                            <div className="mr-1">
                                                                <strong>
                                                                    <a className="font-size-3 card-title" href="/jobs/creon/jardinage/taille-de-haie/taille-de-haie-417926">
                                                                        Taille de haie à Créon (33670)
                                                                    </a>
                                                                </strong>
                                                                <div className="mt-2">
                                                                    <div className="mb-1 text-muted card-description font-size-2">Haie
                                                                        de thuyas d'environ 5 mètres de haut sur 23
                                                                        mètres de long à rabattre à 3 mètres de
                                                                        hauteur.
                                                                        Date et heure à v...
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="d-flex align-items-baseline justify-content-between mt-3 font-weight-medium">
                                                                    <span className="pr-2 font-size-2">
                                                                        <i className="fas fa-stopwatch fa-lg"/> 7 h 30 de service</span>
                                                                <div
                                                                    className="font-size-4 font-weight-black text-primary">
                                                                    <div className="price-content">
                                                                        <div className="price">
                                                                            <span>127,50</span>
                                                                            <span>€</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-4">
                                                    <div className="card card-blog">
                                                        <div className="d-flex flex-column justify-content-between border rounded p-3">
                                                            <div className="mr-1">
                                                                <strong>
                                                                    <a className="font-size-3 card-title" href="/jobs/creon/jardinage/taille-de-haie/taille-de-haie-417926">
                                                                        Taille de haie à Créon (33670)
                                                                    </a>
                                                                </strong>
                                                                <div className="mt-2">
                                                                    <div className="mb-1 text-muted card-description font-size-2">Haie
                                                                        de thuyas d'environ 5 mètres de haut sur 23
                                                                        mètres de long à rabattre à 3 mètres de
                                                                        hauteur.
                                                                        Date et heure à v...
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="d-flex align-items-baseline justify-content-between mt-3 font-weight-medium">
                                                                    <span className="pr-2 font-size-2">
                                                                        <i className="fas fa-stopwatch fa-lg"/> 7 h 30 de service</span>
                                                                <div
                                                                    className="font-size-4 font-weight-black text-primary">
                                                                    <div className="price-content">
                                                                        <div className="price">
                                                                            <span>127,50</span>
                                                                            <span>€</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-4">
                                                    <div className="card card-blog">
                                                        <div className="d-flex flex-column justify-content-between border rounded p-3">
                                                            <div className="mr-1">
                                                                <strong>
                                                                    <a className="font-size-3 card-title" href="/jobs/creon/jardinage/taille-de-haie/taille-de-haie-417926">
                                                                        FiftyThree Files For Paper
                                                                    </a>
                                                                </strong>
                                                                <div className="mt-2">
                                                                    <div className="mb-1 text-muted card-description font-size-2">Haie
                                                                        Yesterday, as Facebook launched its news reader
                                                                        app Paper, design-focused startup
                                                                        FiftyThree called out Facebook...
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="d-flex align-items-baseline justify-content-between mt-3 font-weight-medium">
                                                                    <span className="pr-2 font-size-2">
                                                                        <i className="fas fa-stopwatch fa-lg"/> 7 h 30 de service</span>
                                                                <div
                                                                    className="font-size-4 font-weight-black text-primary">
                                                                    <div className="price-content">
                                                                        <div className="price">
                                                                            <span>17,50</span>
                                                                            <span>€</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <Link to={'/toutes-les-villes/'}
                                                      className="font-size-3 font-weight-medium d-block">
                                                    Voir toutes les annonces en {categoryoccupation.name}
                                                    <i className="fas fa-chevron-right pl-1 font-size-1" />
                                                </Link>
                                            </div>
                                        </div>
                                        <br/>
                                        <div className="description mb-2" dangerouslySetInnerHTML={{ __html: categoryoccupation.body }} />
                                    </div>

                                </div>

                            </div>
                        </div>
                        <FooterUserSite />
                    </div>
                </div>

            </>
        )
    }

}

export default CategoryOccupationShow;
