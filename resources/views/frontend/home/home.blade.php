@extends('frontend.master.master')
@section('title')
    Home | {{config('app.name')}}
@endsection
@section('header-asset')

@endsection
@section('content')
    <main class="main-page-wrapper">

        <!-- Start Slider Area -->
        <div id="home" class="rn-slider-area">
            <div class="slide slider-style-1">
                <div class="container">
                    <div class="row row--30 align-items-center">
                        <div class="order-2 order-lg-1 col-lg-7 mt_md--50 mt_sm--50 mt_lg--30">
                            <div class="content">
                                <div class="inner">
                                    <span class="subtitle">Welcome to my world</span>
                                    <h1 class="title">Hi, I’m <span>{{$adminDetails->name_to_show}}</span><br>
                                        <span class="header-caption" id="page-top">
                                            <!-- type headline start-->
                                            <span class="cd-headline clip is-full-width">
                                                <span>a </span>
                                                <!-- ROTATING TEXT -->
                                        <span class="cd-words-wrapper">
                                                    <b class="is-visible">{{$adminDetails->slogan_1}}.</b>
                                                    <b class="is-hidden">{{$adminDetails->slogan_2}}.</b>
                                                    <b class="is-hidden">{{$adminDetails->slogan_3}}.</b>
                                                </span>
                                        </span>
                                            <!-- type headline end -->
                                        </span>
                                    </h1>

                                    <div>
                                        <p class="description">{{$adminDetails->short_description}}.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12">
                                        <div class="social-share-inner-left">
                                            <span class="title">find with me</span>
                                            <ul class="social-share d-flex liststyle">
                                                <li class="facebook"><a href="{{$adminFacebook->link}}"><i data-feather="facebook"></i></a>
                                                </li>
                                                <li class="instagram"><a href="{{$adminInstagram->link}}"><i data-feather="instagram"></i></a>
                                                </li>
                                                <li class="linkedin"><a href="{{$adminLinkedin->link}}"><i data-feather="linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6 col-md-6 col-sm-6 col-12 mt_mobile--30">
                                        <div class="skill-share-inner">
                                            <span class="title">best skill on</span>
                                            <ul class="skill-share d-flex liststyle">
                                                <li><img src="{{asset('frontend/assets')}}/images/icons/icons-01.png" alt="Icons Images"></li>
                                                <li><img src="{{asset('frontend/assets')}}/images/icons/icons-02.png" alt="Icons Images"></li>
                                                <li><img src="{{asset('frontend/assets')}}/images/icons/icons-13.png" alt="Icons Images"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="order-1 order-lg-2 col-lg-5">
                            <div class="thumbnail">
                                <div class="inner">
                                    <img src="{{asset('uploads/banner/resize'. '/' . $metaData->site_banner)}}" alt="Personal Portfolio Images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->

        @if(!is_null(\App\Models\Menu::where(['constant_name' => 'features', 'status' => 1])->first()))
        <!-- Start Service Area -->
        <div class="rn-service-area rn-section-gap section-separator" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true">
                            <span class="subtitle">Features</span>
                            <h2 class="title">What I Do</h2>
                        </div>
                    </div>
                </div>
                <div class="row row--25 mt_md--10 mt_sm--10">
                    @foreach($features as $feature)
                    <!-- Start Single Service -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-service">
                            <div class="inner">
                                <div class="icon">
                                    <i data-feather="slack"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="javascript:void(0)">{{$feature->title}}</a></h4>
                                    <p class="description">{{$feature->description}}</p>
                                    <a class="read-more-button" href="javascript:void(0)"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="javascript:void(0)"></a>
                        </div>
                    </div>
                    <!-- End SIngle Service -->
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Service Area  -->
        @endif

        @if(!is_null(\App\Models\Menu::where(['constant_name' => 'portfolio', 'status' => 1])->first()))
        <!-- Start Portfolio Area -->
        <div class="rn-portfolio-area rn-section-gap section-separator" id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle">Visit my portfolio and keep your feedback</span>
                            <h2 class="title">My Portfolio</h2>
                        </div>
                    </div>
                </div>

                <div class="row row--25 mt--10 mt_md--10 mt_sm--10">
                    @foreach($portfolios as $portfolio)
                    <!-- Start Single Portfolio -->
                    <div data-aos="fade-up" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-12 mt--50 mt_md--30 mt_sm--30">
                        <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="{{asset('uploads/portfolio/resize' . '/' . $portfolio->image)}}" alt="Personal Portfolio Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)">{{$portfolio->portfolioCategory?->name}}</a>
                                        </div>
                                        <div class="meta">
                                            <span><a href="javascript:void(0)"><i class="feather-heart"></i></a>
                                        600</span>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="javascript:void(0)">{{$portfolio->title}} <i
                                                class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Portfolio -->
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End portfolio Area -->
        @endif

        <!-- Start Resume Area -->
        <div class="rn-resume-area rn-section-gap section-separator" id="resume">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle">7+ Years of Experience</span>
                            <h2 class="title">My Resume</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--45">
                    <div class="col-lg-12">
                        <ul class="rn-nav-list nav nav-tabs" id="myTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="education-tab" data-bs-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="true">education</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="professional-tab" data-bs-toggle="tab" href="#professional" role="tab" aria-controls="professional" aria-selected="false">professional
                                    Skills</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="experience-tab" data-bs-toggle="tab" href="#experience" role="tab" aria-controls="experience" aria-selected="false">experience</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="interview-tab" data-bs-toggle="tab" href="#interview" role="tab" aria-controls="interview" aria-selected="false">interview</a>
                            </li>
                        </ul>

                        <!-- Start Tab Content Wrapper  -->
                        <div class="rn-nav-content tab-content" id="myTabContents">
                            <!-- Start Single Tab  -->
                            <div class="tab-pane show active fade single-tab-area" id="education" role="tabpanel" aria-labelledby="education-tab">
                                <div class="personal-experience-inner mt--40">
                                    <div class="row">
                                        <!-- Start Skill List Area  -->
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="content">
                                                <span class="subtitle">2007 - 2010</span>
                                                <h4 class="maintitle">Education Quality</h4>
                                                <div class="experience-list">
                                                    @foreach($educations as $education)
                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>{{$education->title}}</h4>
                                                                    <span>{{$education->name}} ({{$education->session_from}} - {{$education->session_to}})</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>{{$education->score}}</span>
                                                                </div>
                                                            </div>
                                                            <p class="description">{{$education->description}}</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->

                                        <!-- Start Skill List Area 2nd  -->
                                        <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                            <div class="content">
                                                <span class="subtitle">2007 - 2010</span>
                                                <h4 class="maintitle">Job Experience</h4>
                                                <div class="experience-list">
                                                    @foreach($experiences as $experience)
                                                    <!-- Start Single List  -->
                                                    <div class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>{{$experience->company_name}}</h4>
                                                                    <span>{{$experience->designation}} ({{$experience->starting_year}} - {{$experience->ending_year}})</span>
                                                                </div>
                                                            </div>
                                                            <p class="description">{{$experience->description}}</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab  -->

                            <!-- Start Single Tab  -->
                            <div class="tab-pane fade " id="professional" role="tabpanel" aria-labelledby="professional-tab">
                                <div class="personal-experience-inner mt--40">
                                    <div class="row row--40">

                                        <!-- Start Single Progressbar  -->
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="progress-wrapper">
                                                <div class="content">
                                                    <span class="subtitle">Features</span>
                                                    <h4 class="maintitle">Skill Set One</h4>
                                                    @foreach($skills as $skill)
                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">{{\Illuminate\Support\Str::upper($skill->title)}}</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                 data-wow-duration="0.5s" data-wow-delay=".3s"
                                                                 role="progressbar" style="width: {{$skill->value}}%"
                                                                 aria-valuenow="{{$skill->value}}" aria-valuemin="0"
                                                                 aria-valuemax="{{$skill->value}}"><span
                                                                    class="percent-label">{{$skill->value}}%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Progressbar  -->
                                        <!-- Start Single Progressbar  -->
                                        <div class="col-lg-6 col-md-6 col-12 mt_sm--60">
                                            <div class="progress-wrapper">
                                                <div class="content">
                                                    <span class="subtitle">Features</span>
                                                    <h4 class="maintitle">Skill Set One</h4>
                                                    @foreach($skills2 as $skill)
                                                    <!-- Start Single Progress Charts -->
                                                    <div class="progress-charts">
                                                        <h6 class="heading heading-h6">{{\Illuminate\Support\Str::upper($skill->title)}}</h6>
                                                        <div class="progress">
                                                            <div class="progress-bar wow fadeInLeft"
                                                                 data-wow-duration="0.5s"
                                                                 data-wow-delay=".3s"
                                                                 role="progressbar"
                                                                 style="width: {{$skill->value}}%" aria-valuenow="{{$skill->value}}"
                                                                 aria-valuemin="{{$skill->value}}"
                                                                 aria-valuemax="{{$skill->value}}"><span
                                                                    class="percent-label">{{$skill->value}}%</span></div>
                                                        </div>
                                                    </div>
                                                    <!-- End Single Progress Charts -->
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Progressbar  -->

                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab  -->

                            <!-- Start Single Tab  -->
                            <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                                <div class="personal-experience-inner mt--40">
                                    <div class="row">
                                        <!-- Start Skill List Area  -->
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="content">
                                                <span class="subtitle">2007 - 2010</span>
                                                <h4 class="maintitle">Education Quality</h4>
                                                <div class="experience-list">

                                                    @foreach($educations as $education)
                                                        <!-- Start Single List  -->
                                                        <div class="resume-single-list">
                                                            <div class="inner">
                                                                <div class="heading">
                                                                    <div class="title">
                                                                        <h4>{{$education->title}}</h4>
                                                                        <span>{{$education->name}} ({{$education->session_from}} - {{$education->session_to}})</span>
                                                                    </div>
                                                                    <div class="date-of-time">
                                                                        <span>{{$education->score}}</span>
                                                                    </div>
                                                                </div>
                                                                <p class="description">{{$education->description}}</p>
                                                            </div>
                                                        </div>
                                                        <!-- End Single List  -->
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->

                                        <!-- Start Skill List Area 2nd  -->
                                        <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                            <div class="content">
                                                <span class="subtitle">2007 - 2010</span>
                                                <h4 class="maintitle">Job Experience</h4>
                                                <div class="experience-list">
                                                    @foreach($experiences as $experience)
                                                        <!-- Start Single List  -->
                                                        <div class="resume-single-list">
                                                            <div class="inner">
                                                                <div class="heading">
                                                                    <div class="title">
                                                                        <h4>{{$experience->company_name}}</h4>
                                                                        <span>{{$experience->designation}} ({{$experience->starting_year}} - {{$experience->ending_year}})</span>
                                                                    </div>
                                                                </div>
                                                                <p class="description">{{$experience->description}}</p>
                                                            </div>
                                                        </div>
                                                        <!-- End Single List  -->
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab  -->

                            <!-- Start Single Tab  -->
                            <div class="tab-pane fade" id="interview" role="tabpanel" aria-labelledby="interview-tab">
                                <div class="personal-experience-inner mt--40">
                                    <div class="row">
                                        <!-- Start Skill List Area  -->
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <div class="content">
                                                <span class="subtitle">2007 - 2010</span>
                                                <h4 class="maintitle">Company Experience</h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="300" data-aos-once="true" class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>Personal Portfolio April Fools</h4>
                                                                    <span>University of DVI (1997 - 2001)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>4.30/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description">The education should be very
                                                                interactual. Ut tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4> Examples Of Personal Portfolio</h4>
                                                                    <span>College of Studies (2000 - 2002)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>4.50/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description">Maecenas finibus nec sem ut
                                                                imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="700" data-aos-once="true" class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>Tips For Personal Portfolio</h4>
                                                                    <span>University of Studies (1997 - 2001)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>4.80/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description"> If you are going to use a passage.
                                                                Ut tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->

                                        <!-- Start Skill List Area 2nd  -->
                                        <div class="col-lg-6 col-md-12 col-12 mt_md--60 mt_sm--60">
                                            <div class="content">
                                                <span class="subtitle">2007 - 2010</span>
                                                <h4 class="maintitle">Job Experience</h4>
                                                <div class="experience-list">

                                                    <!-- Start Single List  -->
                                                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="500" data-aos-once="true" class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>Diploma in Web Development</h4>
                                                                    <span>BSE In CSE (2004 - 2008)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>4.70/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description">Contrary to popular belief. Ut
                                                                tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="700" data-aos-once="true" class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>The Personal Portfolio Mystery</h4>
                                                                    <span>Job at Rainbow-Themes (2008 - 2016)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>4.95/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description">Generate Lorem Ipsum which looks. Ut
                                                                tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                    <!-- Start Single List  -->
                                                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="900" data-aos-once="true" class="resume-single-list">
                                                        <div class="inner">
                                                            <div class="heading">
                                                                <div class="title">
                                                                    <h4>Diploma in Computer Science</h4>
                                                                    <span>Works at Plugin Development (2016 -
                                                                2020)</span>
                                                                </div>
                                                                <div class="date-of-time">
                                                                    <span>5.00/5</span>
                                                                </div>
                                                            </div>
                                                            <p class="description">Maecenas finibus nec sem ut
                                                                imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                                Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                                mauris hendrerit ante.</p>
                                                        </div>
                                                    </div>
                                                    <!-- End Single List  -->

                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Skill List Area  -->
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Resume Area -->
        <!-- Start Testimonia Area  -->
        <div class="rn-testimonial-area rn-section-gap section-separator" id="testimonial">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle">What Clients Say</span>
                            <h2 class="title">Testimonial</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="testimonial-activation testimonial-pb mb--30">
                            @foreach($testimonials as $testimonial)
                            <!-- Start Single testiminail -->
                            <div class="testimonial mt--50 mt_md--40 mt_sm--40">
                                <div class="inner">
                                    <div class="card-info">
                                        <div class="card-thumbnail">
                                            <img src="{{asset('frontend/assets')}}/images/testimonial/final-home--1st.png" alt="Testimonial-image">
                                        </div>
                                        <div class="card-content">
                                            <span class="subtitle mt--10">{{$testimonial->organization_name}}</span>
                                            <h3 class="title">{{$testimonial->name}}</h3>
                                            <span class="designation">{{$testimonial->designation}}</span>
                                        </div>
                                    </div>
                                    <div class="card-description">
                                        <div class="title-area">
                                            <div class="title-info">
                                                <h3 class="title">{{$testimonial->department_name}}</h3>
                                                <span class="date">{{$testimonial->bio}}</span>
                                            </div>
                                            <div class="rating">
                                                <img src="{{asset('frontend/assets')}}/images/icons/rating.png" alt="rating-image">
                                                <img src="{{asset('frontend/assets')}}/images/icons/rating.png" alt="rating-image">
                                                <img src="{{asset('frontend/assets')}}/images/icons/rating.png" alt="rating-image">
                                                <img src="{{asset('frontend/assets')}}/images/icons/rating.png" alt="rating-image">
                                                <img src="{{asset('frontend/assets')}}/images/icons/rating.png" alt="rating-image">
                                            </div>
                                        </div>
                                        <div class="seperator"></div>
                                        <p class="discription">
                                            {{$testimonial->short_description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--End Single testiminail -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Testimonial Area  -->
        @if(!is_null(\App\Models\Menu::where(['constant_name' => 'clients', 'status' => 1])->first()))
        <!-- Start Client Area -->
        <div class="rn-client-area rn-section-gap section-separator" id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span class="subtitle">Popular Clients</span>
                            <h2 class="title mb-5">Awesome Clients</h2>
                        </div>
                        <div class="client-card">
                            @foreach($clients as $client)
                            <!-- Start Single Brand  -->
                            <div class="main-content">
                                <div class="inner text-center">
                                    <div class="thumbnail">
                                        <a href="#"><img src="{{asset('uploads/client/resize' . '/' . $client->image)}}" alt="Client-image"></a>
                                    </div>
                                    <div class="seperator"></div>
                                    <div class="client-name"><span><a href="#">{{$client->name}}</a></span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Brand  -->
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- End client section -->
        @endif
        @if(!is_null(\App\Models\Menu::where(['constant_name' => 'pricing', 'status' => 1])->first()))
        <!-- Pricing Area -->
        <div class="rn-pricing-area rn-section-gap section-separator" id="pricing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-xl-5 mb_md--40 mb_sm--40 small-margin-pricing">
                        <div class="d-block d-lg-flex text-center d-lg-left section-flex flex-wrap align-content-start h-100">
                            <div class="position-sticky sticky-top rbt-sticky-top-adjust">
                                <div class="section-title text-left">
                                    <span class="subtitle text-center text-lg-left">Pricing</span>
                                    <h2 class="title text-center text-lg-left">My Pricing</h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-xl-7">
                        <!-- Pricing Area -->
                        <div class="navigation-wrapper">
                            <ul class="nav " id="myTab" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-style" id="test-tab" data-bs-toggle="tab" href="#static" role="tab" aria-controls="test" aria-selected="false">{{$staticPricing->pricingCategory->name}}</a>
                                </li>

                                <li class="nav-item  recommended">
                                    <a class="nav-style active" id="profile-tab" data-bs-toggle="tab" href="#standard" role="tab" aria-controls="profile" aria-selected="true">{{$standardPricing->pricingCategory->name}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-style" id="contact-tab" data-bs-toggle="tab" href="#premium" role="tab" aria-controls="contact" aria-selected="false">{{$premiumPricing->pricingCategory->name}}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">

                                <div class="tab-pane fade " id="static" role="tabpanel" aria-labelledby="test-tab">
                                    <!-- Pricing Start -->
                                    <div class="rn-pricing">
                                        <div class="pricing-header">
                                            <div class="header-left">
                                                <h2 class="title">{{$staticPricing->title}}</h2>
                                            </div>
                                            <div class="header-right">
                                                <span>${{$staticPricing->total_price}}</span>
                                            </div>
                                        </div>
                                        <div class="pricing-body">
                                            <p class="description">
                                                {{$staticPricing->short_description}}
                                            </p>
                                            <div class="check-wrapper">
                                                <div class="left-area">
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>1 Page with Elementor</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design Customization</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Responsive Design</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Content Upload</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design Customization</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>2 Plugins/Extensions</p>
                                                    </div>
                                                </div>
                                                <div class="right-area">
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>multipage Elementor</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design Figma</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>MAintaine Design</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Content Upload</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design With XD</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>8 Plugins/Extensions</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <a href="#" class="rn-btn d-block">
                                                <span>ORDER NOW</span>
                                                <i data-feather="arrow-right"></i>
                                            </a>
                                            <div class="time-line">
                                                <div class="single-cmt d-flex">
                                                    <i data-feather="clock"></i>
                                                    <span>2 Days Delivery</span>
                                                </div>
                                                <div class="single-cmt d-flex">
                                                    <i data-feather="activity"></i>
                                                    <span>Unlimited Revission</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End -->
                                </div>

                                <div class="tab-pane fade show active" id="standard" role="tabpanel" aria-labelledby="profile-tab">
                                    <!-- Pricing Start -->
                                    <div class="rn-pricing">
                                        <div class="pricing-header">
                                            <div class="header-left">
                                                <h2 class="title">{{$standardPricing->title}}</h2>
                                            </div>
                                            <div class="header-right">
                                                <span>${{$standardPricing->total_price}}</span>
                                            </div>
                                        </div>
                                        <div class="pricing-body">
                                            <p class="description">{{$staticPricing->short_description}}
                                            </p>
                                            <div class="check-wrapper">
                                                <div class="left-area">
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>1 Page with Elementor</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design Customization</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Responsive Design</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Content Upload</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design Customization</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>2 Plugins/Extensions</p>
                                                    </div>
                                                </div>
                                                <div class="right-area">
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>multipage Elementor</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design Figma</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>MAintaine Design</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Content Upload</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design With XD</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>8 Plugins/Extensions</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <a href="#" class="rn-btn d-block">
                                                <span>ORDER NOW</span>
                                                <i data-feather="arrow-right"></i>
                                            </a>
                                            <div class="time-line d-flex">
                                                <div class="single-cmt d-flex">
                                                    <i data-feather="clock"></i>
                                                    <span>2 Days Delivery</span>
                                                </div>
                                                <div class="single-cmt d-flex">
                                                    <i data-feather="activity"></i>
                                                    <span>Unlimited Revission</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End -->
                                </div>

                                <div class="tab-pane fade" id="premium" role="tabpanel" aria-labelledby="contact-tab">
                                    <!-- Pricing Start -->
                                    <div class="rn-pricing">
                                        <div class="pricing-header">
                                            <div class="header-left">
                                                <h2 class="title">{{$premiumPricing->title}}</h2>
                                            </div>
                                            <div class="header-right">
                                                <span>${{$premiumPricing->total_price}}</span>
                                            </div>
                                        </div>
                                        <div class="pricing-body">
                                            <p class="description">
                                                {{$staticPricing->short_description}}
                                            </p>
                                            <div class="check-wrapper">
                                                <div class="left-area">
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>1 Page with Elementor</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design Customization</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Responsive Design</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Content Upload</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design Customization</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>2 Plugins/Extensions</p>
                                                    </div>
                                                </div>
                                                <div class="right-area">
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>multipage Elementor</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design Figma</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>MAintaine Design</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Content Upload</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>Design With XD</p>
                                                    </div>
                                                    <div class="check d-flex">
                                                        <i data-feather="check"></i>
                                                        <p>8 Plugins/Extensions</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-footer">
                                            <a href="#" class="rn-btn d-block">
                                                <span>ORDER NOW</span>
                                                <i data-feather="arrow-right"></i>
                                            </a>
                                            <div class="time-line d-flex">
                                                <div class="single-cmt d-flex">
                                                    <i data-feather="clock"></i>
                                                    <span>2 Days Delivery</span>
                                                </div>
                                                <div class="single-cmt d-flex">
                                                    <i data-feather="activity"></i>
                                                    <span>Unlimited Revission</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End -->
                                </div>
                            </div>
                        </div>
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- pricing area -->
        @endif
        <!-- Start News Area -->
        <div class="rn-blog-area rn-section-gap section-separator" id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="section-title text-center">
                            <span class="subtitle">Visit my blog and keep your feedback</span>
                            <h2 class="title">My Blog</h2>
                        </div>
                    </div>
                </div>
                <div class="row row--25 mt--30 mt_md--10 mt_sm--10">
                    @foreach($blogs as $blog)
                    <!-- Start Single blog -->
                    <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 mt--30 col-md-6 col-sm-12 col-12 mt--30">
                        <div class="rn-blog" data-bs-toggle="modal" data-bs-target="#exampleModalCenters">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="{{asset('frontend/assets')}}/images/blog/blog-01.jpg" alt="Personal Portfolio Images">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)">{{$blog->blogCategory?->name}}</a>
                                        </div>
                                        <div class="meta">
                                            <span><i class="feather-clock"></i> {{$blog->time_to_read}} min read</span>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="javascript:void(0)">{{$blog->title}}
                                            <i class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single blog -->
                    @endforeach
                </div>
            </div>
        </div>
        <!-- ENd Mews Area -->
        <!-- Start Contact section -->
        <div class="rn-contact-area rn-section-gap section-separator" id="contacts">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle">Contact</span>
                            <h2 class="title">Contact With Me</h2>
                        </div>
                    </div>
                </div>

                <div class="row mt--50 mt_md--40 mt_sm--40 mt-contact-sm">
                    <div class="col-lg-5">
                        <div class="contact-about-area">
                            <div class="thumbnail">
                                <img src="{{asset('uploads/company/resize'. '/' . $metaData->company_logo)}}" alt="contact-img">
                            </div>
                            <div class="title-area">
                                <h4 class="title">{{$metaData->company_name}}</h4>
                                <span>{{$metaData->designation}}</span>
                            </div>
                            <div class="description">
                                <p>{{$metaData->short_description}}</p>
                                <span class="phone">Phone: <a href="tel:{{$metaData->phone}}">{{$metaData->phone}}</a></span>
                                <span class="mail">Email: <a href="{{$metaData->email}}">{{$metaData->email}}</a></span>
                            </div>
                            <div class="social-area">
                                <div class="name">FIND WITH ME</div>
                                <div class="social-icone">
                                    <a href="{{$adminFacebook->link}}"><i data-feather="facebook"></i></a>
                                    <a href="{{$adminLinkedin->link}}"><i data-feather="linkedin"></i></a>
                                    <a href="{{$adminInstagram->link}}"><i data-feather="instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-aos-delay="600" class="col-lg-7 contact-input">
                        <div class="contact-form-wrapper">
                            <div class="introduce">

                                <form class="rnt-contact-form rwt-dynamic-form row" id="UserContactForm">
                                    @csrf
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-name">Your Name</label>
                                            <input class="form-control form-control-lg" name="name" id="contact-name" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="contact-phone">Phone Number</label>
                                            <input class="form-control" name="phone" id="contact-phone" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="contact-email">Email</label>
                                            <input class="form-control form-control-sm" id="contact-email" name="email" type="email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="subject">subject</label>
                                            <input class="form-control form-control-sm" id="subject" name="subject" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="contact-message">Your Message</label>
                                            <textarea name="message" id="contact-message" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" class="rn-btn" id="contactSubmitBtn">
                                            <span>SEND MESSAGE</span>
                                            <i data-feather="arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contuct section -->
        <!-- Modal Portfolio Body area Start -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i data-feather="x"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center">

                            <div class="col-lg-6">
                                <div class="portfolio-popup-thumbnail">
                                    <div class="image">
                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/portfolio/portfolio-04.jpg" alt="slide">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="text-content">
                                    <h3>
                                        <span>Featured - Design</span> App Design Development.
                                    </h3>
                                    <p class="mb--30">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate distinctio assumenda explicabo veniam temporibus eligendi.</p>
                                    <p>Consectetur adipisicing elit. Cupiditate distinctio assumenda. dolorum alias suscipit rerum maiores aliquam earum odit, nihil culpa quas iusto hic minus!</p>
                                    <div class="button-group mt--20">
                                        <a href="#" class="rn-btn thumbs-icon">
                                            <span>LIKE THIS</span>
                                            <i data-feather="thumbs-up"></i>
                                        </a>
                                        <a href="#" class="rn-btn">
                                            <span>VIEW PROJECT</span>
                                            <i data-feather="chevron-right"></i>
                                        </a>
                                    </div>

                                </div>
                                <!-- End of .text-content -->
                            </div>
                        </div>
                        <!-- End of .row Body-->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Portfolio area -->
        <!-- Modal Blog Body area Start -->
        <div class="modal fade" id="exampleModalCenters" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-news" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i data-feather="x"></i></span>
                        </button>
                    </div>

                    <!-- End of .modal-header -->

                    <div class="modal-body">
                        <img src="{{asset('frontend/assets')}}/images/blog/blog-big-01.jpg" alt="news modal" class="img-fluid modal-feat-img">
                        <div class="news-details">
                            <span class="date">2 May, 2021</span>
                            <h2 class="title">Digital Marketo to Their New Office.</h2>
                            <p>Nobis eleifend option congue nihil imperdiet doming id quod mazim placerat
                                facer
                                possim assum.
                                Typi non
                                habent claritatem insitam; est usus legentis in iis qui facit eorum
                                claritatem.
                                Investigationes
                                demonstraverunt
                                lectores legere me lius quod ii legunt saepius. Claritas est etiam processus
                                dynamicus, qui
                                sequitur
                                mutationem consuetudium lectorum.</p>
                            <h4>Nobis eleifend option conguenes.</h4>
                            <p>Mauris tempor, orci id pellentesque convallis, massa mi congue eros, sed
                                posuere
                                massa nunc quis
                                dui.
                                Integer ornare varius mi, in vehicula orci scelerisque sed. Fusce a massa
                                nisi.
                                Curabitur sit
                                amet
                                suscipit nisl. Sed eget nisl laoreet, suscipit enim nec, viverra eros. Nunc
                                imperdiet risus
                                leo,
                                in rutrum erat dignissim id.</p>
                            <p>Ut rhoncus vestibulum facilisis. Duis et lorem vitae ligula cursus venenatis.
                                Class aptent
                                taciti sociosqu
                                ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc vitae
                                nisi
                                tortor. Morbi
                                leo
                                nulla, posuere vel lectus a, egestas posuere lacus. Fusce eleifend hendrerit
                                bibendum. Morbi
                                nec
                                efficitur ex.</p>
                            <h4>Mauris tempor, orci id pellentesque.</h4>
                            <p>Nulla non ligula vel nisi blandit egestas vel eget leo. Praesent fringilla
                                dapibus dignissim.
                                Pellentesque
                                quis quam enim. Vestibulum ultrices, leo id suscipit efficitur, odio lorem
                                rhoncus dolor, a
                                facilisis
                                neque mi ut ex. Quisque tempor urna a nisi pretium, a pretium massa
                                tristique.
                                Nullam in
                                aliquam
                                diam. Maecenas at nibh gravida, ornare eros non, commodo ligula. Sed
                                efficitur
                                sollicitudin
                                auctor.
                                Quisque nec imperdiet purus, in ornare odio. Quisque odio felis, vestibulum
                                et.</p>
                        </div>

                        <!-- Comment Section Area Start -->
                        <div class="comment-inner">
                            <h3 class="title mb--40 mt--50">Leave a Reply</h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="rnform-group"><input type="text" placeholder="Name">
                                        </div>
                                        <div class="rnform-group"><input type="email" placeholder="Email">
                                        </div>
                                        <div class="rnform-group"><input type="text" placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="rnform-group">
                                            <textarea placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <a class="rn-btn" href="#"><span>SUBMIT NOW</span></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Comment Section End -->
                    </div>
                    <!-- End of .modal-body -->
                </div>
            </div>
        </div>
        <!-- End Modal Blog area -->
        <!-- Back to  top Start -->
        <div class="backto-top">
            <div>
                <i data-feather="arrow-up"></i>
            </div>
        </div>
        <!-- Back to top end -->

        <!-- Start Modal Area  -->
        <div class="demo-modal-area">
            <div class="wrapper">
                <div class="close-icon">
                    <button class="demo-close-btn"><span class="feather-x"></span></button>
                </div>
                <div class="rn-modal-inner">
                    <div class="demo-top text-center">
                        <h4 class="title">InBio</h4>
                        <p class="subtitle">Its a personal portfolio template. You can built any personal website easily.</p>
                    </div>
                    <ul class="popuptab-area nav nav-tabs" id="popuptab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active demo-dark" id="demodark-tab" data-bs-toggle="tab" href="#demodark" role="tab" aria-controls="demodark" aria-selected="true">Dark Demo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link demo-light" id="demolight-tab" data-bs-toggle="tab" href="#demolight" role="tab" aria-controls="demolight" aria-selected="false">Light Demo</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="popuptabContent">
                        <div class="tab-pane show active" id="demodark" role="tabpanel" aria-labelledby="demodark-tab">
                            <div class="content">
                                <div class="row">

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/main-demo.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index.html">Main Demo</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-2">
                                                <div class="thumbnail">
                                                    <a href="index-technician.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/index-technician.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-technician.html">Technician</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-2">
                                                <div class="thumbnail">
                                                    <a href="index-model.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/home-model-v2.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-model.html">Model</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="home-consulting.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/home-consulting.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-consulting.html">Consulting</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="fashion-designer.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/fashion-designer.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="fashion-designer.html">Fashion Designer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index-developer.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/developer.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-developer.html">Developer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="instructor-fitness.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/instructor-fitness.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="instructor-fitness.html">Fitness Instructor</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->
                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="home-web-Developer.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/home-model.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-web-Developer.html">Web Developer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-designer.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/home-video.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-designer.html">Designer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-content-writer.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/text-rotet.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-content-writer.html">Content Writter</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-instructor.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/index-boxed.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-instructor.html">Instructor</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-freelancer.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/home-sticky.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-freelancer.html">Freelancer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-photographer.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/index-bg-image.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-photographer.html">Photographer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index-politician.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/front-end.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-politician.html">Politician</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo coming-soon">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="#">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/coming-soon.png" alt="Personal Portfolio">
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="#">Accountant</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="demolight" role="tabpanel" aria-labelledby="demolight-tab">
                            <div class="content">
                                <div class="row">

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/main-demo-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-white-version.html">Main Demo</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-2">
                                                <div class="thumbnail">
                                                    <a href="index-technician-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/index-technician-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-technician-white-version.html">Technician</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-2">
                                                <div class="thumbnail">
                                                    <a href="index-model-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/home-model-v2-white.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-model-white-version.html">Model</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="home-consulting-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/home-consulting-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-consulting-white-version.html">Consulting</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="fashion-designer-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/fashion-designer-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="fashion-designer-white-version.html">Fashion Designer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index-developer-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/developer-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-developer-white-version.html">Developer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->
                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="instructor-fitness-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/instructor-fitness-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="instructor-fitness-white-version.html">Fitness Instructor</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->
                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner badge-1">
                                                <div class="thumbnail">
                                                    <a href="home-web-developer-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/home-model-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-web-developer-white-version.html">Web Developer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-designer-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/home-video-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-designer-white-version.html">Designer</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-content-writer-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/text-rotet-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-content-writer-white-version.html">Content
                                                            Writter</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-instructor-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/index-boxed-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-instructor-white-version.html">Instructor</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-freelancer-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/home-sticky-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-freelancer-white-version.html">Freelancer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="home-photographer-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/index-bg-image-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="home-photographer-white-version.html">Photographer</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="index-politician-white-version.html">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/front-end-white-version.png" alt="Personal Portfolio">
                                                        <span class="overlay-content">
                                                    <span class="overlay-text">View Demo <i
                                                            class="feather-external-link"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="index-politician-white-version.html">Politician</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                    <!-- Start Single Content  -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="single-demo coming-soon">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="#">
                                                        <img class="w-100" src="{{asset('frontend/assets')}}/images/demo/coming-soon.png" alt="Personal Portfolio">
                                                    </a>
                                                </div>
                                                <div class="inner">
                                                    <h3 class="title"><a href="#">Accountant</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Content  -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Area  -->

    </main>
@endsection

@section('footer-asset')
    <script>
        $(document).ready(function () {
            /*Request for Store User Query Data*/
            $('#UserContactForm').on('submit', function (event) {
                event.preventDefault();
                const UserContactForm = $(this);

                // Clear previous error messages
                $('.error-message').remove();

                // Serialize the form data
                const formData = UserContactForm.serialize();

                $.ajax({
                    url: '{{ route('contact') }}',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        if (data.response === 200) {
                            if (data.type === "success") {
                                Toast.fire({
                                    icon: data.type,
                                    title: data.message
                                })
                                formData.reset();
                            } else {
                                Toast.fire({
                                    icon: data.type,
                                    title: data.message
                                })
                            }
                        }
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status === 422) {
                            $('#contactSubmitBtn').removeAttr('disabled')
                            const errors = xhr.responseJSON.errors;

                            // Display error messages for each input field
                            $.each(errors, function (field, errorMessage) {
                                const inputField = $('[name="' + field + '"]');
                                inputField.after('<span class="error-message text-danger">' + errorMessage[0] + '</span>');
                            });
                        } else {
                            console.log('An error occurred:', status, error);
                        }
                    }
                });
            })

        })
    </script>
@endsection

