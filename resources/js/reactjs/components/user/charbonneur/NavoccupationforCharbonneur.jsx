import React, {Component} from "react";
import {Link,NavLink} from "react-router-dom";
import moment from 'moment'
import Skeleton from "react-loading-skeleton";
import NavoccupationSkeleton from "../../inc/NavoccupationSkeleton";

require("moment/min/locales.min");
moment.locale('fr');

class NavoccupationforCharbonneur extends Component {
    constructor(props) {
        super(props);
        this.state = {
            occupations: [],
        }
    }


    componentDidMount() {
        dyaxios.get(route('api_active.occupations')).then(response =>
            this.setState({occupations: [...response.data],}));
    }

    render() {
        const {occupations} = this.state;
        const mapOccupations = occupations.length ? (
            occupations.map(item => {
                return(

                    <li key={item.id} className="mb-2">
                        <NavLink to={`/charbonneurs/${item.slug}/`}>
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
                <div className="card-header h6"><b>Profils des collaborateurs</b> </div>
                <div className="card-body">
                    <ul className="list-unstyled">

                        {mapOccupations}

                    </ul>
                </div>
            </div>
        )
    }

}

export default NavoccupationforCharbonneur;
