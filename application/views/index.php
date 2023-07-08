<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
     <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1" />
     <meta name="theme-color" content="#C22424">
     <!-- FAVICON -->
     <link rel="icon" href="#" />
     <!-- TITLE -->
     <title>Welcome to Sports Tournament Website </title>
     <!-- bootstrap.min.css -->
     <link href="<?= base_url()?>web_assets/css/bootstrap.min.css" rel="stylesheet" />
     <!-- font-awesome.min.css -->
     <link href="<?= base_url()?>web_assets/css/material-design-iconic-font.min.css" rel="stylesheet" />
     <!-- slicknav.min.css -->
     <link href="<?= base_url()?>web_assets/css/slicknav.min.css" rel="stylesheet" />
     <!-- magnific popup.css -->
     <link href="<?= base_url()?>web_assets/css/magnific-popup.css" rel="stylesheet" />
     <!-- owl.css -->
     <link href="<?= base_url()?>web_assets/css/owl.carousel.css" rel="stylesheet" />
     <!-- animate.min.css -->
     <link href="<?= base_url()?>web_assets/css/animate.min.css" rel="stylesheet" />
     <!-- style.css -->
     <link href="<?= base_url()?>web_assets/css/style.css" rel="stylesheet" />
     <meta property="og:title" content="Sports Tournament"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="https://gplplay.com/"/>
    <meta property="og:image" content="<?= base_url()?>web_assets/images/sports_main.png"/>
    <meta property="og:site_name" content="Sports Tournament"/>
    <meta property="og:description" content="Sports Tournament"/>
 </head>
<style>
   .slicknav_menu .slicknav_btn{
           background: transparent;
   }
   
    .main-hero-area.cta4:before {
    background: url('https://i.pinimg.com/originals/1a/83/ae/1a83ae08b8c4d36e1988ca47e1d92e6d.jpg') no-repeat;
    }
    .main-hero-area.cta4:after {
    background-image: -webkit-linear-gradient(0deg,#c22424 0%,#d5656585 60%,#c22424 100%);
    }
   div#sticky-wrapper.is-sticky .header-area:after{
    background: #C22424!important;
   }
   div#sticky-wrapper.is-sticky .header-area:after a{
     color:white!important;
   }
   .is-sticky .header-area .mainmenu ul li a{
       color:white!important;
   }
   .is-sticky .header-area .logo a{
       color:white!important;
   }
   .home3-theme-bg, .home3 div#sticky-wrapper.is-sticky .header-area a.header-btn, .home4 div#sticky-wrapper.is-sticky .header-area a.header-btn {
    background: white;
    border-color: white!important;
    color: black!important;
    padding: 8px 10px;
    box-shadow: 0 .25rem .75rem rgba(18,38,63,.08)!important;
    font-size: 16px;
}
body.home4 .header-area.cta3 a.header-btn {
    background: #fff;
    padding: 8px 16px;
    border-radius:20px;
    color: #C22424;
    border: 2px solid transparent;
    /* box-shadow: 0 .25rem .75rem rgba(18,38,63,.08)!important; */
    text-transform: capitalize;
     box-shadow: 0 .25rem .75rem rgba(18,38,63,.08)!important;
    font-size: 16px;
}
.home3-theme-bg, .home3 div#sticky-wrapper.is-sticky .header-area a.header-btn, .home4 div#sticky-wrapper.is-sticky .header-area a.header-btn {
    background: white;
    border-color: white!important;
    color: black!important;
    padding: 8px 16px;
     border-radius:20px;
}
.header-area {
   padding-top: 15px;
    padding-bottom: 15px;
}
.header-area.cta3 ul#nav {
    margin-right:0px;
}
.home4-download-btn2 {
    background: url(<?= base_url()?>web_assets/img/home3-download-btn12.png);
}
.logo a{
    /*font-weight:600;*/
}
.featured-area.cta3:after {
    background-image: -webkit-linear-gradient(bottom,#9d50bb 0%,#864cb3 60%,#6e48aa 100%);
    background-image: linear-gradient(90deg, rgba(194,36,36,1) 0%, rgba(194,36,36,0.7990546560421043) 30%);
}
.counter-area.cta3:after, .video-area.cta3:before, .contact-area.cta3:after {
    background-image: linear-gradient(90deg, rgba(194,36,36,1) 0%, rgba(194,36,36,0.7990546560421043) 30%);
}
.counter-area.cta3 a.single-counter:hover {
    box-shadow: 0px 0px 23px #ec9168;
}
.contact-area:after {
    background: white!important;
}
.footer-area.cta3 {
    background: url(<?= base_url() ?>web_assets/svg/home3-footer-bg.svg);
}
.contact-area.cta3 .contact-form-right {
    padding: 40px 50px 2px 50px;
    margin-top: 10px;
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
    border: 1px solid rgba(0,0,0,.125);
}
.contact-{
    display: block;
    height: 40px;
    width: 40px;
    text-align: center;
    background: #C22424;
    border-radius: 50%;
    color: white;
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 8px;
}
.contact-icon i {
    font-size: 20px;
    line-height: 40px;
}
.footer-area {
    padding-top: 136px;
}
.contact-form-right-single{
    text-align:center;
}
.footer-social-icon i {
    color: white;
    background: #C22424;
    height: 40px;
    width: 40px;
    line-height: 40px;
    border-radius: 50%;
}
.contact-icon{
        display: block;
    height: 40px;
    width: 40px;
    margin-left: auto;
    margin-right: auto;
    background:#C22424;
    border-radius:50%;
    color:white;
    margin-bottom:8px;
}
.footer-area {
    padding-top: 125px;
}
@media only screen and (max-width: 600px) {
  body{
          overflow-x: hidden;
  }
  .slicknav_menu .slicknav_nav{
    background: #C22424;
}
}
</style>
 <body class="home4">
     <!--  page loader -->
    <!--<div id="loader-wrapper">-->
    <!--   <div id="loader"></div>-->
    <!--   <div class="loader-section section-left"></div>-->
    <!--   <div class="loader-section section-right"></div>-->
    <!-- </div>-->
     <!--  page loader end -->
    
     <div id="home"></div>
     <!--  header area start -->
     <div class="header-area cta3">
         <div class="container">
             <div class="row">
                 <div class="col-md-4">
                     <div class="logo cta">
                         <a href="<?= base_url()?>">Sports Tournament </a>
                     </div>
                 </div>
                 <div class="col-md-8 text-right">
                     <div class="responsive_menu"></div>
                     <div class="mainmenu">
                         <ul id="nav">
                             <!--<li><a href="#home">Home </a>-->
                             <!--    <ul class="drop-menu">-->
                             <!--        <li><a href="<?= base_url()?>web_assets/">Home 1 </a></li>-->
                             <!--      
                             <!--  </ul>-->
                             <!--</li>-->
                             <li><a href="#home">Home </a></li>
                             <li><a href="#about">About </a></li>
                             <!--<li><a href="#featured">Features </a></li>-->
                             <!--<li><a href="#pricing">Pricing </a></li>-->
                             <!--<li><a href="#testimonial">Testimonials </a></li>-->
                             <li><a href="#contact">Contact Us</a></li>
                         </ul>
                         <a href="#" class="header-btn">download now </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--  header area end -->
     <!--  hero area start -->
     <div class="main-hero-area cta4">
         <div class="container">
             <div class="row">
                 <div class="col-md-6">
                     <div class="hero-txt">
                         <h1>Welcome to Sports Tournament Website </h1>
                         <p>A Tournament is a competition involving at least three competitors, all participating in a sport or game. More specifically, the term may be used in either of two overlapping senses: One or more competitions held at a single venue and concentrated into a relatively short time interval. </p>
                         <!--<a class="home4-download-btn" href="#">Download</a>-->
                         <a class="home4-download-btn2" href="#"></a>
                     </div>
                 </div>
                 <div class="col-md-6 text-right">
                     <div class="home4-hero-mobile wow fadeInDown">
                         <img src="<?= base_url()?>web_assets/images/sports_main.png" alt="" />
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--  hero area start -->
     <!--  about area start -->
     <div class="home3-about-area pt-4 pb-4" id="about">
         <div class="container">
             <div class="col-md-12 wow fadeInUp text-center" style="visibility: visible; animation-name: fadeInUp;">
                <div class="section-title">
                    <h2>About Us </h2>
                 </div>
              </div>
             <div class="row">
                 <div class="col-md-5 text-center">
                     <img src="https://www.freepnglogos.com/uploads/sport-png/sport-sports-png-transparent-images-30.png" alt="" />
                 </div>
                 <div class="col-md-7">
                   <p>A Tournament is a competition involving at least three competitors, all participating in a sport or game. More specifically, the term may be used in either of two overlapping senses: One or more competitions held at a single venue and concentrated into a relatively short time interval. </p>
                   <!--<p>A Tournament is a competition involving at least three competitors, all participating in a sport or game. More specifically, the term may be used in either of two overlapping senses: One or more competitions held at a single venue and concentrated into a relatively short time interval. </p>-->
                 </div>
             </div>
         </div>
     </div>
     <!--  about area end -->
    <!--  featured area start -->
     <div class="featured-area cta3" id="featured">
         <div class="container">
             <div class="row">
                 <div class="col-lg-3 wow fadeInLeft">
                     <div class="featured-mobile">
                          <img src="<?= base_url()?>assets/images/login-page.png" style="height:300px">
                     </div>
                 </div>
                 <div class="col-lg-9 wow fadeInRight margin-left-30">
                     <div class="featured-right-item">
                         <div>
                             <h2 class="text-white">Terms & Conditions </h2>
                         </div>
                          <p class="text-white">Welcome to Sports Tournament, the website and online service of Sports and games. This page explains the terms by which you may use our online website and services provided on
                          or in connection with the service (collectively the “Service”). By accessing or using the Service, you agree to be bound by this Terms of Use Agreement (“Agreement”) and to the collection and 
                          use of your information as set forth in the Sports Tournament Privacy Policy, whether or not you are a registered user of our Service.
                          This Agreement applies to all visitors, users, customers, contributors and others who access the Service.</p>
                           <h5 class="text-white">Accuracy, Completeness And Timeliness Of Information</h5>
                          <p class="text-white">We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk.</p>
                          <!--<p class="text-white">In no event shall Clay County Soccer Club, nor any of its officers, directors and employees, shall be held liable for anything arising out of or in any way connected with your use of this Website whether such liability is under contract.  Clay County Soccer Club, including its officers, directors and employees shall not be held liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.</p>-->
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--  featured area end -->
     <!--  screenshot area start -->
     <div class="screenshot-area cta3">
         <div class="container">
             <div class="row">
                 <div class="col-md-12 wow fadeInUp ">
                     <div class="section-title text-center">
                         <h2>Privacy Policy </h2>
                      
                     </div>
                     <p>Sports Tournament is committed to protecting your privacy and complying with applicable data protection and privacy laws. This Privacy Policy (“Policy”) is designed to help you to understand what kind of information we collect in
                     connection with our products and services and how we process and use such information. Throughout this Policy the term “personal data” means information relating to an identified or identifiable individual (i.e. a natural person).</p>
                     <h4>Data Collection </h4>
                     <p>We collect your personal data typically when you purchase our products or services, use or register into our services, enter into a sales promotion or a campaign, or otherwise interact with us. Below are examples of the categories of the data we collect on you.</p>
                      <h4>Location data</h4>
                      <p>Certain services may involve the use of your location data. Use of your location data is, however, subject to your prior consent for each service.</p>
                     <h4>The Purposes of Processing</h4>
                     <p> Sports Tournament processes your personal data for the purposes described in this Policy and/or any additional service specific privacy information. Please note that one or more purposes may apply simultaneously.</p>
                 </div>
             </div>
             <!--<div class="row">-->
             <!--    <div class="col-md-12">-->
             <!--        <div class="screenshot-home3-slide">-->
             <!--            <div class="screenshot-single-slide">-->
             <!--                <img src="<?= base_url()?>web_assets/img/sc-1.jpg" alt="" />-->
             <!--            </div>-->
             <!--            <div class="screenshot-single-slide">-->
             <!--                <img src="<?= base_url()?>web_assets/img/sc-2.jpg" alt="" />-->
             <!--            </div>-->
             <!--            <div class="screenshot-single-slide">-->
             <!--                <img src="<?= base_url()?>web_assets/img/sc-3.jpg" alt="" />-->
             <!--            </div>-->
             <!--            <div class="screenshot-single-slide">-->
             <!--                <img src="<?= base_url()?>web_assets/img/sc-4.jpg" alt="" />-->
             <!--            </div>-->
             <!--            <div class="screenshot-single-slide">-->
             <!--                <img src="<?= base_url()?>web_assets/img/sc-5.jpg" alt="" />-->
             <!--            </div>-->
             <!--            <div class="screenshot-single-slide">-->
             <!--                <img src="<?= base_url()?>web_assets/img/sc-4.jpg" alt="" />-->
             <!--            </div>-->
             <!--        </div>-->
             <!--    </div>-->
             <!--</div>-->
         </div>
     </div>
     <!--  screenshot area end -->
     <!--  get area start -->
     <!--<div class="get-area cta3">-->
     <!--    <div class="container">-->
     <!--        <div class="row">-->
     <!--            <div class="col-lg-7 wow fadeInLeft">-->
     <!--                <div class="get-area-left">-->
     <!--                    <h1>Get The App Now </h1>-->
     <!--                    <p>Mobile apps were originally for general productivity information, including email, calendar, contacts, market and weather information.  demand and the availability  developer tools drove rapid into other categories, such  those handled. </p>-->
     <!--                    <div class="get-app-mobile-app">-->
     <!--                        <a href="#" class="home4-get-btn"></a>-->
     <!--                        <a href="#" class="home4-get-btn2"></a>-->
     <!--                    </div>-->
     <!--                </div>-->
     <!--            </div>-->
     <!--             <div class="col-lg-5 wow fadeInRight">-->
     <!--                <div class="get-app-right">-->
     <!--                    <img src="<?= base_url()?>web_assets/img/get-app-mobile.png" alt="" />-->
     <!--                </div>-->
     <!--            </div>-->
     <!--        </div>-->
     <!--    </div>-->
     <!--</div>-->
     <!--  get area end -->
   
  
     <!--  counter area start -->
     <div class="counter-area cta3 wow fadeInUp">
         <div class="container">
             <div class="row">
                 <div class="col-md-3 text-center">
                     <a href="#" class="single-counter">
                         <img src="<?= base_url()?>web_assets/img/counter-icon1.png" alt="" />
                         <h1>15K+ </h1>
                         <p>App Downloads </p>
                     </a>
                 </div>
                 <div class="col-md-3 text-center">
                     <a href="#" class="single-counter">
                         <img src="<?= base_url()?>web_assets/img/counter-icon2.png" alt="" />
                         <h1>400+ </h1>
                         <p>Happy Clients </p>
                     </a>
                 </div>
                 <div class="col-md-3 text-center">
                     <a href="#" class="single-counter">
                         <img src="<?= base_url()?>web_assets/img/counter-icon3.png" alt="" />
                         <h1>50 + </h1>
                         <p>Team </p>
                     </a>
                 </div>
                 <div class="col-md-3 text-center">
                     <a href="#" class="single-counter">
                         <img src="<?= base_url()?>web_assets/img/counter-icon4.png" alt="" />
                         <h1>100+ </h1>
                         <p>Total Reviews </p>
                     </a>
                 </div>
             </div>
         </div>
     </div>
     <!--  counter area end -->
     <!--  blog area start -->
     <!--<div class="blog-slide-area cta3">-->
     <!--    <div class="container">-->
     <!--        <div class="row">-->
     <!--            <div class="col-md-12 wow fadeInUp text-center">-->
     <!--                <div class="section-title">-->
     <!--                    <h2>Blog </h2>-->
     <!--                    <p>Most such devices are  with several apps bundled  pre-installed software,-->
     <!--                    <br /> such as a browser, email client, calendar, program. </p>-->
     <!--                </div>-->
     <!--            </div>-->
     <!--        </div>-->
     <!--        <div class="row">-->
     <!--            <div class="col- col-md-12">-->
     <!--                <div class="blog-slide">-->
     <!--                    <div class="blog-single-slide">-->
     <!--                        <img src="<?= base_url()?>web_assets/img/home3-blog-img1.jpg" alt="" />-->
     <!--                        <div class="blog-slide-text">-->
     <!--                            <p>By  <span class="blog-meta">Pamela Reid </span>  <span class="blod-dates">January 16, 2018 </span></p>-->
     <!--                            <h4><a href="#">5 Ways to From  Mobile </a></h4>-->
     <!--                            <p class="cta-meta">Developing apps for mobile requires considering the constraints features of these devices... </p>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                    <div class="blog-single-slide">-->
     <!--                        <img src="<?= base_url()?>web_assets/img/home3-blog-img2.jpg" alt="" />-->
     <!--                        <div class="blog-slide-text">-->
     <!--                            <p>By  <span class="blog-meta">Jerry Myers </span>  <span class="blod-dates">January 16, 2018 </span></p>-->
     <!--                            <h4><a href="#">The Best of, so </a></h4>-->
     <!--                            <p class="cta-meta">Developing apps for mobile requires considering the constraints features of these devices... </p>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                    <div class="blog-single-slide">-->
     <!--                        <img src="<?= base_url()?>web_assets/img/home3-blog-img3.jpg" alt="" />-->
     <!--                        <div class="blog-slide-text">-->
     <!--                            <p>By  <span class="blog-meta">Nicole Adams </span>  <span class="blod-dates">January 16, 2018 </span></p>-->
     <!--                            <h4><a href="#">All the trends we  year </a></h4>-->
     <!--                            <p class="cta-meta">Developing apps for mobile requires considering the constraints features of these devices... </p>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                    <div class="blog-single-slide">-->
     <!--                        <img src="<?= base_url()?>web_assets/img/home3-blog-img1.jpg" alt="" />-->
     <!--                        <div class="blog-slide-text">-->
     <!--                            <p>By  <span class="blog-meta">Pamela Reid </span>  <span class="blod-dates">January 16, 2018 </span></p>-->
     <!--                            <h4><a href="#">5 Ways to From  Mobile </a></h4>-->
     <!--                            <p class="cta-meta">Developing apps for mobile requires considering the constraints features of these devices... </p>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                    <div class="blog-single-slide">-->
     <!--                        <img src="<?= base_url()?>web_assets/img/home3-blog-img2.jpg" alt="" />-->
     <!--                        <div class="blog-slide-text">-->
     <!--                            <p>By  <span class="blog-meta">Jerry Myers </span>  <span class="blod-dates">January 16, 2018 </span></p>-->
     <!--                            <h4><a href="#">The Best of, so </a></h4>-->
     <!--                            <p class="cta-meta">Developing apps for mobile requires considering the constraints features of these devices... </p>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                    <div class="blog-single-slide">-->
     <!--                        <img src="<?= base_url()?>web_assets/img/home3-blog-img3.jpg" alt="" />-->
     <!--                        <div class="blog-slide-text">-->
     <!--                            <p>By  <span class="blog-meta">Nicole Adams </span>  <span class="blod-dates">January 16, 2018 </span></p>-->
     <!--                            <h4><a href="#">All the we loved  year </a></h4>-->
     <!--                            <p class="cta-meta">Developing apps for mobile requires considering the constraints features of these devices... </p>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                    <div class="blog-single-slide">-->
     <!--                        <img src="<?= base_url()?>web_assets/img/home3-blog-img2.jpg" alt="" />-->
     <!--                        <div class="blog-slide-text">-->
     <!--                            <p>By  <span class="blog-meta">Nicole Adams </span>  <span class="blod-dates">January 16, 2018 </span></p>-->
     <!--                            <h4><a href="#">All the we loved  year </a></h4>-->
     <!--                            <p class="cta-meta">Developing apps for mobile requires considering the constraints features of these devices... </p>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                </div>-->
     <!--            </div>-->
     <!--        </div>-->
     <!--    </div>-->
     <!--</div>-->
     <!--  blog area end -->
        <!--  testimonial area start -->
     <!--<div class="testimonial-area" id="testimonial">-->
     <!--    <div class="container">-->
     <!--        <div class="row">-->
     <!--            <div class="col-md-12 wow fadeInUp text-center">-->
     <!--                <div class="section-title">-->
     <!--                    <h2>Testimonials </h2>-->
     <!--                </div>-->
     <!--            </div>-->
     <!--        </div>-->
     <!--        <div class="row">-->
     <!--            <div class="col-md-12">-->
     <!--                <div class="testimonial-slide">-->
     <!--                    <div class="testimonial-single-slide">-->
     <!--                        <div class="testimonial-slide-content">-->
     <!--                            <p>“Developing apps for mobile requires considering the constraints features of these devices.  devices run on battery have less powerful processors.” </p>-->
     <!--                        </div>-->
     <!--                        <div class="testimonial-slide-meta">-->
     <!--                            <img src="<?= base_url()?>web_assets/img/testimonial-slide-meta1.png" alt="" />-->
     <!--                            <span class="testimonial-meta">-->
     <!--                                <span class="meta-title">Elijah Terry </span><br />-->
     <!--                                <span class="meta-content">CEO, Imagine Dragon Inc. </span>-->
     <!--                            </span>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                    <div class="testimonial-single-slide">-->
     <!--                        <div class="testimonial-slide-content">-->
     <!--                            <p>“Developing apps for mobile requires considering the constraints features of these devices.  devices run on battery have less powerful processors.” </p>-->
     <!--                        </div>-->
     <!--                        <div class="testimonial-slide-meta">-->
     <!--                            <img src="<?= base_url()?>web_assets/img/testimonial-slide-meta2.png" alt="" />-->
     <!--                            <span class="testimonial-meta">-->
     <!--                                <span class="meta-title">Daniel Wells </span><br />-->
     <!--                                <span class="meta-content">Android Developer, SW&Z </span>-->
     <!--                            </span>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                    <div class="testimonial-single-slide">-->
     <!--                        <div class="testimonial-slide-content">-->
     <!--                            <p>“Developing apps for mobile requires considering the constraints features of these devices.  devices run on battery have less powerful processors.” </p>-->
     <!--                        </div>-->
     <!--                        <div class="testimonial-slide-meta">-->
     <!--                            <img src="<?= base_url()?>web_assets/img/testimonial-slide-meta3.png" alt="" />-->
     <!--                            <span class="testimonial-meta">-->
     <!--                                <span class="meta-title">Robert Evans </span><br />-->
     <!--                                <span class="meta-content">SEO Specialist, Singleappel </span>-->
     <!--                            </span>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                    <div class="testimonial-single-slide">-->
     <!--                        <div class="testimonial-slide-content">-->
     <!--                            <p>“Developing apps for mobile requires considering the constraints features of these devices.  devices run on battery have less powerful processors.” </p>-->
     <!--                        </div>-->
     <!--                        <div class="testimonial-slide-meta">-->
     <!--                            <img src="<?= base_url()?>web_assets/img/testimonial-slide-meta2.png" alt="" />-->
     <!--                            <span class="testimonial-meta">-->
     <!--                                <span class="meta-title">Daniel Wells </span><br />-->
     <!--                                <span class="meta-content">Android Developer, SW&Z </span>-->
     <!--                            </span>-->
     <!--                        </div>-->
     <!--                    </div>-->
     <!--                </div>-->
     <!--            </div>-->
     <!--        </div>-->
     <!--    </div>-->
     <!--</div>-->
     <!--  testimonial area end -->
     <!--  contact area start -->
     <div class="contact-area cta3" id="contact">
         <div class="container">
             <div class="row">
                 <div class="col-md-12 text-center">
                     <div class="section-title ctas1">
                         <h2 class="mb-3" style="color: #1a2b3c;">Contact Us </h2>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-lg-4  col-md-4 wow fadeInRight">
                     <div class="contact-form-right">
                         <div class="contact-form-right-single">
                             <!--<img src="<?= base_url()?>web_assets/img/home3-contact-icon1.png" alt="" />-->
                             <span class="contact-icon">
                                 <i class='zmdi zmdi-phone'></i>
                             </span>
                             <a href="tel:+91 9999999999">+91 9999999999</a>
                         </div>
                      </div>
                 </div>
                 <div class="col-lg-4 col-md-4 wow fadeInRight">
                     <div class="contact-form-right">
                         <div class="contact-form-right-single">
                             <span class="contact-icon">
                                 <i class='zmdi zmdi-email-open'></i>
                             </span>
                             <a href="mailto:contact@appiyan.com">info@sopotstornament.com </a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4  col-md-4 wow fadeInRight">
                     <div class="contact-form-right">
                        <div class="contact-form-right-single">
                             <span class="contact-icon">
                                 <i class='zmdi zmdi-pin zmdi-hc-fw'></i>
                             </span>
                             <!--<img src="<?= base_url()?>web_assets/img/home3-contact-icon3.png" alt="" />-->
                             <p>Sadar Bazaar, Agra </p>
                         </div>
                     </div>
                 </div>
                
             </div>
         </div>
     </div>
     <!--  contact area end -->
     <!--  footer area start -->
     <div class="footer-area cta3 wow fadeInUp">
         <div class="container">
             <!--<div class="row">-->
             <!--    <div class="col-md-12 text-center">-->
             <!--        <div class="footer-menu">-->
             <!--            <ul id="footer-list">-->
             <!--                <li><a href="#">Home </a></li>-->
             <!--                <li><a href="#">About </a></li>-->
             <!--                <li><a href="#">Features </a></li>-->
             <!--                <li><a href="#">Pricing </a></li>-->
             <!--                <li><a href="#">Testimonials </a></li>-->
             <!--                <li><a href="#">Contact </a></li>-->
             <!--            </ul>-->
             <!--        </div>-->
             <!--    </div>-->
             <!--</div>-->
             <div class="row">
                 <div class="col-md-12 text-center">
                     <div class="footer-social-icon">
                         <a href="https://www.facebook.com/" target="_blank"><i class='zmdi zmdi-facebook'></i></a>
                         <a href="https://twitter.com/login"  target="_blank"><i class='zmdi zmdi-twitter'></i></a>
                         <!--<a href="#"><i class='zmdi zmdi-linkedin'></i></a>-->
                         <a href="https://www.instagram.com/"  target="_blank"><i class='zmdi zmdi-instagram'></i></a>
                         <!--<a href="#"><i class='zmdi zmdi-google-plus'></i></a>-->
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-12 text-center">
                     <div class="footer-logo">
                         <h4><a href="<?= base_url()?>">Sports Tournament </a></h4>
                         <p class="text-white">Welcome To Sports Tournament</p>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-12 text-center">
                     <div class="footer-title">
                         <p>&copy; 2022 All Right by  <a href="<?= base_url()?>">Sports Tournament </a></p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!--  footer area end -->
     <!-- jquery.js -->
     <script src="<?= base_url()?>web_assets/js/jquery.js"></script>
     <!-- jquery.popper.min.js -->
     <script src="<?= base_url()?>web_assets/js/popper.min.js"></script>
     <!-- bootstrap.min.js -->
     <script src="<?= base_url()?>web_assets/js/bootstrap.min.js"></script>
     <!-- jquery.slicknav.min.js -->
     <script src="<?= base_url()?>web_assets/js/jquery.slicknav.min.js"></script>
     <!-- jquery.magnific.min.js -->
     <script src="<?= base_url()?>web_assets/js/jquery.magnific-popup.min.js"></script>
     <!-- jquery.is sticky.min.js -->
     <script src="<?= base_url()?>web_assets/js/jquery.sticky.js"></script>
     <!-- jquery.owl.min.js -->
     <script src="<?= base_url()?>web_assets/js/owl.carousel.min.js"></script>
     <!-- jquery.wow.min.js -->
     <script src="<?= base_url()?>web_assets/js/wow.min.js"></script>
     <!-- main.js -->
     <script src="<?= base_url()?>web_assets/js/main.js"></script>
 </body>

 </html>