import React, { Component } from "react";
import { Link } from "react-router-dom";
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";
import OccupationHeader from "./OccupationHeader";
import CitySite from "../city/CitySite";
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

    loadmoresItem(){
        this.setState((old) =>{
            return {visiable: old.visiable + 6}
        })
    }
    // lifecycle method
    componentDidMount() {
        let itemOccupation = this.props.match.params.occupation;
        let url = route('occupations.view', itemOccupation);
        dyaxios.get(url).then(response => this.setState({ occupation: response.data, }));
    }

    render() {
        const { occupation,visiable } = this.state;
        const occupationCategories = occupation.categoryoccupations;
        const allblogbyoccupations = occupation.blogs;
        const composantTitle = `${occupation.name || "kazoutech"}`;
        document.title = `${composantTitle} | Kazoutech`;

        return (
            <>
                <div className="landing-page">
<<<<<<< HEAD
                    <NavUserSIte />

=======
                    <NavUserSIte/>
>>>>>>> c910377f45339b1a8156e17c346a1455ae77422d
                    <div className="wrapper">

                        <OccupationHeader {...this.props} {...occupation} />

                        <div className="cd-section" id="accordion">
                            <div className="accordion-1">
                                <div className="container">
                                    <div className={'row'}>
                                        <div className="container text-center">
                                            <div className="row mb-5">
<<<<<<< HEAD
                                                <div className="col-md-8 mx-auto">
                                                    <h3 className="title">
                                                        <b> Nos offres en quelques clicks choisissez le service qui vous intéresse</b>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div className="row align-items-center">
                                                {occupationCategories.map((item) => (

                                                    <div key={item.id} className="col-lg-4 mx-auto">
                                                        <div className="card card-blog card-background" data-animation="zooming">
                                                            <div className="full-background" style={{ backgroundImage: "url(" + item.photo + ")" }} />
                                                            <Link to={`/occupations/${occupation.slug}/${item.slug}/`}>
                                                                <div className="card-body">
                                                                    <div className="content-bottom">
                                                                        <h5 className="card-title text-uppercase">{item.name}</h5>
                                                                    </div>
                                                                </div>
                                                            </Link>
=======
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
>>>>>>> c910377f45339b1a8156e17c346a1455ae77422d
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
<<<<<<< HEAD
                                                ))}
                                            </div>

=======
                                                </div>
                                            }
>>>>>>> c910377f45339b1a8156e17c346a1455ae77422d
                                        </div>
                                    </div>
<<<<<<< HEAD

                                    <div className="container">
                                        <div className="row justify-content-center mt-5">
                                            <div className="col-lg-12">

                                                <div className="container">
                                                    <div className="row">
                                                        <div className="col-md-8 mr-auto ml-auto text-center">
                                                            <h4 className="title mb-5">Nous sommes plus proche de
                                                                vous !</h4>
                                                        </div>
                                                    </div>
                                                    <CitySite />
                                                    <br />

                                                    <div className="row">
                                                        <div className="col-md-12 mx-auto">

                                                            {allblogbyoccupations.length > 0 && (
                                                                <>
                                                                    <h4 className="title">Tous nos articles
                                                                            sur <strong>{occupation.name} </strong> sont sur
                                                                        notre
                                                                            blog</h4>
                                                                    <br />

                                                                    <div className="row">

                                                                        {allblogbyoccupations.map((item) => (
                                                                            <div className="col-lg-4 col-md-6">
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
                                                                                            <Link to={`/blog/${occupation.slug}/${item.slug}/`} >{item.title}</Link>
                                                                                        </h6>
                                                                                        <p className="card-description">
                                                                                            <b dangerouslySetInnerHTML={{ __html: (item.body.length > 164 ? item.body.substring(0, 164) + "..." : item.body) }} />
                                                                                            <Link to={`/blog/${occupation.slug}/${item.slug}/`} >lire la suite</Link>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
=======
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
>>>>>>> c910377f45339b1a8156e17c346a1455ae77422d
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
<<<<<<< HEAD
                                                                </>
                                                            )}


                                                            {occupation.faqoccupations.length > 0 && (

                                                                <>

                                                                    <div className={'row'}>
                                                                        <div className="col-md-8 mx-auto text-center">
                                                                            <h4 className="title mb-5">Bon à savoir sur <strong>{occupation.name}</strong></h4>
                                                                        </div>

                                                                        <div className="col-md-12 ml-auto">
                                                                            <div className="accordion" id="accordionFaqs">
                                                                                {occupation.faqoccupations.slice(0,visiable).map((item) => (
                                                                                    <FaqUserList key={item.id} {...item} />
                                                                                ))}
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    {visiable < occupation.faqoccupations.length && (
                                                                        <div className="row">
                                                                            <div className="col-md-4 ml-auto mr-auto text-center">
                                                                                <button type="button" onClick={this.loadmoresItem} className="btn btn-primary">
                                                                                    <b>Voir plus </b>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    )}
                                                                </>
                                                            )}
                                                            <br/>
                                                            <br/>


=======
                                                                </div>
                                                            ))}
>>>>>>> c910377f45339b1a8156e17c346a1455ae77422d
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
<<<<<<< HEAD

=======
>>>>>>> c910377f45339b1a8156e17c346a1455ae77422d
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
