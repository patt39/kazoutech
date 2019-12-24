import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class AnnonceCityList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            cities: [],
        }
    }


    componentDidMount() {
        dyaxios.get(route('api.cities_by_vip')).then(response =>
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
                                <Link to={`/annonces/v/${item.slug}/`}>
                                    {item.name}
                                </Link>
                            </li>
                        ))}

                    </ul>
                </div>
            </div>
        )
    }

}

export default AnnonceCityList;
