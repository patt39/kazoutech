import React, { Component } from "react";
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";

class ContactUserSite extends Component {
    constructor(props) {
        super(props);
        this.state = {
            contacts: [],
        }
    }

    loadItems() {
       //
    }

    // lifecycle method
    componentDidMount() {
        this.loadItems();
        const composantTitle = 'Contacts | Kazoutech';
        document.title = `${composantTitle}`;
    }
    render() {
        return (
            <>
                <NavUserSIte />
                <div className="landing-page">
                    <div className="wrapper">
                       <div className="page-header page-header-small header-filter">
                            <div className="page-header-image" style={{ backgroundImage: "url(" + '/assets/vendor_site/img/pages/photo-15.jpg' + ")" }}/>
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto text-center">
                                        <h3 className="display-2 text-white">Contactez nous ici</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div> 
                     <div className="main">
                        <div className="container-fluid">
                            <div className="row mt-5 mb-4 pt-5">
                                <div className="col-md-8 ml-auto mr-auto text-center mt-5">
                                    <span className="badge badge-info">Laissez un message</span>
                                    <h1 className="title">Dites nous tout à propos de <b>vous</b></h1>
                                    <h4 className="desc">Si vous avez des questions ou  just saluez nous somme toujous a votre disposition.</h4>
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-md-6 mx-auto ">
                                    <form role="form" className="card  p-3" id="contact-form"
                                        method="POST" action="" acceptCharset="UTF-8">
                                        <div className="card-body">
                                            <div className="row">
                                                <div className="col-md-6">
                                                    <div className="form-group">
                                                        <label>Nom<span style={{color: "red"}}>*</span></label>
                                                        <div className="input-group input-group-alternative">
                                                            <div className="input-group-prepend">
                                                                <span className="input-group-text"><i className="ni ni-circle-08"></i></span>
                                                            </div>
                                                            <input type="text" className="form-control" v-model="form.first_name" placeholder="Votre nom..." aria-label="First Name..."/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-md-6">
                                                    <div className="form-group">
                                                        <label>Prénom<span style={{color: "red"}}>*</span></label>
                                                        <div className="input-group input-group-alternative">
                                                            <div className="input-group-prepend">
                                                                <span className="input-group-text"><i className="ni ni-tag"></i></span>
                                                            </div>
                                                            <input type="text" className="form-control" v-model="form.last_name" placeholder="Prénom..." aria-label="Last Name..."/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label>Addresse émail<span style={{color: "red"}}>*</span></label>
                                                <div className="input-group input-group-alternative">
                                                    <div className="input-group-prepend">
                                                        <span className="input-group-text"><i className="ni ni-email-83"></i></span>
                                                    </div>
                                                    <input type="email" className="form-control" v-model="form.email"  placeholder="Email..."/>
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label>Subject<span style={{color: "red"}}>*</span></label>
                                                <div className="input-group input-group-alternative">
                                                    <div className="input-group-prepend">
                                                        <span className="input-group-text"><i className="ni ni-email-83"></i></span>
                                                    </div>
                                                    <input type="text" className="form-control" placeholder="Object..." v-model="form.subject"/>
                                                </div>
                                            </div>
                                            <div className="form-group">
                                                <label>Votre message<span style={{color: "red"}}>*</span></label>
                                                <textarea name="message" v-model="form.message"  className="form-control form-control-alternative" id="message" rows="6"></textarea>
                                            <div className="row">
                                                <div className="col-md-6 ml-auto">
                                                    <button type="submit" className="btn btn-primary pull-right">Envoyer</button>
                                                </div>
                                            </div>
                                        </div>
                                     </div>   
                                  </form> 
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div className="container">
                        <div className="row">
                            <div className="col-lg-3 col-md-6 col-6">
                                <div className="info info-hover">
                                    <div className="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                        <i className="ni ni-square-pin"></i>
                                    </div>
                                    <h4 className="info-title">Addresse</h4>
                                    <p className="description px-0">12124 First Street, nr 54</p>
                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6 col-6">
                                <div className="info info-hover">
                                    <div className="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                        <i className="ni ni-email-83"></i>
                                    </div>
                                    <h4 className="info-title">Email</h4>
                                    <p className="description px-0">hello@email.com</p>
                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6 col-6">
                                <div className="info info-hover">
                                    <div className="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                        <i className="ni ni-mobile-button"></i>
                                    </div>
                                    <h4 className="info-title">Phone</h4>
                                    <p className="description px-0">+1(424) 535 3523</p>
                                </div>
                            </div>
                            <div className="col-lg-3 col-md-6 col-6">
                                <div className="info info-hover">
                                    <div className="icon icon-shape icon-shape-primary icon-lg shadow rounded-circle text-primary">
                                        <i className="ni ni-circle-08"></i>
                                    </div>
                                    <h4 className="info-title">Contact</h4>
                                    <p className="description px-0">Andrew Samian</p>
                                </div>
                            </div>
                        </div>
                    </div>    
                <FooterUserSite />
                </div>
            </>
        )
    }
}
export default ContactUserSite;
