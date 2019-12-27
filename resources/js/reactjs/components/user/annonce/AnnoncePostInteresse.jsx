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
               <Link to={'/annonces'}>
                   <p>Merde ou son les info merde suis...</p>
               </Link>
               <div  className="media-body text-right">
                   <button type="button" className={`btn btn-sm btn-info btn-icon`}>
                       <span className="btn-inner--text">30032 FCFA</span>
                   </button>
                   <button type="button" className={`btn btn-sm btn-primary btn-icon`}>
                       <span className="btn-inner--text">Douala</span>
                   </button>
               </div>
           </>
        )
    }

}

export default AnnoncePostInteresse;
