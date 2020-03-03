import React, {Component} from "react";
import {Link, NavLink} from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class CharbonneurList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            //
        }
    }

    render() {
        return (
            <>

                <div key={this.props.id}  className="col-md-6 mx-auto">
                    <div className="card card-profile" data-image="img-rounded">
                        <div className="card-avatar">
                            <Link to={`/charbonneur/${this.props.username}/`}>
                                <img className="img" src={this.props.avatar} />
                            </Link>
                        </div>
                        <div className="card-body ">
                            {this.props.city_id ?
                               <>
                                   <NavLink to={`/charbonneurs/${this.props.city.slug}/`}>
                                       <h6 className="card-category text-gray">{this.props.city.name}</h6>
                                   </NavLink>
                                   <NavLink to={`/charbonneurs/${this.props.city.slug}/`}>
                                       <h6 className="card-category text-gray">{this.props.city.name}</h6>
                                   </NavLink>
                               </>
                                :null}
                            <h4 className="card-title">{this.props.name}</h4>
                            <p className="card-description">
                                Don't be scared of the truth because we need to restart the
                                human foundation in truth And I love you...
                            </p>

                            <Link to={`/`} className="btn btn-lg btn-info btn-block">Contacter</Link>
                        </div>

                    </div>
                </div>

                {/*
                <div  key={this.props.id} className="col-lg-6 col-md-6">
                    <div className="card card-profile">
                        <div className="card-header bg-info"
                             style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}>
                            <div className="card-avatar">
                                <NavLink to={`/charbonneur/${this.props.username}/`}>
                                    <img className="img img-raised rounded-circle"
                                         src={this.props.avatar}/>
                                </NavLink>
                            </div>
                        </div>
                        <div className="card-body pt-0">
                            <div className="d-flex justify-content-between">
                                {this.props.statusOnline ?
                                    <a href=".." className="btn btn-sm btn-info mr-4 mt-3">Connect</a>
                                    :
                                    <a href=".." className="btn btn-sm btn-danger mr-4 mt-3">Offline</a>
                                }
                                {this.props.status_profile_verify && (
                                    <button type="button" className="btn-icon-only btn-sm rounded-circle btn btn-success" title={'Profile verifier'}>
                                        <span className="btn-inner--icon"><i className="ni ni-check-bold"/></span>
                                    </button>
                                )}


                                <a href=".." className="btn btn-sm btn-info float-right mt-3">Contacter</a>
                            </div>
                            <div className="row">
                                <div className="col">
                                    <div
                                        className="card-profile-stats d-flex justify-content-center">
                                        <div>
                                            <span className="heading">22</span>
                                            <span className="description">Friends</span>
                                        </div>
                                        <div>
                                            <span className="heading">10</span>
                                            <span className="description">Photos</span>
                                        </div>
                                        <div>
                                            <span className="heading">89</span>
                                            <span className="description">Comments</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="text-center">
                                <h5 className="h4">{this.props.name}</h5>
                                {this.props.city_id ?
                                    <Link to={`/charbonneurs/${this.props.city.slug}/`}>
                                        <div className="font-weight-300">
                                            <i className="ni location_pin mr-2"/>{this.props.city.name}
                                        </div>
                                    </Link>
                                    :null}
                            </div>
                        </div>
                    </div>
                </div>

                */}

            </>






        )
    }

}

export default CharbonneurList;
