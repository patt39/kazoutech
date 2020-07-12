import React, { Component } from "react";
import { Helmet } from 'react-helmet';
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import BlogList from "./BlogList";
import { Link, NavLink } from "react-router-dom";
import BlogLastPost from "./BlogLastPost";
import BlogOccupationList from "./BlogOccupationList";


class BlogSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.deleteItem = this.deleteItem.bind(this);
        this.loginblogItem = this.loginblogItem.bind(this);
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.state = {
            username: '',
            email: '',
            password: '',
            remember: true,
            blogs: [],
            blogsLast: [],
            errors: [],
        };
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

    loginblogItem(e) {
        e.preventDefault();

        let item = {
            username: this.state.username,
            password: this.state.password,
            remember: this.state.remember,
        };
        dyaxios.post(route('login'), item)
            .then(() => {
                //Masquer le modal après la connexion
                $('#loginblogItem').modal('hide');
                window.location.replace(`/blog/p/new/create/`);
            }).catch(error => {
            this.setState({
                errors: error.response.data.errors
            });
            $.notify("Ooopss! Quelque chose ne va pas. Essayer plus tard...", {
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
            title: 'Etes vous sure de vouloir supprimer cette article de blog?',
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

                const url = route('blogs.destroy', id);
                //Envoyer la requet au server
                dyaxios.delete(url).then(() => {

                    let isNotId = item => item.id !== id;
                    let updatedItems = this.state.blogs.filter(isNotId);
                    this.setState({ blogs: updatedItems });
                    /** Alert notify bootstrapp **/
                    $.notify({
                        // title: 'Update FAQ',
                        message: 'Article de blog supprimé avec succès'
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
        dyaxios.get(route('api_active.blogs')).then(response => this.setState({ blogs: [...response.data], }));
        dyaxios.get(route('api_active_last.blogs')).then(response => this.setState({ blogsLast: [...response.data], }))
    }

    render() {
        const { blogs, blogsLast } = this.state;
        return (
            <>
            <Helmet title={`Conseils et astuces techniques au Cameroun  | Kazoutech`}/>

             <div className="blog-post">
                <NavUserSIte />
                <div className="wrapper">
                    <div className="page-header kazouTech-page-header-mini header-filter">
                        <div className="page-header-image"
                            style={{ backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")" }} />
                        <div className="content-center">
                            <div className="row">
                                <div className="col-md-6 mx-auto text-center">
                                    <h5 className="display-2 text-white">Bienvenue dans la comunauté</h5>
                                    <Link to={`/blog/`} className="btn btn-warning btn-round btn-icon-only">
                                        <i className="fab fa-twitter" />
                                    </Link>
                                    <NavLink to={`/blog/`} className="btn btn-warning btn-round btn-icon-only">
                                        <i className="fab fa-instagram" />
                                    </NavLink>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div className="main main-raised">

                        <div className="container">
                            <div className="row">
                                {blogsLast.map((item) => (
                                    <BlogLastPost key={item.id} {...item} />
                                ))}
                            </div>
                        </div>

                        <section className="section">
                            <div className="container">

                                <BlogOccupationList />

                                <div className="row">
                                    <div className="col-md-12 ml-auto mr-auto">
                                        <section className="blogs-3">
                                            <div className="container">
                                                <div className="row">
                                                    <div className="col-lg-10 col-md-8 mx-auto">
                                                        <h2 className="title mb-5"><b>Histoires connexes</b></h2>

                                                        {$guest ?
                                                        <a href="#"  className="btn btn-primary" data-toggle="modal" data-target="#loginblogModal">
                                                            Ajouter un nouveau article de blog
                                                        </a>
                                                            :
                                                        <Link to={`/blog/p/new/create/`} className="btn btn-primary">
                                                            Ajouter un nouveau article de blog
                                                        </Link>
                                                        }
                                                        <br/><br/>
                                                        <div className="card">
                                                            <div className="card-body">
                                                                {blogs.map((item) => (
                                                                    <BlogList key={item.id} {...item} deleteItem={this.deleteItem} />
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

                    <div className="modal fade" id="loginblogModal" tabIndex="-1" role="dialog" aria-labelledby="loginblogModal" aria-hidden="true">
                        <div className="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div className="modal-content">
                                <div className="modal-body p-0">
                                    <div className="card bg-secondary shadow border-0 mb-0">
                                        <div className="card-header bg-white pb-5">
                                            <div className="text-muted text-center mb-3">
                                                <small>Se connecter</small>
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

                                            </div>
                                            <form onSubmit={this.loginblogItem}>

                                                <div className="form-group mb-3">
                                                    <div className="input-group input-group-alternative">
                                                        <div className="input-group-prepend">
                                                        <span className="input-group-text">
                                                            <i className="ni ni-email-83"/>
                                                        </span>
                                                        </div>

                                                        <input type="text" placeholder="Pseudo ou votre numéro de téléphone" aria-label="Pseudo ou votre numero de téléphone"
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

                                                        <input type="password" placeholder="Mot de passe" aria-label="Mot de passe"
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
                    <FooterUserSite />
                </div>
            </div>
            </>
           
        )
    }

}

export default BlogSiteIndex;
