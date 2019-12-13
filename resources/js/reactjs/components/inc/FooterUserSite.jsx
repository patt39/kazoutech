import React, { Component } from "react";
import {Link} from 'react-router-dom';


class FooterUserSite extends Component {

    render() {

        return (
            <footer className="footer footer-big bg-gradient-default">
                <div className="container">
                    <div className="content">
                        <div className="row mb-5">
                            <div className="column mr-auto">
                                <img src="/assets/vendor_site/img/brand/blue.png" className="logo logo-sm" alt="" />
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-md-2">
                                <div className="column">
                                    <h4 className="mb-4">Presentation</h4>
                                    <ul className="links-vertical">
                                        <li>
                                            <Link to={'/about/'}>
                                                A propos de nous
                                            </Link>
                                        </li>
                                        <li>
                                            <a href="/concept/">
                                                Notre concept
                                        </a>
                                        </li>
                                        <li>
                                            <Link to={'/faqs/'}>
                                                Faq
                                            </Link>
                                        </li>
                                        <li>
                                            <Link to={'/contacts/'}>
                                                Contact
                                            </Link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div className="col-md-2">
                                <div className="column">
                                    <h4 className="mb-4">Services</h4>
                                    <ul className="links-vertical">
                                        <li>
                                        <Link to={'/occupations'}>
                                                Nos categorie
                                        </Link>
                                        </li>
                                        <li>
                                            <a href="..">
                                                Media Kit
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div className="col-md-3">
                                <div className="column">
                                    <h4 className="mb-4">Informations</h4>
                                    <ul className="links-vertical">
                                        <li>
                                            <a href="/">
                                                Licence
                                </a>
                                        </li>
                                        <li>
                                            <a href="/">
                                                Terme et Condition
                                </a>
                                        </li>
                                        <li>
                                            <a href="/">
                                                Politique de confidentialite
                                </a>
                                        </li>
                                        <li>
                                            <a href="/">
                                                Legale notice
                                </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div className="col-md-5">
                                <div className="column">
                                    <h4 className="mb-4">Newsletter</h4>
                                    <ul className="links-vertical">
                                        <p>We handpicked the most interesting content for you. No spam. It takes one click to unsubscribe. Give
                                it a try!</p>
                                        <form method="" action="">
                                            <div className="row">
                                                <div className="col-sm-8">
                                                    <div className="form-group">
                                                        <div className="input-group mb-4">
                                                            <div className="input-group-prepend">
                                                            <span className="input-group-text">
                                                                <i className="ni ni-email-83" /></span>
                                                            </div>
                                                            <input className="form-control" placeholder="votre Email..."
                                                                   type="text" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="col-sm-4">
                                                    <button type="button" className="btn btn-primary btn-block">souscrivez
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr className="bg-white opacity-3" />
                    <div className="col-md-3 mx-auto">
                        <button type="button" className="btn-icon-only rounded-circle btn btn-facebook">
                            <span className="btn-inner--icon">
                                <i className="fab fa-facebook"></i>
                            </span>
                        </button>
                        <button type="button" className="btn-icon-only rounded-circle btn btn-twitter">
                            <span className="btn-inner--icon">
                                <i className="fab fa-twitter"></i>
                            </span>
                        </button>
                        <button type="button" className="btn-instagram btn-icon-only rounded-circle btn">
                            <span className="btn-inner--icon">
                                <i className="fab fa-instagram"></i>
                            </span>
                       </button>
                        <button type="button" className="btn-icon-only rounded-circle btn btn-pinterest">
                            <span className="btn-inner--icon">
                                <i className="fab fa-pinterest"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div className="copyright d-flex justify-content-center mt-4 mr-40">
                    Copyright &copy; {1900 + new Date().getYear()}, Designed by{" "}. Realized by 
             <a href="/" className="title-red pl-2" style={{color: "red"}}> KazouGroup srl</a>
                </div>
            </footer>
        )
    }
}
export default FooterUserSite;
