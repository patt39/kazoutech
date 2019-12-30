import React, { Component } from "react";
import { Link } from "react-router-dom";
import { Button } from "reactstrap";
import ReactQuill from 'react-quill';
import NavUserSIte from "../../../inc/NavUserSIte";
import FooterUserSite from "../../../inc/FooterUserSite";
import moment from 'moment'
require("moment/min/locales.min");
moment.locale('fr');

class BlogSiteCreate extends Component {
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
            occupation_id: '',
            categoryoccupation_id: '',
            occupationdata: { categoryoccupations: [] },
            blogs: [],
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

    createItem(e) {
        let SlugOccupationcreate = this.props.match.params.occupation;
        e.preventDefault();

        let item = {
            title: this.state.title,
            body: this.state.body,
            photo: this.state.photo,
            description: this.state.description,
            categoryoccupation_id: this.state.categoryoccupation_id,
        };
        dyaxios.post(route('blogs_site.create', [SlugOccupationcreate]), item)
            .then(() => {
                $.notify('<strong>Blog créer avec success...</strong>', {
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
        dyaxios.get(route('occupations.apioccupationbyslug', [SlugOccupation])).then(response => this.setState({ occupationdata: response.data, }));
    }

    componentDidMount() {
        this.loadItems();
    }

    render() {
        const { cities, occupationdata } = this.state;
        const categoryoccupations = occupationdata.categoryoccupations;
        const composantTitle = `${occupationdata.name}`;
        document.title = `Nouvelle article ${composantTitle} | Kazoutech`;
        return (

            <div className="checkout-page">
                <NavUserSIte />
                <div className="wrapper">
                    <div className="section-shaped skew-mini">
                        <div className="page-header page-header-mini header-filter">
                            <div className="page-header-image"
                                style={{ backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")" }}>
                            </div>
                            <div className="container">
                                <div className="header-body text-center mb-7">
                                    <div className="row justify-content-center">
                                        <div className="col-xl-5 col-lg-6 col-md-8 px-5">
                                            <Link to={`/blogs/`} className="text-white">
                                                <h5 className="text-white">Blog</h5>
                                            </Link>
                                            <div className="author">
                                                <Link to={`/annonces/${occupationdata.slug}`} className="text-white">
                                                    <i className="fa fa-chevron-circle-left"/> Retour {occupationdata.name}
                                                </Link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="upper">
                        <div className="container">
                            <form className="js-validate" onSubmit={this.createItem}>
                                <div className="row">
                                    <div className="col-md-10 mx-auto">
                                        <div className="card">
                                            <div className="container">
                                                <h3 className="title mt-3">{this.state.title}</h3>
                                                <div className="row">
                                                    <div className="col-md-12">
                                                        <label className="labels">
                                                            Titre de votre blog
                                                            <span className="text-danger">*</span>
                                                        </label>
                                                        <input type="text" placeholder="Titre de votre blog" aria-label="Titre du blog"
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
                                                    <div className="col-md-8 ml-auto mr-auto">
                                                        <div className="profile text-center">
                                                            <br/>
                                                                <div className="fileinput fileinput-new text-center"
                                                                     data-provides="fileinput">
                                                                    <div className="fileinput-new thumbnail">
                                                                        <img src="getImagesave()" alt="form.slug"/>
                                                                    </div>
                                                                    <div
                                                                        className="fileinput-preview fileinput-exists thumbnail"></div>
                                                                    <div>
                                                                        <span style={{cursor: "pointer"}}
                                                                                className="btn btn-raised btn-success btn-file">
                                                                               <span
                                                                                  className="fileinput-new">
                                                                                   <i className="material-icons">insert_photo</i>
                                                                                       <b>Add Slide</b>
                                                                                </span>
                                                                               <span
                                                                                   className="fileinput-exists"
                                                                                   style={{cursor: "pointer"}}>
                                                                                   <i className="material-icons">photo_library</i>
                                                                                   <b>Change</b>
                                                                                </span>
                                                                                <input id="photo"
                                                                                change="updateImage"
                                                                                type="file"
                                                                                className="form-control"
                                                                                name="photo"/>
                                                                               <has-error form="form" field="photo"/>
                                                                        </span>
                                                                <a href="#pablo"
                                                                   className="btn btn-danger fileinput-exists"
                                                                   data-dismiss="fileinput">
                                                                    <i className="material-icons">cancel</i>
                                                                    <b>Remove</b>
                                                                </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <br/>
                                                <div className="row">
                                                    <div className="col-md-12">
                                                        <div className="form-group">
                                                            <label className="labels">
                                                                Description de votre article
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
                                                            <span className="btn-inner--text">Sauvegarder l'article</span>
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
export default BlogSiteCreate;
