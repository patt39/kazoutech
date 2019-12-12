import React, { Component } from "react";
import moment from "moment";
import { Link } from "react-router-dom";


class OccupationSiteSlug extends Component {

    constructor(props){
        super(props);
        this.state = {
            occupation: [],
        }
    }

    // lifecycle method
    componentDidMount() {
        let itemSlug = this.props.match.params.slug;
        let url = route('occupations.view',itemSlug);
        axios.get(url).then(response => this.setState({occupation: response.data,}));
    }

    render() {
        const { occupation} = this.state;
        const composantTitle = `${occupation.name}`;
        document.title = `${composantTitle} | Kaazoutech`;

        return (
            <>

            </>

        )
    }

}
export default OccupationSiteSlug;
