import React from "react";
import {Route, Switch} from 'react-router-dom';
import FaqSiteIndex from "../components/user/FaqSiteIndex";


const RouterUser = props => (

    <Switch>
        <Route exact path="/faqs" component={FaqSiteIndex}/>
    </Switch>
);
export default RouterUser;
