@extends('inc.site._main')
@section('title', 'Home page')

@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    @include('inc.site.nav_site')
    <div class="landing-page">
        <div class="wrapper">
            <header class="header-4 skew-separator">
                <div class="header-wrapper">
                    <div class="page-header header-video">
                        <div class="overlay"></div>
                        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                            <source src="https://www.oberlo.com/wp-content/uploads/2018/10/1.-Pixabay.mp4" type="video/mp4">
                            <!-- <source src="../assets/video/jetsky.mp4" type="video/mp4"> -->
                        </video>
                        <div class="container text-center">
                            <div class="row">
                                <div class="col-lg-7 mx-auto">
                                    <h1 class="text-black" style="font-size: 100px">WELCOME</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="section features-6">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="info info-horizontal info-hover-primary">
                                <div class="icon icon-shape icon-shape-info rounded-circle text-white">
                                    <i class="ni ni-html5 text-info"></i>
                                </div>
                                <div class="description pl-4">
                                    <h5 class="title">For Developers</h5>
                                    <p>The time is now for it to be okay to be great. People in this world shun people for being great. For being a bright color. For standing out. But the time is now.</p>
                                    <a href="#" class="text-info">Learn more</a>
                                </div>
                            </div>
                            <div class="info info-horizontal info-hover-primary">
                                <div class="icon icon-shape icon-shape-info rounded-circle text-white">
                                    <i class="ni ni-app text-info"></i>
                                </div>
                                <div class="description pl-4">
                                    <h5 class="title">For Designers</h5>
                                    <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at. That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                                    <a href="#" class="text-info">Learn more</a>
                                </div>
                            </div>
                            <div class="info info-horizontal info-hover-primary">
                                <div class="icon icon-shape icon-shape-info rounded-circle text-white">
                                    <i class="ni ni-bell-55 text-info"></i>
                                </div>
                                <div class="description pl-4">
                                    <h5 class="title">For Beginners</h5>
                                    <p>That’s what I do. That’s what I’m here for. Don’t be afraid to be wrong because you can’t learn anything from a compliment. If everything I did failed - which it doesn't.</p>
                                    <a href="#" class="text-info">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-10 mx-md-auto">
                            <img class="ml-lg-5" src="/assets/vendor_site/img/ill/ill.png" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="section features-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="badge badge-primary badge-pill mb-3">Insight</span>
                            <h3 class="display-3">Full-Funnel Social Analytics</h3>
                            <p class="lead">The time is now for it to be okay to be great. For being a bright color. For standing out.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-lg icon-shape icon-shape-primary shadow rounded-circle">
                                    <i class="ni ni-settings-gear-65"></i>
                                </div>
                                <h6 class="info-title text-uppercase text-primary">Social Conversations</h6>
                                <p class="description opacity-8">We get insulted by others, lose trust for those others. We get back stabbed by friends. It becomes harder for us to give others a hand.</p>
                                <a href="javascript:;" class="text-primary">More about us
                                    <i class="ni ni-bold-right text-primary"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-lg icon-shape icon-shape-success shadow rounded-circle">
                                    <i class="ni ni-atom"></i>
                                </div>
                                <h6 class="info-title text-uppercase text-success">Analyze Performance</h6>
                                <p class="description opacity-8">Don't get your heart broken by people we love, even that we give them all we have. Then we lose family over time. As we live, our hearts turn colder.</p>
                                <a href="javascript:;" class="text-primary">Learn about our products
                                    <i class="ni ni-bold-right text-primary"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info">
                                <div class="icon icon-lg icon-shape icon-shape-warning shadow rounded-circle">
                                    <i class="ni ni-world"></i>
                                </div>
                                <h6 class="info-title text-uppercase text-warning">Measure Conversions</h6>
                                <p class="description opacity-8">What else could rust the heart more over time? Blackgold. The time is now for it to be okay to be great. or being a bright color. For standing out.</p>
                                <a href="javascript:;" class="text-primary">Check our documentation
                                    <i class="ni ni-bold-right text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="blogs-2">
                <div class="container-fluid">
                    <div class="row mb-md-5">
                        <div class="col-md-8 mx-auto">
                            <h3 class="display-3 text-center">Nos meilleur Techniciens</h3>
                            <p class="lead text-center">I always felt like I could do anything. That’s the main thing people are controlled by! Thoughts- their perception of themselves! They're slowed down by their perception of themselves. If you're taught you can’t do anything, you won’t do anything. I was taught I could do everything.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card card-blog card-background" data-animation="zooming">
                                <div class="full-background" style="background-image: url('/assets/vendor_site/img/sections/damian.jpg"></div>
                                <a href="javascript:;">
                                    <div class="card-body">
                                        <div class="content-bottom">
                                            <h6 class="card-category text-white opacity-8">AI at the Edge</h6>
                                            <h5 class="card-title">Research Byte</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-blog card-background" data-animation="zooming">
                                <div class="full-background" style="background-image: url('/assets/vendor_site/img/sections/ashim.jpg"></div>
                                <a href="javascript:;">
                                    <div class="card-body">
                                        <div class="content-bottom">
                                            <h6 class="card-category text-white opacity-8">Spectrum</h6>
                                            <h5 class="card-title">Data Virtualization</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-blog card-background" data-animation="zooming">
                                <div class="full-background" style="background-image: url('/assets/vendor_site/img/sections/odin.jpg"></div>
                                <a href="javascript:;">
                                    <div class="card-body">
                                        <div class="content-bottom">
                                            <h6 class="card-category text-white opacity-8">Touch on a trend</h6>
                                            <h5 class="card-title">New Challenges</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-blog card-background" data-animation="zooming">
                                <div class="full-background" style="background-image: url('/assets/vendor_site/img/sections/dane.jpg"></div>
                                <a href="javascript:;">
                                    <div class="card-body">
                                        <div class="content-bottom">
                                            <h6 class="card-category text-white opacity-8">Self-Driving Cars</h6>
                                            <h5 class="card-title">Driverless Future</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="section features-3 my-5" style="background-image: url('/assets/vendor_site/img/ill/p31.svg')">
                <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="col-lg-8">
                    <h3 class="display-3 text-white">Build something great<span class="text-success"> with our products</span></h3>
                    <p class="lead text-white">We’re constantly trying to express ourselves and actualize our dreams. If you have the opportunity to play this game of life you need to appreciate every moment.</p>
                    </div>
                </div>
                <div class="row row-grid mt-5">
                    <div class="col-lg-6">
                    <div class="info info-horizontal bg-white">
                        <div class="icon icon-shape icon-shape-info rounded-circle text-white">
                        <i class="ni ni-hat-3 text-info"></i>
                        </div>
                        <div class="description pl-4">
                        <h5 class="title text-info">Modular Components</h5>
                        <p>The Arctic Ocean freezes every winter and much of the sea-ice then thaws every summer, and that process will continue whatever.</p>
                        <a href="#" class="text-info">Learn more</a>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="info info-horizontal bg-white">
                        <div class="icon icon-shape icon-shape-warning rounded-circle text-white">
                        <i class="ni ni-istanbul text-warning"></i>
                        </div>
                        <div class="description pl-4">
                        <h5 class="title text-warning">Modern Interface</h5>
                        <p>If everything I did failed - which it doesn't, it actually succeeds - just the fact that I'm willing to fail is an inspiration.</p>
                        <a href="#" class="text-warning">Learn more</a>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row row-grid">
                    <div class="col-lg-6">
                    <div class="info info-horizontal bg-white">
                        <div class="icon icon-shape icon-shape-danger rounded-circle text-white">
                        <i class="ni ni-trophy text-danger"></i>
                        </div>
                        <div class="description pl-4">
                        <h5 class="title text-danger">Great Features</h5>
                        <p>People are so scared to lose that they don't even try. Like, one thing people can't say is that I'm not trying, and I'm not trying my hardest.</p>
                        <a href="#" class="text-danger">Learn more</a>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="info info-horizontal bg-white">
                        <div class="icon icon-shape icon-shape-success rounded-circle text-white">
                        <i class="ni ni-image text-success"></i>
                        </div>
                        <div class="description pl-4">
                        <h5 class="title text-success">Awesome Support</h5>
                        <p>The time is now for it to be okay to be great. People in this world shun people for being great. For being a bright color.</p>
                        <a href="#" class="text-success">Learn more</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <br /><br />
                    <div class="page-header">
                    <div class="container">
                        <div class="row align-items-center text-left">
                        <div class="col-lg-5 col-12">
                            <h1 class="display-3">Design with us,<span class="text-primary"> Develop Anything.</span></h1>
                            <p class="lead pb-4">We aim high at being focused on building relationships with our clients and community. Using our creative gifts drives this foundation.</p>
                            <div class="row row-input">
                            <div class="col-sm-8 col-12">
                                <input type="email" class="form-control" name="email" id="signupSrEmail" placeholder="Your email" aria-label="Your email">
                            </div>
                            <div class="col-sm-4 col-12 pl-lg-0">
                                <button type="submit" class="btn btn-primary btn-block">More</button>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-12 pl-0">
                            <img class="ml-lg-5" src="/assets/vendor_site/img/ill/bg6-2.svg" width="100%">
                        </div>
                        </div>
                    </div>
                    </div>
                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @include('inc.site.footer_site')
        </div>
        <!--   Core JS Files   -->
    </div>
@endsection

@section('script')

@endsection
