import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import BlogList from "./BlogList";
import BlogLastPost from "./BlogLastPost";
import {Link} from "react-router-dom";


class BlogSiteCategories extends Component {
    constructor(props) {
        super(props);
        this.state = {
            blogsbycategy: {blogs:[]},
            blogsLast: []
        }
    }

    componentDidMount() {
        let SlugOccupation = this.props.match.params.occupation;
        dyaxios.get(route('api_blog_occupation_site.view',SlugOccupation)).then(response => this.setState({blogsbycategy: response.data,}));
        dyaxios.get(route('api_active_last.blogs')).then(response => this.setState({blogsLast: [...response.data],}))
    }

    render() {
        const {blogsbycategy,blogsLast} = this.state;
        const blogsbycategies = blogsbycategy.blogs;
        const composantTitle = `${blogsbycategy.name}`;
        document.title = `${composantTitle} | Kaazoutech`;
        return (
            <div className="blog-post">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-small header-filter">
                        <div className="page-header-image" style={{backgroundImage: "url(" + blogsbycategy.photo + ")"}}/>
                        <div className="content-center">
                            <div className="row">
                                <div className="col-md-6 mx-auto text-center">
                                    <h3 className="title text-white">{blogsbycategy.name}</h3>
                                    <a href="#button" className="btn btn-warning btn-round btn-icon-only">
                                        <i className="fab fa-twitter"/>
                                    </a>
                                    <a href="#button" className="btn btn-warning btn-round btn-icon-only">
                                        <i className="fab fa-instagram"/>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div className="main main-raised">

                        <div className="container">
                            <div className="row">
                                {blogsLast.map((item) => (
                                    <BlogLastPost key={item.id} {...item}/>
                                ))}
                            </div>
                        </div>


                        <section className="section">
                            <div className="container">
                                <div className="row">
                                    <div className="col-md-12 ml-auto mr-auto">
                                        <section className="blogs-3">
                                            <div className="container">
                                                <div className="row">
                                                    <div className="col-lg-10 col-md-8 mx-auto">
                                                        <h2 className="title mb-5"><b>{blogsbycategy.name}</b></h2>

                                                        {blogsbycategies.map((item) => (
                                                            <BlogList key={item.id} {...item}/>
                                                        ))}

                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </section>


                    </div>
                    <FooterUserSite/>
                </div>
            </div>
        )
    }

}

export default BlogSiteCategories;
