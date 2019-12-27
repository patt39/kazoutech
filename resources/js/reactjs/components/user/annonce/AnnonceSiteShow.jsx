import React, { Component } from "react";
import {Link, NavLink} from "react-router-dom";
import {Button} from "reactstrap";
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

require("moment/min/locales.min");
moment.locale('fr');

class AnnonceSiteShow extends Component {
    constructor(props) {
        super(props);
        this.state = {
            annonce: {
                user: [],
                occupation: []
            }
        };
        this.deleteItem = this.deleteItem.bind(this);
    }
    deleteItem(id) {
        Swal.fire({
            title: 'Ete vous sure de vouloir suprimer cette annonce?',
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
    componentDidMount() {
        let SlugItem = this.props.match.params.annonce;
        let SlugOccupation = this.props.match.params.occupation;
        let SlugCategoryoccupation = this.props.match.params.catagoryoccupation;
        let SlugCity = this.props.match.params.city;
        let url = route('api_annonce_site.view', [SlugOccupation,SlugCategoryoccupation,SlugCity,SlugItem]);
        dyaxios.get(url).then(response => this.setState({ annonce: response.data, }));
    }

    render() {
        const { annonce } = this.state;
        const composantTitle = `${annonce.title}`;
        document.title = `${composantTitle} | Kazoutech`;
        return (

            <div className="checkout-page">
                <NavUserSIte />
                <div className="wrapper">
                    <div className="section-shaped my-0 skew-separator skew-mini">
                        <div className="page-header page-header-small header-filter">
                            <div className="page-header-image"
                                 style={{ backgroundImage: "url(" + annonce.occupation.photo + ")" }}>
                            </div>
                            <div className="container">
                                <div className="header-body text-center mb-7">
                                    <div className="row justify-content-center">
                                        <div className="col-xl-5 col-lg-6 col-md-8 px-5">
                                            <Link to={`/annonces/${annonce.occupation.slug}/`} className="text-white">
                                                <h1 className="text-white">{annonce.occupation.name} </h1>
                                            </Link>
                                            <div className="author">
                                                <Link to={'/annonces/'} className="text-white">
                                                    <i className="fa fa-chevron-circle-left"/> Retour Annonces
                                                </Link>
                                            </div>
                                            <p className="text-lead text-white">{annonce.title}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="upper">
                        <div className="container">
                            <div className="row">
                                <div className="col-lg-4">
                                    <div className="container">
                                        <h3 className="title text-white mt-3">Order summary</h3>
                                        <div className="row">
                                            <div className="card">
                                                <div className="card-body">
                                                    <div className="media align-items-center mb-3">
                                                        <div className="col-md-5 col-6">
                                                            <img src="../assets/img/pages/gucci.png"
                                                                 alt="Rounded image" className="img-fluid" />
                                                        </div>
                                                        <div className="media-body">
                                                            <h2 className="h6">Shorts</h2>
                                                            <small className="d-block opacity-8">Small</small>
                                                        </div>
                                                        <div className="media-body text-right">
                                                            <span>$29</span>
                                                        </div>
                                                    </div>
                                                    <div className="media align-items-center">
                                                        <div className="col-md-5 col-6">
                                                            <img src="../assets/img/pages/jacket.png"
                                                                 alt="Rounded image" className="img-fluid" />
                                                        </div>
                                                        <div className="media-body">
                                                            <h2 className="h6 mb-0">Jacket</h2>
                                                        </div>
                                                        <div className="media-body text-right">
                                                            <span>$999</span>
                                                        </div>
                                                    </div>
                                                    <hr className="line-info mb-3" />
                                                    <form className="code-validate">
                                                        <label>Discount</label>
                                                        <div className="input-group">
                                                            <input type="text" className="form-control"
                                                                   name="name" placeholder="Discount Code"
                                                                   aria-label="Discount" />
                                                            <div className="input-group-append">
                                                                <button type="submit"
                                                                        className="btn btn-info">Apply
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <hr className="line-info mb-3" />
                                                    <div className="media align-items-center">
                                                        <h3 className="h6 opacity-8 mr-3">Subtotal</h3>
                                                        <div className="media-body text-right">
                                                            <span>$1038</span>
                                                        </div>
                                                    </div>
                                                    <div className="media align-items-center">
                                                        <h3 className="h6 opacity-8 mr-3">Shipping</h3>
                                                        <div className="media-body text-right">
                                                            <span>$5.8</span>
                                                        </div>
                                                    </div>
                                                    <hr className="line-info mb-3" />
                                                    <div className="media align-items-center">
                                                        <h3 className="h6">Total</h3>
                                                        <div className="media-body text-right">
                                                                <span
                                                                    className="font-weight-semi-bold">$1045.8</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div className="col-md-8 mx-auto">
                                    <div className="card">
                                        <div className="card-header">
                                            <h5 className="h3 mb-0">{annonce.title}</h5>
                                        </div>
                                        <div className="card-header d-flex align-items-center">
                                            <div className="d-flex align-items-center">
                                                <NavLink to={`/user/${annonce.user.username}/`}>
                                                    <img src={annonce.user.avatar} alt={annonce.user.name} className="avatar" />
                                                </NavLink>
                                                <div className="mx-3">
                                                    <NavLink to={`/user/${annonce.user.username}/`} className="text-dark font-weight-600 text-sm">{annonce.user.name}</NavLink>
                                                    <small className="d-block text-muted">{moment(annonce.created_at).startOf('hour').fromNow()}</small>
                                                </div>
                                            </div>
                                            <div className="text-right ml-auto">
                                                <button type="button" className="btn btn-sm btn-primary btn-icon">
                                                        <span className="btn-inner--icon icon-big">
                                                            <i className="ni ni-fat-add" />
                                                        </span>
                                                    <span className="btn-inner--text">Follow</span>
                                                </button>
                                                {!$guest ?
                                                    <>
                                                        {$userKazou.id === annonce.user_id ?
                                                            <>
                                                                <NavLink to={`/annonces/${annonce.occupation.slug}/p/annonce/${annonce.id}/edit`} className="btn btn-sm btn-success btn-icon">
                                                    <span className="btn-inner--icon icon-big">
                                                        <i className="ni ni-check-bold" />
                                                    </span>
                                                                    <span className="btn-inner--text">editer</span>
                                                                </NavLink>
                                                                <Button onClick={() => this.deleteItem(annonce.id)}
                                                                        className="btn btn-sm btn-danger btn-icon">
                                                       <span className="btn-inner--icon icon-big">
                                                           <i className="ni ni-fat-remove" />
                                                       </span>
                                                                    <span className="btn-inner--text">Suprimer</span>
                                                                </Button>{" "}
                                                            </>

                                                            :null}

                                                    </>

                                                    :null}

                                            </div>
                                        </div>
                                        <div className="card-body">
                                            <p className="mb-4">
                                                <b dangerouslySetInnerHTML={{__html: (annonce.body)}}/>
                                            </p>
                                            {annonce.photo ?
                                                <img alt="Image placeholder" src={annonce.photo}
                                                     className="img-fluid rounded" />
                                                : null}
                                            <div className="row align-items-center my-3 pb-3 border-bottom">
                                                <div className="col-sm-6">
                                                    <div className="icon-actions">
                                                        <a href=".." className="like active">
                                                            <i className="ni ni-like-2" />
                                                            <span className="text-muted">150</span>
                                                        </a>
                                                        <a href="..">
                                                            <i className="ni ni-chat-round" />
                                                            <span className="text-muted">36</span>
                                                        </a>
                                                        <a href="..">
                                                            <i className="ni ni-curved-next" />
                                                            <span className="text-muted">12</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div className="col-sm-6 d-none d-sm-block">
                                                    <div
                                                        className="d-flex align-items-center justify-content-sm-end">
                                                        <div className="avatar-group">
                                                            <a href=".."
                                                               className="avatar avatar-xs rounded-circle"
                                                               data-toggle="tooltip"
                                                               data-original-title="Jessica Rowland">
                                                                <img alt="Image placeholder"
                                                                     src="../assets/img/faces/team-1.jpg"
                                                                     className="" />
                                                            </a>
                                                            <a href=".."
                                                               className="avatar avatar-xs rounded-circle"
                                                               data-toggle="tooltip"
                                                               data-original-title="Audrey Love">
                                                                <img alt="Image placeholder"
                                                                     src="../assets/img/faces/team-2.jpg"
                                                                     className="rounded-circle" />
                                                            </a>
                                                            <a href=".."
                                                               className="avatar avatar-xs rounded-circle"
                                                               data-toggle="tooltip"
                                                               data-original-title="Michael Lewis">
                                                                <img alt="Image placeholder"
                                                                     src="../assets/img/faces/team-3.jpg"
                                                                     className="rounded-circle" />
                                                            </a>
                                                        </div>
                                                        <small className="pl-2 font-weight-bold">and 30+
                                                            more</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="mb-1">
                                                <div className="media media-comment">
                                                    <img alt="Image placeholder"
                                                         className="media-comment-avatar rounded-circle"
                                                         src="../assets/img/faces/team-1.jpg" />
                                                    <div className="media-body">
                                                        <div className="media-comment-text">
                                                            <h6 className="h5 mt-0">Michael Lewis</h6>
                                                            <p className="text-sm lh-160">You have the
                                                                opportunity to play this game of life you
                                                                need to appreciate every moment. A lot of
                                                                people don’t appreciate the moment until it’s
                                                                passed.</p>
                                                            <div className="icon-actions">
                                                                <a href=".."
                                                                   className="like active">
                                                                    <i className="ni ni-like-2" />
                                                                    <span
                                                                        className="text-muted">3 likes</span>
                                                                </a>
                                                                <a href="..">
                                                                    <i className="ni ni-curved-next" />
                                                                    <span
                                                                        className="text-muted">2 shares</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="media media-comment">
                                                    <img alt="Image placeholder"
                                                         className="media-comment-avatar rounded-circle"
                                                         src="../assets/img/faces/team-2.jpg" />
                                                    <div className="media-body">
                                                        <div className="media-comment-text">
                                                            <h6 className="h5 mt-0">Jessica Stones</h6>
                                                            <p className="text-sm lh-160">I always felt like
                                                                I could do anything. That’s the main thing
                                                                people are controlled by! Thoughts- their
                                                                perception of themselves! They're slowed
                                                                down.</p>
                                                            <div className="icon-actions">
                                                                <a href=".."
                                                                   className="like active">
                                                                    <i className="ni ni-like-2" />
                                                                    <span
                                                                        className="text-muted">10 likes</span>
                                                                </a>
                                                                <a href="..">
                                                                    <i className="ni ni-curved-next" />
                                                                    <span
                                                                        className="text-muted">1 share</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="media align-items-center mt-5">
                                                    <img alt="Image placeholder"
                                                         className="avatar avatar-lg rounded-circle mb-4"
                                                         src="../assets/img/faces/team-3.jpg" />
                                                    <div className="media-body">
                                                        <form>
                                                                <textarea className="form-control"
                                                                          placeholder="Write your comment"
                                                                          rows="1" />
                                                        </form>
                                                    </div>
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
        )
    }

}
export default AnnonceSiteShow;
