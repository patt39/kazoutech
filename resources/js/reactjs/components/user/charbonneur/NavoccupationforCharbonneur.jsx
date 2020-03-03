import React, {Component} from "react";
import {Link,NavLink} from "react-router-dom";
import moment from 'moment'

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
        return (

            <div className="card mb-3">
                <div className="card-header h6"><b>Profils des charbonneurs</b> </div>
                <div className="card-body">
                    <ul className="list-unstyled">

                        {occupations.map((item) => (
                            <li key={item.id} className="mb-2">
                                <NavLink to={`/charbonneurs/${item.slug}/`}>
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

export default NavoccupationforCharbonneur;
