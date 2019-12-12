import React, { Component } from "react";
import { Link } from "react-router-dom";


class PageUserHeader extends Component {


    render() {
        return (

            <div className="page-header page-header-small header-filter">
                <div className="page-header-image" style={{backgroundImage: "url(" + this.props.photo + ")"}}/>
                <div className="container">
                    <div className="header-body text-center mb-7">
                        <div className="row justify-content-center">
                            <div className="col-xl-10 col-lg-6 col-md-8 px-10">
                                <h1 className="text-white">{this.props.name}</h1>
                                <p className="text-lead text-white" dangerouslySetInnerHTML={{ __html: this.props.description }}/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }

}
export default PageUserHeader;
