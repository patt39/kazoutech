import React, {Component} from "react";

class SubscribeLine extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user_email: '',
            errors: [],
        };
        this.saveItem = this.saveItem.bind(this);
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

    saveItem(e) {
        e.preventDefault();

        let item = {
            user_email: this.state.user_email,
        };
        dyaxios.post(route('subscribers.store'), item)
            .then(() => {
                $.notify('<strong>Merçi pour votre souscription!</strong>', {
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
                    user_email: "",
                });
            }).catch(error => {
            this.setState({
                errors: error.response.data.errors
            });

        })
    }

    render() {
        return (
            <div className="subscribe-line subscribe-line-white">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-6 mr-auto">
                            <h4 className="title">Restez à l'affût chaque semaine!</h4>
                            <p className="description">
                                Inscrivez-vous gratuitement à notre newletters et soyez contacter par mail en premiers chaque week-end pour les offres de prèmier choix.
                            </p>
                        </div>
                        <div className="col-lg-6 d-flex justify-content-center flex-column ml-auto">
                            <form method="POST" onSubmit={this.saveItem}>
                                <div className="row">
                                    <div className="col-sm-8">
                                        <div className="form-group">
                                            <div className="input-group mb-4">
                                                <div className="input-group-prepend">
                                                            <span className="input-group-text">
                                                                <i className="ni ni-email-83"/></span>
                                                </div>
                                                <input type="email" placeholder="Votre email..."
                                                       aria-label="Votre email"
                                                       required="required"
                                                       id="user_email"
                                                       className={`form-control ${this.hasErrorFor('user_email') ? 'is-invalid' : ''}`}
                                                       name='user_email'
                                                       value={this.state.user_email}
                                                       onChange={this.handleFieldChange}/>
                                                {this.renderErrorFor('user_email')}
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-sm-4">
                                        <button type="submit" className="btn btn-success btn-block">
                                            <span className="btn-inner--icon">
                                               <i className="ni ni-check-bold"/>
                                           </span>
                                            <span className="nav-link-inner--text pt-40 position-navbar">Souscrivez</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default SubscribeLine;
