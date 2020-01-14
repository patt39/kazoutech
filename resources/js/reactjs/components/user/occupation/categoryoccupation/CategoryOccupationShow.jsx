import React, { Component } from "react";
import NavUserSIte from "../../../inc/NavUserSIte";
import { Link, NavLink } from 'react-router-dom';
import FooterUserSite from "../../../inc/FooterUserSite";
import CategoryOcupationHeader from "../../../inc/CategoryOcupationHeader";
import CitySite from "../../city/CitySite";
import CategoryOcupationInteressList from "./CategoryOcupationInteressList";
import AnnonceList from "../../annonce/AnnonceList";


class CategoryOccupationShow extends Component {
    constructor(props) {
        super(props);
        this.state = {
            categoryoccupation: { user: [], occupation: [], annoncesinteres:[] }
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
        const annoncebycategoryoccupations = categoryoccupation.annoncesinteres;
        let itemoccupation = this.props.match.params.occupation;
        let itemcategoryoccupation = this.props.match.params.categoryoccupation;
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
                                            <h4 className="display-3">Pour tout vos bésoin <b>{categoryoccupation.name}</b></h4>
                                            <div className="description mb-2" dangerouslySetInnerHTML={{ __html: categoryoccupation.description }} />
                                            <br/>
                                            <div>
                                                <Link to={`/occupations/${itemoccupation}/${categoryoccupation.slug}/new/create/`} className="btn btn-success btn-lg">
                                                    Demander un services en {categoryoccupation.name}
                                                </Link>
                                            </div>
                                            <br />
                                            <h3 className="display-4">Dérnier annonces en  <b>{categoryoccupation.name}</b></h3>

                                            <div className="row">

                                                {annoncebycategoryoccupations.map((item) => (
                                                <CategoryOcupationInteressList key={item.id} {...item} />
                                                ))}
                                            </div>
                                            <Link to={`/annonces/${itemoccupation}/${itemcategoryoccupation}/`}
                                                  className="font-size-3 font-weight-medium d-block">
                                                Voir toutes les annonces en {categoryoccupation.name}
                                                <i className="fas fa-chevron-right pl-1 font-size-1" />
                                            </Link>
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
