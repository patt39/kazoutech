import React, {Component} from "react";
import { Helmet } from 'react-helmet';
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import AllOccupation from "./AllOccupation";
import SubscribeLine from "../../user/SubscribeLine"
import PageCitySite from "../city/PageCitySite";


class OccupationSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {
            //
        }
    }

    // lifecycle method
    componentDidMount() {
        //
    }

    render() {

        return (
            <>
            
                <Helmet title={`Trouver un technicien en Soudure, Maçonnerie, Electricité... facilement au Cameroun | Kazoutech`}/>

                <div className="landing-page">
                    <NavUserSIte/>
                    <div className="wrapper">
                        <div className="section-shaped my-0 skew-separator skew-mini">
                            <div className="page-header page-header-mini header-filter">
                                <div className="page-header-image"
                                     style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/kevin-grieve.jpg' + ")"}}>
                                </div>
                                <div className="container">
                                    <div className="header-body text-center mb-7">
                                        <div className="row justify-content-center">
                                            <div className="col-xl-5 col-lg-6 col-md-8 px-5">
                                                <h3 className="display-2 text-white">Catégories</h3>
                                                <p className="text-lead text-white">Du service à la personne et du main
                                                    à main entre particuliers</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <AllOccupation/>
                    </div>
                    <PageCitySite/>
                    <SubscribeLine/>
                    <FooterUserSite/>
                </div>
            </>
        )
    }
}

export default OccupationSiteIndex;
