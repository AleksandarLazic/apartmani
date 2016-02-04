<div ng-controller="editApartmentController" ng-init="init()">
<span class="col-lg-12 col-xs-12 title" class="">Dodaj Apartman <hr></span>
<div class="col-xs-12 col-lg-4">
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="apartman_name"
			 placeholder="Ime apartmana" ng-model="apartment_name">
			 <p ng-hide="apartment_name != null " 
			 	ng-repeat="error in errors">[[ error.apartment_name[0] ]]</p>
		</div>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="city"
			 placeholder="Grad" ng-model="city">
			 <p ng-hide="city != null " 
			 	ng-repeat="error in errors">[[ error.city[0] ]]</p>
		</div>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="address"
			 placeholder="Adresa" ng-model="address">
			 <p ng-hide="address != null " ng-repeat="error in errors">[[ error.address[0] ]]</p>
		</div>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="price"
			 placeholder="Cena nocenja" ng-model="price">
			 <p ng-hide="price != null 
			 	" ng-repeat="error in errors">[[ error.price[0] ]]</p>
		</div>
		<div class="form-group">
			<select class="form-control input-lg select" name="room" ng-model="room">
				<option value="" disabled>Broj soba</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			<p ng-hide="room != null " 
				ng-repeat="error in errors">[[ error.room[0] ]]</p>
		</div>
		<div class="form-group">
			<select class="form-control input-lg select" name="bed" ng-model="bed">
				<option value="" disabled>Broj kreveta</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			<p ng-hide="bed != null " 
				ng-repeat="error in errors">[[ error.bed[0] ]]</p>
		</div>
		<button class="btn btn-default" ng-click="saveEditApartment()">
		<a>Sacuvaj</a></button>
</div>
@include('admin.accessories')
<div class="col-xs-12 col-lg-4">
	<div class="button" ngf-select ng-model="images" ngf-multiple="true">Select</div>
	<div ng-repeat="file in files">
		<img class="col-xs-12 col-lg-4" ng-src="../images/[[ file.image_name ]]" class="thumb">
		<button ng-click="remove(file, $index)">Remove</button>
	</div>
	<div ng-repeat="image in images">
		<img class="col-xs-12 col-lg-4" ngf-src="image" class="thumb">
		<button ng-click="removeNew($index)">Remove</button>
	</div>
</div>
</div>