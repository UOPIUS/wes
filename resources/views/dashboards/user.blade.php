<!doctype html>
<html lang="en">

<head>
    <title>Dashboard | Central Affidavit Registration</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/linearicons/style.css">
    <link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
    <link href="assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
    <link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon.png">
</head>
<body>
<!-- WRAPPER -->
<div id="wrapper">

    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="{{URL('dashboards.admin')}}"><img src="img/logo.png" alt="car Logo" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            
            <!---
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            
            ---->

            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!--
                            <img src="assets/img/user.png" class="img-circle" alt="Avatar"> 
                            -->
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
    <!-- END NAVBAR -->

    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="#"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-chart-bars"></i> <span>Sales</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse">
                            <ul class="nav">
                                <li><a href="page-lockscreen.html" class="">Add new</a></li>
                                <li><a href="page-lockscreen.html" class="">History</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#x3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Clients</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="x3" class="collapse ">
                            <ul class="nav">
                    
                                <li><a href="" class="">Add new</a></li>
                                <li><a href="" class="">Records</a></li>
                                
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
            <div class="container-fluid" id="location">
                @yield('mainbody')
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
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="assets/vendor/chartist/js/chartist.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>
<script src="assets/scripts/thrift.js"></script>
<script src="assets/scripts/jquery.blockUI.js"></script>
<script src="assets/scripts/jquery.validate.min.js"></script>
<!--<script src="assets/scripts/simple.money.format.js"></script>-->
<script src="assets/sweetalert/sweetalert.min.js"></script>
<!-- Required datatable js -->
<script src="assets/datatables/jquery.dataTables.min.js"></script>
<script src="assets/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/datatables/dataTables.buttons.min.js"></script>
<script src="assets/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/datatables/jszip.min.js"></script>
<script src="assets/datatables/pdfmake.min.js"></script>
<script src="assets/datatables/vfs_fonts.js"></script>
<script src="assets/datatables/buttons.html5.min.js"></script>
<script src="assets/datatables/buttons.print.min.js"></script>

<!-- Key Tables -->
<script src="assets/datatables/dataTables.keyTable.min.js"></script>

<!-- Modal-Effect -->
<script src="assets/custombox/dist/custombox.min.js"></script>
<script src="assets/custombox/dist/legacy.min.js"></script>

<script src="assets/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
<!-- Responsive examples -->
<script src="assets/datatables/dataTables.responsive.min.js"></script>
<script src="assets/datatables/responsive.bootstrap4.min.js"></script>
<script src="assets/vendor/toastr/toastr.min.js"></script>
<script src="assets/scripts/otp.js"></script>
@yield('myscript')

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