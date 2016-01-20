var app = angular.module('apartmentApp', ['ngRoute', 'ngAnimate'],
	function($interpolateProvider) {
		$interpolateProvider.startSymbol('[[');
  		$interpolateProvider.endSymbol(']]');
	}
);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
                when('/', {
                    templateUrl : 'admin/apartmani',
                    controller 	: 'addApartmentController'
                }).
                when('/accessories/:param', {
                	templateUrl : 'admin/accessories',
                	controller 	: 'addApartmentController'
                }).
                otherwise({ 
                	redirectTo: '/' 
            	});
    }
]);

app.controller('addApartmentController', function($scope, $http, $location, $routeParams) {
	
	$scope.apartments = [];
	$scope.errors = [];
	$scope.accessories = [];

	$scope.showTitleAddAcc = true; //show title dodaj accessories
	$scope.showTitleAddApartment = true; // show title dodaj apartman
	$scope.showNext = true; // show button dalje
	

	$scope.saveApartment = function() {
		$scope.errors.length = 0; 
		$http({
			method: "POST",
			url: "/api/addApartment",
			data: { 
				apartment_name : $scope.apartment_name,
				city : $scope.city,
				address : $scope.address,
				price :	$scope.price,
				room : $scope.room,
				bed : $scope.bed }
		}).
		success(function(data) {
			clearFields();
			$scope.apartments.push(data);
			$location.path('/accessories/'+ data.id);
		}).
		error(function(data) {
			$scope.errors.push(data);
		});
	}

	$scope.addAccessories = function() {
		$http({
			method: "POST",
			url: "/api/addAccessories",
			data: {
				apartment_id : $routeParams.param,
				internet : $scope.internet,
				parking : $scope.parking,
				tv : $scope.tv,
				klima : $scope.klima,
				vesmasina : $scope.vesmasina,
				ljubimci : $scope.ljubimci
			}
		}).
		success(function() {
			$location.path('/');
		}).
		error(function(data) {
			$scope.errors.push(data);
		});
	}

	$scope.editApartment = function(item, index) {
		$scope.showNext = false; //hide dalje button
		$scope.showSave = true; //show sacuvaj button
		$scope.showAccessories = true;
		$scope.hideApartments = true; //hide list of apartments
		$scope.showTitleAddAcc = false; //hide title dodaj accessories
		$scope.hideTitleAddAcc = true; //show title izmeni accessories
		$scope.showTitleAddApartment = false; //hide title dodaj apartman
		$scope.hideTitleAddApartment = true; //show title dodaj apartman

		$scope.apartment_name = item.apartment_name;
		$scope.city = item.city;
		$scope.address = item.address;
		$scope.price = item.price;
		$scope.room = item.rooms;
		$scope.bed = item.beds;
		$scope.id  = item.id;
		$scope.index = index;
		showAccessories(item.id);	
	}

	$scope.saveEditApartment = function() {
		$http({
			method: "POST",
			url: "/api/editApartment",
			data : {
				apartment_id : $scope.id,
				apartment_name : $scope.apartment_name,
				city : $scope.city,
				address : $scope.address,
				price :	$scope.price,
				room : $scope.room,
				bed : $scope.bed,
				internet : $scope.internet,
				parking : $scope.parking,
				tv : $scope.tv,
				klima : $scope.klima,
				vesmasina : $scope.vesmasina,
				ljubimci : $scope.ljubimci
			}
		}).
		success(function(data) {
			$scope.showSave = false;
			$scope.showAccessories = false;
			$scope.hideApartments = false;
			$scope.showNext = true; // show button dalje
			$scope.apartments[$scope.index] = data[0];
			clearFields();
		}).
		error(function(data) {
			$scope.errors.push(data);
		});
	}

	$scope.deleteApartment = function(item, index) {
		$http({
			method: "GET",
			url: "/api/deleteApartment/"+ item.id 
		}).
		success(function(data) {
			$scope.apartments.splice(index, 1);
		});
	}

	$scope.showAllApartment = function() {
		$http({
			method: "GET",
			url: "/api/selectAllApartments"
		}). 
		success(function(data) {
			$scope.apartments = data;
		});
	}

	var showAccessories = function(id) {
		$http({
			method: "GET",
			url: "/api/selectAccessories/"+ id
		}). 
		success(function(data) {
			$scope.internet = data[0].internet;
			$scope.parking = data[0].parking;
			$scope.tv = data[0].tv;
			$scope.klima = data[0].klima;
			$scope.vesmasina = data[0].vesmasina;
			$scope.ljubimci = data[0].ljubimci;
		});
	}

	var clearFields = function() {
		$scope.apartment_name = "";
		$scope.city = "";
		$scope.address = "";
		$scope.price = "";
		$scope.room = "";
		$scope.bed = "";
	}

	$scope.showAllApartment();
});
