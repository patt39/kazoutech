import React, { Component } from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import { Link, NavLink } from "react-router-dom";

class ProfileUserSiteEdit extends Component {
    constructor(props) {
        super(props);
        this.state = {
            userProfile: [],
            email: '',
            first_name: '',
            last_name: '',
            subject: '',
            message: '',
            errors: [],
        };
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

    componentDidMount() {
        let Username = this.props.match.params.username;
        dyaxios.get(route('api_profile.view', [Username])).then(response =>
            this.setState({
                userProfile: response.data,
        }));
    }

    render() {
        const {userProfile} = this.state;
        console.log('userProfile: ', userProfile);
        return (
            <div className="profile-page">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="section-shaped my-0 skew-separator skew-mini">
                        <div className="page-header page-header-small header-filter">
                            <div className="page-header-image"
                                 style={{backgroundImage: `url(${userProfile.avatarcover})`}}>
                            </div>
                            <div className="container">
                                <div className="header-body text-center mb-7">
                                    <div className="row justify-content-center">
                                        <div className="col-xl-5 col-lg-6 col-md-8 px-5">
                                            <h1 className="text-white">Your account</h1>
                                            <p className="text-lead text-white">That’s the main thing people are
                                                controlled by! Thoughts - their perception of themselves!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="bg-secondary">
                        <div className="container bg-white card mb-0">
                            <div className="row">
                                <div className="col-md-4">
                                    <div className="section">
                                        <section className="text-center">
                                            <div className="fileinput fileinput-new text-center"
                                                 data-provides="fileinput">
                                                <div className="fileinput-new thumbnail img-circle img-raised">
                                                    <img src={userProfile.avatar} alt={userProfile.name}/>
                                                </div>
                                                <div
                                                    className="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                <div>
                                                <span
                                                    className="btn btn-raised btn-round btn-primary btn-file btn-sm mx-auto mt-3">
                                                  <span className="fileinput-new">Add Photo</span>
                                                  <span className="fileinput-exists">Change</span>
                                                  <input type="file" name="..."/>
                                                </span>
                                                    <br/>
                                                    <a href="#pablo"
                                                       className="btn btn-danger btn-round fileinput-exists btn-simple btn-sm"
                                                       data-dismiss="fileinput"><i
                                                        className="tim-icons icon-simple-remove"></i> Remove</a>
                                                </div>
                                            </div>
                                            <h3 className="title mt-4">{userProfile.name}</h3>
                                        </section>
                                    </div>
                                </div>
                                <div className="col-md-8">
                                    <header>
                                        <h2 className="text-uppercase">General information</h2>
                                    </header>
                                    <hr className="line-primary"/>
                                    <br/>
                                    <div className="row">
                                        <div className="col-md-3 align-self-center">
                                            <label className="labels" htmlFor="#firstName">Nom Complet</label>
                                        </div>
                                        <div className="col-md-9 align-self-center">
                                            <div className="form-group">
                                                <input
                                                    type="text"
                                                    id="first_name"
                                                    name="first_name"
                                                    className={`form-control ${this.hasErrorFor('first_name') ? 'is-invalid' : ''}`}
                                                    value={this.state.first_name}
                                                    onChange={this.handleFieldChange}
                                                />
                                                {this.renderErrorFor('first_name')}
                                            </div>
                                        </div>
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

export default ProfileUserSiteEdit;
