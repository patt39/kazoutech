import React, {Component} from "react";
import {Link} from "react-router-dom";
import OccupationList from "../user/occupation/OccupationList";

class AllOccupation extends Component {
    constructor(props) {
        super(props);
        this.state = {
            occupations: []
        }
    }

    componentDidMount() {
        dyaxios.get(route('api_active.occupations')).then(response =>
            this.setState({
                occupations: [...response.data],
            }));
    }

    render() {
        const {occupations} = this.state;
        return (
            <div className="container text-center">
                <div className="row mb-5">
                    <div className="col-md-12 mx-auto">
                        <h3 className="display-3">Une prestation à domicile? ou au sein de votre business personnel?</h3>
                        <p className="lead">Pour chaque situation et proche de votre localité, trouvez le(s) prestataire(s) dont les compétences répondent à vos attentes et à votre niveau d’exigence.</p>
                    </div>
                </div>
                <div className="row align-items-center">
                    {occupations.map((item) => (
                        <OccupationList key={item.id} {...item} />
                    ))}
                </div>
            </div>
        )
    }
}

export default AllOccupation;
