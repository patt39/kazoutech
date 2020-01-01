import React, {Component} from "react";

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
        var i = 0;
        return (

            <div className="page-header page-header-small header-filter">
                {slidehomeslength > 0 && (
                    <div id="carouselHomeIndicators" className="carousel slide" data-ride="carousel">
                        <ol className="carousel-indicators">
                            <li data-target="#carouselHomeIndicators" data-slide-to="0" className="active"></li>
                            {slidehomes.map((value, index) => {
                                return <li key={index} data-target="#carouselHomeIndicators" data-slide-to={index + 1}></li>
                            })}
                        </ol>
                        <div className="carousel-inner">
                            <div className="carousel-item active">
                                <img className="d-block w-100"
                                     src="https://www.servizidiwebmarketing.it/wp-content/uploads/2019/03/0-E-mail-marketing-come-farlo-1-1800x900.jpg"
                                     alt="First slide"/>
                                <div className="carousel-caption d-none d-md-block">
                                    <h1 className="display-1 kazouTech-red-color">Bienvenue chez KazouTech</h1>
                                    <p>Trouvez le prestataire idéal pour tous les services du quotidien</p>
                                </div>
                            </div>

                            {slidehomes.map((item) => (
                                <div key={item.id} className="carousel-item">
                                    <img className="d-block w-100"
                                         src={item.photo}
                                         alt={item.title}/>
                                    <div className="carousel-caption d-none d-md-block">
                                        <h1 className="display-1 kazouTech-red-color">{item.title}</h1>
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
