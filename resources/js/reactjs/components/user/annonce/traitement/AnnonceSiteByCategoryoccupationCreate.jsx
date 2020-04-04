import React, { Component } from "react";
import { Link } from "react-router-dom";
import ReactQuill from 'react-quill';
import NavUserSIte from "../../../inc/NavUserSIte";
import FooterUserSite from "../../../inc/FooterUserSite";
import moment from 'moment'
require("moment/min/locales.min");
moment.locale('fr');

class AnnonceSiteByCategoryoccupationCreate extends Component {
    constructor(props) {
        super(props);

        this.createItem = this.createItem.bind(this);
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
            cities: [],
            errors: [],
            categoryoccupationdata: []
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

    createItem(e) {
        let SlugOccupationcreate = this.props.match.params.occupation;
        let SlugCategoryocupationcreate = this.props.match.params.categoryoccupation;
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
        dyaxios.post(route('annonces_site.save_by_catgoryoccupation', [SlugOccupationcreate,SlugCategoryocupationcreate]), item)
            .then(() => {
                $.notify('<strong>Annonce creé avec success...</strong>', {
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
        let SlugOccupation = this.props.match.params.occupation;
        let SlugCategoryocupationcreate = this.props.match.params.categoryoccupation;
        dyaxios.get(route('api.cities_by_status')).then(response => this.setState({ cities: [...response.data], }));
        let url = route('categoryoccupations.view', [SlugOccupation, SlugCategoryocupationcreate]);
        dyaxios.get(url).then(response => this.setState({ categoryoccupationdata: response.data, }));
    }

    componentDidMount() {
        this.loadItems();
    }

    render() {
        const { cities, categoryoccupationdata } = this.state;
        const composantTitle = `${categoryoccupationdata.name}`;
        let SlugOccupation = this.props.match.params.occupation;
        document.title = `Nouvelle annonce de ${composantTitle} | Kazoutech`;
        return (

            <div className="checkout-page">
                <NavUserSIte />
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image"
                             style={{ backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")" }}/>
                        <div className="content-center">
                            <div className="header-body text-center mb-7">
                                <div className="row justify-content-center">
                                    <div className="col-xl-5 col-lg-6 col-md-8 px-5">
                                        <Link to={`/annonces/`} className="text-white">
                                            <h5 className="text-white">{this.state.title}</h5>
                                        </Link>
                                        <div className="author">
                                            <a style={{cursor : "pointer"}}  className="text-white" onClick={this.props.history.goBack}>
                                                <i className="fa fa-chevron-circle-left"/> Retour {categoryoccupationdata.name}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="main main-raised">
                        <div className="container">
                            <form className="js-validate" onSubmit={this.createItem}>
                                <div className="row">
                                    <div className="col-lg-4">
                                        <div className="container">
                                            <h3 className="title text-white mt-3">{categoryoccupationdata .name}</h3>
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
                                                                       name="price" placeholder="Proposez un prix"
                                                                       value={this.state.price}
                                                                       onChange={this.handleFieldChange}
                                                                       aria-label="Proposez un prix pour cette annonce" />
                                                                {this.renderErrorFor('price')}
                                                            </div>
                                                        </div>
                                                        <hr className="line-info mb-3" />
                                                        <div className="media align-items-center">
                                                            <h3 className="h6 opacity-8 mr-3">Subtotal</h3>
                                                            <div className="media-body text-right">
                                                                <span>$1038</span>
                                                            </div>
                                                        </div>
                                                        <div className="media align-items-center">
                                                            <h3 className="h6 opacity-8 mr-3">Shipping</h3>
                                                            <div className="media-body text-right">
                                                                <span>$5.8</span>
                                                            </div>
                                                        </div>
                                                        <hr className="line-info mb-3" />
                                                        <div className="media align-items-center">
                                                            <h3 className="h6">Total</h3>
                                                            <div className="media-body text-right">
                                                                <span
                                                                    className="font-weight-semi-bold">$1045.8</span>
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
                                                        <input type="text" placeholder="Titre de votre annonce" aria-label="Titre de l'annonce"
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
                                                    <div className="col-md-12">
                                                        <div className="js-form-message">
                                                            <label className="labels">
                                                                Votre ville
                                                                <span className="text-danger">*</span>
                                                            </label>
                                                            <select name={'city_id'} value={this.state.city_id}
                                                                    className={`form-control`}
                                                                    id="city_id" onChange={this.handleFieldChange}>
                                                                <option value="" disabled>Selectioner une ville</option>
                                                                {cities.map((item) => (
                                                                    <option key={item.id} value={item.id}>{item.name}</option>
                                                                ))}
                                                            </select>
                                                            {this.renderErrorFor('city_id')}
                                                        </div>
                                                    </div>
                                                </div>
                                                <br />
                                                <div className="row">
                                                    <div className="col-md-7">
                                                        <div className="js-form-message">
                                                            <label className="labels">
                                                                Votre addresse de residance
                                                                <span className="text-danger">*</span>
                                                            </label>
                                                            <input type="text"
                                                                   className={`form-control ${this.hasErrorFor('address') ? 'is-invalid' : ''}`}
                                                                   name="address"
                                                                   placeholder="Biyem-Assi"
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
                                                                Telephone
                                                                <span className="text-danger">*</span>
                                                            </label>
                                                            <input type="tel" className={`form-control ${this.hasErrorFor('phone') ? 'is-invalid' : ''}`}
                                                                   placeholder="Numero de telephone valide"
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
export default AnnonceSiteByCategoryoccupationCreate;
