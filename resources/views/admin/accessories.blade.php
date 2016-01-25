<div class="col-xs-12 col-lg-4">
	<div class="form-group">
		<select class="form-control input-lg" name="internet" ng-model="internet">
			<option value="" disabled>Internet</option>
			<option value="1">Da</option>
			<option value="0">Ne</option>
		</select>
		<p ng-repeat="error in errors">[[ error.internet[0] ]]</p>
	</div>
	<div class="form-group">
		<select class="form-control input-lg" name="parking" ng-model="parking">
			<option value="" disabled>Parking</option>
			<option value="1">Da</option>
			<option value="0">Ne</option>
		</select>
		<p ng-repeat="error in errors">[[ error.parking[0] ]]</p>
	</div>
	<div class="form-group">
		<select class="form-control input-lg" name="tv" ng-model="tv">
			<option value="" disabled>Tv</option>
			<option value="1">Da</option>
			<option value="0">Ne</option>
		</select>
		<p ng-repeat="error in errors">[[ error.tv[0] ]]</p>
	</div>
	<div class="form-group">
		<select class="form-control input-lg" name="klima" ng-model="klima">
			<option value="" disabled>Klima</option>
			<option value="1">Da</option>
			<option value="0">Ne</option>
		</select>
		<p ng-repeat="error in errors">[[ error.klima[0] ]]</p>
	</div>
	<div class="form-group">
		<select class="form-control input-lg" name="vesmasina" ng-model="vesmasina">
			<option value="" disabled>Vesmasina</option>
			<option value="1">Da</option>
			<option value="0">Ne</option>
		</select>
		<p ng-repeat="error in errors">[[ error.vesmasina[0] ]]</p>
	</div>
	<div class="form-group">
		<select class="form-control input-lg" name="ljubimci" ng-model="ljubimci">
			<option value="" disabled>Ljubimci</option>
			<option value="1">Da</option>
			<option value="0">Ne</option>
		</select>
		<p ng-repeat="error in errors">[[ error.ljubimci[0] ]]</p>
	</div>
</div>