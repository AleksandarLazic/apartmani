@extends('layouts.master')

@section('content')
<div ng-app="apartmentApp" ng-controller="addApartmentController">
<div class="col-xs-12 col-lg-6">
	<span id="title">Dodaj Apartman <hr></span>
	<form>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="apartman_name"
			 placeholder="Ime apartmana" ng-model="apartment_name">
		</div>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="city"
			 placeholder="Grad" ng-model="city">
		</div>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="address"
			 placeholder="Adresa" ng-model="address">

		</div>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="price"
			 placeholder="Cena nocenja" ng-model="price">
		</div>
		<div class="form-group">
			<select class="form-control input-lg" name="room" ng-model="room">
				<option value="" disabled>Broj soba</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
		</div>
		<div class="form-group">
			<select class="form-control input-lg" name="bed" ng-model="bed">
				<option value="" disabled>Broj kreveta</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
		</div>
		<input class="btn btn-default" type="submit" value="Dalje" ng-click="saveApartment()">
	</form>
</div>

<div class="col-lg-6 allApartments">
	<span id="title">Svi vasi apartmani <hr></span>
	<div id="all" ng-repeat="item in apartments">
		<div class="col-lg-3 col-xs-12 box">
			<p> [[ item.apartment_name ]] </p>
			<p> Cena: [[ item.price ]] &euro; </p>
		</div>
	</div>
</div>
</div>
@endsection