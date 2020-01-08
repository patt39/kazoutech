import React, {Component} from "react";
import NavUserSIte from "../../../inc/NavUserSIte";
import FooterUserSite from "../../../inc/FooterUserSite";
import CategoryOcupationHeader from "../../../inc/CategoryOcupationHeader";
import CitySite from "../../city/CitySite";


class CategoryOccupationShow extends Component {
    constructor(props) {
        super(props);
        this.state = {
            categoryoccupation: {user: [], occupation: []}
        }
    }


    componentDidMount() {
        let itemoccupation = this.props.match.params.occupation;
        let itemcategoryoccupation = this.props.match.params.categoryoccupation;
        let url = route('categoryoccupations.view', [itemoccupation, itemcategoryoccupation]);
        dyaxios.get(url).then(response => this.setState({categoryoccupation: response.data,}));
    }

    render() {
        const {categoryoccupation} = this.state;
        const composantTitle = `${categoryoccupation.name}`;
        document.title = `${composantTitle} | Kazoutech`;
        return (

            <>
                <div className="landing-page">
                    <NavUserSIte/>

                    <div className="wrapper">
                        <CategoryOcupationHeader {...categoryoccupation}/>
                        <div className="cd-section" id="accordion">
                            <div className="accordion-1">
                                <div className="container">

                                    <div className={'row'}>

                                        <div className="container">
                                            <div className="row mb-5">
                                                <div className="col-lg-12 mr-auto">
                                                    <br>
                                                    </br>
                                                    <h3 className="display-4">Pour tout vos bésoin <b>{categoryoccupation.name}</b></h3>
                                                    <div className="description" dangerouslySetInnerHTML={{__html: categoryoccupation.description}}/>
                                                </div>
                                            </div>
                                            <div className="row align-items-center">

                                            </div>
                                        </div>

                                    </div>
                                    <CitySite/>
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

export default CategoryOccupationShow;
