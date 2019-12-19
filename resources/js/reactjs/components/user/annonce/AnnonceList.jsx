import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class AnnonceList extends Component {
    constructor(props) {
        super(props);
        this.state = {
           //
        }
    }

    render() {
        return (

            <div key={this.props.id}
                 className="card card-blog card-plain blog-horizontal mb-5">
                <div className="row">
                    <div className="col-lg-10">
                        <h5 className="card-title">
                            <Link to={`/annonces/${this.props.occupation.slug}/${this.props.slug}/`}>
                                {this.props.title}
                            </Link>
                        </h5>
                        <p className="card-description">
                            <b dangerouslySetInnerHTML={{__html: (this.props.body.length > 156 ? this.props.body.substring(0, 156) + "..." : this.props.body)}}/>
                            <Link to={`/annonces/${this.props.occupation.slug}/${this.props.slug}/`}> lire la suite </Link>
                        </p>
                        <Link to={`/annonces/${this.props.occupation.slug}/${this.props.slug}/`}>
                            <b className="card-title">{this.props.user.name}</b> {moment(this.props.created_at).format('LL')}
                        </Link>
                    </div>
                </div>
            </div>


        )
    }

}

export default AnnonceList;
