import React, {Component, Fragment} from "react";
import {NavLink} from "react-router-dom";
import moment from "moment";
import LazyLoad from 'react-lazyload';
import Pagination from "react-js-pagination";
import { Button,Input,Form } from "reactstrap";
import ReadMoreAndLess from "react-read-more-less";
import ProfileSiteAnnonces from "./ProfileSiteAnnonces";


class ProfileSiteAvisUser extends Component {
    constructor(props) {
        super(props);

        this.loadItems = this.loadItems.bind(this);
        this.handlePageChange = this.handlePageChange.bind(this);
        this.saveonlineItem = this.saveonlineItem.bind(this);
        this.saveofflineItem = this.saveofflineItem.bind(this);
        this.handleFieldChange = this.handleFieldChange.bind(this);
        this.hasErrorFor = this.hasErrorFor.bind(this);
        this.renderErrorFor = this.renderErrorFor.bind(this);
        this.state = {
            first_name:'',
            last_name:'',
            email:'',
            message:'',
            url:'',
            confirm_send:'',
            errors: [],
            avischarbonneurs: [],
            activePage: 1,
            itemsCountPerPage: 1,
            totalItemsCount: 1,
            pageRangeDisplayed: 6,

        };

        //this.deleteAnnonce = this.deleteAnnonce.bind(this);
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

    saveofflineItem(e) {
        e.preventDefault();

        let item = {
            first_name: this.state.first_name,
            last_name: this.state.last_name,
            email: this.state.email,
            url: this.state.url,
            message: this.state.message,
            confirm_send: this.state.confirm_send,
        };
        let Username = this.props.match.params.username;
        dyaxios.post(route('avischarbonneurs.offlinesave',[Username]), item)
            .then(() => {

                //Redirect after create
                $.notify('<strong>Avis enregistré avec succès...</strong>', {
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
                    first_name: "",
                    last_name: "",
                    email: "",
                    url: "",
                    message: "",
                    confirm_send: "",
                });
                this.loadItems();
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

    saveonlineItem(e) {
        e.preventDefault();

        let item = {
            message: this.state.message,
        };
        let Username = this.props.match.params.username;
        dyaxios.post(route('avischarbonneurs.onlinesave',[Username]), item)
            .then(() => {

                //Redirect after create
                $.notify('<strong>Avis enregistré avec succès...</strong>', {
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
                    message: "",
                });

                this.loadItems();
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

   loadItems() {
       let itemuser = this.props.match.params.username;
       dyaxios.get(route('api.avischarbonneurs_site', [itemuser]))
           .then(response => {
               this.setState({
                   avischarbonneurs: response.data.data,
                   activePage: response.data.current_page,
                   itemsCountPerPage: response.data.per_page,
                   totalItemsCount: response.data.total,
               });
           });
   }

    componentDidMount() {
        this.loadItems();
    }

    handlePageChange(pageNumber) {
        let itemuser = this.props.match.params.username;
        dyaxios.get(`/api/avis/${itemuser}/by_charbonneur?page=` + pageNumber)
            .then(response => {
                this.setState({
                    avischarbonneurs: response.data.data,
                    activePage: response.data.current_page,
                    itemsCountPerPage: response.data.per_page,
                    totalItemsCount: response.data.total,
                });
            });
    }

    render() {
        const {avischarbonneurs} = this.state;
        return (

           <>

               <div className="card-body">
                   <div className="mb-1">

                       {avischarbonneurs.length > 0 && (
                           <Fragment>
                               {avischarbonneurs.map((item) => (
                                   <div key={item.id} className="media media-comment">
                                       <div className="media-body">
                                           <div className="media-comment-text">
                                               <h6 className="h5 mt-0">{item.first_name} {item.last_name}</h6>
                                               <span className="text-sm lh-160">
                                                   <ReadMoreAndLess
                                                       className="read-more-content"
                                                       charLimit={250}
                                                       readMoreText="En savoir plus"
                                                       readLessText="En savoir moin">
                                                       {item.message || ""}
                                                   </ReadMoreAndLess>
                                               </span>
                                           </div>
                                       </div>
                                   </div>
                               ))}

                               <br/>
                               <Pagination

                                   firstPageText={<i className="fa fa-angle-double-left" />}
                                   lastPageText={<i className="fa fa-angle-double-right" />}

                                   innerClass="pagination pagination-primary justify-content-center"
                                   activePage={this.state.activePage}
                                   itemsCountPerPage={this.state.itemsCountPerPage}
                                   totalItemsCount={this.state.totalItemsCount}
                                   pageRangeDisplayed={this.state.pageRangeDisplayed}
                                   onChange={this.handlePageChange.bind(this)}
                                   itemClass="page-item"
                                   linkClass="page-link"
                               />
                           </Fragment>


                       )}



                       <br/>
                       <h5 className="text-center"><b>Laisser un avis à ce charbonneur</b></h5>

                       {$guest ?
                           <Form id="contact-form" method="post" onSubmit={this.saveofflineItem}>

                               <div className="card-body">
                                   <div className="row">
                                       <div className="col-md-6">
                                           <div className="form-group">
                                               <label>Nom<span
                                                   className="kazouTech-red-color">*</span></label>
                                               <div className="input-group">
                                                   <div className="input-group-prepend">
                                                 <span className="input-group-text">
                                                 <i className="ni ni-circle-08"></i></span>
                                                   </div>
                                                   <Input type="text" minLength="2" maxLength="100"
                                                          placeholder="Votre Nom ..." aria-label="Votre Nom ..."
                                                          required="required"
                                                          id="first_name"
                                                          className={`form-control ${this.hasErrorFor('first_name') ? 'is-invalid' : ''}`}
                                                          name='first_name'
                                                          value={this.state.first_name}
                                                          onChange={this.handleFieldChange} autoComplete="first_name"/>
                                                   {this.renderErrorFor('first_name')}
                                               </div>
                                           </div>
                                       </div>
                                       <div className="col-md-6">
                                           <div className="form-group">
                                               <label>Prénom <span
                                                   className="kazouTech-red-color">*</span></label>
                                               <div className="input-group">
                                                   <div className="input-group-prepend">
                                                 <span className="input-group-text">
                                                 <i className="ni ni-circle-08"></i></span>
                                                   </div>
                                                   <Input type="text" minLength="2" maxLength="100"
                                                          placeholder="Votre Prénom ..." aria-label="Votre Prènom ..."
                                                          required="required"
                                                          id="last_name"
                                                          className={`form-control ${this.hasErrorFor('last_name') ? 'is-invalid' : ''}`}
                                                          name='last_name'
                                                          value={this.state.last_name}
                                                          onChange={this.handleFieldChange} autoComplete="last_name"/>
                                                   {this.renderErrorFor('last_name')}
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div className="row">
                                       <div className="col-md-6">
                                           <div className="form-group">
                                               <label>Adresse email <span
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
                                               <label>Site internet</label>
                                               <div className="input-group">
                                                   <div className="input-group-prepend">
                                                <span className="input-group-text">
                                                <i className="ni ni-world-2"></i></span>
                                                   </div>
                                                   <Input type="text" placeholder="Votre site internet ..." aria-label="Votre site internet ..."
                                                          id="url"
                                                          className={`form-control ${this.hasErrorFor('url') ? 'is-invalid' : ''}`}
                                                          name='url'
                                                          value={this.state.url}
                                                          onChange={this.handleFieldChange}/>
                                                   {this.renderErrorFor('url')}
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                   <div className="form-group">
                                       <label>Your message</label>
                                       <label>Votre avis <span
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
                                                   className="btn btn-info pull-right">Poster
                                           </button>
                                       </div>
                                   </div>
                               </div>
                           </Form>
                           :
                           <div className="media align-items-center mt-5">

                               <img alt="Image placeholder"
                                    className="avatar avatar-lg rounded-circle mb-6"
                                    src={$userKazou.avatar}/>
                               <div className="media-body">
                                   <Form onSubmit={this.saveonlineItem}>
                                       <Input minLength="5" name="message" value={this.state.message}
                                              onChange={this.handleFieldChange}
                                              placeholder={'Message ...'}
                                              className={`form-control ${this.hasErrorFor('message') ? 'is-invalid' : ''} form-control-alternative"`}
                                              id="message"
                                              type="textarea"
                                              rows="3"/>
                                       {this.renderErrorFor('message')}
                                       <div className="text-left">
                                           <button type="submit"
                                                   className="btn btn-info pull-right">Poster
                                           </button>
                                       </div>
                                   </Form>
                               </div>

                           </div>
                       }




                   </div>
               </div>

           </>
        )
    }

}

export default ProfileSiteAvisUser;
