import React, { Component } from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import { Link, NavLink } from "react-router-dom";
import { Input } from 'reactstrap';

class ProfileUserSiteEdit extends Component {
    constructor(props) {
        super(props);
        this.state = {
            avatar: '',
            avatarcover: '',
            cni_picture: '',
            username: '',
            name: '',
            phone: '',
            email: '',
            day: '',
            month: '',
            year: '',
            sex: '',
            city_id: '',
            occupation_id: '',
            cni: '',
            cni_confirmation: '',
            userProfile:[],
            occupations: [],
            cities: [],
            errors: [],
            showDefaultCni: true,
            showDefaultAvatar: true
        };
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.updateCniPicture = this.updateCniPicture.bind(this);
        this.removeCniPicture = this.removeCniPicture.bind(this);
        this.updateAvatarPicture = this.updateAvatarPicture.bind(this);
        this.removeAvatarPicture = this.removeAvatarPicture.bind(this);
        this.saveProfile = this.saveProfile.bind(this);
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

    updateCniPicture(e) {
        e.preventDefault();
        let reader = new FileReader();
        let file = e.target.files[0];
        reader.onloadend = (file) => {
            this.setState({ file: file, cni_picture: reader.result, showDefaultCni: false });
        };
        reader.readAsDataURL(file)
    }

    removeCniPicture(e){
        e.preventDefault();
        this.setState({ file: '', cni_picture: '', showDefaultCni: true });
    }

    updateAvatarPicture(e) {
        e.preventDefault();
        let reader = new FileReader();
        let file = e.target.files[0];
        reader.onloadend = (file) => {
            this.setState({ file: file, avatar: reader.result, showDefaultAvatar: false });
        };
        reader.readAsDataURL(file)
    }

    removeAvatarPicture(e){
        e.preventDefault();
        this.setState({ file: '', avatar: '', showDefaultAvatar: true });
    }

    retrieveData() {
        dyaxios.get(route('api.account_profile')).then(response =>
            this.setState({
                avatarcover: response.data.avatarcover,
                avatar: response.data.avatar,
                username: response.data.username,
                name: response.data.name,
                phone: response.data.phone,
                email: response.data.email,
                day: response.data.day,
                month: response.data.month,
                year: response.data.year,
                sex: response.data.sex,
                cni: response.data.cni,
                city_id: response.data.city_id,
                occupation_id: response.data.occupation_id,
            }));
        dyaxios.get(route('api.cities_by_status')).then(response =>
            this.setState({
                cities: [...response.data],
        }));
        dyaxios.get(route('api_active.occupations')).then(response =>
            this.setState({
                occupations: [...response.data],
        }));
    }

    componentDidMount() {
        this.retrieveData()
    }

    saveProfile(e) {
        e.preventDefault();
        let updateProfile = {
            avatar: this.state.avatar,
            username: this.state.username,
            name: this.state.name,
            phone: this.state.phone,
            email: this.state.email,
            day: this.state.day,
            month: this.state.month,
            year: this.state.year,
            sex: this.state.sex,
            city_id: this.state.city_id,
            occupation_id: this.state.occupation_id,
            cni: this.state.cni,
            cni_confirmation: this.state.cni_confirmation,
            cni_picture: this.state.cni_picture
        };
        dyaxios.put(route('devenir_charbonneur.update'), updateProfile)
            .then(() => {
                window.location.reload();
            }).catch(error => {
            this.setState({
                errors: error.response.data.errors
            });
            $.notify("Ooop! Quelque chose ne va pas. Essayez plus tard ...", {
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
        const {cities, occupations} = this.state;
        document.title = `${this.state.name || "profile"} | Edition Profil`;
        return (
            <div className="profile-page">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="section-shaped my-0">
                        <div className="page-header page-header-small header-filter">
                            <div className="page-header-image"
                                 style={{backgroundImage: `url(${this.state.avatarcover})`}}>
                            </div>
                            <div className="container">
                                <div className="header-body text-center mb-7">
                                    <div className="row justify-content-center">
                                        <div className="col-xl-5 col-lg-6 col-md-8 px-5">
                                            <h1 className="text-white">Mon Profil</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form role="form" id="profil-form" method="post" onSubmit={this.saveProfile}>
                        <div className="account-settings bg-secondary">
                            <div className="container bg-white card mb-0">
                                <div className="row mb-5">
                                    <div className="col-md-4">
                                        <div className="section">
                                            <section className="text-center">
                                                <div className="fileinput fileinput-new text-center"
                                                     data-provides="fileinput">
                                                    <div className="fileinput-new thumbnail img-circle img-raised">
                                                        <img src={this.state.avatar} alt={this.state.name}/>
                                                    </div>
                                                    <div
                                                        className="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                    <div>
                                                    <span
                                                        className="btn btn-raised btn-round btn-primary btn-file btn-sm mx-auto mt-3">
                                                      <span className="fileinput-new">Add Photo</span>
                                                      <span className="fileinput-exists">Change</span>
                                                      <input
                                                          id="avatar"
                                                          type="file"
                                                          name="avatar"
                                                          className={`form-control ${this.hasErrorFor('avatar') ? 'is-invalid' : ''} kazouTech-file-upload`}
                                                          onChange={this.updateAvatarPicture}
                                                        />
                                                        {this.renderErrorFor('avatar')}
                                                    </span>
                                                        <br/>
                                                        <a onClick={this.removeImage}
                                                           className="btn btn-danger btn-round fileinput-exists btn-simple btn-sm"
                                                           data-dismiss="fileinput"><i
                                                            className="tim-icons icon-simple-remove"></i> Remove</a>
                                                    </div>
                                                </div>
                                                <h3 className="title mt-4">{this.state.name}</h3>
                                            </section>
                                            <div className="row mt-5">
                                                <div className="col-md-12 text-center">
                                                    <div className="alert alert-primary text-small" role="alert">
                                                        <i className="icon-shield"></i>
                                                        <span className="text-justify">
                                                            Veuillez compléter vote profil avec une photo de votre CNI (Carte Nationalité d'Identité).
                                                        </span>
                                                    </div>
                                                    <div className="fileinput fileinput-new text-center"
                                                         data-provides="fileinput">
                                                        <div className="fileinput-new thumbnail">
                                                            <img src={this.state.showDefaultCni ? "/assets/images/image_placeholder.jpg" : cni_picture} alt="Example Image" />
                                                        </div>
                                                        <div className="fileinput-preview fileinput-exists thumbnail"></div>
                                                        <div>
                                                            <span className="btn btn-round btn-file mt-2">
                                                              <span className="fileinput-new">Selectioner votre CNI</span>
                                                              <span className="fileinput-exists">Echanger</span>
                                                              <input
                                                                  id="cni_picture"
                                                                  type="file"
                                                                  name="cni_picture"
                                                                  className={`form-control ${this.hasErrorFor('cni_picture') ? 'is-invalid' : ''} kazouTech-file-upload`}
                                                                  onChange={this.updateCniPicture}
                                                              />
                                                              {this.renderErrorFor('cni_picture')}
                                                            </span>
                                                            <a onClick={this.removeCniPicture}
                                                               className="btn btn-danger btn-round fileinput-exists"
                                                               data-dismiss="fileinput"><i
                                                               className="fa fa-times"></i> Effacer</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-md-8 mt-5 pr-5">
                                        <header>
                                            <h2 className="text-uppercase">Informations Personnelles</h2>
                                        </header>
                                        <hr className="line-primary"/>
                                        <br/>
                                        <div className="row">
                                            <div className="col-md-4">
                                                <label>Je suis</label>
                                                <div className="form-group">
                                                    <select
                                                        value={this.state.sex || ""}
                                                        className={`form-control ${this.hasErrorFor('sex') ? 'is-invalid' : ''}`}
                                                        onChange={this.handleFieldChange}
                                                        name="sex"
                                                        id="sex"
                                                        >
                                                            <option value="" disabled>Sex</option>
                                                            <option value="Male">Homme</option>
                                                            <option value="Female">Femme</option>
                                                    </select>
                                                    {this.renderErrorFor('sex')}
                                                </div>
                                            </div>
                                            <div className="col-md-8">
                                                <div className="progress-container progress-primary">
                                                    <span className="progress-badge">Compléter votre profil</span>
                                                    <div className="">
                                                        <div className="progress-info">
                                                            <div className="progress-percentage">
                                                                <span className="text-primary">80%</span>
                                                            </div>
                                                        </div>
                                                        <div className="progress">
                                                            <div className="progress-bar bg-primary" role="progressbar"
                                                                 aria-valuenow="80" aria-valuemin="0"
                                                                 aria-valuemax="100" style={{width: "80%"}}></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-md-7">
                                                <div className="form-group">
                                                    <label>Nom et Prènom</label>
                                                    <div className="input-group mb-4">
                                                        <div className="input-group-prepend">
                                                            <span className="input-group-text">
                                                                <i className="ni ni-circle-08"/>
                                                            </span>
                                                        </div>
                                                        <Input type="text"
                                                               placeholder="Votre Nom et Prènom ..."
                                                               aria-label="Votre Nom et  Prènom ..."
                                                               
                                                               id="name"
                                                               className={`form-control ${this.hasErrorFor('name') ? 'is-invalid' : ''}`}
                                                               name='name'
                                                               value={this.state.name || ""}
                                                               onChange={this.handleFieldChange}
                                                               autoComplete="name"/>
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
                                                        <Input type="text"
                                                               placeholder="Votre Pseudo ..."
                                                               aria-label="Votre Pseudo ..."
                                                               required="required"
                                                               id="username"
                                                               className={`form-control ${this.hasErrorFor('username') ? 'is-invalid' : ''}`}
                                                               name='username'
                                                               value={this.state.username || ""}
                                                               onChange={this.handleFieldChange}
                                                               autoComplete="username"/>
                                                        {this.renderErrorFor('username')}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-md-4">
                                                <label>Jour de Naissance</label>
                                                <div className="input-group">
                                                    <div className="input-group-prepend">
                                                        <span className="input-group-text">
                                                            <i className="ni ni-calendar-grid-58"/>
                                                        </span>
                                                    </div>
                                                    <Input type="number"
                                                           placeholder="Exemple:(02,10) ..."
                                                           aria-label="Jour de Naissance ..."
                                                           required="required"
                                                           id="day" maxLength="2"
                                                           className={`form-control ${this.hasErrorFor('day') ? 'is-invalid' : ''}`}
                                                           name='day'
                                                           value={this.state.day || ""}
                                                           onChange={this.handleFieldChange}
                                                           autoComplete="day"/>
                                                    {this.renderErrorFor('day')}
                                                </div>
                                            </div>
                                            <div className="col-md-4 align-self-center">
                                                <label>Mois de Naissance</label>
                                                <div className="form-group">
                                                    <select
                                                        value={this.state.month || ""}
                                                        className={`form-control ${this.hasErrorFor('month') ? 'is-invalid' : ''}`}
                                                        onChange={this.handleFieldChange}
                                                        name="month"
                                                        id="month"
                                                        required="required"
                                                        autoComplete="month">
                                                        <option value="" disabled>Selectioner le mois</option>
                                                        <option value={'01'}>January</option>
                                                        <option value={'02'}>February</option>
                                                        <option value={'03'}>March</option>
                                                        <option value={'04'}>April</option>
                                                        <option value={'05'}>May</option>
                                                        <option value={'06'}>June</option>
                                                        <option value={'07'}>July</option>
                                                        <option value={'08'}>August</option>
                                                        <option value={'09'}>September</option>
                                                        <option value={'10'}>October</option>
                                                        <option value={'11'}>November</option>
                                                        <option value={'12'}>December</option>
                                                    </select>
                                                </div>
                                                {this.renderErrorFor('month')}
                                            </div>
                                            <div className="col-md-4">
                                                <div className="form-group">
                                                    <label>Année de Naissance</label>
                                                    <div className="input-group">
                                                        <div className="input-group-prepend">
                                                            <span className="input-group-text">
                                                                <i className="ni ni-calendar-grid-58"/>
                                                            </span>
                                                        </div>
                                                        <input type="number"
                                                               placeholder="Année de naissance ..."
                                                               aria-label="Année de naissance ..."
                                                               required="required"
                                                               id="year"
                                                               maxLength="4"
                                                               className={`form-control ${this.hasErrorFor('year') ? 'is-invalid' : ''}`}
                                                               name='year'
                                                               value={this.state.year || ""}
                                                               onChange={this.handleFieldChange}
                                                               autoComplete="year"/>
                                                        {this.renderErrorFor('year')}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-md-6">
                                                <div className="form-group">
                                                    <label>Addresse E-mail</label>
                                                    <div className="input-group">
                                                        <div className="input-group-prepend">
                                                            <span className="input-group-text">
                                                                <i className="ni ni-email-83"/>
                                                            </span>
                                                        </div>
                                                        <input type="email"
                                                               placeholder="Votre E-mail ..."
                                                               aria-label="Votre E-mail ..."
                                                               required="required"
                                                               id="email"
                                                               className={`form-control ${this.hasErrorFor('email') ? 'is-invalid' : ''}`}
                                                               name='email'
                                                               value={this.state.email || ""}
                                                               onChange={this.handleFieldChange}
                                                               autoComplete="email"/>
                                                        {this.renderErrorFor('email')}
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <div className="form-group">
                                                    <label>Votre Numéro de Télephone</label>
                                                    <div className="input-group">
                                                        <div className="input-group-prepend">
                                                            <span className="input-group-text">
                                                                <i className="ni ni-mobile-button"/>
                                                            </span>
                                                        </div>
                                                        <input type="tel" pattern="[0-9]*"
                                                               inputMode="numeric"
                                                               placeholder="Votre Numéro de Télephone ..."
                                                               aria-label="Votre Numéro de Télephone ..."
                                                               required="required"
                                                               id="phone"
                                                               className={`form-control ${this.hasErrorFor('phone') ? 'is-invalid' : ''}`}
                                                               name='phone'
                                                               value={this.state.phone || ""}
                                                               onChange={this.handleFieldChange}
                                                               autoComplete="phone" />
                                                        {this.renderErrorFor('phone')}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-md-6">
                                                <label>Votre Profession</label>
                                                <div className="form-group">
                                                    <select
                                                        value={this.state.occupation_id || ""}
                                                        className={`form-control ${this.hasErrorFor('occupation_id') ? 'is-invalid' : ''}`}
                                                        onChange={this.handleFieldChange}
                                                        name="occupation_id"
                                                        required="required">
                                                            <option value="" disabled>Votre occupation</option>
                                                            {occupations.map((item) => (
                                                                <option key={item.id} value={item.id}>{item.name}</option>
                                                            ))}
                                                    </select>
                                                    {this.renderErrorFor('occupation_id')}
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <label>Votre Ville</label>
                                                <div className="form-group">
                                                    <select
                                                        value={this.state.city_id || ""}
                                                        className={`form-control ${this.hasErrorFor('city_id') ? 'is-invalid' : ''}`}
                                                        onChange={this.handleFieldChange}
                                                        name="city_id"
                                                        required="required">
                                                            <option value="" disabled>Votre ville</option>
                                                            {cities.map((item) => (
                                                                <option key={item.id} value={item.id}>{item.name}</option>
                                                            ))}
                                                    </select>
                                                    {this.renderErrorFor('city_id')}
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-md-6">
                                                <label>Votre CNI</label>
                                                <div className="input-group">
                                                    <div className="input-group-prepend">
                                                        <span className="input-group-text">
                                                            <i className="ni ni-badge"/>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                           placeholder="Votre CNI ..."
                                                           aria-label="Votre CNI ..."
                                                           required="required"
                                                           id="cni"
                                                           className={`form-control ${this.hasErrorFor('cni') ? 'is-invalid' : ''}`}
                                                           name='cni'
                                                           value={this.state.cni || ""}
                                                           onChange={this.handleFieldChange}
                                                           autoComplete="cni"/>
                                                    {this.renderErrorFor('cni')}
                                                </div>
                                            </div>
                                            <div className="col-md-6">
                                                <label>Confirmez votre CNI</label>
                                                <div className="input-group">
                                                    <div className="input-group-prepend">
                                                        <span className="input-group-text">
                                                            <i className="ni ni-badge"/>
                                                        </span>
                                                    </div>
                                                    <input type="text"
                                                           placeholder="Confirmez votre CNI ..."
                                                           aria-label="Confirmez votre CNI ..."
                                                           required="required"
                                                           id="cni_confirmation"
                                                           className={`form-control ${this.hasErrorFor('cni_confirmation') ? 'is-invalid' : ''}`}
                                                           name='cni_confirmation'
                                                           value={this.state.cni_confirmation || ""}
                                                           onChange={this.handleFieldChange}
                                                           autoComplete="cni_confirmation"/>
                                                    {this.renderErrorFor('cni_confirmation')}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-md-4 ml-auto mr-auto">
                                        <div className="kazouTech-register-submit mt-3 mb-5">
                                            <button type="submit" className="btn btn-primary">Envoyer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <FooterUserSite/>
            </div>
        )
    }
}

export default ProfileUserSiteEdit;
