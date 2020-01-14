import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";


class PoliticConfidentialitySite extends Component {

    constructor(props) {
        super(props);
        this.state = {
            confidentialities: [],
        }
    }

    // lifecycle method
    componentDidMount() {
        let url = route('api_active.confidentialities');
        dyaxios.get(url).then(response => this.setState({confidentialities: response.data}));
    }

    render() {
        const {confidentialities} = this.state;
        const composantTitle = 'Terme et condition';
        document.title = `${composantTitle} | Kazoutech`;

        return (
            <>
                <div className="landing-page">
                    <NavUserSIte/>

                    <div className="wrapper">
                        <div className="page-header page-header-mini header-filter">
                            <div className="page-header-image page-header-mini"
                                 style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/kevin-grieve.jpg' + ")"}}/>
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto text-center">
                                        <h2 className="display-2 text-white">Politique de Confidentialité</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="main main-raised">
                            <div className="container mt--100 mb-5 upper">
                                <div className="row">
                                    <div className="col-lg-12 mx-auto">
                                        <div className="card card-profile" data-image="img-rounded">
                                            <div className="row justify-content-center pt-100 pb-5">
                                                {confidentialities.map((item) => (
                                                    <div className="col-lg-11">
                                                        <h3 className="display-3">{item.title}</h3>
                                                        <div className="description mb-2"
                                                             dangerouslySetInnerHTML={{__html: item.body}}/>
                                                    </div>
                                                ))}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <FooterUserSite/>
                </div>
            </>

        )
    }

}

export default PoliticConfidentialitySite;
