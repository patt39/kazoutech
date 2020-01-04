import React, { Component } from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";


class DevenirCharbonneur extends Component {
    constructor() {
        super();

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
                    <div class="wrapper">
                        <div className="section-shaped my-0 skew-separator skew-mini">
                            <div className="page-header page-header-small header-filter">
                                <div className="page-header-image" style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}>
                                </div>
                                <div className="container">
                                    <div className="header-body text-center mb-7">
                                        <div className="row justify-content-center">
                                            <div className="col-xl-5 col-lg-6 col-md-8 px-5">
                                                <h1 className="text-white">Your account</h1>
                                                <p className="text-lead text-white">That’s the main thing people are controlled by! Thoughts - their perception of themselves!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="bg-secondary">
                            <div className="container bg-white card mb-0">
                                <div className="row">
                                    <div className="col-md-3">
                                        <div className="section">
                                            <section className="text-center">
                                                <div className="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div className="fileinput-new thumbnail img-circle img-raised">
                                                        <img src="../assets/img/placeholder.jpg" alt="..."/>
                                                    </div>
                                                    <div className="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                    <div>
                                                        <span className="btn btn-raised btn-round btn-primary btn-file btn-sm mx-auto mt-3">
                                                        <span className="fileinput-new">Add Photo</span>
                                                        <span className="fileinput-exists">Change</span>
                                                        <input type="file" name="..."/></span>
                                                        <br/>
                                                            <a href="#pablo" className="btn btn-danger btn-round fileinput-exists btn-simple btn-sm" data-dismiss="fileinput"><i className="tim-icons icon-simple-remove"></i> Remove</a>
                                                    </div>
                                                </div>
                                                <h3 className="title mt-4">Charlie Bailey</h3>
                                            </section>
                                            <br></br>
                                                <div>
                                                    <div className="progress-container progress-primary">
                                                        <span className="progress-badge">Profile Completion</span>
                                                        <div className="progress-wrapper">
                                                            <div className="progress-info">
                                                                <div className="progress-percentage">
                                                                    <span className="text-primary">80%</span>
                                                                </div>
                                                            </div>
                                                            <div className="progress">
                                                                <div className="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div className="col-md-8 ml-auto">
                                        <div className="section">
                                            <div className="tab-content">
                                                <div className="tab-pane active" id="link1">
                                                    <div>
                                                        <header>
                                                            <h2 className="text-uppercase">General information</h2>
                                                        </header>
                                                        <hr className="line-primary"/><br/>
                                                        <form>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels" htmlFor="#firstName">First Name</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="firstName" name="firstName" className="form-control" type="text" value="Charlie" required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels" htmlFor="#lastName">Last Name</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="lastName" name="lastName" className="form-control" type="text" value="Bailey" required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels">I’m</label>
                                                                </div>
                                                                <div className="col-md-4 align-self-center">
                                                                    <div className="form-group">
                                                                        <select className="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                                            <option value="2">Male</option>
                                                                            <option value="3">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels">Birth Date</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="row">
                                                                        <div className="col-md-4 align-self-center">
                                                                            <div className="form-group">
                                                                                <select className="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                                                    <option>January</option>
                                                                                    <option>February</option>
                                                                                    <option>March</option>
                                                                                    <option selected="selected">April</option>
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
                                                                                <select className="form-control" data-trigger name="choices-single-default" id="choices-single-default">
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
                                                                                    <option selected="selected">11</option>
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
                                                                                <select className="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                                                    <option>1986</option>
                                                                                    <option>1987</option>
                                                                                    <option>1988</option>
                                                                                    <option selected="selected">1989</option>
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
                                                                    <label className="labels" htmlFor="#email">Email</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="email" name="email" className="form-control" type="email" value="charlie.bailey@example.com" required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels" htmlFor="#confirmEmail">Confirm Email</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="confirmEmail" name="confirmEmail" className="form-control" type="email" value="charlie.bailey@example.com" required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels" htmlFor="#location">Your Location</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="location" name="location" className="form-control" type="text" value="Sydney, A" required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels" htmlFor="#phone">Phone Number</label>
                                                                </div>
                                                                <div className="col-md-4 align-self-center">
                                                                    <div className="form-group">
                                                                        <input id="phone" name="phone" className="form-control" type="tel" value="+40 745 031 200" required="required"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels">Language</label>
                                                                </div>
                                                                <div className="col-md-4 align-self-center">
                                                                    <div className="form-group">
                                                                        <select className="form-control" data-trigger name="choices-single-default" id="choices-single-default">
                                                                            <option selected>English</option>
                                                                            <option value="2">French</option>
                                                                            <option value="3">Spanish</option>
                                                                            <option value="4">Deutsche</option>
                                                                            <option value="4">Russian</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div className="row">
                                                                <div className="col-md-3 align-self-center">
                                                                    <label className="labels">Skills</label>
                                                                </div>
                                                                <div className="col-md-9 align-self-center">
                                                                    <input id="badges" type="text" value="VueJs,Angular,Laravel,React" placeholder="+ Add"/>
                                                                </div>
                                                            </div>
                                                            <div className="row mt-5">
                                                                <div className="col-md-6">
                                                                    <button className="btn btn-primary" type="submit">Save Changes</button>
                                                                    <button className="btn btn-outline-primary" type="reset">Cancel</button>
                                                                </div>
                                                            </div>
                                                         </form>
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <FooterUserSite/>
                    </div>
                </div>
            </>
        )
    }
}

export default DevenirCharbonneur;
