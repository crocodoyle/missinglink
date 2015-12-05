<!doctype html>
<html style="height:100%;">
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
		<link href='css/control.loading.css' rel='stylesheet' />	
		<script src="js/papaparse.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/leaflet.js"></script>
		<script src="js/control.loading.js"></script>
		
		<script src="js/leaflet.ajax.min.js"></script>
		

		
        <style>
			#map{height: 500px;position:relative;}
        </style>
		<style type="text/css">
        .map-panel {
			background: #404142;
        }
		</style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body style="height:100%;">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<nav class="navbar navbar-default" style="position:relative;margin:0px;height:100px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
		<img style="max-height:75px; margin-top: -5px; margin-bottom: -5px; margin-left: 0px;"
             src="/title.png">
	  </a>
    </div>
	
	<style type="text/css">
		.navbar { background: #404142 !important; border: 0;} /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
		.navbar .nav >li >a {color: #bbb}
		.checkbox input[type=checkbox]{margin-left:-10px;}
		body { background: #404142 !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
	</style>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-filter"></span> Type<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="commute"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Commute</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="work"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Work</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="play"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Play</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="other"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other</input></div></label></a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-time"></span> Time<span class="caret"/></a>
          <ul class="dropdown-menu">
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="morning"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Morning</input></div></label></a></li>
           <!-- <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="afternoon" checked> Afternoon</input></div></label></a></li> -->
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="evening"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Evening</input></div></label></a></li>
			<li><a href="#"><label><div class="checkbox"><input type="checkbox" id="weekend"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weekend</input></div></label></a></li>
          </ul>
        </li>
      </ul>
	  <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cloud"></span> Season<span class="caret"/></a>
          <ul class="dropdown-menu">
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="good-weather"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="max-height:30px; margin-top:-15px; margin-bottom: -15px;" src="/SUN-01.png"></input></div></label></a></li>
           <!-- <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="afternoon" checked> Afternoon</input></div></label></a></li> -->
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="winter"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="max-height:30px; margin-top:-15px; margin-bottom: -15px;" src="/SNOW-01.png"></input></div></label></a></li>
          </ul>
        </li>
      </ul>
	  <!--
	 <ul class="nav navbar-nav">
		<li class="navbar-inner">
			<form class="navbar-form form-inline">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default active">
						<input type="radio" name="options" id="good-weather" value="yes"> <img style="max-height:30px; margin-top:-15px; margin-bottom: -15px;" src="/SUN-01.png">
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options" id="winter" value="yes"> <img style="max-height:30px; margin-top:-15px; margin-bottom: -15px;" src="/SNOW-01.png">
					</label>
				</div>
			</form>
		</li>
	</ul>-->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  <img src="logo.png" alt="logo" style="position:absolute; bottom: 7px;right:32%;height:70%;" />
  
  <div style="background-color: #FBF500;height:7px;width:100%;position:absolute;bottom:0"></div>

  <div style="background-color: #404142; height: 7px;width:150px;position:absolute;bottom:0;right:20%;"></div>
  <img id="loader" src="ajax-loader.gif" alt="loading" style="position:absolute;top:55px;left:250px;display:none;"/>
  </nav>
