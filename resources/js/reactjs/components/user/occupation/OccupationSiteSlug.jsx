import React, {Component} from "react";
import {Link} from "react-router-dom";
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";
import OccupationHeader from "./OccupationHeader";
import CitySite from "../city/CitySite";


class OccupationSiteSlug extends Component {

    constructor(props) {
        super(props);
        this.state = {
            occupation: {categoryoccupations: [], blogs: [],blogbyoccupations: []},
        }
    }

    // lifecycle method
    componentDidMount() {
        let itemOccupation = this.props.match.params.occupation;
        let url = route('occupations.view', itemOccupation);
        dyaxios.get(url).then(response => this.setState({occupation: response.data,}));
    }

    render() {
        const {occupation} = this.state;
        const occupationCategories = occupation.categoryoccupations;
        const allblogbyoccupations = occupation.blogbyoccupations;
        const composantTitle = `${occupation.name}`;
        document.title = `${composantTitle} | Kazoutech`;

        return (
            <>
                <div className="landing-page">
                    <NavUserSIte/>
                    <div className="wrapper">
                        <OccupationHeader {...occupation}/>
                        <div className="cd-section" id="accordion">
                            <div className="accordion-1">
                                <div className="container">
                                    <div className={'row'}>
                                        <div className="container text-center">
                                            <div className="row mb-5">
                                                <div className="col-md-8 mx-auto mt-5">
                                                    <h3 className="display-3">Choisissez votre catègorie en quelques clicks parmis nos offres</h3>
                                                </div>
                                            </div>
                                            {occupationCategories.length > 0
                                                ?
                                                <div className="row align-items-center">
                                                    {occupationCategories.map((item) => (
                                                        <div key={item.id} className="col-lg-4">
                                                            <div className="card card-background"
                                                                 style={{backgroundImage: "url(" + item.photo + ")"}}>
                                                                <div className="card-body text-center">
                                                                    <Link
                                                                        to={`/occupations/${occupation.slug}/${item.slug}/`}>
                                                                        <h2 className="card-title">{item.name}</h2>
                                                                    </Link>
                                                                    <Link
                                                                        to={`/occupations/${occupation.slug}/${item.slug}/`}
                                                                        className={`btn btn-sm btn-${item.color.name}`}>
                                                                        En savoir plus
                                                                    </Link>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    ))}
                                                </div>
                                                :
                                                <div className="row align-items-center">
                                                    <div className="col-md-10 mr-auto ml-auto text-center">
                                                        <div className="kazouTechOccupationEmpty">
                                                            <i className="ni ni-settings text-red"></i>
                                                        </div>
                                                        <div className="mt-5 mb-5">
                                                            <h2>Les offres pour la catégorie <span className="display-3">{composantTitle}</span> ne sont pas disponible pour le moment.</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            }
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="section features-7 bg-secondary">
                            <div className="container">
                                <div className="row justify-content-center">
                                    <div className="col-lg-12">
                                        <div className="container">
                                            <div className="row">
                                                <div className="col-md-8 mr-auto ml-auto text-center">
                                                    <h4 className="kazouTech-red-color display-3 mb-5">Nous sommes plus proche de
                                                        vous !</h4>
                                                </div>
                                            </div>
                                            <CitySite/>
                                            <br/>
                                            {allblogbyoccupations.length > 0 && (
                                                <div className="row">
                                                    <div className="col-md-12 mx-auto">
                                                        <h4 className="title">Tous nos articles
                                                            sur <strong>{occupation.name} </strong> sont sur
                                                            notre
                                                            blog</h4>
                                                        <br/>
                                                        <div className="row">
                                                            {allblogbyoccupations.map((item) => (
                                                                <div className="col-lg-4 col-md-6">
                                                                    <div className="card card-blog card-plain">
                                                                        <div className="card-image shadow">
                                                                            <Link to={`/blog/${occupation.slug}/${item.slug}/`}>
                                                                                <img className="img rounded"
                                                                                     src={item.photo}/>
                                                                            </Link>
                                                                        </div>
                                                                        <div className="card-body">
                                                                            <div className="text-center">
                                                                                <Link to={`/blog/${occupation.slug}/`} className={`btn btn-sm btn-${item.color.name}`}>
                                                                                    {occupation.name}
                                                                                </Link>
                                                                            </div>
                                                                            <h6 className="card-title">
                                                                                <Link to={`/blog/${occupation.slug}/`} >{item.title}</Link>
                                                                            </h6>
                                                                            <p className="card-description">
                                                                                <b dangerouslySetInnerHTML={{__html: (item.body.length > 164 ? item.body.substring(0, 164) + "..." : item.body)}}/>
                                                                                <Link to={`/blog/${occupation.slug}/${item.slug}/`} >lire la suite</Link>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ))}
                                                        </div>
                                                    </div>
                                                </div>
                                            )}
                                            <div className="row">
                                                <div className="col-md-12">
                                                    <div className={'card-description'}
                                                         dangerouslySetInnerHTML={{__html: occupation.description}}/>
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
            </>
        )
    }
}

export default OccupationSiteSlug;
