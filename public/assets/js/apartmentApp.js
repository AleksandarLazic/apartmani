var app = angular.module('apartmentApp', []);

app.config(function($interpolateProvider) {
	$interpolateProvider.startSymbol('[[');
  	$interpolateProvider.endSymbol(']]');
});


app.controller('addApartmentController', function($scope, $http) {
	
	$scope.apartments = [];

	$scope.saveApartment = function() { 
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
			$scope.apartment_name = "";
			$scope.city = "";
			$scope.address = "";
			$scope.price = "";
			$scope.room = "";
			$scope.bed = "";
			$scope.apartments.push(data);
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

	$scope.showAllApartment();
});
