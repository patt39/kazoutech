import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";

require("moment/min/locales.min");
moment.locale('fr');

class AnnonceSiteShow extends Component {
    constructor(props) {
        super(props);
        this.state = {
            annonce:{
                user:[],
                occupation:[]
            }
        }
    }

    componentDidMount() {
        let SlugItem = this.props.match.params.annonce;
        let SlugOccupation = this.props.match.params.occupation;
        let url = route('api_annonce_site.view',[SlugOccupation,SlugItem]);
        dyaxios.get(url).then(response => this.setState({annonce: response.data,}));
    }

    render() {
        const {annonce} = this.state;
        const composantTitle = `${annonce.title}`;
        document.title = `${composantTitle} | Kazoutech`;
        return(

            <div className="landing-page">
                <NavUserSIte/>
                <div className="wrapper">
                    <br/>
                    <br/>
                    <div className="row mt-4 mb-3">
                        <div className="col-md-2 text-center">
                            <div className="mb-2">
                                <div className="img-user img-80">
                                    <svg aria-hidden="true" aria-label="Profil par défaut"
                                         className="d-inline-block align-middle" height="80" role="img" version="1.1"
                                         viewBox="0 0 200 200" width="80">
                                        <path
                                            d="M128.13 126.08c-15.05-3.47-19.07-11.5-12.28-24.3C136 67.17 121.33 42 99.5 42c-22.23 0-36.8 25.2-16.33 59.77 7 12.87 2.45 20.9-12.28 24.3-15 3.48-23.9 12.64-23.9 20.8 0 8.18 26.22 11.2 52.3 11.2 26.44 0 52.72-3 52.72-11.2 0-8.17-8.84-17.32-23.9-20.8z"
                                            fill="#737E8C" fill-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <p className="font-size-4" itemProp="seller"><a className="text-dark"
                                                                            href="/client/caroline-longjumeau-704111">Caroline</a>
                            </p></div>
                        <div className="col-md-6"><h1 className="show-job-title mb-0" itemProp="name">Couper un arbre à
                            Longjumeau</h1><p className="text-danger"><i className="far fa-times-circle fa-lg"></i>
                            <span className="font-weight-medium">Job clôturé</span></p><h2
                            className="h4 show-category-title mt-2">Jardinage — <a href="/services/jardinage">Besoin
                            d'un service similaire ?</a></h2><p className="item-job-digest"><span
                            itemProp="availableAtOrFrom"><i className="far fa-map-marker-alt"></i> <strong>91160 Longjumeau</strong></span>
                        </p><p className="item-job-digest"><i className="far fa-calendar-day"></i> <strong>Samedi 28
                            décembre 2019 de 9:00 à 13:00</strong> <small>(dans 9 jours)</small></p><p
                            className="item-job-digest"><i className="far fa-stopwatch"></i> <strong>4 h de
                            service</strong></p><p className="item-job-digest"><i className="far fa-user"></i> <strong>Aucun
                            jobeur n'a proposé ses services</strong></p></div>
                        <div className="col-md-4">
                            <div className="mb-3 text-center"><p
                                className="mb-2 font-size-4 text-muted">Rémunération</p>
                                <div className="d-flex align-items-center justify-content-center">
                                    <div className="price-tag price-tag-md" itemProp="priceSpecification">
                                        <div className="price-content">
                                            <div className="price"><span>68,00</span> <span>€</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a className="btn btn-lg btn-blue btn-block" href="/devenez-jobeur">Proposer mes
                                services</a></div>
                    </div>
                    <br/>
                    <div className="container">
                        <div className="row">
                            <div className="col-md-10 ml-auto mr-auto">
                                <h6 className="category"><b>{moment(annonce.created_at).format('LL')}</b></h6>
                                <h3 className="title">{annonce.title}</h3>
                                <p dangerouslySetInnerHTML={{__html: (annonce.body)}}/>
                            </div>
                        </div>





                        <div className="text-center">
                            <h4 className="title">Ces postes peuvent vous interesser </h4>
                        </div>
                        <div className="row">


                        </div>

                        <div className="text-center">
                            <Link to={`/blog/${annonce.occupation.slug}/`}
                                  className="btn btn-outline-info">Voir plus d'articles ici
                            </Link>
                        </div>
                        <br/>



                    </div>
                    <FooterUserSite/>
                </div>
            </div>
        )
    }

}
export default AnnonceSiteShow;
