import React,{Component} from "react";



class RegisterUserSite extends Component{
    constructor(props) {
        super(props);

        this.registerItem = this.registerItem.bind(this);
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.state = {
            username: '',
            name: '',
            email: '',
            phone: '',
            password: '',
            password_confirmation: '',
            notifier_newletter: true,
            isChecked: true,
            errors: [],
        }

    }

    toggleChange(){
        this.setState({
            isChecked: !this.state.isChecked,
        });
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

    registerItem(e) {
        e.preventDefault();

        let item = {
            username: this.state.username,
            name: this.state.name,
            phone: this.state.phone,
            email: this.state.email,
            sex: this.state.sex,
            notifier_newletter: this.state.notifier_newletter,
            password: this.state.password,
            password_confirmation: this.state.password_confirmation,
        };
        dyaxios.post(route('register'), item)
            .then(() => {
                //Masquer le modal après la connexion
                $('#registerModal').modal('hide');
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

    render() {
        const {isChecked} = this.state;
        return(
            <>
                <section className="upper mt-6 mb-6">
                    <div className="container">
                        <div className="row align-items-center">
                            <div className="col-lg-4">
                                <div className="card card-blog card-background" data-animation="zooming">
                                    <div className="full-background"
                                         style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/photo-15.jpg' + ")"}}/>
                                    <a href="#" data-toggle="modal" data-target="#registerModal">
                                        <div className="card-body">
                                            <div className="content-bottom">
                                                <h5 className="card-title">J'ai besoin d'un service</h5>
                                                <h6 className="card-category text-white opacity-8">Trouvez le prestataire
                                                    idéal pour vos services du quotidien</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div className="col-lg-4 text-center">
                                <h2 className="display-2">Ou</h2>
                            </div>
                            <div className="col-lg-4">
                                <div className="card card-blog card-background" data-animation="zooming">
                                    <div className="full-background"
                                         style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/photo-15.jpg' + ")"}}/>
                                    <a href="/devenir_charbonneur/">
                                        <div className="card-body">
                                            <div className="content-bottom">
                                                <h5 className="card-title">Devenir Charbonneur</h5>
                                                <h6 className="card-category text-white opacity-8">Augmentez vos revenus en
                                                    rendant service près de chez vous</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div className="row align-items-center">
                            <div className="mr-auto ml-auto mt-5 mb-5">
                                <h4 className="header-6">Vous avez déjà un compte ? <a
                                    href="https://www.kazoutech.com/login">Connectez-vous</a></h4>
                            </div>
                        </div>
                    </div>
                </section>

                <div className="modal fade" id="registerModal" tabIndex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
                    <div className="modal-dialog modal-dialog-centered modal-" role="document">
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
                                        </div>
                                        <form method="POST" onSubmit={this.registerItem}>

                                            <div className="row">
                                                <div className="col-md-7">
                                                    <div className="form-group">
                                                        <label>Nom et Prènom .</label>
                                                        <div className="input-group mb-4">
                                                            <div className="input-group-prepend">
                                                                <span className="input-group-text">
                                                                    <i className="ni ni-circle-08"/>
                                                                </span>
                                                            </div>
                                                            <input type="text"
                                                                   placeholder="Votre Nom et Prènom ..." aria-label="Votre Nom et  Prènom ..."
                                                                   required="required"
                                                                   id="name"
                                                                   className={`form-control ${this.hasErrorFor('name') ? 'is-invalid' : ''}`}
                                                                   name='name'
                                                                   value={this.state.name}
                                                                   onChange={this.handleFieldChange} autoComplete="name"/>
                                                            {this.renderErrorFor('name')}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-5 pl-2">
                                                    <div className="form-group">
                                                        <label>Votre Pseudo</label>
                                                        <div className="input-group">
                                                            <div className="input-group-prepend">
                                                                <span className="input-group-text">
                                                                    <i className="ni ni-collection"/>
                                                                </span>
                                                            </div>

                                                            <input type="text"
                                                                   placeholder="Votre Pseudo ..." aria-label="Votre Pseudo ..."
                                                                   required="required"
                                                                   id="username"
                                                                   className={`form-control ${this.hasErrorFor('username') ? 'is-invalid' : ''}`}
                                                                   name='username'
                                                                   value={this.state.username}
                                                                   onChange={this.handleFieldChange} autoComplete="username"/>
                                                            {this.renderErrorFor('username')}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label>Addresse E-mail .</label>
                                                <div className="input-group">
                                                    <div className="input-group-prepend">
                                                                <span className="input-group-text">
                                                                    <i className="ni ni-email-83"/>
                                                                </span>
                                                    </div>
                                                    <input type="email" placeholder="Votre E-mail ..." aria-label="Votre E-mail ..."
                                                           required="required"
                                                           id="email"
                                                           className={`form-control ${this.hasErrorFor('email') ? 'is-invalid' : ''}`}
                                                           name='email'
                                                           value={this.state.email}
                                                           onChange={this.handleFieldChange}/>
                                                    {this.renderErrorFor('email')}
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label>Votre Numéro de Télephone</label>
                                                <div className="input-group">
                                                    <div className="input-group-prepend">
                                                                <span className="input-group-text">
                                                                    <i className="ni ni-mobile-button"/>
                                                                </span>
                                                    </div>
                                                    <input type="text" placeholder="Votre Numéro de Télephone ..." aria-label="Votre Numéro de Télephone ..."
                                                           required="required"
                                                           id="phone"
                                                           className={`form-control ${this.hasErrorFor('phone') ? 'is-invalid' : ''}`}
                                                           name='phone'
                                                           value={this.state.phone}
                                                           onChange={this.handleFieldChange} autoComplete="phone" />
                                                    {this.renderErrorFor('phone')}
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-md-6">
                                                    <div className="form-group">
                                                        <label>Mot de Passe .</label>
                                                        <div className="input-group mb-4">
                                                            <div className="input-group-prepend">
                                                                <span className="input-group-text">
                                                                    <i className="ni ni-lock-circle-open"/>
                                                                </span>
                                                            </div>
                                                            <input type="password" placeholder="Votre Mot de Passe ..." aria-label="Votre Mot de Passe ..."
                                                                   required="required"
                                                                   id="password"
                                                                   className={`form-control ${this.hasErrorFor('password') ? 'is-invalid' : ''}`}
                                                                   name='password'
                                                                   value={this.state.password}
                                                                   onChange={this.handleFieldChange}
                                                                   autoComplete="password"/>
                                                            {this.renderErrorFor('password')}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6 pl-2">
                                                    <div className="form-group">
                                                        <label>Confirmation Mot de Passe</label>
                                                        <div className="input-group">
                                                            <div className="input-group-prepend">
                                                                <span className="input-group-text">
                                                                    <i className="ni ni-lock-circle-open"/>
                                                                </span>
                                                            </div>
                                                            <input type="password" placeholder="Confirmation Mot de Passe ..." aria-label="Confirmation Mot de Passe ..."
                                                                   required="required"
                                                                   id="password_confirmation"
                                                                   className={`form-control ${this.hasErrorFor('password_confirmation') ? 'is-invalid' : ''}`}
                                                                   name='password_confirmation'
                                                                   value={this.state.password_confirmation}
                                                                   onChange={this.handleFieldChange}
                                                                   autoComplete="password_confirmation"/>
                                                            {this.renderErrorFor('password_confirmation')}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-md-12">
                                                    <div className="custom-control custom-checkbox mt-2">
                                                        <input className={`custom-control-input ${this.hasErrorFor('notifier_newletter') ? 'is-invalid' : ''}`} id="customCheck1" type="checkbox"
                                                               defaultChecked={isChecked} value={this.state.notifier_newletter} name="notifier_newletter" onChange={this.toggleChange}/>
                                                        <label className="custom-control-label" htmlFor="customCheck1">
                                                            <span>Je souhaite recevoir les bons plans des partenaires</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="kazouTech-register-submit mt-3 mb-3 text-center">
                                                <button type="submit" className="btn btn-primary">Je m'inscris</button>
                                            </div>
                                            <div className="row mt-4 mb-3">
                                                <div className="col-md-12">
                                                    En vous inscrivant vous acceptez <a href="#">les conditions générales</a> et la <a href="#">politique
                                                    de confidentialité</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        )
    }

}
export default RegisterUserSite;
