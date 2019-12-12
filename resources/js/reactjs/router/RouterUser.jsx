import React from "react";
import {Route, Switch} from 'react-router-dom';
import IndexSite from "../components/user/IndexSite";
import FaqSiteIndex from "../components/user/faq/FaqSiteIndex";
import OccupationSiteIndex from "../components/user/occupation/OccupationSiteIndex";
import OccupationSiteSlug from "../components/user/occupation/OccupationSiteSlug";


const RouterUser = props => (

    <Switch>
        <Route exact path="/" component={IndexSite}/>
        <Route exact path="/occupations/" component={OccupationSiteIndex}/>
        <Route exact path="/occupations/:slug/" component={OccupationSiteSlug}/>
        <Route exact path="/faqs/" component={FaqSiteIndex}/>
    </Switch>
);
export default RouterUser;
