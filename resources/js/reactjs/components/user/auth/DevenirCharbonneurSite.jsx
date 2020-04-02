import React,{Component} from "react";
import ReactFormInputValidation from "react-form-input-validation";



class DevenirCharbonneurSite extends Component{
    constructor(props) {
        super(props);

        this.saveItem = this.saveItem.bind(this);
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.state = {
            username: '',
            email: '',
            name: '',
            phone: '',
            day: '',
            month: '',
            year: '',
            city_id: '',
            user_year: '',
            occupation_id: '',
            password: '',
            sex: '',
            password_confirmation: '',
            charbonneur: true,
            notifier_newletter: true,
            isChecked: true,
            occupations: [],
            cities: [],
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

    saveItem(e) {
        e.preventDefault();

        let item = {
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
            charbonneur: this.state.charbonneur,
            notifier_newletter: this.state.notifier_newletter,
            password: this.state.password,
            password_confirmation: this.state.password_confirmation,
        };
        dyaxios.post(route('devenir_charbonneur.store'), item)
            .then(() => {
                window.location.reload();
            }).catch(error => {
            this.setState({
                errors: error.response.data.errors
            });
            $.notify("Ooop! Quelque chose ne va pas. Essayez plus tard...", {
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
        dyaxios.get(route('api.cities_by_status')).then(response =>
            this.setState({
                cities: [...response.data],
            }));
        dyaxios.get(route('api_active.occupations')).then(response =>
            this.setState({
                occupations: [...response.data],
            }));
    }

    render() {
        const {cities,occupations,isChecked} = this.state;
        return(
            <form role="form" id="contact-form" method="post" onSubmit={this.saveItem}>
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
                <div className="row">
                    <div className="col-md-4">
                        <label>Jour de Naissance</label>
                        <div className="input-group">
                            <div className="input-group-prepend">
                                    <span className="input-group-text">
                                        <i className="ni ni-calendar-grid-58"/>
                                    </span>
                            </div>
                            <input type="number"
                                   placeholder="Exemple:(02,10) ..." aria-label="Jour de Naissance ..."
                                   required="required"
                                   id="day" maxLength="2"
                                   className={`form-control ${this.hasErrorFor('day') ? 'is-invalid' : ''}`}
                                   name='day'
                                   value={this.state.day}
                                   onChange={this.handleFieldChange} autoComplete="day"/>
                            {this.renderErrorFor('day')}
                        </div>
                    </div>
                    <div className="col-md-4 align-self-center">
                        <label>Mois de Naissance</label>
                        <div className="form-group">
                            <select  value={this.state.month} className={`form-control ${this.hasErrorFor('month') ? 'is-invalid' : ''}`} onChange={this.handleFieldChange}
                                    name="month" id="month" required="required">
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
                                       placeholder="Année de naissance ..." aria-label="Année de naissance ..."
                                       required="required"
                                       id="year" maxLength="4"
                                       className={`form-control ${this.hasErrorFor('year') ? 'is-invalid' : ''}`}
                                       name='year'
                                       value={this.state.year}
                                       onChange={this.handleFieldChange} autoComplete="year"/>
                                {this.renderErrorFor('year')}
                            </div>
                        </div>
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-4">
                        <label>Votre Profession</label>
                        <div className="form-group">
                            <select value={this.state.occupation_id} className={`form-control ${this.hasErrorFor('occupation_id') ? 'is-invalid' : ''}`}
                                    onChange={this.handleFieldChange}
                                    name="occupation_id" required="required">
                                <option value="" disabled>Votre occupation</option>
                                {occupations.map((item) => (
                                    <option key={item.id} value={item.id}>{item.name}</option>
                                ))}
                            </select>
                            {this.renderErrorFor('occupation_id')}
                        </div>
                    </div>
                    <div className="col-md-4">
                        <label>Votre Ville</label>
                        <div className="form-group">
                            <select value={this.state.city_id} className={`form-control ${this.hasErrorFor('city_id') ? 'is-invalid' : ''}`}
                                    onChange={this.handleFieldChange} name="city_id" required="required">
                                <option value="" disabled>Votre ville</option>
                                {cities.map((item) => (
                                    <option key={item.id} value={item.id}>{item.name}</option>
                                ))}
                            </select>
                            {this.renderErrorFor('city_id')}
                        </div>
                    </div>
                    <div className="col-md-4">
                        <label>Sex</label>
                        <div className="form-group">
                            <select  value={this.state.sex} className={`form-control ${this.hasErrorFor('sex') ? 'is-invalid' : ''}`}
                                     onChange={this.handleFieldChange} name="sex"  id="sex" required="required">
                                <option value="" disabled>Sex</option>
                                <option value="male">Homme</option>
                                <option value="female">Femme</option>
                            </select>
                            {this.renderErrorFor('sex')}
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
                                <input type="tel" pattern="[0-9]*" inputMode="numeric" placeholder="Votre Numéro de Télephone ..." aria-label="Votre Numéro de Télephone ..."
                                       required="required"
                                       id="phone"
                                       className={`form-control ${this.hasErrorFor('phone') ? 'is-invalid' : ''}`}
                                       name='phone'
                                       value={this.state.phone}
                                       onChange={this.handleFieldChange} autoComplete="phone" />
                                {this.renderErrorFor('phone')}
                            </div>
                        </div>
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-6">
                        <div className="form-group">
                            <label>Mot de Passe</label>
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
                                   defaultChecked={isChecked} value={this.state.notifier_newletter} name="notifier_newletter" onChange={this.toggleChange} checked={isChecked}/>
                            <label className="custom-control-label" htmlFor="customCheck1">
                                <span>Je souhaite recevoir les bons plans des partenaires</span>
                            </label>
                        </div>
                    </div>
                    <div className="col-md-12">
                        <div className="custom-control custom-checkbox mt-2">
                            <input className="custom-control-input" id="customCheck2" type="checkbox"
                                    value={this.state.charbonneur} name="charbonneur" onChange={this.toggleChange} checked={isChecked}/>
                            <label className="custom-control-label" htmlFor="customCheck2">
                                <span><b>JE CONFIRME DEVENIR CHARBONNEUR</b> (Jobbeur) pour la platte forme kazoutech</span>
                            </label>
                            {this.renderErrorFor('charbonneur')}
                        </div>
                    </div>
                </div>
                <div className="kazouTech-register-submit mt-3 mb-3 text-center">
                    <button type="submit" className="btn btn-primary">Je m'inscris</button>
                </div>
                <div className="row mt-4 mb-3">
                    <div className="col-md-12">
                        En vous inscrivant vous acceptez <a href="/condition_utilisation">les conditions générales</a> et la <a href="/politique_confidentialité">politique
                        de confidentialité</a>
                    </div>
                </div>
            </form>

        )
    }

}
export default DevenirCharbonneurSite;
