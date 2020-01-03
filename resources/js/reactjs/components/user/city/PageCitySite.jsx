import React, {Component} from "react";
import CitySite from "./CitySite";
import {Link} from "react-router-dom";

class PageCitySite extends Component {
    constructor(props) {
        super(props);
        this.state = {
        }
    }

    render() {
        return (
            <div className="section features-7">
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-lg-12">
                            <div className="container">
                                <div className="row">
                                    <div className="col-md-8 mr-auto ml-auto text-center">
                                        <h3 className="display-3 mb-5">Nous sommes Partout au Cameroun</h3>
                                    </div>
                                </div>
                                <CitySite/>
                                <Link to={'/toutes-les-villes/'}
                                      className="font-size-3 font-weight-medium d-block mt-5">
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
export default PageCitySite;
