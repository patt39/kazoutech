import React, {Component} from "react";
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";


class TermConditionSite extends Component {

    constructor(props) {
        super(props);
        this.state = {
            conditions: {},
        }
    }

    // lifecycle method
    componentDidMount() {
        let item = this.props.match.params.conditions;
        let url = route('conditions.view', item);
        dyaxios.get(url).then(response => this.setState({conditions: response.data}));
    }

    render() {
        const {conditions} = this.state;
        const composantTitle = 'Terme et condition';
        document.title = `${composantTitle} | Kazoutech`;

        return (
            <>
                <div className="landing-page">
                    <NavUserSIte/>

                    <div className="container">
                        <div className="row mb-5">
                            <div className="col-lg-12 mx-auto">
                                <div className="description" dangerouslySetInnerHTML={{__html: conditions.body}}/>
                            </div>
                        </div>
                    </div>
                    <FooterUserSite/>
                </div>
            </>

        )
    }

}

export default TermConditionSite;
