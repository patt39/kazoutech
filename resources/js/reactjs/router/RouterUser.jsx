import React from "react";
import {Route, Switch,withRouter} from 'react-router-dom';
import IndexSite from "../components/user/IndexSite";
import AboutSite from "../components/user/pages/AboutSite";
import ConceptSite from "../components/user/pages/ConceptSite";
import FaqSiteIndex from "../components/user/faq/FaqSiteIndex";
import contactUserSite from "../components/user/contact/ContactUserSite"
import OccupationSiteIndex from "../components/user/occupation/OccupationSiteIndex";
import OccupationSiteSlug from "../components/user/occupation/OccupationSiteSlug";
import CategoryOccupationShow from "../components/user/occupation/categoryoccupation/CategoryOccupationShow";
import BlogSiteIndex from "../components/user/blog/BlogSiteIndex";
import BlogSiteShow from "../components/user/blog/BlogSiteShow";
import BlogSiteCreate from "../components/user/blog/traitement/BlogSiteCreate";
import BlogSiteByCategoriesOccupation from "../components/user/blog/BlogSiteByCategoriesOccupation";
import AnnonceSiteIndex from "../components/user/annonce/AnnonceSiteIndex";
import AnnonceSiteShow from "../components/user/annonce/AnnonceSiteShow";
import CharbonneurSiteIndex from "../components/user/charbonneur/CharbonneurSiteIndex";
import TemoignageSite from "../components/user/temoignage/TemoignageSite";
import TermConditionSite from "../components/user/infos/TermConditionSite";
import PoliticConfidentialitySite from "../components/user/infos/PoliticConfidentialitySite";
import LicenceSite from "../components/user/infos/LicenceSite";
import AnnonceSiteByOccupation from "../components/user/annonce/AnnonceSiteByOccupation";
import AnnonceSiteEdit from "../components/user/annonce/traitement/AnnonceSiteEdit";
import AnnonceSiteByOccupationCity from "../components/user/annonce/AnnonceSiteByOccupationCity";
import AnnonceSiteByOccupationCreate from "../components/user/annonce/traitement/AnnonceSiteByOccupationCreate";
import AnnonceSiteByCitySlug from "../components/user/annonce/AnnonceSiteByCitySlug";
import AnnonceSiteByOccupationbyCategoryoccupation
    from "../components/user/annonce/AnnonceSiteByOccupationbyCategoryoccupation";
import AnnonceSiteByOccupationCategoryoccupationCity
    from "../components/user/annonce/AnnonceSiteByOccupationCategoryoccupationCity";
import CharbonneurSiteByCity from "../components/user/charbonneur/CharbonneurSiteByCity";
import CharbonneurSiteByOccupation from "../components/user/charbonneur/CharbonneurSiteByOccupation";
import ProfileSiteIndex from "../components/user/profile/ProfileSiteIndex";
import ProfileUserSiteIndex from "../components/user/profile/ProfileUserSiteIndex";
import ProfileUserSiteEdit from "../components/user/profile/ProfileUserSiteEdit";
import LoginSIteIndex from "../components/user/auth/LoginSIteIndex";
import BlogSiteEdit from "../components/user/blog/traitement/BlogSiteEdit";
import DevenirCharbonneurSite from "../components/user/auth/DevenirCharbonneurSite";
import RegisterUserSite from "../components/user/auth/RegisterUserSite";
import AnnonceSiteByCategoryoccupationCreate
    from "../components/user/annonce/traitement/AnnonceSiteByCategoryoccupationCreate";



const RouterUser = props => (

    <Switch>
        <Route exact path="/" strict component={IndexSite}/>
        <Route exact path="/home" component={IndexSite}/>
        <Route exact path="/login" component={LoginSIteIndex}/>
        <Route exact path="/charbonneur/:username/" component={withRouter(ProfileSiteIndex)}/>
        <Route exact path="/user" component={withRouter(ProfileUserSiteIndex)}/>
        <Route exact path="/charbonneur/edit/:username" component={withRouter(ProfileUserSiteEdit)}/>
        <Route exact path="/occupations/" component={OccupationSiteIndex}/>
        <Route exact path="/occupations/:occupation/" component={OccupationSiteSlug}/>
        <Route exact path="/occupations/:occupation/:categoryoccupation/" component={CategoryOccupationShow}/>
        <Route exact path="/blog/" component={BlogSiteIndex}/>
        <Route exact path="/blog/p/:id/edit" component={BlogSiteEdit}/>
        <Route exact path="/blog/:occupation/" component={withRouter(BlogSiteByCategoriesOccupation)}/>
        <Route exact path="/blog/:occupation/:blog/" component={withRouter(BlogSiteShow)}/>
        <Route exact path="/blog/p/new/create/" component={BlogSiteCreate}/>
        <Route exact path="/annonces/" component={AnnonceSiteIndex}/>
        <Route exact path="/annonces/:occupation/:catagoryoccupation/" component={withRouter(AnnonceSiteByOccupationbyCategoryoccupation)}/>
        <Route exact path="/annonces/:occupation/:catagoryoccupation/:city/" component={withRouter(AnnonceSiteByOccupationCategoryoccupationCity)}/>
        <Route exact path="/annonces/:occupation/:catagoryoccupation/:city/:annonce/" component={withRouter(AnnonceSiteShow)}/>
        <Route exact path="/occupations/:occupation/:categoryoccupation/new/create/" component={AnnonceSiteByCategoryoccupationCreate}/>
        <Route exact path="/annonces/c/:city" component={withRouter(AnnonceSiteByCitySlug)}/>
        <Route exact path="/annonces/:occupation/" component={withRouter(AnnonceSiteByOccupation)}/>
        <Route exact path="/annonces/:occupation/v/:city" component={AnnonceSiteByOccupationCity}/>
        <Route exact path="/annonces/:occupation/p/annonce/new/create/" component={AnnonceSiteByOccupationCreate}/>
        <Route exact path="/annonces/:occupation/p/annonce/:id/edit/" component={AnnonceSiteEdit}/>
        <Route exact path="/charbonneurs/" component={CharbonneurSiteIndex}/>
        <Route exact path="/charbonneurs/:occupation/" component={withRouter(CharbonneurSiteByOccupation)}/>
        <Route exact path="/charbonneurs/:occupation/:city/" component={withRouter(CharbonneurSiteByCity)}/>
        <Route exact path="/faqs/" component={FaqSiteIndex}/>
        <Route exact path="/about/" component={AboutSite}/>
        <Route exact path="/concept/" component={ConceptSite}/>
        <Route exact path="/contacts/" component={contactUserSite}/>
        <Route exact path="/temoignages/" component={TemoignageSite}/>
        <Route exact path="/condition_utilisation/" component={TermConditionSite}/>
        <Route exact path="/licence_site/" component={LicenceSite}/>
        <Route exact path="/politique_confidentialité/" component={PoliticConfidentialitySite}/>
        <Route exact path="/devenir_charbonneur/" component={DevenirCharbonneurSite}/>
        <Route exact path="/register/" component={RegisterUserSite}/>
    </Switch>
);
export default RouterUser;
