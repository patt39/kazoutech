import React, { Component } from "react";
import { Link } from "react-router-dom";
import { Button } from "reactstrap";
import ReactQuill from 'react-quill';
import NavUserSIte from "../../../inc/NavUserSIte";
import FooterUserSite from "../../../inc/FooterUserSite";
import moment from 'moment'
require("moment/min/locales.min");
moment.locale('fr');

class AnnonceSiteEdit extends Component {
    constructor(props) {
        super(props);

        this.updateItem = this.updateItem.bind(this);
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.handleChangeBody = this.handleChangeBody.bind(this);
        this.state = {
            title: '',
            body: '',
            photo: '',
            price: '',
            city_id: '',
            occupation_id: '',
            description: '',
            address: '',
            phone: '',
            categoryoccupation_id: '',
            occupationdata: { categoryoccupations: [] },
            cities: [],
            errors: []
        };
        this.modules = {
            toolbar: [
                [{ 'size': ['small', false, 'large', 'huge'] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                [{ 'color': [] }, { 'background': [] }],
            ]
        };
        this.formats = [
            'size',
            'bold', 'italic', 'underline',
            'list', 'bullet',
            'align',
            'color', 'background'
        ];

    }

    // Handle Change
    handleChangeBody(value) {
        this.setState({ body: value });
        document.querySelector('.editor-control').classList.remove('is-invalid');
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

    updateItem(e) {
        let Id = this.props.match.params.id;
        let SlugOccupation = this.props.match.params.occupation;
        e.preventDefault();

        let item = {
            title: this.state.title,
            body: this.state.body,
            photo: this.state.photo,
            price: this.state.price,
            address: this.state.address,
            phone: this.state.phone,
            city_id: this.state.city_id,
            occupation_id: this.state.occupation_id,
            description: this.state.description,
            categoryoccupation_id: this.state.categoryoccupation_id,
        };
        dyaxios.put(route('annonces_site.update', [SlugOccupation, Id]), item)
            .then(() => {
                $.notify('<strong>Annonce mis à jour avec succès...</strong>', {
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

    // get all the tasks from backend
    loadItems() {
        let Id = this.props.match.params.id;
        let SlugOccupation = this.props.match.params.occupation;
        let url = route('annonces_site.show', [SlugOccupation, Id]);
        dyaxios.get(route('api.cities_by_status')).then(response => this.setState({ cities: [...response.data], }));
        dyaxios.get(route('occupations.apioccupationbyslug', [SlugOccupation])).then(response => this.setState({ occupationdata: response.data, }));
        dyaxios.get(url).then(response =>
            this.setState({
                body: response.data.body,
                title: response.data.title,
                photo: response.data.photo,
                price: response.data.price,
                city_id: response.data.city_id,
                occupation_id: response.data.occupation_id,
                description: response.data.description,
                address: response.data.address,
                phone: response.data.phone,
                categoryoccupation_id: response.data.categoryoccupation_id,
            }));
    }

    componentDidMount() {
        this.loadItems();
    }

    render() {
        const { cities, occupationdata } = this.state;
        const categoryoccupations = occupationdata.categoryoccupations;
        const composantTitle = `${this.state.title}`;
        document.title = `${composantTitle} | Kazoutech`;
        return (

            <div className="blog-posts">
                <NavUserSIte />
                <div className="wrapper">

                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image"
                             style={{ backgroundImage: "url(" + occupationdata.photo + ")" }}/>
                        <div className="container">
                            <div className="header-body text-center mb-7">
                                <div className="row justify-content-center">
                                    <div className="col-xl-5 col-lg-6 col-md-8 px-5">
                                        <Link to={`/annonces/`} className="text-white">
                                            <h5 className="text-white">{this.state.title} </h5>
                                        </Link>
                                        <p className="text-lead text-white">
                                            <Link to={`/annonces/${occupationdata.slug}/`} className="text-white">
                                                <i className="fa fa-chevron-circle-left" /> Retour {occupationdata.name}
                                            </Link>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="main main-raised">
                        <div className="container">
                            <form className="js-validate" onSubmit={this.updateItem}>
                                <div className="row">
                                    <div className="col-lg-4">
                                        <div className="container">
                                            <h3 className="title text-white mt-3">{occupationdata.name}</h3>
                                            <div className="row">
                                                <div className="card">
                                                    <div className="card-body">
                                                        <div className="media align-items-center">
                                                            <div className="media-body">
                                                                <h2 className="h6">Prix</h2>
                                                                <small className="d-block opacity-8">Prix proposer</small>
                                                            </div>
                                                            <div className="media-body text-right">
                                                                {this.state.price ?
                                                                    <span><b>{this.state.price} CFA</b></span>
                                                                    :null}
                                                            </div>
                                                        </div>
                                                        <hr className="line-info mb-3" />
                                                        <div className="code-validate">
                                                            <label>Proposez un prix</label>
                                                            <div className="input-group">
                                                                <input type="number"  className={`form-control ${this.hasErrorFor('price') ? 'is-invalid' : ''}`}
                                                                    name="price" placeholder="Proposez un prix pour cette annonce"
                                                                    value={this.state.price}
                                                                    onChange={this.handleFieldChange}
                                                                    aria-label="Proposez un prix pour cette annonce" />
                                                                {this.renderErrorFor('price')}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div className="col-md-8 mx-auto">
                                        <div className="card">
                                            <div className="container">
                                                <h3 className="title mt-3">{this.state.title}</h3>
                                                <div className="row">
                                                    <div className="col-md-12">
                                                        <label className="labels">
                                                            Titre de votre annonce
                                                            <span className="text-danger">*</span>
                                                        </label>
                                                        <input type="text" placeholder="Titre de votre annonce" aria-label="Tite de l'annonce"
                                                            required="required"
                                                            className={`form-control ${this.hasErrorFor('title') ? 'is-invalid' : ''}`}
                                                            name='title'
                                                            value={this.state.title}
                                                            onChange={this.handleFieldChange}
                                                        />
                                                        {this.renderErrorFor('title')}
                                                    </div>
                                                </div>
                                                <br />
                                                <div className="row">
                                                    <div className="col-md-6">
                                                        <div className="js-form-message">
                                                            <label className="labels">
                                                                Votre ville
                                                                <span className="text-danger">*</span>
                                                            </label>
                                                            <select name={'city_id'} value={this.state.city_id}
                                                                className={`form-control`} data-trigger
                                                                id="city_id" onChange={this.handleFieldChange}>
                                                                <option value="" disabled>Selectionez une ville</option>
                                                                {cities.map((item) => (
                                                                    <option key={item.id} value={item.id}>{item.name}</option>
                                                                ))}
                                                            </select>
                                                            {this.renderErrorFor('city_id')}
                                                        </div>
                                                    </div>
                                                    <div className="col-md-6">
                                                        <div className="js-form-message">
                                                            <label className="labels">
                                                                Catégorie
                                                                <span className="text-danger">*</span>
                                                            </label>
                                                            <select name={'categoryoccupation_id'} value={this.state.categoryoccupation_id}
                                                                className={`form-control ${this.hasErrorFor('categoryoccupation_id') ? 'is-invalid' : ''}`}
                                                                id="categoryoccupation_id" onChange={this.handleFieldChange}>
                                                                <option value="" disabled>Selectioner une Catégorie</option>
                                                                {categoryoccupations.map((item) => (
                                                                    <option key={item.id} value={item.id}>{item.name}</option>
                                                                ))}
                                                            </select>
                                                            {this.renderErrorFor('categoryoccupation_id')}
                                                        </div>
                                                    </div>
                                                </div>
                                                <br />
                                                <div className="row">
                                                    <div className="col-md-7">
                                                        <div className="js-form-message">
                                                            <label className="labels">
                                                                Votre adresse de residance
                                                                    <span className="text-danger">*</span>
                                                            </label>
                                                            <input type="text"
                                                                className={`form-control ${this.hasErrorFor('address') ? 'is-invalid' : ''}`}
                                                                name="address"
                                                                placeholder="420 Long Beach, CA"
                                                                aria-label="420 Long Beach, CA" required="required"
                                                                defaultValue={this.state.address}
                                                                onChange={this.handleFieldChange}
                                                            />
                                                            {this.renderErrorFor('title')}
                                                        </div>
                                                    </div>
                                                    <div className="col-md-5">
                                                        <div className="js-form-message">
                                                            <label className="labels">
                                                                Téléphone
                                                                <span className="text-danger">*</span>
                                                            </label>
                                                            <input type="tel" className={`form-control ${this.hasErrorFor('phone') ? 'is-invalid' : ''}`}
                                                                placeholder="Numéro de téléphone valide"
                                                                aria-label="Numero de telephone valide"
                                                                name={'phone'}
                                                                value={this.state.phone}
                                                                onChange={this.handleFieldChange}
                                                            />
                                                            {this.renderErrorFor('phone')}
                                                        </div>
                                                    </div>
                                                </div>
                                                <br />
                                                <div className="row">
                                                    <div className="col-md-12">
                                                        <div className="form-group">
                                                            <label className="labels">
                                                                Description de votre annonce
                                                                <span className="text-danger">*</span>
                                                            </label>
                                                            <br />
                                                            <ReactQuill theme="snow" modules={this.modules}
                                                                        formats={this.formats}
                                                                        className={`editor-control ${this.hasErrorFor('body') ? 'is-invalid' : ''}`}
                                                                        value={this.state.body || ''}
                                                                        onChange={this.handleChangeBody}/>
                                                            {this.renderErrorFor('description')}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="submit">
                                                    <div className="text-center">
                                                        <button className="btn btn-icon btn-primary" type="submit">
                                                            <span className="btn-inner--text">Mettre à jour l'annonce</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <FooterUserSite />
                </div>
            </div>
        )
    }

}
export default AnnonceSiteEdit;
