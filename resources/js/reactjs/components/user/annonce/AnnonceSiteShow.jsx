import React, {Component} from "react";
import {Link, NavLink} from "react-router-dom";
import {Button} from "reactstrap";
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";
import moment from 'moment'
import AnnoncePostInteresse from "./AnnoncePostInteresse";
import CommentCreate from "../comment/CommentCreate";
import ReactQuill from "react-quill";

require("moment/min/locales.min");
moment.locale('fr');

require("moment/min/locales.min");
moment.locale('fr');

class AnnonceSiteShow extends Component {
    constructor(props) {
        super(props);


        this.deleteItem = this.deleteItem.bind(this);
        this.loginItem = this.loginItem.bind(this);
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);

        this.state = {
            username: '',
            email: '',
            password: '',
            remember: true,
            errors: [],

            annonceinteressebycategoryoccupation:{annoncesinteres:[]},
            annonce: {user: [], occupation: [],}
        };
        this.modules = {
            toolbar: [
                ['bold', 'italic'],
                [{ 'color': [] }],
            ]
        };
        this.formats = [
            'bold', 'italic',
            'color'
        ];
    }
    // Handle Change
    handleChangeBody(value) {
        this.setState({ body: value });
        document.querySelector('.editor-control').classList.remove('is-invalid');
    }

    handleFieldChange(event) {
        this.setState({
            [event.target.name]: event.target.value,
        });
        this.state.errors[event.target.name] = '';
    }
    // Handle Errors
    hasErrorFor(field) {
        return !!this.state.errors[field];
    }
    renderErrorFor(field) {
        if (this.hasErrorFor(field)) {
            return (
                <span className='invalid-feedback'>
                    <strong>{this.state.errors[field][0]}</strong>
                </span>
            )
        }
    }
    loadItems(){
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
         * Ici je recupere touts les annonces par categoryoccupation pour proposer
         */
        let urlinteress = route('api_annonce_occupation_categoryoccupation_site.view', [SlugOccupation, SlugCategoryoccupation]);
        dyaxios.get(urlinteress).then(response => this.setState({annonceinteressebycategoryoccupation: response.data,}));
    }
    componentDidMount() {
        this.loadItems();
    }

    /** Ici nous les utilisateurs active leurs posts **/
    likeItem(annonce) {
        //let SlugOccupation = this.props.match.params.occupation;
        //Start Progress bar
        dyaxios.get(route('annonces_site.like', [annonce.occupation.slug,annonce.id]))
            .then(() => {
                this.loadItems();

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
        });
    }
    loginItem(e) {
        e.preventDefault();

        let item = {
            username: this.state.username,
            password: this.state.password,
            remember: this.state.remember,
        };
        dyaxios.post(route('login'), item)
            .then(() => {
                //Masquer le modal après la connexion
                $('#loginModal').modal('hide');
                window.location.reload();
            }).catch(error => {
            this.setState({
                errors: error.response.data.errors
            });
            $.notify("Ooop! Quelque chose ne va pas. Essayer plus tard...", {
                allow_dismiss: false,
                type: 'danger',
                animate: {
                    enter: 'animated bounceInDown',
                    exit: 'animated bounceOutUp'
                }
            });
        })
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



    render() {
        const {annonce,annonceinteressebycategoryoccupation} = this.state;
        const composantTitle = `${annonce.title}`;
        document.title = `${composantTitle} | Kazoutech`;
        const annonceinderesses = annonceinteressebycategoryoccupation.annoncesinteres;
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

                                            {annonceinderesses.length > 0 ?
                                            <div className="card">
                                                <div className="card-header h6">Regarder aussi</div>
                                                <div className="card-body">
                                                    {annonceinderesses.map((item) => (
                                                        <AnnoncePostInteresse key={item.id} {...item}/>
                                                    ))}
                                                </div>
                                            </div>:null}
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
                                                    <small className="d-block text-muted">{moment(annonce.created_at).startOf('hour').fromNow()}</small>
                                                </div>
                                            </div>
                                            <div className="text-right ml-auto">
                                                <span className="badge badge-primary">{annonce.visits} vues</span>

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
                                                                            <i className="ni ni-fat-remove"/>
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
                                                        {$guest ?
                                                            <a href="#"  className="like" data-toggle="modal" data-target="#loginModal">
                                                                <i className="ni ni-like-2"/>
                                                                <span className="text-muted">{annonce.likers} j'aime</span>
                                                            </a>
                                                            :
                                                            <a style={{cursor: "pointer"}}  onClick={() => this.likeItem(annonce)} className={`like ${annonce.likers === 1 ? "active" : ""}`}>
                                                                <i className="ni ni-like-2"/>
                                                                <span className="text-muted">{annonce.likers} j'aime</span>
                                                            </a>
                                                        }
                                                        <a href="..">
                                                            <i className="ni ni-chat-round"/>
                                                            <span className="text-muted">36 commentaires</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="mb-1">
                                                <div className="media media-comment">
                                                    <img alt={'/assets/vendor_site/img/pages/nathan-dumlao.jpg'}
                                                         className="media-comment-avatar rounded-circle"
                                                         src={'/assets/vendor_site/img/pages/nathan-dumlao.jpg'}/>
                                                    <div className="media-body">
                                                        <div className="media-comment-text">
                                                            <h6 className="h6 mt-0">
                                                                Boclair Temgoua
                                                                <small className="d-block text-muted">{moment(annonce.created_at).fromNow()}</small>
                                                            </h6>
                                                            <p className="text-sm lh-160">You have the
                                                                opportunity to play this game of life you
                                                                need to appreciate every moment. A lot of
                                                                people don’t appreciate the moment until it’s
                                                                passed.</p>
                                                            <div className="icon-actions">

                                                                <a href=".."
                                                                   className="like">
                                                                    <i className="ni ni-like-2"/>
                                                                    <span
                                                                        className="text-muted">3 j'aime</span>
                                                                </a>
                                                                <a href=".." className="text-success" title="Editer votre commentaire">
                                                                    <i className="fa fa-edit"/> editer
                                                                </a>
                                                                <a href=".." className="text-danger" title="Suprimer votre commentaire">
                                                                    <i className="fa fa-trash"/> suprimer
                                                                </a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="media media-comment">
                                                    <img alt={'/assets/vendor_site/img/pages/nathan-dumlao.jpg'}
                                                         className="media-comment-avatar rounded-circle"
                                                         src={'/assets/vendor_site/img/pages/nathan-dumlao.jpg'}/>
                                                    <div className="media-body">
                                                        <div className="media-comment-text">
                                                            <h6 className="h6 mt-0">
                                                                Jessica Stones
                                                                <small className="d-block text-muted">{moment(annonce.created_at).fromNow()}</small>
                                                            </h6>
                                                            <p className="text-sm lh-160">I always felt like
                                                                I could do anything. That’s the main thing
                                                                people are controlled by! Thoughts- their
                                                                perception of themselves! They're slowed
                                                                down.</p>
                                                            <form>
                                                                <textarea className="form-control"
                                                                   placeholder="laissez un commentaire à cette annonce..."
                                                                   defaultValue={'I could do anything. That’s the main thing perception of themselves! They\'re slowed people are controlled by! Thoughts- their'}
                                                                   rows="2"/>
                                                                <div className="text-right ml-auto">
                                                                    <button className="btn btn-sm btn-secondary btn-icon" type="button">
                                                                        <span className="btn-inner--text">Annuller</span>
                                                                    </button>
                                                                    <button className="btn btn-sm btn-success btn-icon" type="submit">
                                                                        <span className="btn-inner--text">Poster</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                            <div className="icon-actions">
                                                                <a href=".."
                                                                   className="like active">
                                                                    <i className="ni ni-like-2"/>
                                                                    <span
                                                                        className="text-muted">10 j'aime</span>
                                                                </a>
                                                                <a href=".." className="text-success" title="Editer votre commentaire">
                                                                    <i className="fa fa-edit"/> editer
                                                                </a>
                                                                <a href=".." className="text-danger" title="Suprimer votre commentaire">
                                                                    <i className="fa fa-trash"/> suprimer
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="media align-items-center mt-5">

                                                    {$guest ?
                                                        <h6 className="text-center">
                                                            <strong className="title text-center">S'il vous plait
                                                                <a href="#" className="text-info" data-toggle="modal" data-target="#loginModal"> connectez vous </a> ou
                                                                <a href="/register/" className="text-info"> inscrivez vous </a> pour laisser votre commentaire
                                                            </strong>
                                                        </h6>
                                                        :
                                                        <div className="media-body">
                                                            <form>
                                                                <ReactQuill theme="snow" modules={this.modules}
                                                                            formats={this.formats}
                                                                            placeholder={'laissez un commentaire à cette annonce...'}
                                                                            className={`editor-control ${this.hasErrorFor('body') ? 'is-invalid' : ''}`}
                                                                            value={this.state.body || ''}
                                                                            onChange={this.handleChangeBody}/>

                                                                <br/>
                                                                <div className="text-right ml-auto">
                                                                    <button className="btn btn-sm btn-success btn-icon" type="submit">
                                                                        <span className="btn-inner--text">Poster</span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    }
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div className="modal fade" id="loginModal" tabIndex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div className="modal-content">
                            <div className="modal-body p-0">
                                <div className="card bg-secondary shadow border-0 mb-0">
                                    <div className="card-header bg-white pb-5">
                                        <div className="text-muted text-center mb-3">
                                            <small>Se connecter avec</small>
                                        </div>
                                        <div className="btn-wrapper text-center">
                                            <a href=".." className="btn btn-neutral btn-icon">
                                            <span className="btn-inner--icon">
                                              <img src="/assets/site/assets/img/icons/common/github.svg"/>
                                            </span>
                                                <span className="btn-inner--text">Google</span>
                                            </a>
                                            <a href=".." className="btn btn-neutral btn-icon">
                                                <span className="btn-inner--icon">
                                                <img src="/assets/site/assets/img/icons/common/google.svg"/>
                                                </span>
                                                <span className="btn-inner--text">Github</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div className="card-body px-lg-5 py-lg-5">
                                        <div className="text-center text-muted mb-4">
                                            <small>Ou connectez-vous avec vos identifiants</small>

                                            {this.state.errors.length > 0 && (
                                                <div className="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <span className="alert-inner--text"><strong>Danger!</strong> This is an error alert—check it out!</span>
                                                    <button type="button" className="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                            )}
                                        </div>
                                        <form method="POST" onSubmit={this.loginItem}>

                                            <div className="form-group mb-3">
                                                <div className="input-group input-group-alternative">
                                                    <div className="input-group-prepend">
                                                        <span className="input-group-text">
                                                            <i className="ni ni-email-83"/>
                                                        </span>
                                                    </div>

                                                    <input type="text" placeholder="Pseudo ou votre numero de téléphone" aria-label="Pseudo ou votre numero de téléphone"
                                                           required="required"
                                                           id="username"
                                                           className={`form-control ${this.hasErrorFor('username') ? 'is-invalid' : ''}`}
                                                           name='username'
                                                           value={this.state.username}
                                                           onChange={this.handleFieldChange} autoComplete="username" autoFocus />
                                                    {this.renderErrorFor('username')}
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <div className="input-group input-group-alternative">
                                                    <div className="input-group-prepend">
                                                        <span className="input-group-text">
                                                            <i className="ni ni-lock-circle-open"/>
                                                        </span>
                                                    </div>

                                                    <input type="password" placeholder="Mot de pass" aria-label="Mot de passe"
                                                           required="required"
                                                           id="password"
                                                           className={`form-control ${this.hasErrorFor('password') ? 'is-invalid' : ''}`}
                                                           name='password'
                                                           value={this.state.password}
                                                           onChange={this.handleFieldChange}
                                                           autoComplete="password" autoFocus/>
                                                    {this.renderErrorFor('password')}
                                                </div>
                                            </div>
                                            <div className="custom-control custom-control-alternative custom-checkbox">
                                                <input className="custom-control-input" id="remember" type="checkbox"
                                                       defaultChecked={this.state.remember} value={this.state.remember} name="remember" onChange={this.handleFieldChange}/>
                                                <label className="custom-control-label" htmlFor="remember">
                                                    <span>Se souvenir de moi</span>
                                                </label>
                                            </div>
                                            <div className="text-center">
                                                <button type="submit" className="btn btn-primary my-4">Se connecter</button>
                                            </div>
                                            <div className="row mt-3">
                                                <div className="col-6">
                                                    <a className="text-light" href="..">
                                                        <small>Mot de passe oublié</small>
                                                    </a>
                                                </div>
                                                <div className="col-6 text-right">
                                                    <a href="/register/" className="text-light">
                                                        <small>Inscrivez vous</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <FooterUserSite/>
            </div>
        )
    }

}

export default AnnonceSiteShow;
