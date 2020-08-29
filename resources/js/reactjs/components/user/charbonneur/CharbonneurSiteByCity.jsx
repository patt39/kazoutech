import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import {Link,NavLink} from "react-router-dom";
import CharbonneurList from "./CharbonneurList";
import { Helmet } from 'react-helmet';
import NavoccupationforCharbonneur from "./NavoccupationforCharbonneur";
import NavoccupationSkeleton from "../../inc/NavoccupationSkeleton";


class CharbonneurSiteByCity extends Component {
    constructor(props) {
        super(props);
        this.state = {
            charbonneursbycity: {userbycities:[]},
            charbonneursbyoccupation:[],
            cities:[],
        }
    }

    // lifecycle method
    componentDidMount() {
        let SlugOccupation = this.props.match.params.occupation;
        let SlugCity = this.props.match.params.city;
        dyaxios.get(route('api_active_charbonneurs_occupation_city.view',[SlugOccupation,SlugCity]))
            .then(response => this.setState({charbonneursbycity: response.data,}));

        dyaxios.get(route('api_active_charbonneurs_occupation.view',[SlugOccupation])).then(response =>
            this.setState({
                charbonneursbyoccupation: response.data,
            }));

        dyaxios.get(route('api.cities_by_status')).then(response =>
            this.setState({
                cities: [...response.data],
            }));

    }

    render() {
        const {charbonneursbycity,charbonneursbyoccupation,cities} = this.state;
        let userbycities = charbonneursbycity.userbycities;
        return (

            <>
        <Helmet title={`${charbonneursbyoccupation.name} dans la ville de ${charbonneursbycity.name} | Kazoutech`}/>

            <div className="about-us">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image page-header-mini"
                             style={{backgroundImage: "url(" + charbonneursbycity.photo + ")"}}/>
                        <div className="container">
                            <div className="row">
                                <div className="col-lg-10 mx-auto text-center">
                                    <h4 className="text-white">Trouver le meilleur <b style={{ textTransform: "lowercase" }}> {charbonneursbyoccupation.name}</b> à <b style={{ textTransform: "lowercase" }}>{charbonneursbycity.name}</b> </h4>
                                    <div className="description">
                                        <Link to={'/charbonneurs/'} className="text-white">
                                            <i className="fa fa-chevron-circle-left"/> Tous les charbonneurs
                                        </Link>
                                    </div>
                                    <div className="text-white">
                                        <span>{charbonneursbycity.userbycities_count} {charbonneursbycity.userbycities_count > 1 ? "charbonneurs" : "charbonneur"} <b style={{ textTransform: "lowercase" }}>à {charbonneursbycity.name}</b></span>
                                    </div>
                                    <div className="mt-3">
                                        <Link to={`/occupations/${charbonneursbyoccupation.slug}/${charbonneursbycity.slug}`} className="btn btn-lg btn-primary">
                                            Demander un service {charbonneursbyoccupation.name} à <b>{charbonneursbycity.name}</b>
                                        </Link>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="section features-4">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-4">
                                    <div className="card mb-3">
                                        <div className="card-header h6">Les charbonneurs dans la Ville de </div>
                                        <div className="card-body">
                                            <ul className="list-unstyled">

                                                {cities.length ?
                                                    <>
                                                        {cities.map((item) => (
                                                            <li key={item.id} className="mb-2">
                                                                <NavLink to={`/charbonneurs/${charbonneursbyoccupation.slug}/${item.slug}/`}>
                                                                    {item.name}
                                                                </NavLink>
                                                            </li>
                                                        ))}
                                                    </>
                                                    :
                                                    <NavoccupationSkeleton/>

                                                }


                                            </ul>
                                        </div>
                                    </div>

                                    <NavoccupationforCharbonneur/>

                                </div>
                                <div className="col-lg-8 mx-auto mt-4">
                                    <div className="row">

                                        {userbycities.map((item) => (
                                            <CharbonneurList key={item.id} {...item}/>
                                        ))}

                                    </div>
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

export default CharbonneurSiteByCity;
