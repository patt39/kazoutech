import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import AnnonceList from "./inc/AnnonceList";
import {Link, NavLink} from "react-router-dom";
import AnnonceOccupationList from "./AnnonceOccupationList";
import moment from "moment";
import {Button} from "reactstrap";
import NavCategoryandCity from "./inc/NavCategoryandCity";


class AnnonceSiteByOccupationbyCategoryoccupation extends Component {
    constructor(props) {
        super(props);
        this.state = {
            annoncebycategoryoccupation: {annonces:[]},
        };

        this.deleteItem = this.deleteItem.bind(this);
    }

    // handle delete
    deleteItem(id) {
        Swal.fire({
            title: 'Etes vous sure de vouloir suprimer cette annonce?',
            animation: false,
            customClass: 'animated shake',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success btn-sm",
            cancelButtonClass: 'btn btn-danger btn-sm',
            confirmButtonText: 'Oui suprimer',
            cancelButtonText: 'No annuler',
            showCancelButton: true,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                const url = route('annonces.destroy',id);
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
        let SlugCategoryoccupation = this.props.match.params.catagoryoccupation;
        let SlugOccupation = this.props.match.params.occupation;
        dyaxios.get(route('api_annonce_occupation_categoryoccupation_site.view',[SlugOccupation,SlugCategoryoccupation]))
            .then(response =>
                this.setState({
                    annoncebycategoryoccupation: response.data,
                }));
    }

    render() {
        const {annoncebycategoryoccupation} = this.state;
        const annoncebycategoryoccupations = annoncebycategoryoccupation.annonces;
        const composantTitle = `${annoncebycategoryoccupation.name || "kazoutech"}`;
        document.title = `Annonce de ${composantTitle} | Kazoutech`;
        let SlugOccupation = this.props.match.params.occupation;
        return (
            <div className="blog-post">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image"
                             style={{backgroundImage: "url(" + annoncebycategoryoccupation.photo + ")"}}/>
                        <div className="content-center">
                            <div className="row">
                                <div className="col-md-6 mx-auto text-center">
                                    <h4 className="title text-white">
                                        Restez à l'affût de toutes les annonces sur <b>{annoncebycategoryoccupation.name}</b>
                                    </h4>
                                    <div className="author">
                                        <Link to={`/annonces/${SlugOccupation}/`} className="text-white">
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

                                                        <NavCategoryandCity {...this.props}/>

                                                        <AnnonceOccupationList/>

                                                    </div>

                                                    <div className="col-lg-8 col-md-10 mx-auto">
                                                        <h5 className="display-3 mb-5"><b>Toutes les annonces de {annoncebycategoryoccupation.name}</b></h5>
                                                        <div className="row">
                                                            <div className="col-md-6">
                                                                <div className="card mb-3 text-center">
                                                                    <div className="card-body"><p
                                                                        className="h5 font-weight-normal mb-3 text-success">Vous avez une annonce?</p>
                                                                        <Link to={`/annonces/${SlugOccupation}/p/annonce/new/create/`} className="btn btn-success mb-2"
                                                                              type="button" disabled="">
                                                                            <span
                                                                                className="spinner-grow spinner-grow-sm"
                                                                                role="status" aria-hidden="true"/>
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
                                                                {annoncebycategoryoccupations.map((item) => (
                                                                    <AnnonceList key={item.id} {...item} deleteItem={this.deleteItem}/>
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

export default AnnonceSiteByOccupationbyCategoryoccupation;
