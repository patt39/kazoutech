import React, { Component } from "react";
import {Link, NavLink} from "react-router-dom";
import { Button } from "reactstrap";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class ProfileSiteBlogs extends Component {
    constructor(props) {
        super(props);
        this.state = {
            //
        }
    }

    render() {
        return (


            <div key={this.props.id} className="col-lg-6 col-md-6">
                <div className="row">
                    <div className="col-md-6 d-flex justify-content-start">
                        <div className="avatar">
                            <img className="media-object shadow" src={this.props.user.avatar} alt={this.props.user.name}/>
                        </div>
                        <div className="text">
                            <span className="name">{this.props.user.name}</span>
                            <div className="meta">{moment(this.props.created_at).fromNow()}</div>
                        </div>
                    </div>

                    {!$guest ?
                        <>
                            {$userKazou.id === this.props.user_id ?

                                <div className="col-md-6 d-flex justify-content-end">
                                    <div className="btn-group">
                                        <button className="btn btn-icon-only btn-outline-secondary btn-sm">
                                            <i className="ni ni-notification-70"/>
                                        </button>
                                        <button className="btn btn-icon-only btn-outline-secondary btn-sm">
                                            <i className="ni ni-chat-round"/>
                                        </button>
                                        <button onClick={() => this.props.deleteBlog(this.props.id)} title={'Suprimer cette article'}
                                                className="btn btn-icon-only btn-outline-secondary btn-sm">
                                            <i className="fa fa-trash"/>
                                        </button>{" "}
                                    </div>
                                </div>
                                :null}
                        </>

                        :null}

                </div>
                <div className="card card-blog card-plain">
                    <div className="card-image shadow">
                        <NavLink to={`/blog/${this.props.occupation.slug}/${this.props.slug}/`}>
                            <img className="img rounded" src={this.props.photo}/>
                        </NavLink>
                    </div>
                    <div className="card-body">
                        <h5 className="card-title">
                            <NavLink to={`/blog/${this.props.occupation.slug}/${this.props.slug}/`}>{this.props.title}</NavLink>
                        </h5>
                        <p className="card-description">
                            <b dangerouslySetInnerHTML={{ __html: (this.props.body.length > 156 ? this.props.body.substring(0, 156) + "..." : this.props.body) }} />
                            <Link to={`/blog/${this.props.occupation.slug}/${this.props.slug}/`}> lire la suite </Link>
                        </p>
                    </div>
                </div>
            </div>

        )
    }

}

export default ProfileSiteBlogs;
