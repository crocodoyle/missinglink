<!doctype html>
<html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
	<link href='css/leaflet.css' rel='stylesheet' />
	<link href='css/global.css' rel='stylesheet' />
	<script src="js/jquery.min.js"></script>
	<script src="js/leaflet.js"></script>
</head>
<body>
	<div id="nav">
		<ul class="dropdown-menu">
			<input type="hidden" name="commute
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="commute" checked> Commute</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="work"> Work</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="play"> Play</input></div></label></a></li>
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="other"> Other</input></div></label></a></li>
        </ul>
	</div>
	<div id="map">
	</div>
</body>
</html>
		
		
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
		body { background: #404142 !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
	</style>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-filter"></span> Type<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="commute" checked> Commute</input></div></label></a></li>
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
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="morning" checked> Morning</input></div></label></a></li>
           <!-- <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="afternoon" checked> Afternoon</input></div></label></a></li> -->
            <li><a href="#"><label><div class="checkbox"><input type="checkbox" id="evening"> Evening</input></div></label></a></li>
          </ul>
        </li>
      </ul>
	  
	 <ul class="nav navbar-nav">
		<li class="navbar-inner">
			<form class="navbar-form form-inline">
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default active">
						<input type="radio" name="options" id="good-weather" autocomplete="off" value="yes" checked> <img style="max-height:30px; margin-top:-15px; margin-bottom: -15px;" src="/SUN-01.png" /></input>
					</label>
					<label class="btn btn-default">
						<input type="radio" name="options" id="winter" autocomplete="off" value="yes"> <img style="max-height:30px; margin-top:-15px; margin-bottom: -15px;" src="/SNOW-01.png" /></input>
					</label>
				</div>
			</form>
		</li>
	</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  <img src="logo.png" alt="logo" style="position:absolute; bottom: 7px;right:32%;height:70%;" />
  
  <div style="background-color: #FBF500;height:7px;width:100%;position:absolute;bottom:0"></div>

  <div style="background-color: #404142; height: 7px;width:150px;position:absolute;bottom:0;right:20%;"></div>
  </nav>
