import React, { Component } from "react";
import {Link, NavLink} from "react-router-dom";
import { Button } from "reactstrap";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class NavAnnoncesByCities extends Component {
    constructor(props) {
        super(props);
        this.state = {
            cities:[],
        }
    }

    componentDidMount() {
        dyaxios.get(route('api.annoncesbycities')).then(response =>
            this.setState({
                cities: [...response.data],
            }));
    }

    render() {
        const {cities} = this.state;
        return (

            <div className="card mb-3">
                <div className="card-header h6">Villes</div>
                <div className="card-body">
                    <ul className="list-unstyled">

                        {cities.map((item) => (
                            <li key={item.id} className="mb-2">
                                <NavLink to={`/annonces/c/${item.slug}/`}>
                                    {item.name}
                                </NavLink>
                            </li>
                        ))}

                    </ul>
                </div>
            </div>

        )
    }

}

export default NavAnnoncesByCities;
