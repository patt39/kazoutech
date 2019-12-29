import React from "react";
import {Route, Switch,withRouter} from 'react-router-dom';
import IndexSite from "../components/user/IndexSite";
import AboutSite from "../components/user/AboutSite";
import ConceptSite from "../components/user/ConceptSite";
import FaqSiteIndex from "../components/user/faq/FaqSiteIndex";
import contactUserSite from "../components/user/contact/ContactUserSite"
import OccupationSiteIndex from "../components/user/occupation/OccupationSiteIndex";
import OccupationSiteSlug from "../components/user/occupation/OccupationSiteSlug";
import CategoryOccupationShow from "../components/user/occupation/categoryoccupation/CategoryOccupationShow";
import BlogSiteIndex from "../components/user/blog/BlogSiteIndex";
import BlogSiteShow from "../components/user/blog/BlogSiteShow";
import BlogSiteByCategoriesOccupation from "../components/user/blog/BlogSiteByCategoriesOccupation";
import AnnonceSiteIndex from "../components/user/annonce/AnnonceSiteIndex";
import AnnonceSiteShow from "../components/user/annonce/AnnonceSiteShow";
import CharbonneurSiteIndex from "../components/user/charbonneur/CharbonneurSiteIndex";
import TemoignageSite from "../components/user/temoignage/TemoignageSite";
import AnnonceSiteByOccupation from "../components/user/annonce/AnnonceSiteByOccupation";
import AnnonceSiteEdit from "../components/user/annonce/traitement/AnnonceSiteEdit";
import AnnonceSiteByOccupationCity from "../components/user/annonce/AnnonceSiteByOccupationCity";
import AnnonceSiteCreate from "../components/user/annonce/traitement/AnnonceSiteCreate";
import AnnonceSiteByCity from "../components/user/annonce/AnnonceSiteByCity";
import AnnonceSiteByOccupationbyCategoryoccupation
    from "../components/user/annonce/AnnonceSiteByOccupationbyCategoryoccupation";
import AnnonceSiteByOccupationCategoryoccupationCity
    from "../components/user/annonce/AnnonceSiteByOccupationCategoryoccupationCity";
import CharbonneurSiteByCity from "../components/user/charbonneur/CharbonneurSiteByCity";
import CharbonneurSiteByOccupation from "../components/user/charbonneur/CharbonneurSiteByOccupation";
import ProfileSiteIndex from "../components/user/profile/ProfileSiteIndex";
import LoginSIteIndex from "../components/user/auth/LoginSIteIndex";



const RouterUser = props => (

    <Switch>
        <Route exact path="/" component={IndexSite}/>
        <Route exact path="/home" component={IndexSite}/>
        <Route exact path="/login" component={LoginSIteIndex}/>
        <Route exact path="/charbonneur/:username/" component={withRouter(ProfileSiteIndex)}/>
        <Route exact path="/occupations/" component={OccupationSiteIndex}/>
        <Route exact path="/occupations/:occupation/" component={OccupationSiteSlug}/>
        <Route exact path="/occupations/:occupation/:categoryoccupation" component={CategoryOccupationShow}/>
        <Route exact path="/blog/" component={BlogSiteIndex}/>
        <Route exact path="/blog/:occupation/" component={withRouter(BlogSiteByCategoriesOccupation)}/>
        <Route exact path="/blog/:occupation/:blog/" component={withRouter(BlogSiteShow)}/>
        <Route exact path="/annonces/" component={AnnonceSiteIndex}/>
        <Route exact path="/annonces/:occupation/:catagoryoccupation" component={AnnonceSiteByOccupationbyCategoryoccupation}/>
        <Route exact path="/annonces/:occupation/:catagoryoccupation/:city" component={withRouter(AnnonceSiteByOccupationCategoryoccupationCity)}/>
        <Route exact path="/annonces/:occupation/:catagoryoccupation/:city/:annonce/" component={withRouter(AnnonceSiteShow)}/>
        <Route exact path="/annonces/v/:city" component={AnnonceSiteByCity}/>
        <Route exact path="/annonces/:occupation/" component={withRouter(AnnonceSiteByOccupation)}/>
        <Route exact path="/annonces/:occupation/v/:city" component={AnnonceSiteByOccupationCity}/>
        <Route exact path="/annonces/:occupation/new/p/create/" component={AnnonceSiteCreate}/>
        <Route exact path="/annonces/:occupation/p/annonce/:id/edit/" component={AnnonceSiteEdit}/>
        <Route exact path="/charbonneurs/" component={CharbonneurSiteIndex}/>
        <Route exact path="/charbonneurs/:city/" component={withRouter(CharbonneurSiteByCity)}/>
        <Route exact path="/charbonneurs/:city/:occupation/" component={withRouter(CharbonneurSiteByOccupation)}/>
        <Route exact path="/faqs/" component={FaqSiteIndex}/>
        <Route exact path="/about/" component={AboutSite}/>
        <Route exact path="/concept/" component={ConceptSite}/>
        <Route exact path="/contacts/" component={contactUserSite}/>
        <Route exact path="/temoignages/" component={TemoignageSite}/>
    </Switch>
);
export default RouterUser;
