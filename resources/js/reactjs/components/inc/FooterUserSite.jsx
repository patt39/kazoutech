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
                                <img src=".." className="logo logo-sm" alt="Kazoutech" />
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-md-3">
                                <div className="column">
                                    <img src="/assets/vendor_site/img/brand/blue.png" className="logo" alt=""/>
                                </div>
                                <div className="btn-wrapper profile text-left mt-3">
                                    <a target="_blank" href="https://twitter.com/creativetim" className="btn btn-sm"
                                       data-toggle="tooltip" data-original-title="Follow us">
                                        <i className="fab fa-twitter"></i>
                                    </a>
                                    <a target="_blank" href="https://www.facebook.com/creativetim"
                                       className="btn btn-sm" data-toggle="tooltip" data-original-title="Like us">
                                        <i className="fab fa-facebook-square"></i>
                                    </a>
                                    <a target="_blank" href="https://dribbble.com/creativetim"
                                       className="btn btn-sm" data-toggle="tooltip" data-original-title="Follow us">
                                        <i className="fab fa-slack"></i>
                                    </a>
                                </div>
                            </div>
                            <div className="col-md-2 col-6">
                                <div className="column">
                                    <h4 className="mt-3">Company</h4>
                                    <ul>
                                        <li>
                                            <Link to={'/about/'}>
                                                A propos de nous
                                            </Link>
                                        </li>
                                        <li>
                                            <Link to={'/concept/'}>
                                                Notre concept
                                            </Link>
                                        </li>
                                        <li>
                                            <Link to={'/faqs/'}>
                                                FAQs
                                            </Link>
                                        </li>
                                        <li>
                                            <Link to={'/contacts/'}>
                                                Contacts
                                            </Link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div className="col-md-2 col-6">
                                <div className="column">
                                    <h4 className="mt-3">Services</h4>
                                    <ul>
                                        <li>
                                            <Link to={'/occupations/'}>
                                                Nos categorie
                                            </Link>
                                        </li>
                                        <li>
                                            <Link to={'/annonces/'}>
                                                Annonces
                                            </Link>
                                        </li>
                                        <li>
                                            <Link to={'/charbonneurs/'}>
                                                Charbonneurs
                                            </Link>
                                        </li>
                                        <li>
                                            <Link to={'/blog/'}>
                                                Blog
                                            </Link>
                                        </li>
                                        <li>
                                            <Link to={'/temoignages/'}>
                                                Temoignages
                                            </Link>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div className="col-md-3 col-6">
                                <div className="column">
                                    <h4 className="mt-3">Top Annonces</h4>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                Peinture intérieure
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Soudure Portails
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Menuisérie Meubles
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Mécanicien de voitures
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div className="col-md-2 col-6">
                                <div className="column">
                                    <h4 className="mt-3">Top Villes</h4>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                Douala
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Yaoundé
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Nkongsamba
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Kribi
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr className="kazouTech-divider"/>
                        <div className="row">
                            <div className="col-md-9">
                                <div className="column">
                                    <nav>
                                        <ul>
                                            <li className="d-inline-block">
                                                <div className="copyright d-flex justify-content-center">
                                                    Copyright &copy; { new Date().getFullYear()}, Realized by
                                                    <a href="/" className="pl-2 kazouTech-red-color"> KazouGroup Srl</a>
                                                </div>
                                            </li>
                                            <li className="d-inline-block">
                                                <Link to={'/condition_utilisation/'} className="nav-link">
                                                    Terms &amp; Conditions
                                                </Link>
                                            </li>
                                            <li className="d-inline-block">
                                                <Link to={'/confidentialité/'} className="nav-link">
                                                    Privacy Policy
                                                </Link>
                                            </li>
                                            <li className="d-inline-block">
                                                <Link to={'/notice_legale/'} target="_blank" className="nav-link">
                                                    Legal Notice
                                                </Link>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div className="col-md-3">
                                <div className="dropdown">
                                    Language:
                                    <div className="btn btn-link text-primary " href="#" role="button"
                                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i className="ni ni-chat-round"></i>
                                        <span>English</span>
                                    </div>
                                    <div className="dropdown-menu kazouTech-dropdown" x-placement="top-start">
                                        <a href="#" className="dropdown-item">
                                            <span>Deutch</span>
                                        </a>
                                        <a href="#" className="dropdown-item active">
                                            <span>English</span>
                                        </a>
                                        <a href="#" className="dropdown-item">
                                            <span>Español</span>
                                        </a>
                                        <a href="#" className="dropdown-item">
                                            <span>Français</span>
                                        </a>
                                        <a href="#" className="dropdown-item">
                                            <span>Italiano</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-md-12">
                                <div className="footer-description">
                                    Mastercard is a registered trademark and the circles design is a trademark of
                                    Mastercard International Incorporated. The Spendesk Prepaid Card/This card is
                                    issued by Transact Payments Limited pursuant to licence by Mastercard
                                    International Incorporated. The Spendesk accounts are issued by Transact
                                    Payments Limited. Transact Payments Limited is authorised and regulated by the
                                    Gibraltar Financial Services Commission.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        )
    }
}
export default FooterUserSite;
