import React, {Component} from "react";
import FooterUserSite from "../../inc/FooterUserSite";
import NavUserSIte from "../../inc/NavUserSIte";
import {NavLink} from "react-router-dom";
import moment from "moment";
import ProfileSiteAnnonces from "./ProfileSiteAnnonces";
import ProfileSiteAvisUser from "./ProfileSiteAvisUser";


class ProfileSiteIndex extends Component {
    constructor(props) {
        super(props);
        this.state = {
            userProfile : {annonces:[],city:[]},
        };

        this.deleteAnnonce = this.deleteAnnonce.bind(this);
    }

    deleteAnnonce(id) {
        Swal.fire({
            text: 'Etes vous sure de vouloir supprimer cette annonce?',
            animation: false,
            customClass: 'animated shake',
            buttonsStyling: false,
            confirmButtonClass: "btn btn-success btn-sm",
            cancelButtonClass: 'btn btn-danger btn-sm',
            confirmButtonText: 'Oui supprimer',
            cancelButtonText: 'Non annuler',
            showCancelButton: true,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                const url = route('annonces.destroy',id);
                //Envoyer la requet au server
                dyaxios.delete(url).then(() => {

                    //Redirect after create
                    this.loadItem();
                    /** Alert notify bootstrapp **/
                    $.notify({
                            // title: 'Update FAQ',
                            message: 'Annonce supprimée avec succès'
                        },
                        {
                            allow_dismiss: false,
                            type: 'primary',
                            placement: {
                                from: 'bottom',
                                align: 'right'
                            },
                            animate: {
                                enter: 'animated fadeInRight',
                                exit: 'animated fadeOutRight'
                            },
                        });
                    /** End alert ***/
                }).catch(() => {
                    //Failled message
                    $.notify("Ooopss! Une erreur est survenue", {
                        allow_dismiss: false,
                        type: 'danger',
                        animate: {
                            enter: 'animated bounceInDown',
                            exit: 'animated bounceOutUp'
                        }
                    });
                })
            }
        });
    }

    loadItem() {
        let Username = this.props.match.params.username;
        dyaxios.get(route('api_profile.view',[Username])).then(response =>
            this.setState({
                userProfile: response.data,
            }));
    }
    // lifecycle method
    componentDidMount() {
      this.loadItem();
    }

    render() {
        const {userProfile} = this.state;
        let annonces = userProfile.annonces;
        const composantTitle = `${userProfile.name || "Profile"}`;
        document.title = `${composantTitle} | Kazoutech`;
        return (

            <div className="profile-page">
                <NavUserSIte/>
                <div className="wrapper">
                    <section className="section-profile-cover section-shaped my-0">
                            {userProfile.city_id && (
                                <img className="bg-image" src={userProfile.city.photo} style={{width: "100%"}}/>
                            )}
                            <div className="separator separator-bottom separator-skew">
                                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <polygon className="fill-secondary" points="2560 0 2560 100 0 100"/>
                                </svg>
                            </div>
                    </section>
                    <section className="section bg-secondary">
                        <div className="container">
                            <div className="card card-profile shadow mt--300">
                                <div className="px-4">
                                    <div className="row justify-content-center">
                                        <div className="col-lg-3 order-lg-2">
                                            <div className="card-profile-image">
                                                <NavLink to={`/charbonneur/${userProfile.username}/`}>
                                                    <img src={userProfile.avatar}
                                                         className="rounded-circle"/>
                                                </NavLink>
                                            </div>
                                        </div>
                                        <div className="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                                            <div className="card-profile-actions py-4 mt-lg-0">
                                                {!$guest && (
                                                  <>
                                                      {$userKazou.id === userProfile.id  && (
                                                          <a href="#" className="btn btn-sm btn-info mr-4">Editer mon profile</a>
                                                      )}
                                                  </>

                                                )}

                                                {userProfile.status_profile_verify && (
                                                    <button  type={'button'} className="btn btn-sm btn-success float-right">
                                                        <i className="ni ni-check-bold"/>Identité vérifiée
                                                    </button>
                                                )}
                                            </div>
                                        </div>
                                        <div className="col-lg-4 order-lg-1">
                                            <div className="card-profile-stats d-flex justify-content-center">

                                                <div>
                                                    <span className="heading">{annonces.length}</span>
                                                    <span className="description" title={'Toutes les annonces'}>Annonces</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="text-center mt-5">
                                        <h3>{userProfile.name}<span className="font-weight-light">, 27</span></h3>
                                        {userProfile.city_id && (
                                            <div className="h6 font-weight-300">
                                                <i className="ni location_pin mr-2"/><b>{userProfile.city.name}</b>
                                            </div>
                                        )}

                                        <div className="h6 mt-4"><i className="ni business_briefcase-24 mr-2"/>Solution
                                            Manager - Creative Tim Officer
                                        </div>
                                        <div>
                                            <i className="ni education_hat mr-2"/>University of Computer Science
                                        </div>

                                        <br/>
                                        <div className="mt-2 text-center">
                                            <NavLink to={`/occupations/`} className="btn btn-info btn-hp btn-break">
                                                De quel service avez-vous besoin ?
                                            </NavLink>
                                        </div>
                                        <br/>
                                    </div>

                                    <ProfileSiteAvisUser {...this.props}/>

                                    {$guest ?
                                        <>
                                            {annonces.length > 0 && (
                                                <div className="mt-5 py-5 border-top text-left">
                                                    <div className="row">

                                                        {annonces.map((item) => (
                                                            <ProfileSiteAnnonces key={item.id} {...item} deleteAnnonce={this.deleteAnnonce}/>
                                                        ))}

                                                    </div>
                                                </div>
                                            )}
                                        </>
                                        :null

                                    }

                                </div>
                            </div>
                        </div>
                    </section>
                    <FooterUserSite/>
                </div>
            </div>
        )
    }

}

export default ProfileSiteIndex;
