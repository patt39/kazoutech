import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import BlogList from "./BlogList";
import BlogLastPost from "./BlogLastPost";


class BlogSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {
            //
        }
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Blog une mise a jour des informations  | Kazoutech';
        document.title = `${composantTitle}`;
    }

    render() {
        return (
            <div className="blog-post">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-small header-filter">
                        <div className="page-header-image"
                             style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}/>
                        <div className="content-center">
                            <div className="row">
                                <div className="col-md-6 mx-auto text-center">
                                    <h1 className="title text-white">A Place for Entrepreneurs to Share and Discover
                                        New Stories</h1>
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

                        <BlogLastPost/>


                        <BlogList/>


                    </div>
                    <FooterUserSite/>
                </div>
            </div>
        )
    }

}

export default BlogSiteIndex;
