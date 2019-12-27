import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";
import BlogPostInteresse from "./BlogPostInteresse";

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

            <div className="blog-post">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image"
                             style={{backgroundImage: "url(" + blog.photo + ")"}}/>
                        <div className="content-center">
                            <div className="row">
                                <div className="col-md-6 mx-auto text-center">
                                    <h1 className="title text-white">{blog.title}</h1>
                                    <a href="#button" className="btn btn-warning btn-round btn-icon-only">
                                        <i className="fa fa-twitter"/>
                                    </a>
                                    <a href="#button" className="btn btn-warning btn-round btn-icon-only">
                                        <i className="fa fa-instagram"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div className="container">
                        <div className="row">
                            <div className="col-md-10 ml-auto mr-auto text-justify">
                                <h6 className="category"><b>{moment(blog.created_at).format('LL')}</b></h6>
                                <h3 className="title"><b>{blog.title}</b></h3>
                                <p dangerouslySetInnerHTML={{__html: (blog.body)}}/>
                            </div>
                        </div>


                        <div className="text-center">
                            <h4 className="title">Ces postes peuvent vous interesser </h4>
                        </div>
                        <div className="row">

                            <BlogPostInteresse  {...this.props}/>
                        </div>

                        <div className="text-center">
                            <Link to={`/blog/${blog.occupation.slug}/`}
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

export default BlogSiteShow;
