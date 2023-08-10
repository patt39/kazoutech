import React, { Component } from "react";

class TestimonialList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            testimonials: [],
        }
    }

    // lifecycle method
    componentDidMount() {
        dyaxios.get(route('api_active.testimonials')).then(response =>
            this.setState({
                testimonials: [...response.data],
            }));
    }

    render() {
        const {testimonials} = this.state;
        return (
            <section className="kazouTechAbout-wrapper team">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12 ml-auto mr-auto text-center">
                            <h3 className="display-3">Ceux qui nous ont fait confiance</h3>
                            <p className="lead">En quelques mots, les personnes qui ont expérimenté notre service.
                                N'hesitez pas à nous contacter pour en savoir plus sur nous.</p>
                        </div>
                    </div>
                    <div className="section features-4">
                        <div className="container">
                            <div className="row align-items-center">
                                <div className="col-lg-12 mx-auto mt-4">
                                    <div className="row">
                                        {testimonials.map((item) => (

                                            <div key={item.id} className="col-md-4 mx-auto">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src={item.user.avatar} alt={item.user.username}/>
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">{item.role}</h6>
                                                        <h4 className="card-title">{item.user.name}</h4>
                                                        <p className="card-description" dangerouslySetInnerHTML={{__html: (item.body)}}/>
                                                    </div>
                                                </div>
                                            </div>
                                        ))}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        )
    }
}

export default TestimonialList;
