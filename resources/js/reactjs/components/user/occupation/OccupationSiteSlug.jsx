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
            occupation: {categoryoccupations: [], blogs: []},
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
        const allblogbyoccupations = occupation.blogs;
        const composantTitle = `${occupation.name || "kazoutech"}`;
        document.title = `${composantTitle} | Kazoutech`;

        return (
            <>
                <div className="landing-page">
                    <NavUserSIte/>

                    <div className="wrapper">

                        <OccupationHeader {...this.props} {...occupation}/>

                        <div className="cd-section" id="accordion">
                            <div className="accordion-1">
                                <div className="container">
                                    <div className={'row'}>
                                        <div className="container text-center">
                                            <div className="row mb-5">
                                                <div className="col-md-8 mx-auto">
                                                    <h3 className="title">
                                                       <b> Nos offres en quelques clicks choisissez le service qui vous intéresse</b>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div className="row align-items-center">
                                                {occupationCategories.map((item) => (
                                                    <div key={item.id} className="col-lg-4 mx-auto">
                                                        <Link  to={`/occupations/${occupation.slug}/${item.slug}/`}>
                                                            <div className="card card-background"
                                                                 style={{backgroundImage: "url(" + item.photo + ")"}}>
                                                                <div className="card-body text-center">
                                                                    <Link
                                                                        to={`/occupations/${occupation.slug}/${item.slug}/`}>
                                                                        <h3 className="card-title">{item.name}</h3>
                                                                    </Link>
                                                                </div>
                                                            </div>
                                                        </Link>

                                                    </div>
                                                ))}
                                            </div>

                                        </div>

                                    </div>
                                    <div className="section features-7">
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
                                                                                            <Link to={`/blog/${occupation.slug}/${item.slug}/`} >{item.title}</Link>
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

                                    <br/>
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
