import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'
import NavoccupationSkeleton from "../../inc/NavoccupationSkeleton";

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
        const mapOccupations = occupations.length ? (
            occupations.map(item => {
                return(

                    <li key={item.id} className="mb-2">
                        {item.status ?
                            <Link to={`/annonces/${item.slug}/`}>
                                {item.name}
                            </Link>
                            :null}
                    </li>
                )
            })
        ):(
            <NavoccupationSkeleton/>
        );
        return (

            <div className="card mb-3">
                <div className="card-header h6">Occupations</div>
                <div className="card-body">
                    <ul className="list-unstyled">

                        {mapOccupations}

                    </ul>
                </div>
            </div>
        )
    }

}

export default AnnonceOccupationList;
