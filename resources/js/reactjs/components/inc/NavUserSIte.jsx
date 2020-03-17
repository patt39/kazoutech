import React, {Component} from "react";
import {Link, NavLink} from 'react-router-dom';

class NavUserSIte extends Component {
    constructor(props) {
        super(props);
        this.state = {};
        this.navLogout = this.navLogout.bind(this);
    }

    navLogout(e) {
        axios.post('/logout')
            .then(() => {
                window.location.reload();
            }).catch(() => {
            //
        });
    }

    render() {

        return (
            <nav id="navbar-main" className="navbar navbar-main navbar-expand-md navbar-transparent headroom">
                <div className="container container-devices">
                    <Link to={'/'} className="navbar-brand mr-lg-5">
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
                            <li className={'nav-item'}>
                                <Link to={'/occupations/'} className="nav-link" role="button">
                                    <i className="ni ni-app d-lg-none"/>
                                    <span className="nav-link-inner--text"><b>Demander un service</b></span>
                                </Link>
                            </li>
                            {$guest ?
                                <>
                                    <li className={'nav-item'}>
                                        <a href={'/devenir_charbonneur/'} className="nav-link" role="button">
                                            <i className="ni ni-app d-lg-none"/>
                                            <span className="nav-link-inner--text">
                                                <b>Dévenir charbonneur</b>
                                            </span>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="/login" className="btn btn-default">
                                            <span className="btn-inner--icon">
                                               <i className="ni ni-check-bold"/>
                                           </span>
                                            <span className="nav-link-inner--text pt-40 position-navbar"><b>Connexion</b></span>
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a href="/register" className="btn btn-outline-primary">
                                           <span className="btn-inner--icon">
                                               <i className="ni ni-circle-08"/>
                                           </span>
                                            <span className="nav-link-inner--text pt-40 position-navbar">Inscription</span>
                                        </a>
                                    </li>
                                </>
                                :
                                <li className="nav-item dropdown">
                                    <a href=".." className="nav-link" data-toggle="dropdown" role="button">
                                        <span><img src={$userKazou.avatar} className="avatar"/></span>
                                        <span className="nav-link-inner--text"><b>{$userKazou.name}</b></span>
                                    </a>
                                    <div className="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        {$userKazou.my_status === 'active' && (
                                            <a href="/dashboard" className="dropdown-item">
                                                <i className="ni ni-building text-muted"/>
                                                Dashboard
                                            </a>
                                        )}
                                        <Link to={`/user/profile/edit/`} className="dropdown-item">
                                            <i className="ni ni-lock-circle-open text-muted"/>
                                            Editer mon profile
                                        </Link>
                                        <Link to={`/charbonneur/${$userKazou.username}/`} className="dropdown-item">
                                            <i className="ni ni-circle-08 text-success"/>
                                            Mon profile
                                        </Link>
                                        <a className="dropdown-item" onClick={() => this.navLogout()}>
                                            <i className="ni ni-atom text-info"/>
                                            Déconnexion
                                        </a>
                                    </div>
                                </li>
                            }
                        </ul>
                    </div>
                </div>
            </nav>
        )
    }
}

export default NavUserSIte;
