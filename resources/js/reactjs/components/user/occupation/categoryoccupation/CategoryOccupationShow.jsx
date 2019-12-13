import React, { Component } from "react";
import { Link } from "react-router-dom";
import NavUserSIte from "../../../inc/NavUserSIte";
import OccupationHeader from "../../../inc/OccupationHeader";
import CategoryOcupationList from "./CategoryOcupationList";
import FooterUserSite from "../../../inc/FooterUserSite";
import CategoryOcupationHeader from "../../../inc/CategoryOcupationHeader";


class CategoryOccupationShow extends Component {
    constructor(props) {
        super(props);
        this.state = {
            categoryoccupation: { user:[],occupation:[]}
        }
    }


    componentDidMount() {
        let itemoccupation = this.props.match.params.occupation;
        let itemcategoryoccupation = this.props.match.params.categoryoccupation;
        let url = route('categoryoccupations.view',[itemoccupation,itemcategoryoccupation]);
        dyaxios.get(url).then(response => this.setState({categoryoccupation: response.data,}));
    }

    render() {
        const { categoryoccupation } = this.state;
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
                                                    <h3 className="display-3">Nos offres en quelque clicks choisissez votre
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
                        <div className="section features-1">
                            <div className="container">
                                <div className="row">
                                    <div className="col-md-8 mx-auto text-center">
                                        <h3 className="display-3">Toujour pas resolu?</h3>
                                        <p className="lead">N'ayez crainte vos doutes et préocupation sont un devoir pour
                                            nos.</p>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-4">
                                        <div className="info">
                                            <div
                                                className="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                                                <i className="ni ni-settings-gear-65"/>
                                            </div>
                                            <h6 className="info-title text-uppercase text-primary">Social Conversations</h6>
                                            <p className="description opacity-8">We get insulted by others, lose trust for
                                                those others. We get back stabbed by friends. It becomes harder for us to
                                                give others a hand.</p>
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
                                            <h6 className="info-title text-uppercase text-success">Analyze Performance</h6>
                                            <p className="description opacity-8">Don't get your heart broken by people we
                                                love, even that we give them all we have. Then we lose family over time. As
                                                we live, our hearts turn colder.</p>
                                            <a href="../.." className="btn btn-primary" name="button">
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
                                            <h6 className="info-title text-uppercase text-warning">Measure Conversions</h6>
                                            <p className="description opacity-8">What else could rust the heart more over
                                                time? Blackgold. The time is now for it to be okay to be great. or being a
                                                bright color. For standing out.</p>
                                            <a href="../.." className="btn btn-primary" name="button">
                                                <span className="nav-link-inner--text pt-40">Inscription</span>
                                            </a>
                                        </div>
                                    </div>
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
export default CategoryOccupationShow;
