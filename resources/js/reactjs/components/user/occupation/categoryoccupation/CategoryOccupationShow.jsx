import React, {Component} from "react";
import {Link} from "react-router-dom";
import NavUserSIte from "../../../inc/NavUserSIte";
import OccupationHeader from "../../../inc/OccupationHeader";
import CategoryOcupationList from "./CategoryOcupationList";
import FooterUserSite from "../../../inc/FooterUserSite";
import CategoryOcupationHeader from "../../../inc/CategoryOcupationHeader";
import CitySite from "../../city/CitySite";


class CategoryOccupationShow extends Component {
    constructor(props) {
        super(props);
        this.state = {
            categoryoccupation: {user: [], occupation: []}
        }
    }


    componentDidMount() {
        let itemoccupation = this.props.match.params.occupation;
        let itemcategoryoccupation = this.props.match.params.categoryoccupation;
        let url = route('categoryoccupations.view', [itemoccupation, itemcategoryoccupation]);
        dyaxios.get(url).then(response => this.setState({categoryoccupation: response.data,}));
    }

    render() {
        const {categoryoccupation} = this.state;
        const composantTitle = `${categoryoccupation.name}`;
        document.title = `${composantTitle} | Kaazoutech`;
        return (

            <>
                <NavUserSIte/>
                <div className="landing-page">
                    <div className="wrapper">
                        <CategoryOcupationHeader {...categoryoccupation}/>
                        <div className="cd-section" id="accordion">
                            <div className="accordion-1">
                                <div className="container">

                                    <div className={'row'}>

                                        <div className="container text-center">
                                            <div className="row mb-5">
                                                <div className="col-md-8 mx-auto">
                                                    <h3 className="display-3">Nos offres en quelque clicks choisissez
                                                        votre
                                                        categorie</h3>
                                                </div>
                                            </div>
                                            <div className="row align-items-center">

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                      <CitySite/>

                    </div>
                    <FooterUserSite/>
                </div>
            </>
        )
    }

}

export default CategoryOccupationShow;
