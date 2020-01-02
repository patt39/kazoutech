import React, {Component} from "react";
import {Link} from "react-router-dom";

class SlideHomeList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            slidehomes: [],
        }
    }

    componentDidMount() {
        dyaxios.get(route('api_active_slidehomes')).then(response =>
            this.setState({
                slidehomes: [...response.data],
            }));
    }

    render() {
        const {slidehomes} = this.state;
        const slidehomeslength = slidehomes.length;
        return (

            <div className="page-header page-header-small header-filter">
                {slidehomeslength > 0 && (
                    <div id="carouselHomeIndicators" className="carousel slide" data-ride="carousel">
                        <ol className="carousel-indicators">
                            {slidehomes.map((value,index) => {
                                return <li key={value.id} data-target="#carouselHomeIndicators" data-slide-to={index} className={index === 0 ? "active" : ""}/>
                            })}
                        </ol>
                        <div className="carousel-inner">
                            {slidehomes.map((item,index) => (
                                <div key={item.id} className={`carousel-item ${index === 0 ? "active" : ""}`}>
                                    <img className="d-block w-100 kazouTech-carousel-image"
                                         src={item.photo}
                                         alt={item.title}/>
                                    <div className="carousel-caption d-none d-md-block">
                                        <h1 className="title text-white">{item.title}</h1>
                                        {item.redirect_link !== null && (
                                            <Link to={`${item.redirect_link}`} className={`btn btn-${item.color_link}`}>{item.text_link}</Link>
                                        )}
                                        <p>{item.description}</p>
                                    </div>
                                </div>
                            ))}
                        </div>
                        <a className="carousel-control-prev" href="#carouselHomeIndicators" role="button"
                           data-slide="prev">
                            <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span className="sr-only">Previous</span>
                        </a>
                        <a className="carousel-control-next" href="#carouselHomeIndicators" role="button"
                           data-slide="next">
                            <span className="carousel-control-next-icon" aria-hidden="true"></span>
                            <span className="sr-only">Next</span>
                        </a>
                    </div>
                )}
            </div>
        )
    }
}

export default SlideHomeList;
