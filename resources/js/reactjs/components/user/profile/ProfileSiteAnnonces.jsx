import React, { Component } from "react";
import {Link, NavLink} from "react-router-dom";
import { Button } from "reactstrap";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class ProfileSiteAnnonces extends Component {
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
                    <div className="card-body">
                        <h6 className="card-title">
                            <Link to={`/annonces/${this.props.occupation.slug}/${this.props.categoryoccupation.slug}/${this.props.city.slug}/${this.props.slug}/`}>
                                {this.props.title}
                            </Link>
                        </h6>
                        <p className="card-description">
                            <b dangerouslySetInnerHTML={{ __html: (this.props.body.length > 156 ? this.props.body.substring(0, 156) + "..." : this.props.body) }} />
                            <Link to={`/annonces/${this.props.occupation.slug}/${this.props.categoryoccupation.slug}/${this.props.city.slug}/${this.props.slug}/`}> lire la suite </Link>
                        </p>

                        <div className="card-description">
                            <div className="d-flex align-items-center">
                                <NavLink to={`/user/${this.props.user.username}/`}>
                                    <img src={this.props.user.avatar} alt={this.props.user.name} className="avatar" />
                                </NavLink>
                                <div className="mx-3">
                                    <NavLink to={`/user/${this.props.user.username}/`} className="text-dark font-weight-600 text-sm">{this.props.user.name}</NavLink>
                                    <small className="d-block text-muted">{moment(this.props.created_at).fromNow()}</small>
                                </div>

                                {!$guest ?
                                    <>
                                        {$userKazou.id === this.props.user_id ?

                                            <div className="text-right ml-auto float-right">
                                                <div className="dropdown">
                                                    <Button type="button"
                                                            className="btn btn-info btn-sm btn-icon"
                                                            data-toggle="dropdown"
                                                            aria-expanded="false">
                                                  <span className="btn-inner--icon icon-big">
                                                    <i className="ni ni-settings-gear-65"/>
                                                  </span>
                                                        <span className="btn-inner--text">Action</span>
                                                    </Button>{" "}
                                                    <div className="dropdown-menu dropdown-menu-right"
                                                         style={{position: "absolute", transform: "translate3d(16px, 25px, 0px)", top: "0px", left: "0px", willChange: "transform",}}>
                                                        <a className="dropdown-item" href="..">
                                                            <i className="ni ni-single-02"/> Profile
                                                        </a>
                                                        <a className="dropdown-item" href="..">
                                                            <i className="ni ni-notification-70"/> Mute conversation
                                                        </a>
                                                        <NavLink to={`/annonces/${this.props.occupation.slug}/p/annonce/${this.props.id}/edit`} className="dropdown-item">
                                                            <i className="ni ni-key-25"/> Editer
                                                        </NavLink>

                                                        <a style={{cursor : "pointer"}} className="dropdown-item"  onClick={() => this.props.deleteAnnonce(this.props.id)}>
                                                             <i className="ni ni-fat-remove"/> Suprimer
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            :null}

                                    </>

                                    :null}


                            </div>

                        </div>

                    </div>
                </div>
            </div>

        )
    }

}

export default ProfileSiteAnnonces;
