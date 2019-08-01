<!doctype html>
<html  lang="{{ app()->getLocale() }}">

    <head>
        <title>Dashboard | Central Affidavit Registration</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <!-- VENDOR CSS -->
        <link rel="stylesheet" href="{{URL('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL('assets/vendor/linearicons/style.css')}}">
        <link rel="stylesheet" href="{{URL('assets/vendor/chartist/css/chartist-custom.css')}}">
        <link href="{{url('assets/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{('assets/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{url('assets/datatables/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- MAIN CSS -->
        <link rel="stylesheet" href="{{URL('assets/css/main.css')}}">

        <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
        <link rel="stylesheet" href="{{url('assets/css/demo.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendor/toastr/toastr.min.css')}}">
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

        <!-- ICONS -->
        <link rel="apple-touch-icon" sizes="76x76" href="{{url('assets/images/favicon.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{url('assets/images/favicon.png')}}">
    </head>
    <body>
        <!-- WRAPPER -->
        <div id="wrapper">

            <!-- NAVBAR -->
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="brand">
                    <a href="{{URL('dashboards.admin')}}"><img src="{{url('img/logo.png')}}" alt="car Logo" class="img-responsive logo"></a>
                </div>
                <div class="container-fluid">

                    <div id="navbar-menu">
                        <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>username</span> <i class="icon-submenu lnr lnr-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu">

                                    <li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
                                    <li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- END NAVBAR include menu here-->
            <!-- LEFT SIDEBAR -->
            <div id="sidebar-nav" class="sidebar">
                <div class="sidebar-scroll">
                    <nav>
                        <ul class="nav">
                      
                            <li><a href="#"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                            <li>
                                <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Courts</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="subPages" class="collapse">
                                    <ul class="nav">
                                        <li><a href="{{ url('courts')}}">List of courts</a></li>
                                        <li><a href="{{ route('bindcourts.index')}}" class="">Add court to LGA</a></li>
                                    </ul>
                                </div>
                            </li>


                            <li>
                                <a href="#x2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Users</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="x2" class="collapse ">
                                    <ul class="nav">

                                        <li><a href="{{url('users')}}">List of users</a></li>
                                        <li><a href="{{url('clients')}}" class="">List of Clients</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#x3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Affidavits</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="x3" class="collapse ">
                                    <ul class="nav">

                                        <li><a href="" class="">Type setup</a></li>
                                        <li><a href="" class="">Validate</a></li>
                                        <li><a href="" class="">History</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#x4" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Fee</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="x4" class="collapse ">
                                    <ul class="nav">

                                        <li><a href="{{ url('tfee')}}">Transaction fee</a></li>
                                    </ul>
                                </div>
                            </li>

                            
                        </ul>				
                    </nav>
                </div>
            </div>
            <!-- END LEFT SIDEBAR -->


            <!-- MAIN -->
            <div class="main">

                <!-- MAIN CONTENT -->
                <div class="main-content">
                    <div class="container-fluid">
                        @yield('mainbody')
                    </div>
                </div>
                <!-- END MAIN CONTENT -->
            </div>
            <!-- END MAIN -->

            <div class="clearfix"></div>
            <footer>
                <div class="container-fluid">
                    <p class="copyright">&copy; {{date('Y')}} <a href="#" target="_blank">Toplazsystems</a>. All Rights Reserved.</p>
                </div>
            </footer>
        </div>
        <!-- END WRAPPER -->

        <!-- Javascript -->
        <script src="{{url('assets/vendor/jquery/jquery.min.js')}}"></script>
        @yield('myscript')
        <script src="{{url('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{url("assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
        <script src="{{url("assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js")}}"></script>
        <script src="{{url("assets/vendor/chartist/js/chartist.min.js")}}"></script>
        <script src="{{url("assets/scripts/klorofil-common.js")}}"></script>
        <script src="{{url("assets/scripts/jquery.validate.min.js")}}"></script>
        <!--<script src="assets/scripts/simple.money.format.js"></script>-->
        <script src="{{url("assets/sweetalert/sweetalert.min.js")}}"></script>
        <!-- Required datatable js -->
        <script src="{{url("assets/datatables/jquery.dataTables.min.js")}}"></script>
        <script src="{{url('assets/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{url('assets/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('assets/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('assets/datatables/jszip.min.js')}}"></script>
        <script src="{{url('assets/datatables/pdfmake.min.js')}}"></script>
        <script src="{{url('assets/datatables/vfs_fonts.js')}}"></script>
        <script src="{{url('assets/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{url('assets/datatables/buttons.print.min.js')}}"></script>

        <!-- Key Tables -->
        <script src="{{url('assets/datatables/dataTables.keyTable.min.js')}}"></script>

        <!-- Modal-Effect -->
        <script src="{{url('assets/custombox/dist/custombox.min.js')}}"></script>
        <script src="{{url('assets/custombox/dist/legacy.min.js')}}"></script>

        <script src="{{url('assets/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{url('assets/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('assets/datatables/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{url('assets/vendor/toastr/toastr.min.js')}}"></script>



        <script>
            $(function(){
                var data, options;
                // headline charts
                data = {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    series: [
                        [23, 29, 24, 40, 25, 24, 35],
                        [14, 25, 18, 34, 29, 38, 44],
                    ]
                };

                options = {
                    height: 300,
                    showArea: true,
                    showLine: false,
                    showPoint: false,
                    fullWidth: true,
                    axisX: {
                        showGrid: false
                    },
                    lineSmooth: false,
                };

                new Chartist.Line('#headline-chart', data, options);


                // visits trend charts
                data = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    series: [
                        {
                            name: 'series-real',
                            data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
                        },
                        {
                            name: 'series-projection',
                            data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
                        }
                    ]
                };

                options = {
                    fullWidth: true,
                    lineSmooth: false,
                    height: "270px",
                    low: 0,
                    high: 'auto',
                    series: {
                        'series-projection': {
                            showArea: true,
                            showPoint: false,
                            showLine: false
                        },
                    },
                    axisX: {
                        showGrid: false,

                    },
                    axisY: {
                        showGrid: false,
                        onlyInteger: true,
                        offset: 0,
                    },
                    chartPadding: {
                        left: 20,
                        right: 20
                    }
                };

                new Chartist.Line('#visits-trends-chart', data, options);


                // visits chart
                data = {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    series: [[6384, 6342, 5437, 2764, 3958, 5068, 7654]]
                };

                options = {
                    height: 300,
                    axisX: {
                        showGrid: false
                    },
                };

                new Chartist.Bar('#visits-chart', data, options);


                // real-time pie chart
                var sysLoad = $('#system-load').easyPieChart({
                    size: 130,
                    barColor: function(percent) {
                        return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
                    },
                    trackColor: 'rgba(245, 245, 245, 0.8)',
                    scaleColor: false,
                    lineWidth: 5,
                    lineCap: "square",
                    animate: 800
                });

                var updateInterval = 3000; // in milliseconds

                setInterval( function() {
                    var randomVal;
                    randomVal = getRandomInt(0, 100);

                    sysLoad.data('easyPieChart').update(randomVal);
                    sysLoad.find('.percent').text(randomVal);
                }, updateInterval);

                function getRandomInt(min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                }

            });
        </script>

    </body>


</html>