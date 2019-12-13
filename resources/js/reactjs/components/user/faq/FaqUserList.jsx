import React, { Component } from "react";


class FaqUserList extends Component {


    render() {
        return (


            <div className="card">
                <div className="card-header" id={`heading${this.props.id}`}>
                    <h5 className="mb-0">
                        <button className="btn btn-link w-100 text-primary text-left" type="button"
                            data-toggle="collapse" data-target={`#collapse${this.props.id}`} aria-controls={`collapse${this.props.id}`} >
                            {this.props.title}
                            <i className="ni ni-bold-down float-right pt-1" />
                        </button>
                    </h5>
                </div>
                <div id={`collapse${this.props.id}`} className="collapse" aria-labelledby={`heading${this.props.id}`}
                    data-parent="#accordionFaqs">
                    <div className="card-body opacity-8" dangerouslySetInnerHTML={{ __html: this.props.body }} />
                </div>
            </div>


        )
    }

}
export default FaqUserList;
