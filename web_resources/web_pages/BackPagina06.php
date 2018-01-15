<html>
<?php
session_start();
//if(!isset($_SESSION['login'])){
//    header("Location: BackPagina01.php");
//}
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Paladuta Stefan">
    <meta name="description" content="Proiect PIE, CTI ANUL 4">
    <link rel="icon" href="../web_pictures/tabIcon.ico">

    <title>SayHi main</title>
    <!-- Bootstrap -->
    <link href="../lib_frameworkuri/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="../lib_frameworkuri/Bootstrap/cover.css" rel="stylesheet">
    <link href="../lib_frameworkuri/FontAwesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container" style="">
            <!--  include navigation bar -->
            <?php include("NavBar.php"); ?>
            <div class="inner cover">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!--  include about section -->
                            <?php include("pagina06Main.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--  include footer bar -->
            <?php //include("footerBar.php"); ?>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript .min.js && .js
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../lib_frameworkuri/Bootstrap/js/bootstrap.js"></script>
<script src="../lib_frameworkuri/Bootstrap/js/jquery.min.js"></script>
<script src="../lib_frameworkuri/Bootstrap/js/bootstrap.min.js"></script>
<script src="../lib_frameworkuri/Bootstrap/form.js"></script>
</body>
</html>