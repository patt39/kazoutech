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
                        <Link to={`/blog/${this.props.slug}/${this.props.slug}/`}>
                            <img className="img rounded" alt={this.props.title} src={this.props.photo}/>
                        </Link>
                    </div>
                    <div className="card-body">
                    
                        <h6 className="card-title text-center">
                            <Link to={`/blog/${this.props.slug}/${this.props.slug}/`} className="card-link"> {this.props.title}</Link>
                        </h6>
                        <b/>
                        <div className="desc opacity-8 text-center"
                           dangerouslySetInnerHTML={{__html: (this.props.body.length > 74 ? this.props.body.substring(0, 74) + "..." : this.props.body)}}/>
                    </div>
                </div>
            </div>
        )
    }

}

export default BlogPostInteresse;
