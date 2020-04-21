import React, { Component } from "react";

class AboutMemberList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            aboutmenbers: [],
        }
    }

    // lifecycle method
    componentDidMount() {
        dyaxios.get(route('api_active.aboutmember')).then(response =>
            this.setState({
                aboutmenbers: [...response.data],
            }));
    }

    render() {
        const {aboutmenbers} = this.state;
        return (
            <section className="kazouTechAbout-wrapper team">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12 ml-auto mr-auto text-center">
                            <h3 className="display-3">Notre Equipe</h3>
                            <p className="lead">En quelques mots, les personnes derrière cette ingénieuse imagination se présentent.
                                N'hesitez pas à nous contacter pour mieux en savoir sur nous.</p>
                        </div>
                    </div>
                    <div className="section features-4">
                        <div className="container">
                            <div className="row align-items-center">
                                <div className="col-lg-12 mx-auto mt-4">
                                    <div className="row">
                                        {aboutmenbers.map((item) => (

                                            <div key={item.id} className="col-md-4 mx-auto">
                                                <div className="card card-profile" data-image="img-rounded">
                                                    <div className="card-avatar">
                                                        <img className="img" src={item.photo} />
                                                    </div>
                                                    <div className="card-body ">
                                                        <h6 className="card-category text-gray">{item.role}</h6>
                                                        <h4 className="card-title">{item.first_name} {item.last_name}</h4>
                                                        <p className="card-description" dangerouslySetInnerHTML={{__html: (item.description)}}/>
                                                        <div className="btn-wrapper profile text-center mt-3">
                                                            {item.twlink ?
                                                                <a target="_blank" href={`https://www.twitter.com/${item.instlink}`} className="btn btn-sm"
                                                                              data-toggle="tooltip" data-original-title="Follow me">
                                                                    <i className="fab fa-twitter"/>
                                                                </a>:null}

                                                            {item.fblink ?
                                                                <a target="_blank" href={`https://www.facebook.com/${item.fblink}`}
                                                                   className="btn btn-sm" data-toggle="tooltip" data-original-title="Like me">
                                                                    <i className="fab fa-facebook-square"/>
                                                                </a>:null}

                                                            {item.instlink ?
                                                                <a target="_blank" href={`https://www.linkedin.com/${item.instlink}`}
                                                                   className="btn btn-sm" data-toggle="tooltip" data-original-title="Follow me">
                                                                    <i className="fab fa-linkedin"/>
                                                                </a>:null}
                                                        </div>
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

export default AboutMemberList;
