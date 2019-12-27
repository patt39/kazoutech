import React, {Component} from "react";



class SlideHomeList extends Component{
    constructor(props) {
        super(props);
        this.state = {
            slidehomes : [],
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
        return(

            <div className="page-header page-header-small header-filter">
                { slidehomeslength > 0 && (
                    <div id="carouselHomeIndicators" className="carousel slide" data-ride="carousel">

                        <ol className="carousel-indicators">
                            <li data-target="#carouselHomeIndicators" data-slide-to="0" className="active"></li>
                            <li data-target="#carouselHomeIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselHomeIndicators" data-slide-to="2"></li>
                        </ol>


                        <div className="carousel-inner">

                            <div className="carousel-item active">
                                <img className="d-block w-100"
                                     src="https://images.unsplash.com/photo-1457904375453-3e1fc2fc76f4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1800&q=80"
                                     alt="First slide"/>
                                <div className="carousel-caption d-none d-md-block">
                                    <h1 className="display-1">Titre Text</h1>
                                    <p>Sous-titre Text</p>
                                </div>
                            </div>


                            {slidehomes.map((item) => (
                                <div key={item.id} className="carousel-item">
                                    <img className="d-block w-100"
                                         src={item.photo}
                                         alt={item.title}/>
                                    <div className="carousel-caption d-none d-md-block">
                                        <h1 className="display-1">Titre Text</h1>
                                        <p>Sous-titre Text</p>
                                    </div>
                                </div>
                            ))}


                        </div>
                        <a className="carousel-control-prev" href="#carouselHomeIndicators" role="button" data-slide="prev">
                            <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span className="sr-only">Previous</span>
                        </a>
                        <a className="carousel-control-next" href="#carouselHomeIndicators" role="button" data-slide="next">
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
