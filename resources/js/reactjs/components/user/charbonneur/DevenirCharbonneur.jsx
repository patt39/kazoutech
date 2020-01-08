import React, { Component } from "react";
import FooterUserSite from "../../inc/FooterUserSite";
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
                            </div>
                        </div>
                        <div className="main main-raised">
                            <div className="container bg-white card mb-0">
                                <div className="row">
                                    <div className="col-md-3">
                                        <div className="section">
                                            <section className="text-center">
                                                <h4 className="title mt-4">En remplissant ce formulaire vous dévenez un charbonneur
                                                sur la plateforme et vous acceptez aussi nos terme et conditions n'ayez crainte vos informtions sonts
                                                proteger sur notre site selon notre principe de confidentialité</h4>
                                            </section>
                                            <br/>
                                        </div>
                                    </div>
                                    <div className="col-md-8 ml-auto">
                                        <div className="section">
                                            <div className="tab-content">
                                                <div className="tab-pane active" id="link1">
                                                    <div>
                                                        <header>
                                                            <h2 className="text-uppercase">Créer votre compte</h2>
                                                        </header>
                                                        <hr className="line-primary"/><br/>
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
