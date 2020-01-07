import React, {Component} from "react";
import {Link,NavLink } from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class AnnoncePostInteresse extends Component {
    constructor(props) {
        super(props);
        this.state = {
            //
        }
    }


    componentDidMount() {

    }

    render() {
        return (
           <>
               <Link to={`/annonces/${this.props.occupation.slug}/${this.props.categoryoccupation.slug}/${this.props.city.slug}/${this.props.slug}/`}>
                   <p dangerouslySetInnerHTML={{ __html: (this.props.title.length > 38 ? this.props.title.substring(0, 38) + "..." : this.props.title) }} />
               </Link>
               <div  className="media-body text-right">
                   {this.props.price && (
                   <button type="button" className={`btn btn-sm btn-${this.props.user.color_name} btn-icon`}>
                       <span className="btn-inner--text">{this.props.price.toLocaleString(navigator.language, { minimumFractionDigits: 0 })} FCFA</span>
                   </button>)}
                   <button type="button" className={`btn btn-sm btn-${this.props.user.color_name} btn-icon`}>
                       <span className="btn-inner--text">{this.props.city.name}</span>
                   </button>
               </div>
           </>
        )
    }

}

export default AnnoncePostInteresse;
