﻿<!-- Author: Ranjithprabhu K
     Date: 24 Dec 2015
	 Author URL: http://ranjithprabhu.in
	 Version: 1.0.0
--->

<!DOCTYPE html>
<html>
<head>
  <title>Angular Bootstrap Dashboard by Ranjithprabhu</title>
  <meta name="description" content="Angular Bootstrap Dashboard"/>
  <meta name="keywords" content="Angular Bootstrap Dashboard"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
    <link href="plugins/angular-material/angular-material.min.css" rel="stylesheet" />
    <!--CSS-->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/site.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/nga.all.min.css" rel="stylesheet" />
    <link href="css/themes.css" rel="stylesheet" />
    <link href="css/dashboard.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="plugins/bootstrap-slider/slider.css" rel="stylesheet" />
    <link href="css/flexslider.css" rel="stylesheet" />
    <link href="plugins/owl-carousel/owl.theme.css" rel="stylesheet" />
    <link href="plugins/owl-carousel/owl.transitions.css" rel="stylesheet" />
    <link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />
</head>
<body ng-app="app" class="hold-transition sidebar-mini @{{theme}} @{{layout}}">
    <!--Scripts-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="plugins/bootstrap-slider/bootstrap-slider.js"></script>


    <script src="js/angular.min.js"></script>
    <script src="js/angular-animate.min.js"></script>
    <script src="js/angular-ui-router-min.js"></script>
    <script src="js/angular-resource.js"></script>
    <script src="plugins/knob/jquery.knob.js"></script>
    <script src="plugins/Chart.min.js"></script>
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>

    <!-- Angular Material Library -->
    <script src="js/angular-material.min.js"></script>
    <script src="js/angular-aria.min.js"></script>
    <script src="js/angular-messages.min.js"></script>

    <script src="js/angular-flash.js"></script>
    <script src="js/angular-sanitize.js"></script>
    <script src="js/ui-bootstrap-tpls-0.13.0.min.js"></script>

    <!--Common-->

    <script src="app/common/config.js"></script>

    <!--main app-->
    <script src="app/app.js"></script>
    <script src="app/common/appCtrl.js"></script>
    <script src="app/services/apiService.js"></script>

    <!--Login Module-->
    <script src="app/modules/login/loginMgmt.js"></script>
    <script src="app/modules/login/loginService.js"></script>
    <script src="app/modules/login/loginCtrl.js"></script>

    <!--Dashboard Module-->
    <script src="app/modules/dashboard/dashboardApplication.js"></script>
    <script src="app/modules/dashboard/dashboardService.js"></script>
        <!-- Controllers -->
        <script src="app/modules/dashboard/controllers/websites.js"></script>
        <script src="app/modules/dashboard/controllers/about.js"></script>
        <script src="app/modules/dashboard/controllers/achievements.js"></script>
        <script src="app/modules/dashboard/controllers/contact.js"></script>
        <script src="app/modules/dashboard/controllers/education.js"></script>
        <script src="app/modules/dashboard/controllers/experience.js"></script>
        <script src="app/modules/dashboard/controllers/gallery.js"></script>
        <script src="app/modules/dashboard/controllers/home.js"></script>
        <script src="app/modules/dashboard/controllers/portfolio.js"></script>
        <script src="app/modules/dashboard/controllers/recent.js"></script>
        <script src="app/modules/dashboard/controllers/skills.js"></script>
    <div flash-message="5000"></div>
    <ui-view></ui-view>
    
</body>
</html>
