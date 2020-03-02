import React, { Component } from "react";
import {Link, NavLink} from "react-router-dom";
import { Button } from "reactstrap";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class NavCategoryandOccupation extends Component {
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
        dyaxios.get(route('apiannoncesbyoccupationcount.view',[SlugOccupation,SlugCategoryoccupation])).then(response =>
            this.setState({
                catagoryoccupations: [...response.data],
            }));
    }

    render() {
        const {catagoryoccupations} = this.state;
        let SlugOccupation = this.props.match.params.occupation;
        return (

          <>

              <ul className="list-unstyled">

                  {catagoryoccupations.map((item) => (
                      <li key={item.id} className="mb-2">
                          <Link to={`/annonces/${SlugOccupation}/${item.slug}/`}>
                              {item.name}
                          </Link>
                      </li>
                  ))}
              </ul>

          </>

        )
    }

}

export default NavCategoryandOccupation;
