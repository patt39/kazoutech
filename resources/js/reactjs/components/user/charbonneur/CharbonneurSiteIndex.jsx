import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import {Link} from "react-router-dom";
import CharbonneurList from "./CharbonneurList";
import AnnonceList from "../annonce/AnnonceList";


class CharbonneurSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {
            charbonneurs: [],
        }
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'Charbonneurs | Kazoutech';
        document.title = `${composantTitle}`;

        dyaxios.get(route('api_active_charbonneurs')).then(response =>
            this.setState({
                charbonneurs: [...response.data],
            }));
    }

    render() {
        const {charbonneurs} = this.state;
        return (
            <>


                <div className="about-us">
                    <NavUserSIte/>

                    <div className="wrapper">
                        <div className="page-header page-header-mini header-filter">
                            <div className="page-header-image page-header-mini"
                                 style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}/>
                            <div className="container">
                                <div className="row">
                                    <div className="col-lg-10 mx-auto text-center">
                                        <div className="description">
                                            <Link to={'/'} className="text-white">
                                                <i className="fa fa-chevron-circle-left"/> Retour à l'accueil
                                            </Link>
                                        </div>
                                        <h3 className="display-2 text-white">Charbonneurs</h3>
                                        <br/>
                                        <br/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div className="main main-raised">

                        <div className="container">

                            <div className={'row'}>

                                {charbonneurs.map((item) => (
                                <CharbonneurList  key={item.id} {...item}/>
                                ))}

                            </div>
                        </div>


                        </div>
                        <FooterUserSite/>
                    </div>
                </div>
            </>
        )
    }

}

export default CharbonneurSiteIndex;
