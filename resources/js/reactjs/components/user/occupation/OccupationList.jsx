import React, { Component } from "react";
import { Link } from "react-router-dom";


class OccupationList extends Component {


    render() {
        return (

            <div key={this.props.id} className="col-lg-4">
                <div className="card card-blog card-background" data-animation="zooming">
                    <div className="full-background" style={{ backgroundImage: "url(" + this.props.photo + ")" }} />
                    <Link to={`/occupations/${this.props.slug}/`}>
                        <div className="card-body">
                            <div className="content-bottom">
                                <h5 className="card-title text-uppercase">{this.props.name}</h5>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
        )
    }

}
export default OccupationList;
