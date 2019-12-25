import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import {Link} from "react-router-dom";
import CharbonneurList from "./CharbonneurList";


class CharbonneurSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {
            charbonneurs: [],
            cities: [],
        }
    }

    // lifecycle method
    componentDidMount() {
        dyaxios.get(route('api.cities_by_vip')).then(response =>
            this.setState({
                cities: [...response.data],
            }));
        const composantTitle = 'Charbonneurs | Kazoutech';
        document.title = `${composantTitle}`;

        dyaxios.get(route('api_active_charbonneurs')).then(response =>
            this.setState({
                charbonneurs: [...response.data],
            }));
    }

    render() {
        const {charbonneurs,cities} = this.state;
        return (

            <div className="about-us">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image page-header-mini"
                             style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/mohamed.jpg' + ")"}}/>
                        <div className="container">
                            <div className="row">
                                <div className="col-lg-10 mx-auto text-center">
                                    <h2 className="display-2 text-white">Charbonneurs</h2>
                                    <div className="description">
                                        <Link to={'/'} className="text-white">
                                            <i className="fa fa-chevron-circle-left"/> Retour à l'accueil
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
                                        <div className="card-header h6">Villes</div>
                                        <div className="card-body">
                                            <ul className="list-unstyled">

                                                {cities.map((item) => (
                                                    <li key={item.id} className="mb-2">
                                                        <Link to={`/charbonneurs/${item.slug}/`}>
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

                                        {charbonneurs.map((item) => (
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

export default CharbonneurSiteIndex;
