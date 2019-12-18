import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class BlogLastPost extends Component {
    constructor(props) {
        super(props);
        this.state = {
            //
        }
    }

    render() {
        return (

            <div key={this.props.id} className="col-lg-4">
                <div className="card card-background" style={{backgroundImage: "url(" + this.props.photo + ")"}}>
                    <div className="card-body text-center">
                        <div className="icon icon-shape bg-gradient-white shadow rounded-circle mb-3">
                            <i className="ni ni-controller text-danger"/>
                        </div>
                        <Link to={`/blog/${this.props.occupation.slug}/${this.props.slug}/`} >
                            <h3 className="card-title">{(this.props.title.length > 15 ? this.props.title.substring(0, 15) + "..." : this.props.title)}</h3>
                        </Link>
                        <b className="desc text-white opacity-8"
                           dangerouslySetInnerHTML={{__html: (this.props.body.length > 74 ? this.props.body.substring(0, 74) + "..." : this.props.body)}}/>
                        <Link to={`/blog/${this.props.occupation.slug}/${this.props.slug}/`} className="text-blue">
                            lire la suite
                        </Link>
                        <br/>
                        <br/>
                        <Link to={`/blog/${this.props.occupation.slug}/`} className={`btn btn-sm btn-${this.props.color.name}`}>
                            {this.props.occupation.name}
                        </Link>
                    </div>
                </div>
            </div>
        )
    }

}

export default BlogLastPost;
