import React, { Component } from "react";
import { Helmet } from 'react-helmet';
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import AnnonceList from "./inc/AnnonceList";
import { Link, NavLink } from "react-router-dom";
import NavAnnoncesByCities from "./inc/NavAnnoncesByCities";

class AnnonceSiteByCitySlug extends Component {
    constructor(props) {
        super(props);
        this.state = {
            annoncebycity: { annonces: [] },
            occupations: [],
        };

        this.deleteItem = this.deleteItem.bind(this);
    }

    // handle delete
    deleteItem(id) {
        Swal.fire({
            title: 'Etes vous sure de vouloir supprimer cette annonce?',
            animation: false,
            customClass: 'animated shake',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success btn-sm",
            cancelButtonClass: 'btn btn-danger btn-sm',
            confirmButtonText: 'Oui supprimer',
            cancelButtonText: 'Non annuler',
            showCancelButton: true,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                const url = route('annonces.destroy', id);
                //Envoyer la requet au server
                dyaxios.delete(url).then(() => {

                    //Redirect after create
                    this.props.history.push('/annonces/');
                    /** Alert notify bootstrapp **/
                    $.notify({
                        // title: 'Update FAQ',
                        message: 'Annonce suprimée avec success'
                    },
                        {
                            allow_dismiss: false,
                            type: 'primary',
                            placement: {
                                from: 'bottom',
                                align: 'right'
                            },
                            animate: {
                                enter: 'animated fadeInRight',
                                exit: 'animated fadeOutRight'
                            },
                        });
                    /** End alert ***/

                }).catch(() => {
                    //Failled message
                    $.notify("Ooop! Une erreur est survenue", {
                        allow_dismiss: false,
                        type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
                })
            }
        });
    }
    // lifecycle method
    componentDidMount() {
        let SlugCity = this.props.match.params.city;
        dyaxios.get(route('api_annonces_by_city_slug_site.view', SlugCity))
            .then(response => this.setState({ annoncebycity: response.data, }));
        dyaxios.get(route('api_active.occupations')).then(response => this.setState({ occupations: [...response.data], }));
    }

    render() {
        const { annoncebycity } = this.state;
        const annoncebycities = annoncebycity.annonces;
        const composantTitle = `${annoncebycity.name}`;
        return (
            <>
                <Helmet title={`Annonces dans la ville de ${annoncebyoccupation.name || "Kazoutech"} | Kazoutech`} />
                <div className="blog-post">
                    <NavUserSIte />
                    <div className="wrapper">
                        <div className="page-header page-header-mini header-filter">
                            <div className="page-header-image"
                                style={{ backgroundImage: "url(" + annoncebycity.photo + ")" }} />
                            <div className="content-center">
                                <div className="row">
                                    <div className="col-md-6 mx-auto text-center">
                                        <h4 className="title text-white">
                                            Restez a l'affue de toutes les annonces sur Kazoutech dans la ville de <b>{annoncebycity.name}</b>
                                        </h4>
                                        <div className="author">
                                            <Link to={'/annonces/'} className="text-white">
                                                <i className="fa fa-chevron-circle-left" /> Retour Annonces
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
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
                                                    <br />
                                                    <div className="row">
                                                        <div className="col-md-4">

                                                            <NavAnnoncesByCities />

                                                        </div>

                                                        <div className="col-lg-8 col-md-10 mx-auto">
                                                            <h5 className="display-3 mb-5"><b>Toutes les annonces dans la ville de {annoncebycity.name}</b></h5>
                                                            <div className="row">
                                                                <div className="col-md-6">
                                                                    <div className="card mb-3 text-center">
                                                                        <div className="card-body"><p
                                                                            className="h5 font-weight-normal mb-3 text-success">Vous avez une annonce?</p>
                                                                            <Link to={`/annonces/${this.props.match.params.occupation}/new/p/create/`} className="btn btn-success mb-2"
                                                                                type="button" disabled="">
                                                                                <span
                                                                                    className="spinner-grow spinner-grow-sm"
                                                                                    role="status" aria-hidden="true" />
                                                                                Annonce
                                                                            </Link>
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
                                                                    {annoncebycities.map((item) => (
                                                                        <AnnonceList key={item.id} {...item} deleteItem={this.deleteItem} />
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
                        <FooterUserSite />
                    </div>
                </div>
            </>
        )
    }

}

export default AnnonceSiteByCitySlug;
