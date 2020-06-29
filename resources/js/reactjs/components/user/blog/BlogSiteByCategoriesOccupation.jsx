import React, {Component} from "react";
import { Helmet } from 'react-helmet';
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import BlogList from "./BlogList";
import BlogLastPost from "./BlogLastPost";
import BlogOccupationList from "./BlogOccupationList";
import OccupationListSkeleton from "../../inc/OccupationListSkeleton";
import {Link} from "react-router-dom";


class BlogSiteByCategoriesOccupation extends Component {
    constructor(props) {
        super(props);
        this.state = {
            blogsbycategy: {blogs:[]},
            blogsLast: []
        }
    }

    deleteItem(id) {
        Swal.fire({
            title: 'Etes vous sure de vouloir supprimer cette article de blog?',
            animation: false,
            customClass: 'animated shake',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success btn-sm",
            cancelButtonClass: 'btn btn-danger btn-sm',
            confirmButtonText: 'Oui supprimer',
            cancelButtonText: 'Non annuler',
            showCancelButton: true,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                const url = route('blogs.destroy',id);
                //Envoyer la requet au server
                dyaxios.delete(url).then(() => {

                    //Redirect after create
                    this.props.history.push('/blogs/');
                    /** Alert notify bootstrapp **/
                    $.notify({
                            // title: 'Update FAQ',
                            message: 'Article de blog supprimé avec succès'
                        },
                        {
                            allow_dismiss: false,
                            type: 'primary',
                            placement: {
                                from: 'bottom',
                                align: 'right'
                            },
                            animate: {
                                enter: 'animated fadeInRight',
                                exit: 'animated fadeOutRight'
                            },
                        });
                    /** End alert ***/

                }).catch(() => {
                    //Failled message
                    $.notify("Ooopss! Une erreur est survenue", {
                        allow_dismiss: false,
                        type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
                })
            }
        });
    }


    componentDidMount() {
        let SlugOccupation = this.props.match.params.occupation;
        dyaxios.get(route('api_blog_occupation_site.view',SlugOccupation)).then(response => this.setState({blogsbycategy: response.data,}));
        dyaxios.get(route('api_active_last.blogs')).then(response => this.setState({blogsLast: [...response.data],}))
    }

    render() {
        const {blogsbycategy,blogsLast} = this.state;
        const blogsbycategies = blogsbycategy.blogs;
        return (
            <>
            <Helmet title={`${blogsbycategy.name || "Kazoutech"} | Kazoutech`}/>
             <div className="blog-post">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
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
                                {blogsLast.length ? 
                                    <>
                                    {blogsLast.map((item) => (
                                    <BlogLastPost key={item.id} {...item}/>
                                ))}
                                    </>
                                :<OccupationListSkeleton />}
                                
                            </div>
                        </div>

                        <section className="section">
                            <div className="container">

                                <BlogOccupationList/>

                                <div className="row">
                                    <div className="col-md-12 ml-auto mr-auto">
                                        <section className="blogs-3">
                                            <div className="container">
                                                <div className="row">
                                                    <div className="col-lg-10 col-md-8 mx-auto">
                                                        <h2 className="title mb-5"><b>{blogsbycategy.name}</b></h2>

                                                        {!$guest &&(
                                                            <Link to={`/blog/p/new/create/`} className="btn btn-primary btn-center btn-larg">
                                                                Ajouter un nouveau article de blog
                                                            </Link>
                                                        )}
                                                        <br/><br/>
                                                        <div className="card">
                                                            <div className="card-body">

                                                                {blogsbycategies.map((item) => (
                                                                    <BlogList key={item.id} {...item}/>
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
            </>
            
        )
    }

}

export default BlogSiteByCategoriesOccupation;
