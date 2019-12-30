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

            <div key={this.props.id} className="col-lg-4 col-md-6">
                <div className="card card-blog card-plain">
                    <div className="card-image shadow">
                        <NavLink to={`/blog/${this.props.occupation.slug}/${this.props.slug}/`}>
                            <img className="img rounded"
                                 src={this.props.photo}/>
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
