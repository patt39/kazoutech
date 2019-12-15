import React, { Component } from "react";
import { Link } from "react-router-dom";


class CategoryOcupationList extends Component {


    render() {
        return (

            <div className="col-lg-3">
                <div key={this.props.id} className="card card-blog card-background" data-animation="zooming">
                    <div className="full-background" style={{ backgroundImage: "url(" + this.props.photo + ")" }} />
                    <Link to={`/occupations/${this.props.occupation.slug}/${this.props.slug}`}>
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
export default CategoryOcupationList;
