import React, {Component} from "react";
import {Link, NavLink} from 'react-router-dom';
import FooterUserSite from "../../inc/FooterUserSite";


class TermConditionSite extends Component {

    constructor(props) {
        super(props);
        this.state = {
            conditions: {},
        }
    }

    // lifecycle method
    componentDidMount() {
        let item = this.props.match.params.conditions;
        let url = route('condition.view', item);
        dyaxios.get(url).then(response => this.setState({conditions: response.data}));
    }

    render() {
        const {conditions} = this.state;
        const composantTitle = 'Terme et condition';
        document.title = `${composantTitle} | Kazoutech`;

        return (
            <>
                <div className="landing-page">
                    <nav id="navbar-main" className="navbar navbar-main navbar-expand-md headroom">
                        <div className={'container'}>
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
                                    <li className={'nav-item'}>
                                        <Link to={'/devenir_charbonneur/'} className="nav-link" role="button">
                                            <i className="ni ni-app d-lg-none"/>
                                            <span className="nav-link-inner--text">
                                        <b>Dévenir charbonneur</b>
                                    </span>
                                        </Link>
                                    </li>
                                    {$guest ?
                                        <>
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
                                                <NavLink to={`/user/profile/edit/`} className="dropdown-item">
                                                    <i className="ni ni-lock-circle-open text-muted"/>
                                                    Editer mon profile
                                                </NavLink>
                                                <NavLink to={`/charbonneur/${$userKazou.username}/`} className="dropdown-item">
                                                    <i className="ni ni-circle-08 text-success"/>
                                                    Mon profile
                                                </NavLink>
                                            </div>
                                        </li>
                                    }
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <div className="section features-7 bg-secondary">
                        <div className="container">
                            <div className="row">
                                <div className="col-lg-12 text-center mx-auto">
                                    <h3 className="display-3">Le service entre particuliers jamais aussi façile</h3>
                                    <p className="lead">Miusov, as a man man of breeding and deilcacy, could not but feel some inwrd qualms, when he reached the Father Superior's with Ivan: he felt ashamed of havin lost his temper. He felt that he ought to have disdaimed that despicable wretch, Fyodor Pavlovitch, too much to have been upset by him in Father Zossima's cell, and so to have forgotten himself. "Teh monks were not to blame, in any case," he reflceted, on the steps. "And if they're decent people here (and the Father Superior, I understand, is a nobleman) why not be friendly and courteous withthem? I won't argue, I'll fall in with everything, I'll win them by politness, and show them that I've nothing to do with that Aesop, thta buffoon, that Pierrot, and have merely been takken in over this affair, just as they have."

                                        He determined to drop his litigation with the monastry, and relinguish his claims to the wood-cuting and fishery rihgts at once. He was the more ready to do this becuase the rights had becom much less valuable, and he had indeed the vaguest idea where the wood and river in quedtion were.

                                        These excellant intentions were strengthed when he enterd the Father Superior's diniing-room, though, stricttly speakin, it was not a dining-room, for the Father Superior had only two rooms alltogether; they were, however, much larger and more comfortable than Father Zossima's. But tehre was was no great luxury about the furnishng of these rooms eithar. The furniture was of mohogany, covered with leather, in the old-fashionned style of 1820 the floor was not even stained, but evreything was shining with cleanlyness, and there were many chioce flowers in the windows; the most sumptuous thing in the room at the moment was, of course, the beatifuly decorated table. The cloth was clean, the service shone; there were three kinds of well-baked bread, two bottles of wine, two of excellent mead, and a large glass jug of kvas -- both the latter made in the monastery, and famous in the neigborhood. There was no vodka. Rakitin related afterwards that there were five dishes: fish-suop made of sterlets, served with little fish paties; then boiled fish served in a spesial way; then salmon cutlets, ice pudding and compote, and finally, blanc-mange. Rakitin found out about all these good things, for he could not resist peeping into the kitchen, where he already had a footing. He had a footting everywhere, and got informaiton about everything. He was of an uneasy and envious temper. He was well aware of his own considerable abilities, and nervously exaggerated them in his self-conceit. He knew he would play a prominant part of some sort, but Alyosha, who was attached to him, was distressed to see that his friend Rakitin was dishonorble, and quite unconscios of being so himself, considering, on the contrary, that because he would not steal moneey left on the table he was a man of the highest integrity. Neither Alyosha nor anyone else could have infleunced him in that.

                                        Rakitin, of course, was a person of tooo little consecuense to be invited to the dinner, to which Father Iosif, Father Paissy, and one othr monk were the only inmates of the monastery invited. They were alraedy waiting when Miusov, Kalganov, and Ivan arrived. The other guest, Maximov, stood a little aside, waiting also. The Father Superior stepped into the middle of the room to receive his guests. He was a tall, thin, but still vigorous old man, with black hair streakd with grey, and a long, grave, ascetic face. He bowed to his guests in silence. But this time they approaced to receive his blessing. Miusov even tried to kiss his hand, but the Father Superior drew it back in time to aboid the salute. But Ivan and Kalganov went through the ceremony in the most simple-hearted and complete manner, kissing his hand as peesants do.

                                        "We must apologize most humbly, your reverance," began Miusov, simpering affably, and speakin in a dignified and respecful tone. "Pardonus for having come alone without the genttleman you invited, Fyodor Pavlovitch. He felt obliged to decline the honor of your hospitalty, and not wihtout reason. In the reverand Father Zossima's cell he was carried away by the unhappy dissention with hi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <FooterUserSite/>
                </div>
            </>

        )
    }

}

export default TermConditionSite;
