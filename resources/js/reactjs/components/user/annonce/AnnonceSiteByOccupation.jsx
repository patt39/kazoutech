import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import AnnonceList from "./AnnonceList";
import {Link} from "react-router-dom";


class AnnonceSiteByOccupation extends Component {
    constructor(props) {
        super(props);
        this.state = {
            annoncebyoccupation: {annonces:[]},
        }
    }

    // lifecycle method
    componentDidMount() {
        let SlugOccupation = this.props.match.params.occupation;
        dyaxios.get(route('api_annonce_occupation_site.view',SlugOccupation))
            .then(response => this.setState({annoncebyoccupation: response.data,}));
    }

    render() {
        const {annoncebyoccupation} = this.state;
        const annoncebyoccupations = annoncebyoccupation.annonces;
        const composantTitle = `${annoncebyoccupation.name}`;
        document.title = `${composantTitle} | Kaazoutech`;
        return (
            <div className="blog-post">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image"
                             style={{backgroundImage: "url(" + annoncebyoccupation.photo + ")"}}/>
                        <div className="content-center">
                            <div className="row">
                                <div className="col-md-6 mx-auto text-center">
                                    <h4 className="title text-white">
                                        Restez a l'affue de toutes les annonces sur Kazoutech
                                    </h4>
                                    <div className="author">
                                        <Link to={'/annonces/'} className="text-white">
                                            <i className="fa fa-chevron-circle-left"/> Retour Annonces
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div className="main main-raised">

                        <div className="container">
                            <div className="row">


                            </div>
                        </div>


                        <section className="section">
                            <div className="container">
                                <div className="row">
                                    <div className="col-md-12 ml-auto mr-auto">
                                        <section className="blogs-3">
                                            <div className="container">
                                                <br/>
                                                <div className="row">
                                                    <div className="col-md-4">
                                                        <div className="card mb-3">
                                                            <div className="card-header h6">Villes</div>
                                                            <div className="card-body">
                                                                <ul className="list-unstyled">
                                                                    <li className="mb-2"><a
                                                                        href="/annonces/jardinage/couper-un-arbre/paris">Annonce
                                                                        a Douala</a></li>
                                                                    <li className="mb-2"><a
                                                                        href="/annonces/jardinage/couper-un-arbre/marseille">Annonces
                                                                        a Yaounde</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div className="col-lg-8 col-md-10 mx-auto">
                                                        <h5 className="display-3 mb-5"><b>Toutes les annonces de {annoncebyoccupation.name}</b></h5>
                                                        <div className="row">
                                                            <div className="col-md-6">
                                                                <div className="card mb-3 text-center">
                                                                    <div className="card-body"><p
                                                                        className="h5 font-weight-normal mb-3 text-success">Vous avez une annonce?</p>
                                                                        <button className="btn btn-success mb-2"
                                                                                type="button" disabled="">
                                                                            <span
                                                                                className="spinner-grow spinner-grow-sm"
                                                                                role="status" aria-hidden="true"/>
                                                                            Annonce
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="col-md-6">
                                                                <div className="card mb-3 text-center">
                                                                    <div className="card-body"><p
                                                                        className="h5 font-weight-normal mb-3 text-primary">Envie
                                                                        de charbonner ?</p><a
                                                                        className="btn btn-primary btn-break"
                                                                        href="/devenez_charbonneur">Devenir
                                                                        Charbonneur</a></div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div className="card">
                                                            <div className="card-body">
                                                                {annoncebyoccupations.map((item) => (
                                                                    <AnnonceList key={item.id} {...item}/>
                                                                ))}
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </section>


                                    </div>
                                </div>
                            </div>
                        </section>


                    </div>
                    <FooterUserSite/>
                </div>
            </div>
        )
    }

}

export default AnnonceSiteByOccupation;
