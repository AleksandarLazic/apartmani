<div class="col-lg-6 allApartments">
	<span id="title">Svi vasi apartmani <hr></span>
	<div id="all" ng-repeat="item in apartments">
		<div class="col-lg-3 col-xs-12 box">
			<p> [[ item.apartment_name ]] </p>
			<p> Cena : [[ item.price ]] &euro; </p>
			<a href="#/">Izmeni</a>
			<a href="#/">Obrisi</a>
		</div>
	</div>
</div>