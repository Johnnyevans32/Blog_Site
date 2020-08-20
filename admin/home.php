<?php
    session_start();

    if (!isset($_SESSION['username'])) {
        echo "<script>window.open ('login.php?not_admin=You are not an Admin Officer!!','_self')</script>";
    }else{
?>
<!DOCTYPE HTML>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
    <!-- //lined-icons -->
    <script src="js/jquery-1.10.2.min.js"></script>

    <script src="js/amcharts.js"></script>
    <script src="js/serial.js"></script>
    <script src="js/light.js"></script>
    <script src="js/radar.js"></script>
    <link href="css/barChart.css" rel='stylesheet' type='text/css' />
    <link href="css/fabochart.css" rel='stylesheet' type='text/css' />
    <!--clock init-->
    <script src="js/css3clock.js"></script>
    <!--Easy Pie Chart-->
    <!--skycons-icons-->
    <script src="js/skycons.js"></script>

    <script src="js/jquery.easydropdown.js"></script>

    <!--//skycons-icons-->
</head>

<body>
    <style type="text/css">
        @font-face{
            font-family: damn;
            src:url(Anders.ttf);
        }
        @font-face{
            font-family: damn1;
            src:url(koliko.ttf);
        }
        @font-face{
            font-family: damn2;
            src:url(Genera-AltLight.ttf);
        }
        @font-face{
            font-family: damn3;
            src:url(Dosis-Regular.ttf);
        }
        @font-face{
            font-family: damn4;
            src:url(Moon 2.0 Regular 400.ttf);
        }
    </style>
    <div class="container-fluid p-0" style="font-family: damn2;">
        <div class="row p-0">
            <div class="col-3">
                <div class="page-container">
                    <!--/sidebar-menu-->
                    <div class="sidebar-menu">
                        <header class="logo text-center">
                            <a href="home.php" style="text-decoration: none;"> 
                                <span id="logo"><h1 style="font-family: damn;">JEVAN</h1></span>
                            </a>
                        </header>
                        <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
                        <!--/down-->
                        <div class="down">
                            <a href="index.html"><img src="men.jpg"  style="width: 40px;height: 40px;"></a>
                            <a href="index.html"><span class=" name-caret">Johnny Evans</span></a>
                            <p>System Administrator in Company</p>
                        </div>
                        <!--//down-->
                        
                        <div class="menu">
                            <ul id="menu">
                                <li>
                                    <a href="Home.php">
                                        <i class="fa fa-tachometer"></i>
                                        <span>Dashboard</span>
                                        <span class="fa fa-angle-right" style="float: right"></span>
                                    </a>
                                    <ul id="menu-academico-sub">
                                        <li id="menu-academico-avaliacoes">
                                            <a href="#">Settings</a>
                                        </li>
                                        <li id="menu-academico-boletim">
                                            <a href="out.php">Log-Out</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-academico">
                                    <a href="#">
                                        <i class="fa fa-table"></i> 
                                        <span>My Post</span> 
                                        <span class="fa fa-angle-right" style="float: right"></span>
                                    </a>
                                    <ul id="menu-academico-sub">
                                        <li id="menu-academico-avaliacoes">
                                            <a href="home.php?insert_post">Add Post</a>
                                        </li>
                                        <li id="menu-academico-boletim">
                                            <a href="Home.php?edit_post">Edit Post</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-academico">
                                    <a href="#">
                                        <i class="fa fa-table"></i> 
                                        <span>Adverts</span> 
                                        <span class="fa fa-angle-right" style="float: right"></span>
                                    </a>
                                    <ul id="menu-academico-sub">
                                        <li id="menu-academico-avaliacoes">
                                            <a href="home.php?insert_ads">Add ADS</a>
                                        </li>
                                        <li id="menu-academico-boletim">
                                            <a href="Home.php?edit_ads">Edit ADS</a>
                                        </li>
                                    </ul>
                                </li>
                                <li id="menu-academico">
                                    <a href="#">
                                        <i class="lnr lnr-book"></i>
                                        <span>General Setting</span>
                                        <span class="fa fa-angle-right" style="float: right"></span>
                                    </a>
                                    <ul id="menu-academico-sub">
                                        <li id="menu-academico-avaliacoes"><a href="login.html">Add Website Info </a></li>
                                        <li id="menu-academico-boletim"><a href="register.html">Register</a></li>
                                        <li id="menu-academico-boletim"><a href="404.html">404</a></li>
                                        <li id="menu-academico-boletim"><a href="sign.html">Sign up</a></li>
                                        <li id="menu-academico-boletim"><a href="profile.html">Profile</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 mx-auto " style=" right: 50px;">
               
                <?php
                    if (@$_GET['logged_in']) {
                        $name = $_GET['logged_in'];
                        echo "<h1 style='text-align: center;padding: 200px 0;font-family: damn; color: black;'>$name</h1>";
                    }
                    if (isset($_GET['insert_post'])) {
                        include 'insert.php';
                    }
                    if (isset($_GET['edit_post'])) {
                        include 'view.php';
                    }
                    if (isset($_GET['edit_pro'])) {
                       include 'edit.php';
                    }
                    if (isset($_GET['delete_pro'])) {
                        include 'del.php';
                    }
                     if (isset($_GET['insert_ads'])) {
                        include 'advert.php';
                    }
                    if (isset($_GET['edit_ads'])) {
                        include 'edit_advert.php';
                    }
                ?>                 
            </div>
        </div>
    </div>
    <script>
        var toggle = true;

        $(".sidebar-icon").click(function() {
            if (toggle) {
                $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                $("#menu span").css({
                    "position": "relative"
                });
            } else {
                $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                setTimeout(function() {
                    $("#menu span").css({
                        "position": "absolute"
                    });
                }, 400);
            }

            toggle = !toggle;
        });

    </script>
    <!--js -->
    <link rel="stylesheet" href="css/vroom.css">
    <script type="text/javascript" src="js/vroom.js"></script>
    <script type="text/javascript" src="js/TweenLite.min.js"></script>
    <script type="text/javascript" src="js/CSSPlugin.min.js"></script>
    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php } ?>