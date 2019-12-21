import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";


class TestimonialSite extends Component {
    constructor(props) {
        super(props);
        this.state = {}
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Testimonails';
        document.title = `${composantTitle} | Kazoutech`;
    }

    render() {
        return (

            <>
                <div className="about-us">
                    <NavUserSIte/>
                    <div className="wrapper">
                        <div className="page-header page-header-mini header-filter">
                            <div className="page-header-image page-header-mini"
                                 style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/mohamed.jpg' + ")"}}/>
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto text-center">
                                        <h2 className="display-2 text-white">Avis des clients satisfait</h2>
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
                                                <div className="card card-profile" data-image="img-raised">
                                                    <div className="card-header-image">
                                                        <a href="javascript:;">
                                                            <img className="img"
                                                                 src="/assets/vendor_site/img/faces/alejandro-escamilla.jpg"/>
                                                        </a>
                                                        <div className="card-title text-white">
                                                            Austin Johnson
                                                        </div>
                                                    </div>
                                                    <div className="card-body">
                                                        <h6 className="card-category text-info text-center">Evaluation</h6>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-raised">
                                                    <div className="card-header-image">
                                                        <a href="javascript:;">
                                                            <img className="img"
                                                                 src="/assets/vendor_site/img/faces/alejandro-escamilla.jpg"/>
                                                        </a>
                                                        <div className="card-title text-white">
                                                            Austin Johnson
                                                        </div>
                                                    </div>
                                                    <div className="card-body">
                                                        <h6 className="card-category text-info text-center">Evaluation</h6>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-raised">
                                                    <div className="card-header-image">
                                                        <a href="javascript:;">
                                                            <img className="img"
                                                                 src="/assets/vendor_site/img/faces/alejandro-escamilla.jpg"/>
                                                        </a>
                                                        <div className="card-title text-white">
                                                            Austin Johnson
                                                        </div>
                                                    </div>
                                                    <div className="card-body">
                                                        <h6 className="card-category text-info text-center">Evaluation</h6>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-raised">
                                                    <div className="card-header-image">
                                                        <a href="javascript:;">
                                                            <img className="img"
                                                                 src="/assets/vendor_site/img/faces/alejandro-escamilla.jpg"/>
                                                        </a>
                                                        <div className="card-title text-white">
                                                            Austin Johnson
                                                        </div>
                                                    </div>
                                                    <div className="card-body">
                                                        <h6 className="card-category text-info text-center">Evaluation</h6>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-raised">
                                                    <div className="card-header-image">
                                                        <a href="javascript:;">
                                                            <img className="img"
                                                                 src="/assets/vendor_site/img/faces/alejandro-escamilla.jpg"/>
                                                        </a>
                                                        <div className="card-title text-white">
                                                            Austin Johnson
                                                        </div>
                                                    </div>
                                                    <div className="card-body">
                                                        <h6 className="card-category text-info text-center">Evaluation</h6>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6 col-lg-4">
                                                <div className="card card-profile" data-image="img-raised">
                                                    <div className="card-header-image">
                                                        <a href="javascript:;">
                                                            <img className="img"
                                                                 src="/assets/vendor_site/img/faces/alejandro-escamilla.jpg"/>
                                                        </a>
                                                        <div className="card-title text-white">
                                                            Austin Johnson
                                                        </div>
                                                    </div>
                                                    <div className="card-body">
                                                        <h6 className="card-category text-info text-center">Evaluation</h6>
                                                        <p className="card-description">
                                                            Don't be scared of the truth because we need to restart the
                                                            human foundation in truth And I love you...
                                                        </p>
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
            </>
        )
    }

}

export default TestimonialSite;
