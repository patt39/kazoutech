import React, { Component } from "react";
import { Link,NavLink } from "react-router-dom";
import Skeleton from 'react-loading-skeleton';
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class BlogOccupationList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            occupations: [],
        }
    }


    componentDidMount() {
        dyaxios.get(route('api_active.occupations')).then(response => this.setState({ occupations: [...response.data], }));
    }

    render() {
        const { occupations } = this.state;
        return (

            <div className={'row'}>
                <div className="col-md-12 ml-auto mr-auto text-center">
                    {occupations.length ? 
                    <>  {occupations.map((item,index) => (

                        <NavLink key={index} to={`/blog/${item.slug}/`}
                                 className="btn btn-outline-primary ">
                            {item.name}
                        </NavLink>
                      ))}
                    </>:<Skeleton count={2}/>}
                </div>
            </div>

        )
    }

}

export default BlogOccupationList;
