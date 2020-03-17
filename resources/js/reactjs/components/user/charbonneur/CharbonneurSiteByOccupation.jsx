import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import {Link} from "react-router-dom";
import CharbonneurList from "./CharbonneurList";
import CharbonneurCityList from "./CharbonneurCityList";
import NavoccupationforCharbonneur from "./NavoccupationforCharbonneur";

class CharbonneurSiteByOccupation extends Component {
    constructor(props) {
        super(props);
        this.state = {
            charbonneursbyoccupation: {userbyoccupations:[]},
        }
    }

    // lifecycle method
    componentDidMount() {
        let SlugOccupation = this.props.match.params.occupation;
        dyaxios.get(route('api_active_charbonneurs_occupation.view',[SlugOccupation])).then(response =>
                this.setState({
                    charbonneursbyoccupation: response.data,
                }));
    }

    render() {
        const {charbonneursbyoccupation} = this.state;
        document.title = `Charbonneurs en ${charbonneursbyoccupation.name || "kazoutech"} | Kazoutech`;
        let users = charbonneursbyoccupation.userbyoccupations;
        return (

            <div className="about-us">
                <NavUserSIte/>
                <div className="wrapper">
                    <div className="page-header page-header-mini header-filter">
                        <div className="page-header-image page-header-mini"
                             style={{backgroundImage: "url(" + charbonneursbyoccupation.photo + ")"}}/>
                        <div className="container">
                            <div className="row">
                                <div className="col-lg-10 mx-auto text-center">
                                    <h4 className="title text-white">Trouver le meilleur <b style={{ textTransform: "lowercase" }}> {charbonneursbyoccupation.name}</b> au Cameroun </h4>
                                    <div className="description">
                                        <Link to={'/charbonneurs/'} className="text-white">
                                            <i className="fa fa-chevron-circle-left"/> Tous les charbonneurs
                                        </Link>
                                    </div>
                                    <div className="text-white">
                                        <span>{charbonneursbyoccupation.userbyoccupations_count} {charbonneursbyoccupation.userbyoccupations_count > 1 ? "charbonneurs" : "charbonneur"} <b style={{ textTransform: "lowercase" }}> {charbonneursbyoccupation.name}</b></span>
                                    </div>
                                    <div className="mt-3">
                                        <Link to={`/occupations/${charbonneursbyoccupation.slug}/`} className="btn btn-lg btn-primary">
                                            Demander un service {charbonneursbyoccupation.name}
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="section features-4">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-4">

                                    <CharbonneurCityList {...this.props} {...charbonneursbyoccupation}/>

                                  <NavoccupationforCharbonneur/>


                                </div>
                                <div className="col-md-8 ">
                                    <div className="row">

                                        {users.map((item) => (
                                            <CharbonneurList key={item.id} {...item}/>
                                        ))}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <FooterUserSite/>
                </div>
            </div>
        )
    }

}

export default CharbonneurSiteByOccupation;
