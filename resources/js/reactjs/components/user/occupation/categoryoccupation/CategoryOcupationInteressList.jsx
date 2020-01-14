import React, { Component } from "react";
import { Link } from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');


class CategoryOcupationInteressList extends Component {
    constructor(props) {
        super(props);
    }


    render() {
        return (

           <>
               <div className="col-md-4">
                   <div className="card card-blog">
                       <div className="d-flex flex-column justify-content-between border rounded p-3">
                           <div className="mr-1">
                               <strong>
                                   <Link className="font-size-3 card-title" to={`/annonces/${this.props.occupation.slug}/${this.props.categoryoccupation.slug}/${this.props.city.slug}/${this.props.slug}/`}>
                                       {this.props.title.length > 30 ? this.props.title.substring(0, 30) + "..." : this.props.title}
                                   </Link>
                               </strong>
                               <div className="mt-2">
                                   <div className="mb-1 text-muted card-description font-size-2"
                                        dangerouslySetInnerHTML={{ __html: (this.props.body.length > 140 ? this.props.body.substring(0, 140) + "..." : this.props.body) }}/>
                               </div>
                           </div>
                           <div className="d-flex align-items-baseline justify-content-between mt-3 font-weight-medium">
                               <span className="pr-2 font-size-2">
                                   <i className="fas fa-stopwatch fa-lg"/> 7 h 30 de service
                               </span>
                               <div
                                   className="font-size-4 font-weight-black text-primary">
                                   <div className="price-content">
                                       <div className="price">
                                           <span>{this.props.price}</span>
                                           <span>€</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </>
        )
    }

}
export default CategoryOcupationInteressList;
