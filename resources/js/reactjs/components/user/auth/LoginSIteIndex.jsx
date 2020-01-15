import React,{Component} from "react";



class LoginSIteIndex extends Component{
    constructor(props) {
        super(props);

        this.saveItem = this.saveItem.bind(this);
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.state = {
            username: '',
            email: '',
            password: '',
            remember: true,
            errors: [],
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

    saveItem(e) {
        e.preventDefault();

        let item = {
            username: this.state.username,
            password: this.state.password,
            remember: this.state.remember,
        };
        dyaxios.post(route('login'), item)
            .then(() => {
                window.location.replace(`/`);
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
        return(
            <div className="card-body px-lg-5 py-lg-5">
                <div className="text-center text-muted mb-4">
                    <small>Ou connectez-vous avec vos identifiants</small>
                </div>
                <form method="POST" onSubmit={this.saveItem}>

                    <div className="form-group mb-3">
                        <div className="input-group input-group-alternative">
                            <div className="input-group-prepend">
                                <span className="input-group-text">
                                    <i className="ni ni-email-83"/>
                                </span>
                            </div>

                            <input type="text" placeholder="Pseudo, email ou numero de téléphone" aria-label="Pseudo, email ou votre numero de téléphone"
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
                </form>
            </div>
        )
    }

}
export default LoginSIteIndex;
