import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class BlogPostInteresse extends Component {
    constructor(props) {
        super(props);
        this.state = {
          //
        }
    }

    render() {
        return (

            <div key={this.props.id} className="col-lg-3 col-md-6">
                <div className="card card-product">
                    <div className="card-image">
                        <a href="#pablo">
                            <img className="img rounded" src=".."/>
                        </a>
                    </div>
                    <div className="card-body">
                        <h6 className="category text-warning text-center">
                            <Link to={`/blog/`} className={`btn btn-sm btn-info`}>
                                key={this.props.title}
                            </Link>
                        </h6>

                        <h4 className="card-title text-center">
                            <a href=".." className="card-link"> {this.props.title}</a>
                        </h4>
                        <div className="desc text-white opacity-8"
                           dangerouslySetInnerHTML={{__html: (this.props.body.length > 74 ? this.props.body.substring(0, 74) + "..." : this.props.body)}}/>
                    </div>
                </div>
            </div>
        )
    }

}

export default BlogPostInteresse;
