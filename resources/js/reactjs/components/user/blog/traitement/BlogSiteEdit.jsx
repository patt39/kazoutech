import React, { Component } from "react";
import { Link } from "react-router-dom";
import { Button } from "reactstrap";
import ReactQuill from 'react-quill';
import NavUserSIte from "../../../inc/NavUserSIte";
import FooterUserSite from "../../../inc/FooterUserSite";
import moment from 'moment'
require("moment/min/locales.min");
moment.locale('fr');

class BlogSiteEdit extends Component {
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
            occupation_id: '',
            occupations:[],
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
        e.preventDefault();

        let item = {
            title: this.state.title,
            body: this.state.body,
            photo: this.state.photo,
            occupation_id: this.state.occupation_id,
        };
        dyaxios.post(route('blog_site.update', [Id]), item)
            .then(() => {
                $.notify('<strong>Blog mise à jour avec success...</strong>', {
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
        let url = route('blog_site.show', [Id]);
        dyaxios.get(route('api_active.occupations')).then(response => this.setState({ occupations: [...response.data], }));
        dyaxios.get(url).then(response =>
            this.setState({
                body: response.data.body,
                title: response.data.title,
                photo: response.data.photo,
                occupation_id: response.data.occupation_id,
            }));
    }

    componentDidMount() {
        this.loadItems();
    }

    render() {
        const { occupations } = this.state;
        const composantTitle = `${this.state.title}`;
        document.title = `${composantTitle} | Kazoutech`;
        return (

            <div className="blog-posts">
                <NavUserSIte />
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image"
                             style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}/>
                        <div className="content-center">
                            <div className="row">
                                <div className="col-md-6 mx-auto text-center">
                                    <h4 className="title text-white">{this.state.title}</h4>
                                    <Link to={'/blog/'} className="text-white">
                                        <i className="fa fa-chevron-circle-left"/> Retour au blog
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div className="main main-raised">
                        <div className="container">
                            <form className="js-validate" onSubmit={this.updateItem}>
                                <div className="row">
                                    <div className="col-md-10 mx-auto">
                                        <div className="card">
                                            <div className="container">
                                                <h3 className="title mt-3">{this.state.title}</h3>
                                                <div className="row">
                                                    <div className="col-md-6">
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
                                                    <div className="col-md-6">
                                                        <label className="labels">
                                                            Category de l'article
                                                            <span className="text-danger">*</span>
                                                        </label>
                                                        <select name={'occupation_id'} value={this.state.occupation_id}
                                                                className={`form-control`}
                                                                id="occupation_id" onChange={this.handleFieldChange}>
                                                            <option value="" disabled>Selectioner une category</option>
                                                            {occupations.map((item) => (
                                                                <option key={item.id} value={item.id}>{item.name}</option>
                                                            ))}
                                                        </select>
                                                        {this.renderErrorFor('occupation_id')}
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
export default BlogSiteEdit;
