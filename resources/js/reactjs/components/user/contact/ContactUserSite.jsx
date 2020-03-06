import React, {Component} from "react";
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";

class ContactUserSite extends Component {
    constructor(props) {
        super(props);
        this.state = {
            email: '',
            first_name: '',
            last_name: '',
            subject: '',
            message: '',
            errors: [],
        };
        this.createItem = this.createItem.bind(this);
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
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

    createItem(e) {
        e.preventDefault();

        let item = {
            email: this.state.email,
            first_name: this.state.first_name,
            last_name: this.state.last_name,
            subject: this.state.subject,
            message: this.state.message,
        };
        dyaxios.post(route('contact.save'), item)
            .then(() => {
                $.notify('<strong>Merçi pour votre message ...</strong>', {
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
                    email: "",
                    first_name: "",
                    last_name: "",
                    subject: "",
                    message: "",
                });
            }).catch(error => {
            this.setState({
                errors: error.response.data.errors
            });
        })
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Contacts | Kazoutech';
        document.title = `${composantTitle}`;
    }

    render() {
        return (
            <>
                <div className="landing-page">
                    <NavUserSIte/>

                    <div className="wrapper">
                        <div className="page-header page-header-mini header-filter">
                            <div className="page-header-image"
                                 style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/photo-15.jpg' + ")"}}/>
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto text-center">
                                        <h3 className="display-2 text-white">Contactez Nous ...</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="main">
                        <div className="container-fluid">
                            <div className="row mt-5 mb-4">
                                <div className="col-md-8 ml-auto mr-auto text-center mt-5">
                                    <button className="btn btn-icon btn-primary mb-5" type="button">
                                        <span className="btn-inner--icon"><i className="ni ni-email-83"></i></span>
                                        <span className="btn-inner--text">Laissez-nous un message</span>
                                    </button>
                                    <h1 className="title">Dites nous tout à propos de <b>vous</b></h1>
                                    <h4 className="desc">Si vous avez des questions ou juste un salut, nous sommes à
                                        votre disposition.</h4>
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-md-6 mx-auto ">
                                    <form role="form" className="card bg-secondary p-3" id="contact-form"
                                          onSubmit={this.createItem} acceptCharset="UTF-8">
                                        <div className="card-body">
                                            <div className="row">
                                                <div className="col-md-6">
                                                    <div className="form-group">
                                                        <label>Prénom <span
                                                            className="kazouTech-red-color">*</span></label>
                                                        <div className="input-group input-group-alternative">
                                                            <div className="input-group-prepend">
                                                                <span className="input-group-text">
                                                                    <i className="ni ni-circle-08"/>
                                                                </span>
                                                            </div>
                                                            <input id='first_name'
                                                                   type='text'
                                                                   className={`form-control ${this.hasErrorFor('first_name') ? 'is-invalid' : ''}`}
                                                                   name='first_name'
                                                                   placeholder="Prénom ..."
                                                                   value={this.state.first_name}
                                                                   onChange={this.handleFieldChange}
                                                            />
                                                            {this.renderErrorFor('first_name')}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6">
                                                    <div className="form-group">
                                                        <label>Nom <span
                                                            className="kazouTech-red-color">*</span></label>
                                                        <div className="input-group input-group-alternative">
                                                            <div className="input-group-prepend">
                                                                <span className="input-group-text"><i
                                                                    className="ni ni-tag"/></span>
                                                            </div>
                                                            <input id='last_name'
                                                                   type='text'
                                                                   className={`form-control ${this.hasErrorFor('last_name') ? 'is-invalid' : ''}`}
                                                                   name='last_name'
                                                                   placeholder="Nom ..."
                                                                   aria-label="Last Name ..."
                                                                   value={this.state.last_name}
                                                                   onChange={this.handleFieldChange}
                                                            />
                                                            {this.renderErrorFor('last_name')}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label>Addresse Email <span
                                                    className="kazouTech-red-color">*</span></label>
                                                <div className="input-group input-group-alternative">
                                                    <div className="input-group-prepend">
                                                        <span className="input-group-text"><i
                                                            className="ni ni-email-83"/></span>
                                                    </div>
                                                    <input id='email'
                                                           type='email'
                                                           className={`form-control ${this.hasErrorFor('email') ? 'is-invalid' : ''}`}
                                                           name='email'
                                                           placeholder="Email ..."
                                                           aria-label="Email ..."
                                                           value={this.state.email}
                                                           onChange={this.handleFieldChange}
                                                    />
                                                    {this.renderErrorFor('email')}
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label>Subject <span className="kazouTech-red-color">*</span></label>
                                                <div className="input-group input-group-alternative">
                                                    <div className="input-group-prepend">
                                                        <span className="input-group-text"><i
                                                            className="ni ni-email-83"/></span>
                                                    </div>
                                                    <input id='subject'
                                                           type='text'
                                                           className={`form-control ${this.hasErrorFor('subject') ? 'is-invalid' : ''}`}
                                                           name='subject'
                                                           placeholder="Object ..."
                                                           aria-label="Object ..."
                                                           value={this.state.subject}
                                                           onChange={this.handleFieldChange}
                                                    />
                                                    {this.renderErrorFor('subject')}
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label>Votre Message <span
                                                    className="kazouTech-red-color">*</span></label>
                                                <textarea name="message" value={this.state.message}
                                                          onChange={this.handleFieldChange}
                                                          placeholder={'Message ...'}
                                                          className={`form-control ${this.hasErrorFor('message') ? 'is-invalid' : ''} form-control-alternative"`}
                                                          id="message"
                                                          rows="6"/>
                                                {this.renderErrorFor('message')}
                                            </div>
                                            <div className="text-center">
                                                <button type="submit" className="btn btn-success">
                                                    <span className="btn-inner--icon">
                                                       <i className="ni ni-check-bold"/>
                                                    </span>
                                                    <span
                                                        className="nav-link-inner--text pt-40 position-navbar">Envoyer</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="contactus-3">
                        <div className="container">
                            <div className="row">
                                <div className="col-lg-3 col-md-6 col-6">
                                    <div className="info info-hover">
                                        <div
                                            className="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                            <i className="ni ni-square-pin"/>
                                        </div>
                                        <h4 className="info-title">Office</h4>
                                        <p className="description px-0">Kazoutech Srl, Milan / Italy </p>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-md-6 col-6">
                                    <div className="info info-hover">
                                        <div
                                            className="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                            <i className="ni ni-email-83"/>
                                        </div>
                                        <h4 className="info-title">Email</h4>
                                        <p className="description px-0">hello@email.com</p>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-md-6 col-6">
                                    <div className="info info-hover">
                                        <div
                                            className="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                            <i className="ni ni-mobile-button"/>
                                        </div>
                                        <h4 className="info-title">Phone</h4>
                                        <p className="description px-0">+39 3425712192 / +39 3296187465 </p>
                                    </div>
                                </div>
                                <div className="col-lg-3 col-md-6 col-6">
                                    <div className="info info-hover">
                                        <div
                                            className="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                            <i className="ni ni-circle-08"/>
                                        </div>
                                        <h4 className="info-title">Contact</h4>
                                        <p className="description px-0">Andrew Samian</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <FooterUserSite/>
                </div>
            </>
        )
    }
}

export default ContactUserSite;
