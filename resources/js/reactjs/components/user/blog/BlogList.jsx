import React, {Component} from "react";
import {Link, NavLink} from "react-router-dom";
import moment from 'moment'
import {Button} from "reactstrap";

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
                            {this.props.body  ?
                             <p className="card-description">
                             <b dangerouslySetInnerHTML={{__html: (this.props.body.length > 180 ? this.props.body.substring(0, 180) + "..." : this.props.body)}}/>
                             <Link to={`/blog/${this.props.occupation.slug}/${this.props.slug}/`}> lire la
                                 suite </Link>
                            </p> :null}
                            <div className="card-header d-flex align-items-center">
                                <div className="d-flex align-items-center">
                                    <NavLink to={`/charbonneur/${this.props.user.username}/`}>
                                        <img src={this.props.user.avatar} alt={this.props.user.name} className="avatar" />
                                    </NavLink>
                                    <div className="mx-3">
                                        <NavLink to={`/charbonneur/${this.props.user.username}/`} className="text-dark font-weight-600 text-sm">{this.props.user.name}</NavLink>
                                        <small className="d-block text-muted">{moment(this.props.created_at).fromNow()}</small>
                                    </div>
                                </div>
                                <div className="text-right ml-auto">

                                    {!$guest && (
                                        <>
                                            {$userKazou.id === this.props.user_id && (
                                                <>
                                                    <NavLink to={`/blog/p/${this.props.id}/edit/`} className="btn btn-sm btn-success btn-icon">
                                                    <span className="btn-inner--icon icon-big">
                                                        <i className="ni ni-check-bold" />
                                                    </span>
                                                        <span className="btn-inner--text">editer</span>
                                                    </NavLink>
                                                    <Button onClick={() => this.props.deleteItem(this.props.id)}
                                                            className="btn btn-sm btn-danger btn-icon">
                                                        <span className="btn-inner--icon icon-big">
                                                            <i className="ni ni-fat-remove" />
                                                        </span>
                                                        <span className="btn-inner--text">Suprimer</span>
                                                    </Button>{" "}
                                                </>
                                            )}

                                        </>
                                    )}
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
