import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import AnnonceList from "./AnnonceList";
import BlogList from "../blog/BlogList";


class AnnonceSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {
            annonces: [],
        }
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Annonce toutes les annonces | Kazoutech';
        document.title = `${composantTitle}`;
        dyaxios.get(route('api_active.annonces')).then(response => this.setState({annonces: [...response.data],}));
    }

    render() {
        const {annonces} = this.state;
        return (
            <div className="blog-post">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-small header-filter">
                        <div className="page-header-image"
                             style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}/>
                        <div className="content-center">
                            <div className="row">
                                <div className="col-md-6 mx-auto text-center">
                                    <h2 className="title text-white">
                                        Rester a l'affu de toutes les annonces sur Kazoutech
                                    </h2>
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
                                                        <h2 className="title mb-5"><b>Toutes les annonces</b></h2>

                                                        <div className="row">
                                                            <div className="col-md-6">
                                                                <div className="card mb-3 text-center">
                                                                    <div className="card-body"><p
                                                                        className="h5 font-weight-normal mb-3 text-success">Vous
                                                                        aviez une annonce?</p>
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
                                                                {annonces.map((item) => (
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

export default AnnonceSiteIndex;
