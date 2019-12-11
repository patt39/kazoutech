import React, {Component} from "react";
import FooterUserSite from "../inc/FooterUserSite";
import NavUserSIte from "../inc/NavUserSIte";


class FaqSiteIndex extends Component {
    constructor(props){
        super(props);
        this.state = {
            faqs: [],
        }
    }

    // lifecycle method
    componentDidMount() {
        const composantTitle = 'FAQS';
        document.title = `${composantTitle} | Kaazoutech`;
    }
    render(){
        const {faqs} = this.state;
        return(

          <>
              <NavUserSIte/>
              <div className="faq-page">
                  <div className="wrapper">
                      <div className="page-header page-header-mini header-filter">
                          <div className="page-header-image page-header-mini" style={{backgroundImage: "url(" + '/assets/vendor_site/img/pages/nathan-dumlao.jpg' + ")"}}/>
                          <div className="container">
                              <div className="row">
                                  <div className="col-lg-10 mx-auto text-center">
                                      <h2 className="display-2 text-white">Frequently Asked Questions(FAQs)</h2>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div className="cd-section" id="accordion">
                          <div className="accordion-1">
                              <div className="container">
                                  <div className="row">
                                      <div className="col-md-12 ml-auto">
                                          <div className="accordion" id="accordionExample">
                                              <div className="card">
                                                  <div className="card-header" id="headingOne">
                                                      <h5 className="mb-0">
                                                          <button className="btn btn-link w-100 text-primary text-left"
                                                                  type="button" data-toggle="collapse"
                                                                  data-target="#collapseOne" aria-expanded="true"
                                                                  aria-controls="collapseOne">
                                                              How do I order?
                                                              <i className="ni ni-bold-down float-right pt-1"/>
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseOne" className="collapse show"
                                                       aria-labelledby="headingOne" data-parent="#accordionExample">
                                                      <div className="card-body opacity-8">
                                                          Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                          accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                          non cupidatat skateboard dolor brunch. Food truck quinoa
                                                          nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                          put a bird on it squid single-origin coffee nulla assumenda
                                                          shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                          wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                                          excepteur butcher vice lomo. Leggings occaecat craft beer
                                                          farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                          haven't heard of them accusamus labore sustainable VHS.
                                                      </div>
                                                  </div>
                                              </div>
                                              <div className="card">
                                                  <div className="card-header" id="headingTwo">
                                                      <h5 className="mb-0">
                                                          <button
                                                              className="btn btn-link w-100 text-primary text-left collapsed"
                                                              type="button" data-toggle="collapse"
                                                              data-target="#collapseTwo" aria-expanded="false"
                                                              aria-controls="collapseTwo">
                                                              How can i make the payment?
                                                              <i className="ni ni-bold-down float-right pt-1"/>
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseTwo" className="collapse" aria-labelledby="headingTwo"
                                                       data-parent="#accordionExample">
                                                      <div className="card-body opacity-8">
                                                          Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                          accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                          non cupidatat skateboard dolor brunch. Food truck quinoa
                                                          nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                          put a bird on it squid single-origin coffee nulla assumenda
                                                          shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                          wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                                          excepteur butcher vice lomo. Leggings occaecat craft beer
                                                          farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                          haven't heard of them accusamus labore sustainable VHS.
                                                      </div>
                                                  </div>
                                              </div>
                                              <div className="card">
                                                  <div className="card-header" id="headingThree">
                                                      <h5 className="mb-0">
                                                          <button
                                                              className="btn btn-link w-100 text-primary text-left collapsed"
                                                              type="button" data-toggle="collapse"
                                                              data-target="#collapseThree" aria-expanded="false"
                                                              aria-controls="collapseThree">
                                                              How much time does it take to receive the order?
                                                              <i className="ni ni-bold-down float-right pt-1"/>
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseThree" className="collapse"
                                                       aria-labelledby="headingThree" data-parent="#accordionExample">
                                                      <div className="card-body opacity-8">
                                                          Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                          accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                          non cupidatat skateboard dolor brunch. Food truck quinoa
                                                          nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                          put a bird on it squid single-origin coffee nulla assumenda
                                                          shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                          wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                                          excepteur butcher vice lomo. Leggings occaecat craft beer
                                                          farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                          haven't heard of them accusamus labore sustainable VHS.
                                                      </div>
                                                  </div>
                                              </div>
                                              <div className="card">
                                                  <div className="card-header" id="headingFour">
                                                      <h5 className="mb-0">
                                                          <button className="btn btn-link w-100 text-primary text-left"
                                                                  type="button" data-toggle="collapse"
                                                                  data-target="#collapseFour"
                                                                  aria-controls="collapseFour">
                                                              Can I resell the products?
                                                              <i className="ni ni-bold-down float-right pt-1"/>
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseFour" className="collapse"
                                                       aria-labelledby="headingFour" data-parent="#accordionExample">
                                                      <div className="card-body opacity-8">
                                                          Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                          accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                          non cupidatat skateboard dolor brunch. Food truck quinoa
                                                          nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                          put a bird on it squid single-origin coffee nulla assumenda
                                                          shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                          wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                                          excepteur butcher vice lomo. Leggings occaecat craft beer
                                                          farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                          haven't heard of them accusamus labore sustainable VHS.
                                                      </div>
                                                  </div>
                                              </div>
                                              <div className="card">
                                                  <div className="card-header" id="headingFifth">
                                                      <h5 className="mb-0">
                                                          <button className="btn btn-link w-100 text-primary text-left"
                                                                  type="button" data-toggle="collapse"
                                                                  data-target="#collapseFifth"
                                                                  aria-controls="collapseFifth">
                                                              Where do I find the shipping details?
                                                              <i className="ni ni-bold-down float-right pt-1"/>
                                                          </button>
                                                      </h5>
                                                  </div>
                                                  <div id="collapseFifth" className="collapse"
                                                       aria-labelledby="headingFifth" data-parent="#accordionExample">
                                                      <div className="card-body opacity-8">
                                                          Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                          accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                          non cupidatat skateboard dolor brunch. Food truck quinoa
                                                          nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                          put a bird on it squid single-origin coffee nulla assumenda
                                                          shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                          wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                                          excepteur butcher vice lomo. Leggings occaecat craft beer
                                                          farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                          haven't heard of them accusamus labore sustainable VHS.
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div className="section features-1">
                          <div className="container">
                              <div className="row">
                                  <div className="col-md-8 mx-auto text-center">
                                      <h3 className="display-3">Toujour pas resolu?</h3>
                                      <p className="lead">N'ayez crainte vos doutes et préocupation sont un devoir pour
                                          nos.</p>
                                  </div>
                              </div>
                              <div className="row">
                                  <div className="col-md-4">
                                      <div className="info">
                                          <div
                                              className="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                                              <i className="ni ni-settings-gear-65"/>
                                          </div>
                                          <h6 className="info-title text-uppercase text-primary">Social Conversations</h6>
                                          <p className="description opacity-8">We get insulted by others, lose trust for
                                              those others. We get back stabbed by friends. It becomes harder for us to
                                              give others a hand.</p>
                                          <a href="..." className="btn btn-primary" name="button">
                                              <span className="nav-link-inner--text pt-40">Inscription</span>
                                          </a>
                                      </div>
                                  </div>
                                  <div className="col-md-4">
                                      <div className="info">
                                          <div
                                              className="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                                              <i className="ni ni-atom"/>
                                          </div>
                                          <h6 className="info-title text-uppercase text-success">Analyze Performance</h6>
                                          <p className="description opacity-8">Don't get your heart broken by people we
                                              love, even that we give them all we have. Then we lose family over time. As
                                              we live, our hearts turn colder.</p>
                                          <a href=".." className="btn btn-primary" name="button">
                                              <span className="nav-link-inner--text pt-40">Inscription</span>
                                          </a>
                                      </div>
                                  </div>
                                  <div className="col-md-4">
                                      <div className="info">
                                          <div
                                              className="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                                              <i className="ni ni-world"/>
                                          </div>
                                          <h6 className="info-title text-uppercase text-warning">Measure Conversions</h6>
                                          <p className="description opacity-8">What else could rust the heart more over
                                              time? Blackgold. The time is now for it to be okay to be great. or being a
                                              bright color. For standing out.</p>
                                          <a href=".." className="btn btn-primary" name="button">
                                              <span className="nav-link-inner--text pt-40">Inscription</span>
                                          </a>
                                      </div>
                                  </div>
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
export default FaqSiteIndex;
