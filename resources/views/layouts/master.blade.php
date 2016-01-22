<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
		@include('assets.bootstrap')
		@include('assets.css')
		<title>Admin Panel</title>
	</head>
	<body ng-app="apartmentApp" ng-controller="addApartmentController">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      		</button>
				<a class="navbar-brand" href="#">Brand</a>
			</div>
			<div class="collapse navbar-collapse pull-right">
				<ul class="nav navbar-nav">
				    <li class="active"><a href="#">Poruke <span class="sr-only">(current)</span></a></li>
        			<li><a href="{{ route('reservation.get') }}">Rezervacije</a></li>
				        <li class="dropdown">
				          <a class="dropdown-toggle" data-toggle="dropdown" 
				          	role="button" aria-haspopup="true" aria-expanded="false">Apartmani
				          	<span class="caret"></span></a>
				          <ul class="dropdown-menu">
				            <li><a href="admin#/apartments">Dodaj apartman</a></li>
				            <li><a href="#">Izmeni apartman</a></li>
				          </ul>
				        </li>
					</li>
				</ul>
			</div>
		</div>
		<!-- /.container-fluid -->
	</nav>
	<section>
		<div class="container">
			<div class="row">
			<span class="col-lg-12 col-xs-12" id="title" ng-show="showTitleAddApartment">Dodaj Apartman <hr></span>			
				<div ng-view></div>
			</div>
		</div>
	</section>
	</body>
	@include('assets.js')
</html>