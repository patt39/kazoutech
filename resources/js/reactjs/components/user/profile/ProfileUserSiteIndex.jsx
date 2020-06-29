import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import {Link,NavLink} from "react-router-dom";


class ProfileUserSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {

        };

    }


    render() {
        return (

            <div className="profile-page">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="section-shaped">
                        <div className="page-header page-header-mini header-filter">
                            <div className="page-header-image"
                                 style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/boxed-water.jpg' + ")"}}/>
                        </div>
                    </div>
                    <div className="main main-raised">
                        <div className="container mb-5 upper">
                            <div className="row justify-content-center">
                                <div className="col-lg-12">
                                    <div className="card card-profile" data-image="img-rounded">
                                        <div className="card-avatar">
                                            <img className="rounded-circle" src="/assets/vendor_site/img/faces/team-1.jpg"/>
                                        </div>
                                        <div className="row justify-content-center">
                                        <div className="col-md-1">
                                            <Link to={'/'} className="btn btn-link text-primary" type="button">
                                                <i className="ni ni-settings-gear-65"></i>
                                            </Link>
                                        </div>
                                        <div className="col-md-1">
                                            <Link to={'/'} className="btn btn-link text-primary" type="button">
                                                <i className="ni ni-book-bookmark"></i>
                                            </Link>
                                        </div>
                                        </div>
                                        <div className="card-body">
                                            <h3>Jessica Jones<span className="font-weight-light">, 27</span></h3>
                                            <div className="h6 font-weight-300"><i className="ni location_pin mr-2"></i>Bucharest,
                                                Romania
                                            </div>
                                            <div className="h6 mt-4"><i className="ni business_briefcase-24 mr-2"></i>Solution
                                                Manager - Creative Tim Officer
                                            </div>
                                            <div><i className="ni education_hat mr-2"></i>University of Computer Science
                                            </div>
                                        </div>
                                        <div className="mt-5 py-5 border-top text-center">
                                            <div className="row justify-content-center">
                                                <div className="col-lg-9">
                                                    <p>An artist of considerable range, Ryan — the name taken by
                                                        Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs
                                                        and records all of his own music, giving it a warm, intimate
                                                        feel with a solid groove structure. An artist of considerable
                                                        range.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                            <div className="nav-wrapper">
                                <ul className="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text"
                                    role="tablist">
                                    <li className="nav-item">
                                        <a className="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab"
                                           data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                           aria-controls="tabs-icons-text-1" aria-selected="true"><i
                                            className="ni ni-cloud-upload-96 mr-2"></i>Annonces Faites</a>
                                    </li>
                                    <li className="nav-item">
                                        <a className="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab"
                                           data-toggle="tab" href="#tabs-icons-text-2" role="tab"
                                           aria-controls="tabs-icons-text-2" aria-selected="false"><i
                                            className="ni ni-bell-55 mr-2"></i>Charbonneurs Choisit</a>
                                    </li>
                                    <li className="nav-item">
                                        <a className="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab"
                                           data-toggle="tab" href="#tabs-icons-text-3" role="tab"
                                           aria-controls="tabs-icons-text-3" aria-selected="false"><i
                                            className="ni ni-calendar-grid-58 mr-2"></i>Statistique</a>
                                    </li>
                                </ul>
                            </div>
                            <div className="card shadow">
                                <div className="card-body">
                                    <div className="tab-content" id="myTabContent">
                                        <div className="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                            <p className="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                            <p className="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.</p>
                                        </div>
                                        <div className="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                            <p className="description">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                                        </div>
                                        <div className="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                            <p className="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
            </div>
             <FooterUserSite/>
                </div>

        )
    }

}

export default ProfileUserSiteIndex;
