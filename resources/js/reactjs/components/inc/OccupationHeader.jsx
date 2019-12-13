import React, { Component } from "react";
import { Link } from "react-router-dom";


class OccupationHeader extends Component {


    render() {
        return (

            <div className="page-header page-header-mini header-filter">
                <div className="page-header-image" style={{backgroundImage: "url(" + this.props.photo + ")"}}/>
                <div className="container">
                    <div className="row">
                        <div className="col-lg-10 mx-auto text-center">
                            <h2 className="display-2 text-white">{this.props.name}</h2>
                            <div className="author">
                                <Link to={'/occupations/'} className="text-white">
                                    <i className="fa fa-chevron-circle-left"/> Retour Occupations
                                </Link>
                            </div>
                            <br/>
                            <p className="text-lead text-white" dangerouslySetInnerHTML={{ __html: this.props.description }}/>
                        </div>
                    </div>
                </div>
            </div>
        )
    }

}
export default OccupationHeader;
