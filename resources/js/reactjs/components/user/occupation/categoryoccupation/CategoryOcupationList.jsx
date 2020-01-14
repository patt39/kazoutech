import React, { Component } from "react";
import { Link } from "react-router-dom";


class CategoryOcupationList extends Component {


    render() {
        return (

            <div key={this.props.id} className="col-lg-3">
                <div className="card card-blog card-background" data-animation="zooming">
                    <div className="full-background" style={{ backgroundImage: "url(" + this.props.photo + ")" }} />
                    <Link to={`/occupations/${this.props.occupation.slug}/${this.props.slug}`}>
                        <div className="card-body">
                            <div className="content-bottom">
                                <h6 className="card-title text-uppercase">{this.props.name}</h6>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
        )
    }

}
export default CategoryOcupationList;
