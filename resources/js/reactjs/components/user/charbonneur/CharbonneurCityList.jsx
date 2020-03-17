import React, {Component} from "react";
import {Link,NavLink} from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class CharbonneurCityList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            cities: [],
        }
    }


    componentDidMount() {
        dyaxios.get(route('api.cities_by_status')).then(response =>
            this.setState({
                cities: [...response.data],
            }));
    }

    render() {
        const {cities} = this.state;
        return (

            <div className="card mb-3">
                <div className="card-header h6">Les charbonneurs da la Ville de </div>
                <div className="card-body">
                    <ul className="list-unstyled">

                        {cities.map((item) => (
                            <li key={item.id} className="mb-2">
                                <NavLink to={`/charbonneurs/${this.props.slug}/${item.slug}/`}>
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

export default CharbonneurCityList;
