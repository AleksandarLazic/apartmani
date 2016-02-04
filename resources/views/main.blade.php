<!DOCTYPE html>
<html>
<head>
	<title></title>
@include('assets.bootstrap')
@include('assets.css')
</head>
<body  ng-app="mainApp" ng-controller="mainController">
<header>
<div class="background">
<nav class="navbar navbar-collapse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
			 data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" 
			 aria-expanded="false">
    			<span class="sr-only">Toggle navigation</span>
    			<span class="icon-bar"></span>
    			<span class="icon-bar"></span>
    			<span class="icon-bar"></span>
  			</button>
  			<a class="navbar-brand">Logo</a>
		</div>
		<div class="collapse navbar-collapse" style="float: right" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Link</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
	          aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>
	      </ul><!-- nav navbar -->
	    </div><!-- collapse navbar -->
    </div><!-- container-fluid -->
</nav>
</div>	
</header>
<section class="apartments">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
				<h2>Nasi Apartmani</h2>
			</div>
			<div ng-repeat="apartment in apartments">
				<div class="col-lg-6">
					<div class="title"><h2>[[ apartment.apartment_name ]]</h2></div>
					<div class="body" ng-repeat="accessories in apartment.accessories">
						<p>Cena : [[ apartment.price ]] &euro;</p>
						<p>Kreveti : [[ apartment.beds ]]</p>
						<p ng-if="accessories.internet == 1">Internet : Da</p>
						<p ng-if="accessories.internet == 0">Internet : Ne</p>
						<p ng-if="accessories.klima == 1">Klima : Da</p>
						<p ng-if="accessories.klima == 0">Klima : Ne</p>
						<p ng-if="accessories.ljubimci = 1">Ljubimci : Da</p>
						<p ng-if="accessories.ljubimci = 0">Ljubimci : Ne</p>
						<p ng-if="accessories.parking = 1">parking : Da</p>
						<p ng-if="accessories.parking = 0">parking : Ne</p>
						<p ng-if="accessories.tv = 1">Tv : Da</p>
						<p ng-if="accessories.tv = 0">Tv : Ne</p>
						<p ng-if="accessories.vesmasina = 1">Vesmasina : Da</p>
						<p ng-if="accessories.vesmasina = 0">Vesmasina : Ne</p>
					</div>
					<div class="background" ng-repeat="img in apartment.images|limitTo:1" 
					ng-style="{'background-image': 'url(../images/[[ img.image_name ]])'}">
					</div>
				</div><!-- .col-lg-6 -->
			</div><!-- ng-repeat -->
		</div><!-- .row -->
	</div><!-- .container-fluid -->
</section><!-- .apartments -->
<section class="booking">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-4">
				<h2>Rezervisi Apartman</h2>
			</div>
			<div class="col-lg-4 col-lg-offset-4">
				<div class="form-group">
            		<div class='input-group date' id='datetimepicker6'>
                		<input type='text' class="form-control" placeholder="Od dana"/>
                		<span class="input-group-addon">
                    	<span class="glyphicon glyphicon-calendar"></span>
                		</span>
            		</div>
        		</div>
        		<div class="form-group">
            		<div class='input-group date' id='datetimepicker7'>
                		<input type='text' class="form-control" placeholder="Do dana"/>
                		<span class="input-group-addon">
                    	<span class="glyphicon glyphicon-calendar"></span>
                		</span>
            		</div>
        		</div>
			</div>
		</div>
	</div>
</section>
</body>
@include('assets.js')
<script type="text/javascript">
$("header").vegas({
	timer : false,
	slides: [
    	{ src: "../images/apartman-1.jpg" },
    	{ src: "../images/apartman-2.jpg" },
    	{ src: "../images/apartman-3.jpg" },
	]
});
</script>
</html>