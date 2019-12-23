import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import BlogList from "./BlogList";
import BlogLastPost from "./BlogLastPost";


class BlogSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {
            blogs: [],
            blogsLast: []
        }
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Blog une mise a jour des informations  | Kazoutech';
        document.title = `${composantTitle}`;
        dyaxios.get(route('api_active.blogs')).then(response => this.setState({blogs: [...response.data],}));
        dyaxios.get(route('api_active_last.blogs')).then(response => this.setState({blogsLast: [...response.data],}))
    }

    render() {
        const {blogs,blogsLast} = this.state;
        return (
            <div className="blog-post">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image"
                             style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}/>
                        <div className="content-center">
                            <div className="row">
                                <div className="col-md-6 mx-auto text-center">
                                    <h3 className="title text-white">A Place for Entrepreneurs to Share and Discover
                                        New Stories</h3>
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
                                                <br/>
                                                <div className="row">
                                                    <div className="col-lg-10 col-md-8 mx-auto">
                                                        <h2 className="title mb-5"><b>Histoires connexes</b></h2>

                                                        <div className="card">
                                                            <div className="card-body">
                                                        {blogs.map((item) => (
                                                            <BlogList key={item.id} {...item} />
                                                        ))}
                                                            </div>
                                                        </div>

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

export default BlogSiteIndex;
