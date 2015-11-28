<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link href='css/leaflet.css' rel='stylesheet' />
		
		<script src="js/papaparse.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/leaflet.js"></script>
		

		
        <style>
			#map{height: 500px;position:relative;}
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span> missinglynx</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-filter"></span> Type<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="commute"> Commute</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="work"> Work</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="play"> Play</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="other"> Other</input></div></label></a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-time"></span> Time<span class="caret"/></a>
          <ul class="dropdown-menu">
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="morning"> Morning</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="afternoon"> Afternoon</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="evening"> Evening</input></div></label></a></li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div style="clear:both;"></div>
	
