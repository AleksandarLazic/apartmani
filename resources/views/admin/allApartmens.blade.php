<div class="col-lg-12 col-md-12 col-xs-12 allApartments" ng-hide="hideApartments">
	<span id="title">Svi vasi apartmani <hr></span>
	<div id="all" ng-repeat="item in apartments">
		<div ng-repeat="img in item.images" ng-style="{'background-image':'url(../images/'+img.image_name+')'}" 
			class="col-lg-2 col-md-2 col-xs-12 box">
			<p> [[ item.apartment_name ]] </p>
			<p> Cena : [[ item.price ]] &euro; </p>
			<button><a ng-click="editApartment(item, $index, '/editApartment')">Izmeni</a></button>
			<button><a ng-click="deleteApartment(item, $index)">Obrisi</a></button>
			<br>
		</div>
	</div>
</div>