import React, {Component} from "react";
import {Link,NavLink} from "react-router-dom";
import moment from 'moment'
import CharbonneurList from "./CharbonneurList";
import NavoccupationSkeleton from "../../inc/NavoccupationSkeleton";

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
        const mapCities = cities.length ? (
            cities.map(item => {
                return(
                    <li key={item.id} className="mb-2">
                        <NavLink to={`/charbonneurs/${this.props.slug}/${item.slug}/`}>
                            {item.name}
                        </NavLink>
                    </li>
                )
            })
        ):(
            <NavoccupationSkeleton/>
        );
        return (

            <div className="card mb-3">
             <div className="card-header h6"><b>Les charbonneurs dans la Ville de</b> </div>
                <div className="card-body">
                    <ul className="list-unstyled">

                        {mapCities}

                    </ul>
                </div>
            </div>
        )
    }

}

export default CharbonneurCityList;
