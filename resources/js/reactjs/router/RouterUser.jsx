import React from "react";
import {Route, Switch} from 'react-router-dom';
import FaqSiteIndex from "../components/user/faq/FaqSiteIndex";
import OccupationSiteIndex from "../components/user/occupation/OccupationSiteIndex";
import IndexSite from "../components/user/IndexSite";


const RouterUser = props => (

    <Switch>
        <Route exact path="/" component={IndexSite}/>
        <Route exact path="/occupations/" component={OccupationSiteIndex}/>
        <Route exact path="/faqs/" component={FaqSiteIndex}/>
    </Switch>
);
export default RouterUser;
