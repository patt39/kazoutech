import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import AnnonceList from "./AnnonceList";
import AnnonceOccupationList from "./AnnonceOccupationList";
import AnnonceCityList from "./AnnonceCityList";


class AnnonceSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {
            annonces: [],
        };

        this.deleteItem = this.deleteItem.bind(this);
    }
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

                    let isNotId = item => item.id !== id;
                    let updatedItems = this.state.annonces.filter(isNotId);
                    this.setState({annonces: updatedItems});

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
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image"
                             style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}/>
                        <div className="content-center">
                            <div className="row">
                                <div className="col-md-6 mx-auto text-center">
                                    <h3 className="title text-white">
                                        Restez à l'affût de toutes les annonces sur Kazoutech
                                    </h3>
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
                                                        <AnnonceOccupationList/>
                                                        <AnnonceCityList/>
                                                    </div>
                                                    <div className="col-lg-8 col-md-10 mx-auto">
                                                        <h2 className="display-3 mb-5"><b>Toutes les annonces</b></h2>
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
                                                                {annonces.map((item) => (
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

export default AnnonceSiteIndex;
