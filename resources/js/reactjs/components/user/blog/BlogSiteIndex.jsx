import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import BlogList from "./BlogList";
import { Link } from "react-router-dom";
import BlogLastPost from "./BlogLastPost";
import BlogOccupationList from "./BlogOccupationList";


class BlogSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {
            blogs: [],
            blogsLast: []
        };
        this.deleteItem = this.deleteItem.bind(this);
    }

    deleteItem(id) {
        Swal.fire({
            title: 'Etes vous sure de vouloir suprimer cette article de blog?',
            animation: false,
            customClass: 'animated shake',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success btn-sm",
            cancelButtonClass: 'btn btn-danger btn-sm',
            confirmButtonText: 'Oui suprimer',
            cancelButtonText: 'No annuler',
            showCancelButton: true,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                const url = route('blogs.destroy',id);
                //Envoyer la requet au server
                dyaxios.delete(url).then(() => {

                    let isNotId = item => item.id !== id;
                    let updatedItems = this.state.blogs.filter(isNotId);
                    this.setState({blogs: updatedItems});
                    /** Alert notify bootstrapp **/
                    $.notify({
                            // title: 'Update FAQ',
                            message: 'Article de blog suprimé avec success'
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
                                    <h5 className="title text-white">Bienvenue dans la comunauté</h5>
                                    <Link  className="btn btn-warning btn-round btn-icon-only">
                                        <i className="fab fa-twitter"/>
                                    </Link>
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

                                <BlogOccupationList />

                                <div className="row">
                                    <div className="col-md-12 ml-auto mr-auto">
                                        <section className="blogs-3">
                                            <div className="container">
                                                <br/>
                                                <Link to={`/blogs/create/`} className="btn btn-primary btn-center btn-larg">Autre nouveau article
                                                   </Link>
                                                   <br/><br/>
                                                <div className="row">
                                                    <div className="col-lg-10 col-md-8 mx-auto">
                                                        <h2 className="title mb-5"><b>Histoires connexes</b></h2>

                                                        <div className="card">
                                                            <div className="card-body">
                                                            {blogs.map((item) => (
                                                                <BlogList key={item.id} {...item} deleteItem={this.deleteItem}/>
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
