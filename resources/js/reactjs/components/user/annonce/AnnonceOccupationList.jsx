import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class AnnonceOccupationList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            occupations: [],
        }
    }


    componentDidMount() {
        dyaxios.get(route('api_active.occupations')).then(response => this.setState({occupations: [...response.data],}));
    }

    render() {
        const {occupations} = this.state;
        return (

            <div className="col-md-4">
                <div className="card mb-3">
                    <div className="card-header h6">Occupations</div>
                    <div className="card-body">
                        <ul className="list-unstyled">

                            {occupations.map((item) => (
                            <li key={item.id} className="mb-2">
                                <Link to={`/annonces/${item.slug}/`}>
                                    {item.name}
                                </Link>
                            </li>
                            ))}

                        </ul>
                    </div>
                </div>
            </div>
        )
    }

}

export default AnnonceOccupationList;
