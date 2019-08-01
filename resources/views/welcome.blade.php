
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Central Affidavit Registration | car.ng</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="Central Affidavit System">

        <!-- Favicons -->
        <link href="iconbar/assets/images/favicon.png" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <style>
            form#login_user{
                font-family: verdana;
                margin:auto;
                width: 100%;
                height: 100%;
                color: #0fab60; 
                padding: 50px 80px;
                background:   #f7f9f9; /**rgb(8,36,0);
                /**background: linear-gradient(90deg, rgba(8,36,0,1) 0%, rgba(38,204,42,0.43599438066242124) 51%, rgba(16,62,8,1) 100%); **/
            }
            form#login_user h5{
                font-weight: 700;

            }
            .error {
                color: #ff0000;
            }

            @media(max-width: 768px) {
                form#login_user{
                    width: 100%;
                }
                #intro .intro-info h2{
                    border: 1px solid #f0f0f0; margin-right: 0; background-color: #fff; padding: 5px;
                    text-align: center;
                    float:none;margin-top: 5px;
                }
            }


        </style>
    </head>

    <body>

        <!--==========================
Header
============================-->
        <header id="header" class="fixed-top">
            <div class="container-fluid">

                <div class="logo float-left">
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
                    <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"> Central Affidavit Registration </a>

                </div>

                <nav class="main-nav float-right d-none d-lg-block">

                    <ul>
                        <li class="active"><a href="#intro">Home</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#services">Services</a></li>

                        <li><a href="validate_af.php">Validate</a></li>

                    </ul>
                </nav><!-- .main-nav -->

            </div>
        </header><!-- #header -->

        <section id="intro" class="clearfix">
            <div class="container-fluid">
                <div class="intro-img">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                    <form class="form" method="get" action="{{ url('validateuser') }}" id="login_user" name="login_user" role = "form">
                        @csrf
                        <h5 class="text-center">Get Your Electronic Affidavit</h5>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class = "sr-only" for = "username">Email</label>
                                <input type = "text" class = "form-control" id = "username" name="username" placeholder = "Username"> &nbsp; &nbsp;
                                <span class="help-block">USER ID used for registration</span>
                            </div>
                            <div class = "form-group col-md-12">
                                <label class = "sr-only" for = "password">Password</label>
                                <input type = "password" class = "form-control" id = "password" name="password" placeholder = "Password">&nbsp; &nbsp;
                            </div>

                            <div class = "form-group col-md-12" id="response">

                            </div>
                            <div class = "form-group col-md-12">
                                <input type = "submit" class = "btn btn-success btn-sm form-control" id="loginBtn" value="SUBMIT">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 co text-left font-size-16">
                                <a href="iconbar/pages/login.php" class=" form-control btn btn-sm btn-warning">
                                    <small>Create a new account</small>
                                </a>
                            </div>
                            <div class = "form-group col-md-6 col-sm-12 text-center font-size-16">

                                <a href="iconbar/pages/forgot-password.html" class="form-control btn btn-sm btn-danger">
                                    <small>Forgot password?</small>
                                </a>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="intro-info">
                    <h2  style="border: 1px solid #f0f0f0; margin-right: -40px; background-color: #fff; padding: 25px; text-align: center; font-size: 2.5em">Get your <br><span style="color:#f00">Valid Electronic </span><br>Affidavit</h2>

                </div>

            </div>

        </section><!-- #intro -->

        <main id="main">
            <style>
                .get-started-thumbnail{
                    color: #76b852;
                    font-size: 16px;
                }
                .get-started-thumbnail a {
                    font-size: 1.6em;
                }
            </style>

            <!--==========================
Why Us Section
============================-->
            <section id="why-us" class="wow fadeIn section-bg">
                <div class="container">
                    <header class="section-header">
                        <h3>Why you can trust our Platform</h3>
                    </header>
                    <div class="row counters mb-0 padding-0">
                        <div class="col-lg-3 col-6 text-center">
                            <span data-toggle="counter-up">3,500</span>
                            <p>Affidavit Processed</p>
                        </div>
                        <div class="col-lg-3 col-6 text-center">
                            <span data-toggle="counter-up">1,500</span>
                            <p>Clients</p>
                        </div>
                        <div class="col-lg-3 col-6 text-center">
                            <span data-toggle="counter-up">3,464</span>
                            <p>Affidavit Validated</p>
                        </div>
                        <div class="col-lg-3 col-6 text-center">
                            <span>99%</span>
                            <p>Platform efficiency</p>
                        </div>
                    </div>

                </div>
            </section>

            <section id="about" class="section-bg" style="padding:5px;">
                <div class="container">
                    <header class="section-header">
                        <h3>About the platform</h3>
                        <p>Automated Affidavit is a platform for but not limited to processing, validation and verification of Affidavit to ensure originality of the document to eradicate fake ones.</p>
                    </header>

                    <div class="row about-extra">
                        <div class="col-lg-6 wow fadeInUp order-1 order-lg-2">
                            <img src="img/about-extra-2.svg" class="img-fluid" alt="">
                        </div>

                        <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1">
                            <h4>When you will need an Affidavit</h4>
                            <h5>You will need an Affidavit when you want to do: </h5>
                            <ul>
                                <li>Verify your birth in cases when you cannot find your birth certificate</li>
                                <li>Change of name</li>
                                <li>in the unfortunate instance your identity is stolen, use an ID theft Affidavit to inform creditors, banks and other businesses</li>
                                <li>Want to notify creditors, the court and businesses that someone has died</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>


            <!--==========================
Services Section
============================-->
            <section id="services" class="section-bg">
                <div class="container">
                    <header class="section-header">
                        <h3>Our Services</h3>

                    </header>
                    <div class="row">
                        <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
                            <div class="box">
                                <div class="icon"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
                                <h4 class="title"><a>Processing Affidavit</a></h4>
                                <p class="description">Get registered on our site. It's very simple. We need your basic details so that we can keep record.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
                            <div class="box">
                                <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #e9bf06;"></i></div>
                                <h4 class="title"><a>Database of Despondent and Affidavit</a></h4>
                                <p class="description">Choose from our already existing Affidavit type or create a custom type</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                            <div class="box">
                                <div class="icon"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
                                <h4 class="title"><a href="">Validating of Despondent and Affidavit</a></h4>
                                <p class="description">We validate Affidavits.</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                            <div class="box">
                                <div class="icon"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
                                <h4 class="title"><a href="">Verification of Affidavit</a></h4>
                                <p class="description">Our Affidavits can be verified any where. You do not need to come to our office</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- #services -->

            <!--==========================
Clients Section
============================-->
            <section id="clients">

                <div class="container">

                    <div class="section-header">
                        <h3>Our Partners</h3>

                    </div>

                    <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="client-logo">
                                <img src="img/clients/client-1.jpg" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="client-logo">
                                <img src="img/clients/client-2.jpg" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="client-logo">
                                <img src="img/clients/client-3.gif" class="img-fluid" alt="">
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-xs-6">
                            <div class="client-logo">
                                <img src="img/clients/nba.png" class="img-fluid" alt="">
                            </div>
                        </div>



                    </div>

                </div>

            </section>


        </main>

        <!--==========================
Footer
============================-->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 footer-info">
                            <h3>CAR</h3>
                            <p>A written statement of facts, sworn to and signed by a deponent before a notary public or some other authority having the power to witness an oath.</p>
                        </div>

                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Terms of service</a></li>
                                <li><a href="#">Privacy policy</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h4>Contact Us</h4>
                            <p>
                                No 7 Area 10, Garki, <br>
                                Abuja <br>
                                <strong>Phone:</strong> +2348109593410<br>
                                <strong>Email:</strong> info@aff.ng<br>
                            </p>

                            <div class="social-links">
                                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6 footer-newsletter">
                            <h4>Our Newsletter</h4>
                            <p>Subscribe to our Newsletter and get daily updates on recent happenings</p>
                            <form action="" method="post">
                                <input type="email" name="email"><input type="submit"  value="Subscribe">
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>Central Affidavit System</strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!--
All the links in the footer should remain intact.
You can delete the links only if you purchased the pro version.
Licensing information: https://bootstrapmade.com/license/
Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=NewBiz

Designed by <a href="https://bootstrapmade.com/" style="display:none">BootstrapMade</a>
--------------------------------------------------------------->
                </div>
            </div>
        </footer><!-- #footer -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <!-- Uncomment below i you want to use a preloader -->
        <!-- <div id="preloader"></div> -->

        <!-- JavaScript Libraries -->
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/jquery/jquery-migrate.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/mobile-nav/mobile-nav.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>

        <script src="{{url('assets/scripts/jquery.validate.min.js')}}"></script>

        <script src="contactform/just_js.js" type="text/javascript"></script>

        <script src="js/main.js"></script>

        
    </body>
</html>
