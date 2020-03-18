import React, { Component } from "react";
import { Link } from "react-router-dom";
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";
import OccupationHeader from "./OccupationHeader";
import CitySite from "../city/CitySite";
import OccupationListSkeleton from "../../inc/OccupationListSkeleton";
import FaqUserList from "../faq/FaqUserList";


class OccupationSiteSlug extends Component {

    constructor(props) {
        super(props);
        this.state = {
            occupation: { categoryoccupations: [], blogs: [], faqoccupations: [] },
            visiable: 10,
        };

        this.loadmoresItem = this.loadmoresItem.bind(this);
    }

    loadmoresItem() {
        this.setState((old) => {
            return { visiable: old.visiable + 6 }
        })
    }
    // lifecycle method
    componentDidMount() {
        let itemOccupation = this.props.match.params.occupation;
        let url = route('occupations.view', itemOccupation);
        dyaxios.get(url).then(response => this.setState({ occupation: response.data, }));
    }

    render() {
        const { occupation, visiable } = this.state;
        const occupationCategories = occupation.categoryoccupations;
        const allblogbyoccupations = occupation.blogs;
        const faqbyoccupations = occupation.faqoccupations;
        const composantTitle = `${occupation.name || "kazoutech"}`;
        document.title = `${composantTitle} | Kazoutech`;

        return (
            <>
                <div className="landing-page">
                    <NavUserSIte />
                    <div className="wrapper">

                        <OccupationHeader {...this.props} {...occupation} />

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
                                            <div className="row align-items-center">
                                                {occupationCategories.length ?
                                                    <>
                                                        {occupationCategories.map((item) => (
                                                            <div key={item.id} className="col-lg-4 mx-auto">
                                                                <div className="card card-blog card-background" data-animation="zooming">
                                                                    <div className="full-background" style={{ backgroundImage: "url(" + item.photo + ")" }} />
                                                                    <Link to={`/occupations/${occupation.slug}/${item.slug}/`}>
                                                                        <div className="card-body">
                                                                            <div className="content-top">
                                                                                <h5 className="card-title"><span className="count-annonces">{item.annonces_count}</span> {(item.annonces_count > 1) ? 'Annonces' : 'Annonce'}</h5>
                                                                            </div>
                                                                            <div className="content-bottom">
                                                                                <h5 className="card-title text-uppercase">{item.name}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </Link>
                                                                </div>
                                                            </div>
                                                        ))}
                                                    </>
                                                    : <OccupationListSkeleton />}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="bg-secondary">
                            <div className="container">
                                <div className="row justify-content-center">
                                    <div className="col-lg-12">
                                        <div className="container">
                                            <div className="row">
                                                <div className="col-md-8 mr-auto ml-auto text-center">
                                                    <h4 className="kazouTech-red-color display-3 kazouTechOccupations-wrapper">Nous sommes plus proche de
                                                    vous !</h4>
                                                </div>
                                            </div>
                                            <CitySite />
                                            {allblogbyoccupations.length > 0 && (
                                                <div className="row">
                                                    <div className="col-md-12 mx-auto">
                                                        <h4 className="title kazouTechOccupations-wrapper">Tous nos articles
                                                        sur <strong>{occupation.name} </strong> sont sur
                                                        notre
                                                        blog</h4>
                                                        <br />
                                                        <div className="row">
                                                            {allblogbyoccupations.map((item) => (
                                                                <div key={item.id} className="col-lg-4 col-md-6">
                                                                    <div className="card card-blog card-plain">
                                                                        <div className="card-image shadow">
                                                                            <Link to={`/blog/${occupation.slug}/${item.slug}/`}>
                                                                                <img className="img rounded"
                                                                                    src={item.photo} />
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
                                                                            {item.body ?
                                                                                <p className="card-description">
                                                                                    <b dangerouslySetInnerHTML={{ __html: (item.body.length > 164 ? item.body.substring(0, 164) + "..." : item.body) }} />
                                                                                    <Link to={`/blog/${occupation.slug}/${item.slug}/`} >lire la suite</Link>
                                                                                </p> : null}

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            ))}
                                                        </div>
                                                    </div>
                                                </div>
                                            )}
                                            {faqbyoccupations.length > 0 && (
                                                <div className="row">
                                                    <div className="col-md-12 mx-auto text-center">
                                                        <h4 className="title">Bon à savoire
                                                        sur <strong>{occupation.name} </strong></h4>
                                                        <br />
                                                        <div className="cd-section" id="accordion">
                                                            <div className="accordion-1">
                                                                <div className="container">

                                                                    <div className={'row'}>
                                                                        <div className="col-md-12 ml-auto">
                                                                            <div className="accordion" id="accordionFaqs">
                                                                                {faqbyoccupations.slice(0, visiable).map((item) => (
                                                                                    <FaqUserList key={item.id} {...item} />
                                                                                ))}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    {visiable < faqbyoccupations.length && (
                                                                        <div className="row">
                                                                            <div className="col-md-3 mx-auto text-center">
                                                                                <button type="button" onClick={this.loadmoresItem} className="btn btn-primary">
                                                                                    <b>Voir plus </b>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    )}
                                                                    <br />
                                                                    <br />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            )}
                                        </div>
                                    </div>
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

export default OccupationSiteSlug;
