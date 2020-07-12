import React, { Component } from "react";
import { Helmet } from 'react-helmet';
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import AnnonceList from "./inc/AnnonceList";
import { Link, NavLink } from "react-router-dom";
import AnnonceOccupationList from "./AnnonceOccupationList";
import NavoccupationSkeleton from "../../inc/NavoccupationSkeleton";
import Skeleton from "react-loading-skeleton";


class AnnonceSiteByOccupationCategoryoccupationCity extends Component {
    constructor(props) {
        super(props);
        this.state = {
            annoncebycity: { annonces: [] },
            annoncebycategoryoccupation: [],
            catagoryoccupations: [],
            cities: [],
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

                    //Redirect after delete
                    this.props.history.push('/annonces/');
                    /** Alert notify bootstrapp **/
                    $.notify({
                        // title: 'Update FAQ',
                        message: 'Annonce supprimée avec succès'
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
                    $.notify("Ooopss! Une erreur est survenue", {
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
        let SlugOccupation = this.props.match.params.occupation;
        let SlugCategoryoccupation = this.props.match.params.catagoryoccupation;
        dyaxios.get(route('api_annonce_occupation_categoryoccupation_city_site.view', [SlugOccupation, SlugCategoryoccupation, SlugCity]))
            .then(response =>
                this.setState({
                    annoncebycity: response.data,
                }));
        dyaxios.get(route('api_annonce_occupation_categoryoccupation_site.view', [SlugOccupation, SlugCategoryoccupation]))
            .then(response =>
                this.setState({
                    annoncebycategoryoccupation: response.data,
                }));
        dyaxios.get(route('api.apiannoncesbycategoryoccupationcountbycity', [SlugOccupation, SlugCategoryoccupation])).then(response =>
            this.setState({
                cities: [...response.data],
            }));
        dyaxios.get(route('apiannoncesbyoccupationcount.view', [SlugOccupation, SlugCategoryoccupation])).then(response =>
            this.setState({
                catagoryoccupations: [...response.data],
            }));
    }

    render() {
        const { annoncebycity, annoncebycategoryoccupation, cities, catagoryoccupations } = this.state;
        const annoncebycities = annoncebycity.annonces;
        let SlugCategoryoccupation = this.props.match.params.catagoryoccupation;
        let SlugOccupation = this.props.match.params.occupation;
        let SlugCity = this.props.match.params.city;
        return (
            <>
              <Helmet title={`Annonces en ${annoncebycategoryoccupation.name || ""} dans la ville de ${annoncebycity.name || "kazoutech"} au Cameroun | Kazoutech`}/>

                <div className="blog-post">
                    <NavUserSIte />
                    <div className="wrapper">
                        <div className="page-header page-header-mini header-filter">
                            <div className="page-header-image"
                                style={{ backgroundImage: "url(" + annoncebycity.photo + ")" }} />
                            <div className="content-center">
                                <div className="col-md-6 mx-auto text-center">
                                    <h4 className="title text-white">
                                        Annonces de <b>{annoncebycategoryoccupation.name}</b> à {annoncebycity.name}
                                    </h4>
                                    <div className="author">
                                        <Link to={`/annonces/${SlugOccupation}/${SlugCategoryoccupation}/`} className="text-white">
                                            <i className="fa fa-chevron-circle-left" /> Retour {annoncebycategoryoccupation.name}
                                        </Link>
                                    </div>
                                    <br />
                                        <span>Tous les annonces <b style={{ textTransform: "lowercase" }}>{annoncebycategoryoccupation.name}</b> au Cameroun</span>
                                        <br />
                                        <span>{annoncebycity.annonces_count} {annoncebycity.annonces_count > 1 ? "annonces" : "annonce"} <b style={{ textTransform: "lowercase" }}>{annoncebycity.name}</b> au Cameroun</span>
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
                                                        <div className="col-lg-4 col-md-12 mx-auto ">
                                                            <div className="card mb-3">
                                                                <div className="card-header h6"
                                                                    style={{ textTransform: "capitalize" }}><b>Villes</b>
                                                                </div>
                                                                <div className="card-body">

                                                                    <ul className="list-unstyled">
                                                                        {cities.length ?
                                                                            <>
                                                                                {cities.map((item) => (
                                                                                    <li key={item.id} className="mb-2">
                                                                                        <NavLink
                                                                                            to={`/annonces/${SlugOccupation}/${annoncebycategoryoccupation.slug}/${item.slug}/`}>
                                                                                            <span style={{ textTransform: "capitalize" }}>{annoncebycategoryoccupation.name}</span> à {item.name}
                                                                                        </NavLink>
                                                                                    </li>
                                                                                ))}

                                                                                <li className="mb-2">
                                                                                    <Link to={`/all_cities/`}>
                                                                                        Autre ville...
                                                                                    </Link>
                                                                                </li>
                                                                            </>
                                                                            :
                                                                            <NavoccupationSkeleton/>
                                                                        }

                                                                    </ul>

                                                                </div>
                                                            </div>

                                                            <div className="card mb-3">
                                                                <div className="card-header h6"><b>Annonces <span
                                                                    style={{ textTransform: "lowercase" }}>{annoncebycategoryoccupation.name}</span></b>
                                                                </div>
                                                                <div className="card-body">
                                                                    <ul className="list-unstyled">

                                                                        {catagoryoccupations.length ?
                                                                            <>
                                                                                {catagoryoccupations.map((item) => (
                                                                                    <li key={item.id} className="mb-2">
                                                                                        <Link to={`/annonces/${SlugOccupation}/${item.slug}/${SlugCity}/`}>
                                                                                            {item.name}
                                                                                        </Link>
                                                                                    </li>
                                                                                ))}
                                                                            </>
                                                                            :<NavoccupationSkeleton/>}

                                                                    </ul>

                                                                </div>
                                                            </div>

                                                            <AnnonceOccupationList />
                                                        </div>

                                                        <div className="col-lg-8 col-md-12 mx-auto">
                                                            <h4 className="title">
                                                                {annoncebycategoryoccupation.name ?
                                                                    <>   Toutes les annonces <b>{annoncebycategoryoccupation.name}</b></>
                                                                    :   <Skeleton />}

                                                            </h4>
                                                            <div className="row">
                                                                <div className="col-md-6">
                                                                    <div className="card mb-3 text-center">
                                                                        <div className="card-body"><p
                                                                            className="h5 font-weight-normal mb-3 text-success">Vous
                                                                            avez une annonce?</p>
                                                                            <Link
                                                                                to={`/annonces/${SlugOccupation}/p/annonce/new/create/`}
                                                                                className="btn btn-success mb-2"
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

export default AnnonceSiteByOccupationCategoryoccupationCity;
