import React from "react";
import {Route, Switch} from 'react-router-dom';
import IndexSite from "../components/user/IndexSite";
import AboutSite from "../components/user/AboutSite";
import FaqSiteIndex from "../components/user/faq/FaqSiteIndex";
import contactUserSite from "../components/user/contact/ContactUserSite"
import OccupationSiteIndex from "../components/user/occupation/OccupationSiteIndex";
import OccupationSiteSlug from "../components/user/occupation/OccupationSiteSlug";
import CategoryOccupationShow from "../components/user/occupation/categoryoccupation/CategoryOccupationShow";
import BlogSiteIndex from "../components/user/blog/BlogSiteIndex";
import BlogSiteShow from "../components/user/blog/BlogSiteShow";



const RouterUser = props => (

    <Switch>
        <Route exact path="/" component={IndexSite}/>
        <Route exact path="/occupations/" component={OccupationSiteIndex}/>
        <Route exact path="/occupations/:occupation/" component={OccupationSiteSlug}/>
        <Route exact path="/occupations/:occupation/:categoryoccupation" component={CategoryOccupationShow}/>
        <Route exact path="/blog/" component={BlogSiteIndex}/>
        <Route exact path="/blog/:occupation/:blog" component={BlogSiteShow}/>
        <Route exact path="/faqs/" component={FaqSiteIndex}/>
        <Route exact path="/about/" component={AboutSite}/>
        <Route exact path="/contacts/" component={contactUserSite}/>
    </Switch>
);
export default RouterUser;
