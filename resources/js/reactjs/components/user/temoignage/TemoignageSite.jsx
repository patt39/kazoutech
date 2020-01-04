import React, { Component } from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";


class TestimonialSite extends Component {
    constructor(props) {
        super(props);
        this.state = {}
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Testimonials';
        document.title = `${composantTitle} | Kazoutech`;
    }

    render() {
        return (

            <>
                <div className="about-us">
                    <NavUserSIte />
                    <div className="wrapper">
                        <div className="page-header kazouTech-page-header-mini header-filter">
                            <div className="page-header-image page-header-mini"
                                style={{ backgroundImage: "url(" + '/assets/vendor_site/img/pages/mohamed.jpg' + ")" }} />
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto text-center">
                                        <h2 className="display-2 text-white">Avis des clients satisfaits</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="section features-4">
                            <div className="container">
                                <div className="row align-items-center">
                                    <div className="col-lg-12 mx-auto mt-4">
                                        <div className="row">
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src="/assets/vendor_site$/img/faces/team-1.jpg" />
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">Project Manager</h6>
                                                        <h4 className="card-title">Austin Johnson</h4>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                        <a href=".."
                                                            className="btn btn-info btn-round">Follow</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src="/assets/vendor_site$/img/faces/team-1.jpg" />
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">Project Manager</h6>
                                                        <h4 className="card-title">Austin Johnson</h4>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                        <a href=".."
                                                            className="btn btn-info btn-round">Follow</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src="/assets/vendor_site$/img/faces/team-1.jpg" />
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">Project Manager</h6>
                                                        <h4 className="card-title">Austin Johnson</h4>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                        <a href=".."
                                                            className="btn btn-info btn-round">Follow</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src="/assets/vendor_site$/img/faces/team-1.jpg" />
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">Project Manager</h6>
                                                        <h4 className="card-title">Austin Johnson</h4>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                        <a href=".."
                                                            className="btn btn-info btn-round">Follow</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src="/assets/vendor_site$/img/faces/team-1.jpg" />
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">Project Manager</h6>
                                                        <h4 className="card-title">Austin Johnson</h4>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                        <a href=".."
                                                            className="btn btn-info btn-round">Follow</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src="/assets/vendor_site$/img/faces/team-1.jpg" />
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">Project Manager</h6>
                                                        <h4 className="card-title">Austin Johnson</h4>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                        <a href=".."
                                                            className="btn btn-info btn-round">Follow</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <FooterUserSite />
                    </div>
                </div>
            </>
        )
    }

}

export default TestimonialSite;
