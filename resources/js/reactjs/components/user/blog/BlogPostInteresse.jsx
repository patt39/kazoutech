import React, {Component} from "react";
import {Link} from "react-router-dom";
import moment from 'moment'

require("moment/min/locales.min");
moment.locale('fr');

class BlogPostInteresse extends Component {
    constructor(props) {
        super(props);
        this.state = {
            blogsinteresse:[],
          //
        }
    }

    componentDidMount() {
        let SlugOccupation = this.props.match.params.occupation;
        dyaxios.get(route('api_active_interesse.blogs',[SlugOccupation])).then(response =>
            this.setState({
                blogsinteresse: [...response.data],
            }));
    }

    render() {
        const {blogsinteresse} = this.state;
        return (
            <>
                {blogsinteresse.map((item) => (
                    <div key={item.id} className="col-lg-3 col-md-6">
                        <div className="card card-product">
                            <div className="card-image">
                                <Link to={`/blog/${item.occupation.slug}/${item.slug}/`}>
                                    <img className="img rounded" alt={item.title} src={item.photo}/>
                                </Link>
                            </div>
                            <div className="card-body">

                                <h6 className="card-title text-center">
                                    <Link to={`/blog/${item.occupation.slug}/${item.slug}/`} className="card-link"> {item.title}</Link>
                                </h6>
                                <b/>
                                <p className="card-description">
                                    <b dangerouslySetInnerHTML={{__html: (item.body.length > 48 ? item.body.substring(0, 48) + "..." : item.body)}}/>
                                    <Link to={`/blog/${item.occupation.slug}/${item.slug}/`}> lire la suite </Link>
                                </p>
                            </div>
                        </div>
                    </div>
                ))}
            </>
        )
    }

}

export default BlogPostInteresse;
