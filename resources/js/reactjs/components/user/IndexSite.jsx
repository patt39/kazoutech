import React,{Component} from "react";
import {Link} from 'react-router-dom'


class IndexSite extends Component{
    constructor(props){
        super(props);
        this.state = {
            faqs: [],
        }
    }

    loadItems(){

    }
    // lifecycle method
    componentDidMount() {
       this.loadItems();
    }
    render() {
        return(
            <>

            </>
        )
    }
}
export default IndexSite;
