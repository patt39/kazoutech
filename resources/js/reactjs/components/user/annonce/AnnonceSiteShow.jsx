import React, {Component} from "react";
import {Link, NavLink} from "react-router-dom";
import {Button} from "reactstrap";
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";
import moment from 'moment'
import AnnoncePostInteresse from "./AnnoncePostInteresse";
import AnnonceList from "./AnnonceList";

require("moment/min/locales.min");
moment.locale('fr');

require("moment/min/locales.min");
moment.locale('fr');

class AnnonceSiteShow extends Component {
    constructor(props) {
        super(props);
        this.state = {
            annonceinteresse:{annonces:[]},
            annonce: {user: [], occupation: [],}
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

    componentDidMount() {
        let SlugItem = this.props.match.params.annonce;
        let SlugOccupation = this.props.match.params.occupation;
        let SlugCategoryoccupation = this.props.match.params.catagoryoccupation;
        let SlugCity = this.props.match.params.city;
        /**
         * Ici je recupere l'annonce pour l'afficer
         */
        let url = route('api_annonce_site.view', [SlugOccupation, SlugCategoryoccupation, SlugCity, SlugItem]);
        dyaxios.get(url).then(response => this.setState({annonce: response.data,}));
        /**
         * Ici je recupere touts les annonce par sous category pour proposer
         */
        let urlinteress = route('api_annonce_occupation_categoryoccupation_site.view', [SlugOccupation, SlugCategoryoccupation]);
        dyaxios.get(urlinteress).then(response => this.setState({annonceinteresse: response.data,}));
    }

    render() {
        const {annonce,annonceinteresse} = this.state;
        const composantTitle = `${annonce.title}`;
        document.title = `${composantTitle} | Kazoutech`;
        const annonceinderesses = annonceinteresse.annonces;
        console.log(annonceinteresse);
        return (

            <div className="blog-posts">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image"
                             style={{backgroundImage: "url(" + annonce.occupation.photo + ")"}}/>
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
                    <div className="main main-raised">
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
                                                                 alt="Rounded image" className="img-fluid"/>
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
                                                                 alt="Rounded image" className="img-fluid"/>
                                                        </div>
                                                        <div className="media-body">
                                                            <h2 className="h6 mb-0">Jacket</h2>
                                                        </div>
                                                        <div className="media-body text-right">
                                                            <span>$999</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div className="card">
                                                <div className="card-body">

                                                    {annonceinderesses > 0 && (
                                                        <>
                                                            {annonceinderesses.map((item) => (
                                                                <AnnoncePostInteresse key={item.id} {...item}/>
                                                            ))}
                                                        </>

                                                    )}

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
                                                <NavLink to={`/charbonneur/${annonce.user.username}/`}>
                                                    <img src={annonce.user.avatar} alt={annonce.user.name}
                                                         className="avatar"/>
                                                </NavLink>
                                                <div className="mx-3">
                                                    <NavLink to={`/charbonneur/${annonce.user.username}/`}
                                                             className="text-dark font-weight-600 text-sm">{annonce.user.name}</NavLink>
                                                    <small
                                                        className="d-block text-muted">{moment(annonce.created_at).startOf('hour').fromNow()}</small>
                                                </div>
                                            </div>
                                            <div className="text-right ml-auto">
                                                <button type="button" className="btn btn-sm btn-primary btn-icon">
                                                        <span className="btn-inner--icon icon-big">
                                                            <i className="ni ni-fat-add"/>
                                                        </span>
                                                    <span className="btn-inner--text">Follow</span>
                                                </button>

                                                {!$guest && (
                                                    <>
                                                        {$userKazou.id === annonce.user_id && (
                                                            <>
                                                                <NavLink
                                                                    to={`/annonces/${annonce.occupation.slug}/p/annonce/${annonce.id}/edit`}
                                                                    className="btn btn-sm btn-success btn-icon">
                                                                    <span className="btn-inner--icon icon-big">
                                                                        <i className="ni ni-check-bold"/>
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
                                                        )}

                                                    </>
                                                )}

                                            </div>
                                        </div>
                                        <div className="card-body">
                                            <p className="mb-4">
                                                <b dangerouslySetInnerHTML={{__html: (annonce.body)}}/>
                                            </p>
                                            {annonce.photo !== null ?
                                                <img alt={annonce.photo} src={annonce.photo}
                                                     className="img-fluid rounded"/>
                                                : null}
                                            <div className="row align-items-center my-3 pb-3 border-bottom">
                                                <div className="col-sm-6">
                                                    <div className="icon-actions">
                                                        <a href=".." className="like active">
                                                            <i className="ni ni-like-2"/>
                                                            <span className="text-muted">150</span>
                                                        </a>
                                                        <a href="..">
                                                            <i className="ni ni-chat-round"/>
                                                            <span className="text-muted">36</span>
                                                        </a>
                                                        <a href="..">
                                                            <i className="ni ni-curved-next"/>
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
                                                                     className=""/>
                                                            </a>
                                                            <a href=".."
                                                               className="avatar avatar-xs rounded-circle"
                                                               data-toggle="tooltip"
                                                               data-original-title="Audrey Love">
                                                                <img alt="Image placeholder"
                                                                     src="../assets/img/faces/team-2.jpg"
                                                                     className="rounded-circle"/>
                                                            </a>
                                                            <a href=".."
                                                               className="avatar avatar-xs rounded-circle"
                                                               data-toggle="tooltip"
                                                               data-original-title="Michael Lewis">
                                                                <img alt="Image placeholder"
                                                                     src="../assets/img/faces/team-3.jpg"
                                                                     className="rounded-circle"/>
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
                                                         src="../assets/img/faces/team-1.jpg"/>
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
                                                                    <i className="ni ni-like-2"/>
                                                                    <span
                                                                        className="text-muted">3 likes</span>
                                                                </a>
                                                                <a href="..">
                                                                    <i className="ni ni-curved-next"/>
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
                                                         src="../assets/img/faces/team-2.jpg"/>
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
                                                                    <i className="ni ni-like-2"/>
                                                                    <span
                                                                        className="text-muted">10 likes</span>
                                                                </a>
                                                                <a href="..">
                                                                    <i className="ni ni-curved-next"/>
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
                                                         src="../assets/img/faces/team-3.jpg"/>
                                                    <div className="media-body">
                                                        <form>
                                                                <textarea className="form-control"
                                                                          placeholder="Write your comment"
                                                                          rows="1"/>
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
                    <FooterUserSite/>
                </div>
            </div>
        )
    }

}

export default AnnonceSiteShow;
