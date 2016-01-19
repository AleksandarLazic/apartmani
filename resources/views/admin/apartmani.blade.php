<div>
	<span id="title">Dodaj Apartman <hr></span>
	<form>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="apartman_name"
			 placeholder="Ime apartmana" ng-model="apartment_name">
			 <p ng-repeat="error in errors">[[ error.apartment_name[0] ]]</p>
		</div>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="city"
			 placeholder="Grad" ng-model="city">
			 <p ng-repeat="error in errors">[[ error.city[0] ]]</p>
		</div>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="address"
			 placeholder="Adresa" ng-model="address">
			 <p ng-repeat="error in errors">[[ error.address[0] ]]</p>
		</div>
		<div class="form-group">
			<input class="form-control input-lg" type="text" name="price"
			 placeholder="Cena nocenja" ng-model="price">
			 <p ng-repeat="error in errors">[[ error.price[0] ]]</p>
		</div>
		<div class="form-group">
			<select class="form-control input-lg" name="room" ng-model="room">
				<option value="" disabled>Broj soba</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			<p ng-repeat="error in errors">[[ error.room[0] ]]</p>
		</div>
		<div class="form-group">
			<select class="form-control input-lg" name="bed" ng-model="bed">
				<option value="" disabled>Broj kreveta</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			<p ng-repeat="error in errors">[[ error.bed[0] ]]</p>
		</div>
		<button class="btn btn-default" ng-click="saveApartment()">
		<a>Dalje</a></button>
	</form>
</div>