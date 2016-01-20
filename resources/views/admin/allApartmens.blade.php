<div class="col-lg-6 allApartments" ng-hide="hideApartments">
	<span id="title">Svi vasi apartmani <hr></span>
	<div id="all" ng-repeat="item in apartments">
		<div class="col-lg-3 col-xs-12 box">
			<p> [[ item.apartment_name ]] </p>
			<p> Cena : [[ item.price ]] &euro; </p>
			<button><a ng-click="editApartment(item, $index)">Izmeni</a></button>
			<button><a ng-click="deleteApartment(item, $index)">Obrisi</a></button>
		</div>
	</div>
</div>