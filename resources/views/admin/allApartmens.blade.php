<section class="all-apartmens">
<div class="col-lg-12 col-md-12 col-xs-12" ng-hide="hideApartments">
	<span class="title">Svi vasi apartmani <hr></span>
	<div id="all" ng-repeat="item in apartments">
		<div class="col-lg-2 col-md-2 col-xs-12 box">
			<img class="img-responsive" ng-repeat="img in item.images|limitTo:1" ng-src="../images/[[ img.image_name ]]"/>
			<div class="inner">
				<h5 id="title"> [[ item.apartment_name ]] </h5>
				<p id="price"> Cena : [[ item.price ]] &euro; </p>
				<button><a ng-click="editApartment(item, $index, '/editApartment')">Izmeni</a></button>
				<button><a ng-click="deleteApartment(item, $index)">Obrisi</a></button>
			</div>
		</div>
	</div>
</div>
</section>