import React, {Component} from "react";
import FooterUserSite from "../inc/FooterUserSite";
import NavUserSIte from "../inc/NavUserSIte";


class ConceptSite extends Component {
    constructor(props) {
        super(props);
        this.state = {}
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Concept';
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
                                 style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}/>
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto text-center">
                                        <h2 className="display-2 text-white">Concept Kazoutech</h2>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="floating-box bg-default">
                                        <div className="box text-center">
                                            <div
                                                className="icon icon-shape bg-primary icon-xl rounded-circle text-white">
                                                <i className="ni ni-spaceship"></i>
                                            </div>
                                        </div>
                                        <blockquote className="blockquote text-center mt-4">
                                            <p className="title mb-0 text-white" stlyle="font-size: 60px">Bienvenue</p>
                                            <footer className="blockquote-footer text-white">Someone famous in
                                                <cite title="Source Title">Source Title</cite>
                                            </footer>
                                        </blockquote>
                                        <h2 className="lead text-white p-5"><em style={{color: "red"}}>Kazoutech </em> est
                                            une plateforme de demande et de prestation de services en
                                            ligne.Principalement nous mettons en contact des particuliers et des
                                            technicien(ne) pour des services precis.Nous travaillons aussi avec des
                                            entreprises de dans le batiment et le genie civile.A noter que sur notre
                                            plateforme, le prestataire a le status d'auto-entrepreneur et travail a sa
                                            guise.</h2>
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

export default ConceptSite;
