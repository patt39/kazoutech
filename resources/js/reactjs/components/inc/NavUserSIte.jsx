import React,{Component} from "react";
import {Link} from 'react-router-dom';


class NavUserSIte extends Component{

    render(){

        return (
           <nav id="navbar-main" className="navbar navbar-main navbar-expand-lg navbar-transparent headroom">
               <div className={'container'}>
                   <Link to={'/'}  className="navbar-brand mr-lg-5">
                   <img src=".." alt={'Kazoutech'}/>
                   </Link>
                   <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                           aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                       <span className="navbar-toggler-icon"/>
                   </button>
                   <div className="navbar-collapse collapse" id="navbar_global">
                       <div className="navbar-collapse-header">
                           <div className="row">
                               <div className="col-6 collapse-brand">
                                   <a href="/">
                                       <img src="/assets/img/vendor_site/brand/blue.png"/>
                                   </a>
                               </div>
                               <div className="col-6 collapse-close">
                                   <button type="button" className="navbar-toggler" data-toggle="collapse"
                                           data-target="#navbar_global" aria-controls="navbar_global"
                                           aria-expanded="false" aria-label="Toggle navigation">
                                       <span></span>
                                       <span></span>
                                   </button>
                               </div>
                           </div>
                       </div>
                       <ul className="navbar-nav navbar-nav-hover align-items-lg-center ml-lg-auto">
                           <li className="nav-item">
                               <a href="/dashboard" className="nav-link" role="button">
                                   <i className="ni ni-app d-lg-none"/>
                                   <span className="nav-link-inner--text"><b>Dashboard</b></span>
                               </a>
                           </li>
                           <li className={'nav-item'}>
                               <Link to={'/occupations/'} className="nav-link"  role="button">
                                   <i className="ni ni-app d-lg-none"/>
                                   <span className="nav-link-inner--text"><b>Demander un service</b></span>
                               </Link>
                           </li>
                           <li className={'nav-item'}>
                               <Link to={'/technician_become/'} className="nav-link"  role="button">
                                   <i className="ni ni-app d-lg-none"/>
                                   <span className="nav-link-inner--text"><b>Dévenir webtech</b></span>
                               </Link>
                           </li>
                               <li className="nav-item">
                                   <a href="/login" className="nav-link" role="button">
                                       <i className="ni ni-app d-lg-none"></i>
                                       <span className="nav-link-inner--text"><b>Connexion</b></span>
                                   </a>
                               </li>
                               <li className="nav-item">
                                   <a href="/register" className="btn btn-outline-primary" role="button">
                                       <span className="btn-inner--icon">
                                           <i className="ni ni-single-02"></i>
                                       </span>
                                       <span className="nav-link-inner--text pt-40 position-navbar">Inscription</span>
                                   </a>
                               </li>
                         </ul>
                   </div>
               </div>
           </nav>
        )
    }

}
export default NavUserSIte;
