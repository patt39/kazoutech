import React, { Component } from "react";
import {Link, NavLink} from "react-router-dom";
import { Button } from "reactstrap";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class NavCategoryandCity extends Component {
    constructor(props) {
        super(props);
        this.state = {
            cities:[],
            catagoryoccupations:[],
        }
    }

    componentDidMount() {
        let SlugCategoryoccupation = this.props.match.params.catagoryoccupation;
        let SlugOccupation = this.props.match.params.occupation;
        dyaxios.get(route('api.apiannoncesbycategoryoccupationcountbycity',[SlugOccupation,SlugCategoryoccupation])).then(response =>
            this.setState({
                cities: [...response.data],
            }));

        dyaxios.get(route('apiannoncesbyoccupationcount.view',[SlugOccupation,SlugCategoryoccupation])).then(response =>
            this.setState({
                catagoryoccupations: [...response.data],
            }));
    }

    render() {
        const {catagoryoccupations,cities} = this.state;
        let SlugOccupation = this.props.match.params.occupation;
        let SlugCategoryoccupation = this.props.match.params.catagoryoccupation;
        return (

          <>

              <div className="card mb-3">

                  <div className="card-header h6">Categories</div>
                  <div className="card-body">
                      <ul className="list-unstyled">

                          {catagoryoccupations.map((item) => (
                              <li key={item.id} className="mb-2">
                                  <Link to={`/annonces/${SlugOccupation}/${item.slug}/`}>
                                      {item.name}
                                  </Link>
                              </li>
                          ))}
                      </ul>

                  </div>
              </div>

              <div className="card mb-3">

                  <div className="card-header h6">Villes</div>
                  <div className="card-body">
                      <ul className="list-unstyled">

                          {cities.map((item) => (
                              <li key={item.id} className="mb-2">
                                  <Link to={`/annonces/${SlugOccupation}/${SlugCategoryoccupation}/${item.slug}/`}>
                                      {item.name}
                                  </Link>
                              </li>
                          ))}

                          <li className="mb-2">
                              <Link to={`/all_cities/`} >
                                  Autre ville...
                              </Link>
                          </li>
                      </ul>

                  </div>
              </div>

          </>

        )
    }

}

export default NavCategoryandCity;
