import React, { Component } from "react";
import { Link,NavLink } from "react-router-dom";
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
        this.updateImage = this.updateImage.bind(this);
        this.removeImage = this.removeImage.bind(this);
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.handleChangeBody = this.handleChangeBody.bind(this);
        this.state = {
            title: '',
            body: '',
            photo: '',
            color_id: '',
            occupation_id: '',
            colors:[],
            occupations:[],
            errors: [],
            showDefaultImage: false
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
    updateImage(e){
        e.preventDefault();
        let reader = new FileReader();
        let file = e.target.files[0];
        reader.onloadend = (file) => {
            this.setState({ file: file, photo: reader.result, showDefaultImage: false });
        };
        reader.readAsDataURL(file)
    }
    removeImage(e){
        e.preventDefault();
        this.setState({ file: '', photo: '', showDefaultImage: true });
    }
    updateItem(e) {
        let Id = this.props.match.params.id;
        e.preventDefault();

        let item = {
            title: this.state.title,
            body: this.state.body,
            photo: this.state.photo,
            color_id: this.state.color_id,
            occupation_id: this.state.occupation_id,
        };
        dyaxios.put(route('blogs.update',Id), item)
            .then(() => {
                $.notify('<strong>Blog mis à jour avec succès...</strong>', {
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
                this.props.history.push('/blog/');
            }).catch(error => {
                this.setState({
                    errors: error.response.data.errors
                });
                $.notify("Ooopss! Something wrong. Try later...", {
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
        dyaxios.get(route('api.colors')).then(response => this.setState({ colors: [...response.data], }));
        dyaxios.get(url).then(response =>
            this.setState({
                body: response.data.body,
                title: response.data.title,
                photo: response.data.photo,
                color_id: response.data.color_id,
                occupation_id: response.data.occupation_id,
            }));
    }

    componentDidMount() {
        this.loadItems();
    }

    render() {
        const { occupations,colors,photo} = this.state;
        const composantTitle = `${this.state.title || "Kazoutech"}`;
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
                                    <a style={{cursor : "pointer"}}  className="text-white" onClick={this.props.history.goBack}>
                                        <i className="fa fa-chevron-circle-left"/> Retour
                                    </a>
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
                                                    <div className="col-md-12">
                                                        <label className="labels">
                                                            Titre de votre blog
                                                            <span className="text-danger">*</span>
                                                        </label>
                                                        <input type="text" placeholder="Titre de votre blog" aria-label="Titre du blog"
                                                            required="required"
                                                            className={`form-control ${this.hasErrorFor('title') ? 'is-invalid' : ''}`}
                                                            name='title'
                                                            maxLength="200"
                                                            value={this.state.title}
                                                            onChange={this.handleFieldChange}
                                                        />
                                                        {this.renderErrorFor('title')}
                                                    </div>
                                                </div>
                                                <div className="row">
                                                    <div className="col-md-6">
                                                        <label className="labels">
                                                            Catégorie de l'article
                                                            <span className="text-danger">*</span>
                                                        </label>
                                                        <select name={'occupation_id'} value={this.state.occupation_id}
                                                                className={`form-control`}
                                                                id="occupation_id" onChange={this.handleFieldChange}>
                                                            <option value="" disabled>Sélectioner une catégorie</option>
                                                            {occupations.map((item) => (
                                                                <option key={item.id} value={item.id}>{item.name}</option>
                                                            ))}
                                                        </select>
                                                        {this.renderErrorFor('occupation_id')}
                                                    </div>
                                                    <div className="col-md-6">
                                                        <label className="labels">
                                                            Donner une couleur à l'article
                                                            <span className="text-danger">*</span>
                                                        </label>
                                                        <select name={'color_id'} value={this.state.color_id}
                                                                className={`form-control`}
                                                                id="color_id" onChange={this.handleFieldChange}>
                                                            <option value="" disabled>Sélectioner une couleur</option>
                                                            {colors.map((item) => (
                                                                <option key={item.id} value={item.id}>{item.name}</option>
                                                            ))}
                                                        </select>
                                                        {this.renderErrorFor('color_id')}
                                                    </div>
                                                </div>
                                                <br />
                                                <div className="row">
                                                    <div className="col-md-6 mx-auto">
                                                        <div className="profile text-center">
                                                            <img src={this.state.showDefaultImage ? "https://www.kazoucoin.com/assets/img/photo.jpg" : photo} alt={'name'}/>
                                                            <input id="photo" type="file" onChange={this.updateImage} className={`form-control ${this.hasErrorFor('photo') ? 'is-invalid' : ''} kazouImageCarousel-file-upload`} name="photo"/>
                                                            {this.renderErrorFor('photo')}
                                                            <div className="text-center">
                                                                <label htmlFor="photo" className="btn btn-icon btn-primary">
                                                                    <span className="btn-inner--icon"><i className="ni ni-image"/></span>
                                                                    <span className="btn-inner--text">Add Image</span>
                                                                </label>
                                                                <button hidden={this.state.showDefaultImage ? true : false} onClick={this.removeImage} className="btn btn-icon btn-danger">
                                                                    <span className="btn-inner--icon"><i className="ni ni-fat-remove"/></span>
                                                                    <span className="btn-inner--text">Remove</span>
                                                                </button>
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
                                                        <NavLink to={`/blog/`} className="btn btn-icon btn-secondary" type="submit">
                                                            <span className="btn-inner--text">Annuler</span>
                                                        </NavLink>

                                                        <button className="btn btn-icon btn-primary" type="submit">
                                                            <span className="btn-inner--text">Ajournez l'article</span>
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
