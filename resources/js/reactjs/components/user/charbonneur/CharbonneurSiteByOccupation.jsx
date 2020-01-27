import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import {Link} from "react-router-dom";
import CharbonneurList from "./CharbonneurList";

class CharbonneurSiteByOccupation extends Component {
    constructor(props) {
        super(props);
        this.state = {
            charbonneursbyoccupation: {users:[]},
            charbonneursbycity: [],
            occupations: [],
            cities: [],
        }
    }

    // lifecycle method
    componentDidMount() {
        let SlugCity = this.props.match.params.city;
        let SlugOccupation = this.props.match.params.occupation;
        dyaxios.get(route('api_active_charbonneurs_city.view',[SlugCity])).then(response =>
                this.setState({
                    charbonneursbycity: response.data,
                }));
        dyaxios.get(route('api_active_charbonneurs_occupation.view',[SlugCity,SlugOccupation])).then(response =>
                this.setState({
                    charbonneursbyoccupation: response.data,
                }));
        dyaxios.get(route('api_active.occupations')).then(response =>
                this.setState({occupations: [...response.data],}));

        dyaxios.get(route('api.cities_by_status')).then(response =>
            this.setState({
                cities: [...response.data],
            }));
    }

    render() {
        const {charbonneursbyoccupation,charbonneursbycity,occupations,cities} = this.state;
        const composantTitle = `${charbonneursbyoccupation.name}`;
        document.title = `Charbonneurs en ${charbonneursbyoccupation.name} dans la ville de ${composantTitle} | Kazoutech`;
        let users = charbonneursbyoccupation.users;
        return (

            <div className="about-us">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image page-header-mini"
                             style={{backgroundImage: "url(" + charbonneursbyoccupation.photo + ")"}}/>
                        <div className="container">
                            <div className="row">
                                <div className="col-lg-10 mx-auto text-center">
                                    <h6 className="display-2 text-white">Charbonneurs en {charbonneursbyoccupation.name} dans la ville de {charbonneursbycity.name} </h6>
                                    <div className="description">
                                        <Link to={'/charbonneurs/'} className="text-white">
                                            <i className="fa fa-chevron-circle-left"/> Tous les charbonneurs
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
                                        <div className="card-header h6">Occupations</div>
                                        <div className="card-body">
                                            <ul className="list-unstyled">

                                                {occupations.map((item) => (
                                                    <li key={item.id} className="mb-2">
                                                        {item.status ?
                                                            <Link to={`/charbonneurs/${charbonneursbycity.slug}/${item.slug}/`}>
                                                                {item.name}
                                                            </Link>
                                                            :null}
                                                    </li>
                                                ))}

                                            </ul>
                                        </div>
                                    </div>

                                    <div className="card mb-3">
                                        <div className="card-header h6">Villes</div>
                                        <div className="card-body">
                                            <ul className="list-unstyled">

                                                {cities.map((item) => (
                                                    <li key={item.id} className="mb-2">
                                                        <Link to={`/charbonneurs/${item.slug}/${charbonneursbyoccupation.slug}/`}>
                                                            {item.name}
                                                        </Link>
                                                    </li>
                                                ))}

                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div className="col-lg-8 mx-auto mt-4">
                                    <div className="row">

                                        {users.map((item) => (
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
        )
    }

}

export default CharbonneurSiteByOccupation;
