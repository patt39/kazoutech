import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import {NavLink} from "react-router-dom";


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
                                 style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/georgie.jpg' + ")"}}/>
                            <div className="container">
                                <div className="header-body text-center mb-7">
                                    <div className="row justify-content-center">
                                        <div className="col-xl-5 col-lg-6 col-md-12 px-5">
                                            <h1 className="text-white">Chat / Messages</h1>
                                            <p className="text-lead text-white">Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="main main-raised">
                        <div className="container mb-5 upper">
                            <div className="row">
                                <div className="col-md-6">
                                    <div className="card card-profile" data-image="img-rounded">
                                        <div className="card-avatar">
                                            <img className="rounded-circle" src="/assets/vendor_site/img/faces/team-1.jpg" />
                                        </div>
                                        <div className="card-body ">
                                            <h6 className="card-category text-gray">Project Manager</h6>
                                            <h4 className="card-title">Patrick Noubissi</h4>
                                            <p className="card-description">
                                                Don't be scared of the truth because we need to restart the
                                                human foundation in truth And I love you...
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div className="col-lg-6">
                                    <div className="card">
                                        <div className="card-header d-inline-block">
                                            <div className="row">
                                                <div className="col-md-12">
                                                    <div className="media align-items-center">
                                                        <div className="media-body">
                                                                <span className="text-muted text-small">last seen today at 1:53am</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-1 col-4">
                                                    <div className="dropdown">
                                                        <button className="btn btn-link text-primary" type="button" data-toggle="dropdown">
                                                            <i className="ni ni-settings-gear-65"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div className="col-md-1 col-3">
                                                    <button className="btn btn-link btn-text" type="button" data-toggle="tooltip" data-placement="top" title="Video call">
                                                        <i className="ni ni-book-bookmark"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="card-body">
                                            <div className="row justify-content-end text-right">
                                                <div className="col-auto">
                                                    <div className="card bg-gradient-primary text-white">
                                                        <div className="card-body p-2">
                                                            <p className="mb-1">
                                                                Awesome, blog is important source material for anyone who creates apps? <br/>
                                                            beacuse these blogs offer a lot of information about website development.
                                                            </p>
                                                        <div>
                                                            <small className="opacity-60">4:46pm</small>
                                                            <i className="ni ni-check-bold"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row justify-content-start">
                                            <div className="col-5">
                                                <div className="card">
                                                    <div className="card-body p-2">
                                                        <div className="col-12 p-0">
                                                            <img src="../assets/img/theme/img-1-1200x1000.jpg" alt="Rounded image" className="img-fluid rounded mb-1"/>
                                                        </div>
                                                        <div>
                                                            <small className="opacity-60"><i className="far fa-clock"></i> 4:47pm</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row justify-content-end text-right">
                                            <div className="col-auto">
                                                <div className="card bg-gradient-primary text-white">
                                                    <div className="card-body p-2">
                                                        <p className="mb-0">
                                                            At the end of the day … the native dev apps is where users are
                                                        </p>
                                                        <div>
                                                            <small className="opacity-60">4:47pm</small>
                                                            <i className="ni ni-check-bold"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
             <FooterUserSite/>
                </div>
            </div>
        )
    }

}

export default ProfileUserSiteIndex;
