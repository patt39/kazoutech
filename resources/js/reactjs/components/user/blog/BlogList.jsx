import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class BlogList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            //
        }
    }

    render() {
        return (

            <div key={this.props.id}
                 className="card card-blog card-plain blog-horizontal mb-5">
                <div className="row">

                    <div className="col-lg-4">
                        <div className="card-image shadow">
                            <Link to={`/blog/${this.props.occupation.slug}/${this.props.slug}/`}>
                                <img className="img rounded"
                                     src={this.props.photo}/>
                            </Link>
                        </div>
                    </div>
                    <div className="col-lg-8">
                        <div className="card-body">
                            <h3 className="card-title">
                                <Link to={`/blog/${this.props.occupation.slug}/${this.props.slug}/`}>
                                    {this.props.title}
                                </Link>
                            </h3>
                            <p className="card-description">
                                <b dangerouslySetInnerHTML={{__html: (this.props.body.length > 180 ? this.props.body.substring(0, 180) + "..." : this.props.body)}}/>
                                <Link to={`/blog/${this.props.occupation.slug}/${this.props.slug}/`}> lire la
                                    suite </Link>
                            </p>
                            <div className="author">
                                <img
                                    src={this.props.user.avatar}
                                    alt={this.props.user.name}
                                    className="avatar img-raised"/>
                                <div className="text">
                                                                                    <span
                                                                                        className="name">{this.props.user.name}</span>
                                    <div className="meta">
                                        <b>{moment(this.props.created_at).format('LL')}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        )
    }

}

export default BlogList;
