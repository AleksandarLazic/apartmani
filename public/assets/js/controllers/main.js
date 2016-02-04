var app = angular.module('mainApp', ['ngRoute', 'ngAnimate', 'ngFileUpload'],
	function($interpolateProvider) {
		$interpolateProvider.startSymbol('[[');
  		$interpolateProvider.endSymbol(']]');
	}
);

app.controller('mainController',
	['$scope', '$http', 
	function($scope, $http) {
		$scope.apartments = [];

	$scope.getAllApartments = function() {
		$http({
			method: "GET",
			url: "/api/getAllApartments"
		}). 
		success(function(data) {
			$scope.apartments = data;
			console.log($scope.apartments);
		});
	}

	$scope.getAllApartments();
}]);