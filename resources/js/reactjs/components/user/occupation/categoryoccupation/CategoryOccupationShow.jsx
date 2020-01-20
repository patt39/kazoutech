import React, {Component} from "react";
import NavUserSIte from "../../../inc/NavUserSIte";
import {Link, NavLink} from 'react-router-dom';
import FooterUserSite from "../../../inc/FooterUserSite";
import CategoryOcupationHeader from "./CategoryOcupationHeader";
import CategoryOcupationInteressList from "./CategoryOcupationInteressList";


class CategoryOccupationShow extends Component {
    constructor(props) {
        super(props);

        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.logincategoryoccupationItem = this.logincategoryoccupationItem.bind(this);
        this.state = {
            username: '',
            email: '',
            password: '',
            remember: true,
            errors: [],
            categoryoccupation: {user: [], occupation: [], annoncesinteres: []}
        }
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

    logincategoryoccupationItem(e) {
        let itemoccupation = this.props.match.params.occupation;
        let itemcategoryoccupation = this.props.match.params.categoryoccupation;
        e.preventDefault();

        let item = {
            username: this.state.username,
            password: this.state.password,
            remember: this.state.remember,
        };
        dyaxios.post(route('login'), item)
            .then(() => {
                //Masquer le modal après la connexion
                $('#loginbycategoryoccupationModal').modal('hide');
                window.location.replace(`/occupations/${itemoccupation}/${itemcategoryoccupation}/new/create`);
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

    componentDidMount() {
        let itemoccupation = this.props.match.params.occupation;
        let itemcategoryoccupation = this.props.match.params.categoryoccupation;
        let url = route('categoryoccupations.view', [itemoccupation, itemcategoryoccupation]);
        dyaxios.get(url).then(response => this.setState({categoryoccupation: response.data,}));
    }

    render() {
        const {categoryoccupation} = this.state;
        const composantTitle = `${categoryoccupation.name}`;
        const annoncebycategoryoccupations = categoryoccupation.annoncesinteres;
        let itemoccupation = this.props.match.params.occupation;
        document.title = `${composantTitle} | Kazoutech`;
        return (

            <>
                <div className="landing-page">
                    <NavUserSIte/>

                    <div className="wrapper">
                        <CategoryOcupationHeader {...categoryoccupation} />
                        <div className="container">

                            <div className={'row'}>

                                <div className="container">
                                    <div className="row mb-5">
                                        <div className="col-lg-12 mr-auto mb-2">
                                            <br/>
                                            <h4 className="display-3">Pour tout vos
                                                bésoin <b>{categoryoccupation.name}</b></h4>
                                            <div className="description mb-2"
                                                 dangerouslySetInnerHTML={{__html: categoryoccupation.description}}/>
                                            <br/>
                                            {$guest ?
                                                <a href="#" data-toggle="modal" data-target="#loginbycategoryoccupationModal"
                                                    className="btn btn-success btn-lg">
                                                    Demander un services en {categoryoccupation.name}
                                                </a>
                                                :
                                                <Link
                                                    to={`/occupations/${itemoccupation}/${categoryoccupation.slug}/new/create/`}
                                                    className="btn btn-success btn-lg">
                                                    Demander un services en {categoryoccupation.name}
                                                </Link>
                                            }
                                            <br/>
                                            <h4 className="display-4">Dérnier annonces
                                                en <b>{categoryoccupation.name}</b></h4>

                                            <div className="row">

                                                {annoncebycategoryoccupations.map((item) => (
                                                    <CategoryOcupationInteressList key={item.id} {...item} />
                                                ))}
                                            </div>
                                            <Link to={`/annonces/${itemoccupation}/${categoryoccupation.slug}/`}
                                                  className="font-size-3 font-weight-medium d-block">
                                                Voir toutes les annonces en {categoryoccupation.name}
                                                <i className="fas fa-chevron-right pl-1 font-size-1"/>
                                            </Link>
                                        </div>
                                        <br/>
                                        <div className="description mb-2"
                                             dangerouslySetInnerHTML={{__html: categoryoccupation.body}}/>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div className="modal fade" id="loginbycategoryoccupationModal" tabIndex="-1" role="dialog" aria-labelledby="loginbycategoryoccupationModal" aria-hidden="true">
                            <div className="modal-dialog modal-dialog-centered modal-sm" role="document">
                                <div className="modal-content">
                                    <div className="modal-body p-0">
                                        <div className="card bg-secondary shadow border-0 mb-0">
                                            <div className="card-header bg-white pb-5">
                                                <div className="text-muted text-center mb-3">
                                                    <small>Se connecter.</small>
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
                                                    <small>Ou connectez-vous avec vos identifiants.</small>

                                                </div>
                                                <form onSubmit={this.logincategoryoccupationItem} method={'post'}>

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
                                                            <a className="text-light" href="/password/reset/">
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
                </div>

            </>
        )
    }

}

export default CategoryOccupationShow;
