import React, {Component} from "react";
import {Link, NavLink} from "react-router-dom";
import moment from 'moment'
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";
import BlogPostInteresse from "./BlogPostInteresse";
import {Button} from "reactstrap";

require("moment/min/locales.min");
moment.locale('fr');

class BlogSiteShow extends Component {
    constructor(props) {
        super(props);
        this.state = {
            blog: {
                user: [],
                occupation: []
            }
        }
    }

    componentDidMount() {
        let Slugblog = this.props.match.params.blog;
        let SlugOccupation = this.props.match.params.occupation;
        let url = route('api_blog_site.view', [SlugOccupation, Slugblog]);
        dyaxios.get(url).then(response => this.setState({blog: response.data,}));
    }

    render() {
        const {blog} = this.state;
        const composantTitle = `${blog.title}`;
        document.title = `${composantTitle} | Kazoutech`;
        return (
            <>
                <div className="landing-page">
                    <NavUserSIte/>

                    <div className="wrapper">
                        <div className="page-header page-header-mini header-filter">
                            <div className="page-header-image page-header-mini"
                                 style={{backgroundImage: "url(" + blog.photo + ")"}}/>
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto text-center">
                                        <h4 className="display-4 text-white">{blog.title}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="main main-raised">
                            <div className="container mt--100 mb-5 upper">
                                <div className="row">
                                    <div className="col-lg-12 ml-auto mr-auto">
                                        <div className="card card-profile" data-image="img-rounded">
                                            <div className="row justify-content-center ">
                                                <div className="col-lg-11 ml-auto mr-auto">
                                                    <h3 className="display-3">{blog.title}</h3>
                                                    <div className="description mb-2 text-justify">
                                                        <p dangerouslySetInnerHTML={{__html: blog.body}}/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <BlogPostInteresse  {...this.props}/>

                                <div className="text-center">
                                    <Link to={`/blog/${blog.occupation.slug}/`}
                                          className="btn btn-outline-info">Voir plus d'articles ici
                                    </Link>
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

export default BlogSiteShow;
