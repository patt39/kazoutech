import React, {Component} from "react";
import {Link} from "react-router-dom";


class CitySite extends Component {
    constructor(props) {
        super(props);
        this.state = {
            cities:[]
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

            <div className="section features-7">
                <div className="container">
                    <div className="row justify-content-center mt-5">
                        <div className="col-lg-12">

                            <div className="container">
                                <div className="row">
                                    <div className="col-md-8 mr-auto ml-auto text-center">
                                        <h3 className="title mb-5">Nous sommes partout</h3>
                                    </div>
                                </div>
                                <div className="row">
                                    {cities.map((item) => (

                                        <div  key={item.id} className="col-sm-2 col-6" data-animation="zooming">
                                            <small
                                                className="d-block text-uppercase font-weight-bold mb-4 text-center">
                                                <b>{item.name}</b>
                                            </small>
                                            <a href="#">
                                                <img
                                                    src={item.photo}
                                                    alt={item.name}
                                                    className="img-fluid rounded shadow"
                                                />
                                            </a>
                                        </div>

                                    ))}
                                </div>
                                <Link to={'/toutes-les-villes/'} className="font-size-3 font-weight-medium d-block">
                                    Voir toutes les villes
                                    <i className="fas fa-chevron-right pl-1 font-size-1"/>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }

}

export default CitySite;
