import React, { Component } from "react";
import {Link, NavLink} from "react-router-dom";
import { Button } from "reactstrap";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class AnnonceList extends Component {
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
                    <div className="col-lg-12">
                        <h5 className="card-title">
                            <Link to={`/annonces/${this.props.occupation.slug}/${this.props.slug}/`}>
                                {this.props.title}
                            </Link>
                        </h5>
                        <p className="card-description">
                            <b dangerouslySetInnerHTML={{ __html: (this.props.body.length > 156 ? this.props.body.substring(0, 156) + "..." : this.props.body) }} />
                            <Link to={`/annonces/${this.props.occupation.slug}/${this.props.slug}/`}> lire la suite </Link>
                        </p>
                        <div className="card-header d-flex align-items-center">
                            <div className="d-flex align-items-center">
                                <a href="..">
                                    <img src={this.props.user.avatar} alt={this.props.user.name} className="avatar" />
                                </a>
                                <div className="mx-3">
                                    <a href=".." className="text-dark font-weight-600 text-sm">{this.props.user.name}</a>
                                    <small className="d-block text-muted">{moment(this.props.created_at).startOf('hour').fromNow()}</small>
                                </div>
                            </div>
                            <div className="text-right ml-auto">
                                <button type="button" className={`btn btn-sm btn-${this.props.user.color_name} btn-icon`}>
                                    <span className="btn-inner--text">{this.props.price.toLocaleString(navigator.language, { minimumFractionDigits: 0 })} FCFA</span>
                                </button>
                                <NavLink to={`/annonces/${this.props.occupation.slug}/${this.props.id}/edit`} className="btn btn-sm btn-success btn-icon">
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
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        )
    }

}

export default AnnonceList;
