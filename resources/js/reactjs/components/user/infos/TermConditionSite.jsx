import React, {Component} from "react";
import NavUserSIte from "../../inc/NavUserSIte";
import FooterUserSite from "../../inc/FooterUserSite";


class TermConditionSite extends Component {

    constructor(props) {
        super(props);
        this.state = {
            condition: {},
        }
    }

    // lifecycle method
    componentDidMount() {
        let item = this.props.match.params.condition;
        let url = route('occupations.view', item);
        dyaxios.get(url).then(response => this.setState({condition: response.data,}));
    }

    render() {
        const {condition} = this.state;
        const composantTitle = 'Terme et condition';
        document.title = `${composantTitle} | Kazoutech`;

        return (
            <>
                <div className="landing-page">
                    <NavUserSIte/>

                    <div className="col-md-12">
                        <div dangerouslySetInnerHTML={{__html: condition.body}}/>
                    </div>
                    <FooterUserSite/>
                </div>
            </>

        )
    }

}

export default TermConditionSite;
