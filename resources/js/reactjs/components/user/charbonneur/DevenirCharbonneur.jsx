import React, { Component } from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import {Link} from "react-router-dom";
import NavUserSIte from "../../inc/NavUserSIte";


class DevenirCharbonneur extends Component {
    constructor(props) {
        super(props);
        this.state = {
            //
        }

    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Devenir Charbonneur';
        document.title = `${composantTitle} | Kazoutech`;
    }

    render() {
        return (
            <>
                <div className="about-us">
                    <NavUserSIte />
                    <div className="wrapper">
                        <div className="section-shaped">
                            <div className="page-header page-header-mini header-filter">
                                <div className="page-header-image"
                                     style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/georgie.jpg' + ")"}}/>
                                <div className="container">
                                    <div className="header-body text-center mb-7">
                                        <div className="row justify-content-center">
                                            <div className="col-xl-5 col-lg-6 col-md-8 px-5">
                                                <h2 className="text-white">Créez votre compte</h2>
                                                <p className="text-lead text-white">Le jobbing à votre porter dévenez charbonneur</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="main main-raised">
                            <div className="container bg-white card mb-0">
                                <div className="row">
                                    <div className="col-md-10 mx-auto">
                                        <div className="section">
                                            <div className="tab-content">
                                                <div className="tab-pane active" id="link1">
                                                    <div>
                                                        <header>
                                                            <h3 className="text-uppercase text-center">Information Generale</h3>
                                                        </header>
                                                        <br/><br/>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels" htmlFor="#firstName">Nom</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="nom" name="nom"
                                                                               className="form-control" type="text"
                                                                               value="Charlie" required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels" htmlFor="prénom">Prénom</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="prénom" name="prénom"
                                                                               className="form-control" type="text"
                                                                               value="Bailey" required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels">Sex</label>
                                                                </div>
                                                                <div className="col-md-4 align-self-center">
                                                                    <div className="form-group">
                                                                        <select className="form-control" data-trigger
                                                                                name="choices-single-default"
                                                                                id="choices-single-default">
                                                                            <option value="2">Male</option>
                                                                            <option value="3">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels">Date de naiscançe</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="row">
                                                                        <div className="col-md-4 align-self-center">
                                                                            <div className="form-group">
                                                                                <select className="form-control"
                                                                                        data-trigger
                                                                                        name="choices-single-default"
                                                                                        id="choices-single-default">
                                                                                    <option>January</option>
                                                                                    <option>February</option>
                                                                                    <option>March</option>
                                                                                    <option selected="selected">April
                                                                                    </option>
                                                                                    <option>May</option>
                                                                                    <option>June</option>
                                                                                    <option>July</option>
                                                                                    <option>August</option>
                                                                                    <option>September</option>
                                                                                    <option>October</option>
                                                                                    <option>November</option>
                                                                                    <option>December</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div className="col-md-4">
                                                                            <div className="form-group">
                                                                                <select className="form-control"
                                                                                        data-trigger
                                                                                        name="choices-single-default"
                                                                                        id="choices-single-default">
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                    <option>6</option>
                                                                                    <option>7</option>
                                                                                    <option>8</option>
                                                                                    <option>9</option>
                                                                                    <option>10</option>
                                                                                    <option selected="selected">11
                                                                                    </option>
                                                                                    <option>12</option>
                                                                                    <option>13</option>
                                                                                    <option>14</option>
                                                                                    <option>15</option>
                                                                                    <option>16</option>
                                                                                    <option>17</option>
                                                                                    <option>18</option>
                                                                                    <option>19</option>
                                                                                    <option>20</option>
                                                                                    <option>21</option>
                                                                                    <option>22</option>
                                                                                    <option>23</option>
                                                                                    <option>24</option>
                                                                                    <option>25</option>
                                                                                    <option>26</option>
                                                                                    <option>27</option>
                                                                                    <option>28</option>
                                                                                    <option>29</option>
                                                                                    <option>30</option>
                                                                                    <option>31</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div className="col-md-4">
                                                                            <div className="form-group">
                                                                                <select className="form-control"
                                                                                        data-trigger
                                                                                        name="choices-single-default"
                                                                                        id="choices-single-default">
                                                                                    <option>1986</option>
                                                                                    <option>1987</option>
                                                                                    <option>1988</option>
                                                                                    <option selected="selected">1989
                                                                                    </option>
                                                                                    <option>1990</option>
                                                                                    <option>1991</option>
                                                                                    <option>1992</option>
                                                                                    <option>1993</option>
                                                                                    <option>1994</option>
                                                                                    <option>1995</option>
                                                                                    <option>1996</option>
                                                                                    <option>1997</option>
                                                                                    <option>1998</option>
                                                                                    <option>1999</option>
                                                                                    <option>2000</option>
                                                                                    <option>2001</option>
                                                                                    <option>2002</option>
                                                                                    <option>2003</option>
                                                                                    <option>2004</option>
                                                                                    <option>2005</option>
                                                                                    <option>2006</option>
                                                                                    <option>2007</option>
                                                                                    <option>2008</option>
                                                                                    <option>2009</option>
                                                                                    <option>2010</option>
                                                                                    <option>2011</option>
                                                                                    <option>2012</option>
                                                                                    <option>2013</option>
                                                                                    <option>2014</option>
                                                                                    <option>2015</option>
                                                                                    <option>2016</option>
                                                                                    <option>2017</option>
                                                                                    <option>2018</option>
                                                                                    <option>2019</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels"
                                                                           htmlFor="#email">Email</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="email" name="email"
                                                                               className="form-control" type="email"
                                                                               value="charlie.bailey@example.com"
                                                                               required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels" htmlFor="#confirmEmail">Confirmer
                                                                        l'Email</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="confirmEmail" name="confirmEmail"
                                                                               className="form-control" type="email"
                                                                               value="charlie.bailey@example.com"
                                                                               required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels" htmlFor="#location">Ville</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="ville" name="ville"
                                                                               className="form-control" type="text"
                                                                               value="Sydney, A" required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels" htmlFor="#phone">Télefone</label>
                                                                </div>
                                                                <div className="col-md-4 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="phone" name="phone"
                                                                               className="form-control" type="tel"
                                                                               value="+40 745 031 200"
                                                                               required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels">Langue</label>
                                                                </div>
                                                                <div className="col-md-4 align-self-center">
                                                                    <div className="form-group">
                                                                        <select className="form-control" data-trigger
                                                                                name="choices-single-default"
                                                                                id="choices-single-default">
                                                                            <option selected>Français</option>
                                                                            <option value="2">English</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels">Aptitudes</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <input id="badges" type="text"
                                                                           value="maçonnerie,Charpenterie,Plomberie,Electricité"
                                                                           placeholder="+ Add"/>
                                                                </div>
                                                            </div>
                                                            <div className="row mt-5">
                                                                <div className="col-md-6">
                                                                    <button className="btn btn-primary"
                                                                            type="submit">Confirmer
                                                                    </button>
                                                                    <button className="btn btn-outline-primary"
                                                                            type="reset">Annuler
                                                                    </button>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="section features-1">
                            <div className="container">
                                <div className="row">
                                    <div className="col-md-8 mx-auto text-center">
                                        <h3 className="display-3">Comment et pourquoi dévenir charbonneur</h3>
                                        <p className="lead">En remplissant ce formulaire ci-dessus vous dévenez automtiquement un charbonneur chez nous et jouissez de beaucoups d'avantages.</p>
                                    </div>
                                </div>
                                <div className="row">
                                    <div className="col-md-4">
                                        <div className="info">
                                            <div
                                                className="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                                                <i className="ni ni-settings-gear-65"></i>
                                            </div>
                                            <h6 className="info-title text-uppercase text-primary">Enregister vous</h6>
                                            <p className="description opacity-8">Enregistrez-vous et créer votre profile charbonneur(euse) pour pouvoire profiter de nos services et vous faire de l'argent.</p>
                                            <Link to={'/register'} className="text-primary">Enregistrez vous
                                                <i className="ni ni-bold-right text-primary"></i>
                                            </Link>
                                        </div>
                                    </div>
                                    <div className="col-md-4">
                                        <div className="info">
                                            <div
                                                className="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                                                <i className="ni ni-atom"></i>
                                            </div>
                                            <h6 className="info-title text-uppercase text-success">Identifiez vous</h6>
                                            <p className="description opacity-8">Pour vous fair identifier et signer votre contrat de charbonneur, passer a nos locaux qaund vous voulais ne vous inquieter pas cela ne prend que quelques minutes.</p>
                                            <Link to={'/contacts'} className="text-primary">En savoir plus
                                                <i className="ni ni-bold-right text-primary"></i>
                                            </Link>
                                        </div>
                                    </div>
                                    <div className="col-md-4">
                                        <div className="info">
                                            <div
                                                className="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                                                <i className="ni ni-world"></i>
                                            </div>
                                            <h6 className="info-title text-uppercase text-warning">Dévenez charbonneur</h6>
                                            <p className="description opacity-8">En créant votre profile et vous faisant identifier remplissez enfin le formulaire ci-dessus pour definitivement faire partir de la communauté .</p>
                                            <Link to={'/devenez_charbonneur'} className="text-primary">Dévenez charbonneur
                                                <i className="ni ni-bold-right text-primary"></i>
                                            </Link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="section features-2">
                            <div className="container">
                                <div className="row align-items-center">
                                    <div className="col-lg-4 col-md-8 mr-auto text-left">
                                        <div className="pr-md-5">
                                            <div
                                                className="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle mb-5">
                                                <i className="ni ni-favourite-28"></i>
                                            </div>
                                            <h3>Vous décider</h3>
                                            <p>Chez kazoutech vous etes votre propre patron vous travailler avec qui vous voulez et come vous voulez surtout sélon vos tariff sans oublier que le client est roi.</p>
                                            <ul className="list-unstyled mt-5">
                                                <li className="py-2">
                                                    <div className="d-flex align-items-center">
                                                        <div>
                                                            <div className="badge badge-circle badge-primary mr-3">
                                                                <i className="ni ni-settings-gear-65"></i>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <h6 className="mb-0">Travaillez a votre guise</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li className="py-2">
                                                    <div className="d-flex align-items-center">
                                                        <div>
                                                            <div className="badge badge-circle badge-primary mr-3">
                                                                <i className="ni ni-html5"></i>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <h6 className="mb-0">Affutez vos competences</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li className="py-2">
                                                    <div className="d-flex align-items-center">
                                                        <div>
                                                            <div className="badge badge-circle badge-primary mr-3">
                                                                <i className="ni ni-satisfied"></i>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <h6 className="mb-0">Augmentez vos réveneu</h6>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div className="col-lg-7 col-md-12 pl-md-0">
                                        <div className="row">
                                            <div className="col-lg-4 col-md-4">
                                                <div className="info text-left bg-info shadow">
                                                    <div
                                                        className="icon icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                                        <i className="ni ni-satisfied text-info"></i>
                                                    </div>
                                                    <h5 className="info-title text-white">Argent</h5>
                                                    <p className="description">Chez kazoutech vous décider vous meme de votre salaire sélon le travail.</p>
                                                </div>
                                            </div>
                                            <div className="col-lg-4 col-md-4">
                                                <div className="info text-left bg-danger info-raised shadow">
                                                    <div
                                                        className="icon icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                                        <i className="ni ni-palette text-danger"></i>
                                                    </div>
                                                    <h5 className="info-title text-white">Creativité</h5>
                                                    <p className="description">Vous gagnez en creativité et prenez cnfiance chaque fois que vous rélever un défi.</p>
                                                </div>
                                            </div>
                                            <div className="col-lg-4 col-md-4">
                                                <div className="info text-left bg-default shadow">
                                                    <div
                                                        className="icon icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                                        <i className="ni ni-spaceship text-default"></i>
                                                    </div>
                                                    <h5 className="info-title text-white">Competences</h5>
                                                    <p className="description">Vous gagner en competences et experience en travaillant chaque fois et partout sur le territoire.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-lg-4 col-md-4">
                                                <div className="info text-left bg-primary shadow">
                                                    <div
                                                        className="icon icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                                        <i className="ni ni-planet text-primary"></i>
                                                    </div>
                                                    <h5 className="info-title text-white">Temp</h5>
                                                    <p className="description">Vous gagnez en temp des demandeur de services vous contacte directement n'importe ou sur le territoire</p>
                                                </div>
                                            </div>
                                            <div className="col-lg-4 col-md-4">
                                                <div className="info text-left bg-warning info-raised shadow">
                                                    <div
                                                        className="icon icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                                        <i className="ni ni-glasses-2 text-warning"></i>
                                                    </div>
                                                    <h5 className="info-title text-white">Notorieté</h5>
                                                    <p className="description">Vous gagner en notorieté en travaillant pour plusieur personne et faite valoire vos competences.</p>
                                                </div>
                                            </div>
                                            <div className="col-lg-4 col-md-4">
                                                <div className="info text-left bg-success shadow">
                                                    <div
                                                        className="icon icon-shape bg-gradient-white shadow rounded-circle text-primary">
                                                        <i className="ni ni-notification-70 text-success"></i>
                                                    </div>
                                                    <h5 className="info-title text-white">Career</h5>
                                                    <p className="description">Vous avez l'opportunité de faire career et gagner dignement votre vie.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <FooterUserSite/>
                    </div>
                </div>
            </>
        )
    }
}


export default DevenirCharbonneur;
