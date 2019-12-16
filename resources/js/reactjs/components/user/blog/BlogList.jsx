import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class BlogList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            blogs: []
        }
    }

    componentDidMount() {
        dyaxios.get(route('api_active.blogs')).then(response =>
            this.setState({
                blogs: [...response.data],
            }));
    }


    render() {
        const {blogs} = this.state;
        return (

            <section className="section">
                <div className="container">

                    <div className="row">


                        <div className="col-md-12 ml-auto mr-auto">
                            <section className="blogs-3">
                                <div className="container">
                                    <div className="row">
                                        <div className="col-lg-10 col-md-8 mx-auto">
                                            <h2 className="title mb-5"><b>Histoires connexes</b></h2>

                                            {blogs.map((item) => (
                                                <div key={item.id}
                                                     className="card card-blog card-plain blog-horizontal mb-5">
                                                    <div className="row">

                                                        <div className="col-lg-4">
                                                            <div className="card-image shadow">
                                                                <a href="..">
                                                                    <img className="img rounded"
                                                                         src={item.photo}/>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div className="col-lg-8">
                                                            <div className="card-body">
                                                                <h3 className="card-title">
                                                                    <a href="..">
                                                                        {item.title}
                                                                    </a>
                                                                </h3>
                                                                <p className="card-description">
                                                                    <b dangerouslySetInnerHTML={{__html: (item.body.length > 180 ? item.body.substring(0, 180) + "..." : item.body)}}/>
                                                                    <Link to={`/blog/${item.occupation.slug}/${item.slug}/`}> lire la suite </Link>
                                                                </p>
                                                                <div className="author">
                                                                    <img
                                                                        src={item.user.avatar}
                                                                        alt={item.user.name}
                                                                        className="avatar img-raised"/>
                                                                    <div className="text">
                                                                                    <span
                                                                                        className="name">{item.user.name}</span>
                                                                        <div className="meta">
                                                                            <b>{moment(item.created_at).format('LL')}</b>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            ))}

                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>


                    </div>

                </div>
            </section>

        )
    }

}

export default BlogList;
