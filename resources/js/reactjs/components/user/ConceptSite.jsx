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
                    <div className="page-header  header-filter">
                <div className="page-header-image" style={{backgroundImage: "url(" + '/assets/vendor_site/img/sections/broofoac.jpg' + ")"}}></div>
                <div className="container">
                    <div className="row">
                    <div className="col-lg-10 mx-auto text-center">
                        <h2 className="display-2 text-white">Concept Kazoutech</h2>
                    </div>
                    </div>
                    <div className="row">
                    <div className="floating-box bg-default">
                        <div className="box text-center">
                        <div className="icon icon-shape bg-primary icon-xl rounded-circle text-white">
                            <i className="ni ni-spaceship"></i>
                        </div>
                        </div>
                        <blockquote className="blockquote text-center mt-4">
                        <p className="title mb-0 text-white" stlyle="font-size: 60px">Bienvenue</p>
                        </blockquote>
                        <h2 className="lead text-white p-5"><em style={{color: "red"}}>Kazoutech </em> est une plateforme de demande et de prestation de services en ligne.Principalement nous mettons en contact des particuliers et des technicien(ne) pour des services precis.Nous travaillons aussi avec des entreprises de dans le batiment et le genie civile.A noter que  sur notre plateforme, le prestataire a le status d'auto-entrepreneur et travail a sa guise.</h2>
                    </div>
                    </div>
                </div>
            </div>
                        <div className="section features features-5">
                            <div className="container">
                                <div className="row">
                                        <div className="col-md-8 text-center mx-auto">
                                            <h3 className="display-3" style={{color: "red"}}>Nos Valeurs</h3>
                                            <p className="lead">La capacité de faire confiance a des gens rancontrer sur le net est un atout quon aquiet avec le temp.</p>
                                            </div>
                                        </div>
                                        <div className="row align-items-center">
                                            <div className="col-lg-12 mt-md-5">
                                            <div className="row">
                                                <div className="col-md-6">
                                                <div className="info">
                                                    <div className="pr-md-5">
                                                    <div className="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                                                        <i className="ni ni-atom"></i>
                                                    </div>
                                                    <h5 className="display-5">Awesome features</h5>
                                                    <p>The kit comes with three pre-built pages to help you get started faster.</p>
                                                    <ul className="list-unstyled">
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Beautiful elements</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Amazing page examples</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Super friendly support team</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div className="col-md-6">
                                                <div className="info">
                                                    <div className="pr-md-5">
                                                    <div className="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                                                        <i className="ni ni-money-coins"></i>
                                                    </div>
                                                    <h5 className="display-5">Best prices</h5>
                                                    <p> If you're taught you can’t do anything, you won’t do anything. </p>
                                                    <ul className="list-unstyled">
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Beautiful elements</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Amazing page examples</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Super friendly support team</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div className="row mt-5">
                                                <div className="col-md-6">
                                                <div className="info">
                                                    <div className="pr-md-5">
                                                    <div className="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                                                        <i className="ni ni-support-16"></i>
                                                    </div>
                                                    <h5 className="display-5">Community support</h5>
                                                    <p>That’s the main thing people are always controlled by!</p>
                                                    <ul className="list-unstyled">
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Beautiful elements</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Amazing page examples</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Super friendly support team</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                                <div className="col-md-6">
                                                <div className="info">
                                                    <div className="pr-md-5">
                                                    <div className="icon icon-shape icon-shape-primary shadow rounded-circle mb-4">
                                                        <i className="ni ni-laptop"></i>
                                                    </div>
                                                    <h5 className="display-5">Responsive componenets</h5>
                                                    <p>They're slowed down by their perception of themselves.</p>
                                                    <ul className="list-unstyled">
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Beautiful elements</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Amazing page examples</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                        <li>
                                                        <div className="d-flex align-items-center">
                                                            <div>
                                                            <div className="mr-3">
                                                                <i className="ni ni-check-bold"></i>
                                                            </div>
                                                            </div>
                                                            <div>
                                                            <p className="mb-0">Super friendly support team</p>
                                                            </div>
                                                        </div>
                                                        </li>
                                                    </ul>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div className="section features-3 my-5" style={{backgroundImage: "url(" + '/assets/vendor_site/img/ill/p31.svg' + ")"}}>
                                            <div className="container">
                                            <div className="row text-center justify-content-center">
                                                <div className="col-lg-8">
                                                <h3 className="display-3 text-white">Build something great<span className="text-success"> with our products</span></h3>
                                                <p className="lead text-white">We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to play this game of life you need to appreciate every moment.</p>
                                                </div>
                                            </div>
                                            <div className="row row-grid mt-5">
                                                <div className="col-lg-6">
                                                <div className="info info-horizontal bg-white">
                                                    <div className="icon icon-shape icon-shape-info rounded-circle text-white">
                                                    <i className="ni ni-hat-3 text-info"></i>
                                                    </div>
                                                    <div className="description pl-4">
                                                    <h5 className="title text-info">Modular Components</h5>
                                                    <p>The Arctic Ocean freezes every winter and much of the sea-ice then thaws every summer, and that process will continue whatever.</p>
                                                    <a href="#" className="text-info">Learn more</a>
                                                    </div>
                                                </div>
                                                </div>
                                                <div className="col-lg-6">
                                                <div className="info info-horizontal bg-white">
                                                    <div className="icon icon-shape icon-shape-warning rounded-circle text-white">
                                                    <i className="ni ni-istanbul text-warning"></i>
                                                    </div>
                                                    <div className="description pl-4">
                                                    <h5 className="title text-warning">Modern Interface</h5>
                                                    <p>If everything I did failed - which it doesn't, it actually succeeds - just the fact that I'm willing to fail is an inspiration.</p>
                                                    <a href="#" className="text-warning">Learn more</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div className="row row-grid">
                                                <div className="col-lg-6">
                                                <div className="info info-horizontal bg-white">
                                                    <div className="icon icon-shape icon-shape-danger rounded-circle text-white">
                                                    <i className="ni ni-trophy text-danger"></i>
                                                    </div>
                                                    <div className="description pl-4">
                                                    <h5 className="title text-danger">Great Features</h5>
                                                    <p>People are so scared to lose that they don't even try. Like, one thing people can't say is that I'm not trying, and I'm not trying my hardest.</p>
                                                    <a href="#" className="text-danger">Learn more</a>
                                                    </div>
                                                </div>
                                                </div>
                                                <div className="col-lg-6">
                                                <div className="info info-horizontal bg-white">
                                                    <div className="icon icon-shape icon-shape-success rounded-circle text-white">
                                                    <i className="ni ni-image text-success"></i>
                                                    </div>
                                                    <div className="description pl-4">
                                                    <h5 className="title text-success">Awesome Support</h5>
                                                    <p>The time is now for it to be okay to be great. People in this world shun people for being great. For being a bright color.</p>
                                                    <a href="#" className="text-success">Learn more</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div className="subscribe-line subscribe-line-white">
                                        <div className="container">
                                            <div className="row">
                                                <div className="col-lg-5 mr-auto">
                                                    <h4 className="title">Restez a l'affue chaque semaine!</h4>
                                                    <p className="description">
                                                        Rejoigniez notre newsletter et ayez de nos nouvelle chaque semaine n ayez craint
                                                        nous detestons aussi les spam
                                                    </p>
                                                </div>
                                                <div className="col-lg-6 d-flex justify-content-center flex-column ml-auto">
                                                    <form method="" action="">
                                                        <div className="row">
                                                            <div className="col-sm-8">
                                                                <div className="form-group">
                                                                    <div className="input-group mb-4">
                                                                        <div className="input-group-prepend">
                                                                                <span className="input-group-text">
                                                                                    <i className="ni ni-email-83"/></span>
                                                                        </div>
                                                                        <input className="form-control" placeholder="votre Email..."
                                                                            type="text"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="col-sm-4">
                                                                <button type="button" className="btn btn-success btn-block">souscrivez
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
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

export default ConceptSite;
