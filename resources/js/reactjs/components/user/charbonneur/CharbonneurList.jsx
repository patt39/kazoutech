import React, {Component} from "react";
import {Link} from "react-router-dom";
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

            <div  key={this.props.id} className="col-lg-4 col-md-6">
                <div className="card card-profile">
                    <div className="card-header bg-info"
                         style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}>
                        <div className="card-avatar">
                            <a href="..">
                                <img className="img img-raised rounded-circle"
                                     src={this.props.avatar}/>
                            </a>
                        </div>
                    </div>
                    <div className="card-body pt-0">
                        <div className="d-flex justify-content-between">
                            <a href=".."
                               className="btn btn-sm btn-info mr-4 mt-3">Connect</a>
                            <a href=".."
                               className="btn btn-sm btn-default float-right mt-3">Message</a>
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
                            <h5 className="h4">
                                Melanie Paisley<span
                                className="font-weight-light">, 31</span>
                            </h5>
                            <div className="font-weight-300">
                                <i className="ni location_pin mr-2"/>{this.props.name}
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        )
    }

}

export default CharbonneurList;
