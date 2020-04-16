import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import "../vuejs/axios"
import {BrowserRouter, Link, Route, Switch} from 'react-router-dom';
import RouterUser from "./router/RouterUser";
import ScrollToTop from "./components/inc/ScrollToTop";

class Index extends Component {
    render() {
        return (
            <BrowserRouter>
                <ScrollToTop/>
                <Route component={RouterUser} />
            </BrowserRouter>
        );
    }
}

if (document.getElementById('app_kazoutech')) {
    ReactDOM.render(<Index />, document.getElementById('app_kazoutech'));
}
export default Index;
