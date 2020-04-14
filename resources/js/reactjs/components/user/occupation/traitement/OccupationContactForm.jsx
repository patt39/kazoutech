import React, { Component } from "react";
import { Link } from "react-router-dom";
import { Button,Input,Form } from "reactstrap";


class OccupationContactForm extends Component {
    constructor(props) {
        super(props);

        this.saveItem = this.saveItem.bind(this);
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.state = {
            full_name:'',
            email:'',
            message:'',
            phone:'',
            confirm_send:'',
            city_id:'',
            cities: [],
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
            full_name: this.state.full_name,
            email: this.state.email,
            message: this.state.message,
            confirm_send: this.state.confirm_send,
            city_id: this.state.city_id,
            phone: this.state.phone,
        };
        let itemOccupation = this.props.match.params.occupation;
        dyaxios.post(route('deviscontacts.save',[itemOccupation]), item)
            .then(() => {

                //Redirect after create
                $.notify('<strong>Message envoyé avec success...</strong>', {
                    allow_dismiss: false,
                    type: 'success',
                    placement: {
                        from: 'bottom',
                        align: 'right'
                    },
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                    },
                });

                this.setState({
                    full_name: "",
                    email: "",
                    message: "",
                    city_id: "",
                    confirm_send: "",
                    phone: "",
                });

            }).catch(error => {
            this.setState({
                errors: error.response.data.errors
            });
            $.notify("Ooop! Something wrong. Try later...", {
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
        fetch(route('api.cities_by_status')).then(res => res.json()).then((result) => {
            this.setState({
                cities: [...result]
            });
        });
    }

    render() {
        const {cities} = this.state;
        return (

            <div className="row">
                <div className="col-lg-8 mx-auto">
                    <Form role="form" className="p-3" id="contact-form" onSubmit={this.saveItem}>

                        <div className="card-body">
                            <div className="row">
                                <div className="col-md-6">
                                    <div className="form-group">
                                        <label>Nom complete <span
                                            className="kazouTech-red-color">*</span></label>
                                        <div className="input-group">
                                            <div className="input-group-prepend">
                                                                                <span className="input-group-text">
                                                                                    <i className="ni ni-circle-08"></i></span>
                                            </div>
                                            <Input type="text" minLength="2" maxLength="100"
                                                   placeholder="Votre Nom et Prènom ..." aria-label="Votre Nom et  Prènom ..."
                                                   required="required"
                                                   id="full_name"
                                                   className={`form-control ${this.hasErrorFor('full_name') ? 'is-invalid' : ''}`}
                                                   name='full_name'
                                                   value={this.state.full_name}
                                                   onChange={this.handleFieldChange} autoComplete="full_name"/>
                                            {this.renderErrorFor('full_name')}
                                        </div>
                                    </div>
                                </div>
                                <div className="col-md-6">
                                    <div className="form-group">
                                        <label>Phone <span
                                            className="kazouTech-red-color">*</span></label>
                                        <div className="input-group">
                                            <div className="input-group-prepend">
                                                                                <span className="input-group-text">
                                                                                    <i className="ni ni-mobile-button"></i></span>
                                            </div>
                                            <Input type="tel" pattern="[0-9]*" inputMode="numeric" placeholder="Votre Numéro de Télephone ..." aria-label="Votre Numéro de Télephone ..."
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
                                        <label>Email address <span
                                            className="kazouTech-red-color">*</span></label>
                                        <div className="input-group">
                                            <div className="input-group-prepend">
                                                                        <span className="input-group-text">
                                                                            <i className="ni ni-email-83"></i></span>
                                            </div>
                                            <Input maxLength="100" minLength="3" type="email" placeholder="Votre E-mail ..." aria-label="Votre E-mail ..."
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
                                        <label>Votre Ville <span
                                            className="kazouTech-red-color">*</span></label>
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
                                </div>
                            </div>


                            <div className="form-group">
                                <label>Votre Message <span
                                    className="kazouTech-red-color">*</span></label>
                                <Input minLength="5" name="message" value={this.state.message}
                                          onChange={this.handleFieldChange}
                                          placeholder={'Message ...'}
                                          className={`form-control ${this.hasErrorFor('message') ? 'is-invalid' : ''} form-control-alternative"`}
                                          id="message"
                                          type="textarea"
                                          rows="6"/>
                                {this.renderErrorFor('message')}
                            </div>
                            <div className="row">
                                <div className="col-md-6">
                                    <div
                                        className="custom-control custom-checkbox mb-3">
                                        <input name="confirm_send" className={`custom-control-input ${this.hasErrorFor('confirm_send') ? 'is-invalid' : ''}`}
                                               id="confirm_send" value="1" type="checkbox" onChange={this.handleFieldChange} checked={this.state.confirm_send}/>
                                        <label className="custom-control-label"
                                               htmlFor="confirm_send">
                                            <span>Je suis majeur, j'ai lu et accepté
                                                <a className="text-primary" data-action="open-privacy-disclamer"> Informations de confidentialité</a>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div className="col-md-6">
                                    <button type="submit"
                                            className="btn btn-info pull-right">
                                        Envoyer la demande
                                    </button>
                                </div>
                            </div>
                        </div>
                    </Form>
                </div>
            </div>
        )
    }

}
export default OccupationContactForm;
