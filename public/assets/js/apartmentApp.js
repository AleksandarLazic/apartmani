var app = angular.module('apartmentApp', ['ngRoute', 'ngAnimate'],
	function($interpolateProvider) {
		$interpolateProvider.startSymbol('[[');
  		$interpolateProvider.endSymbol(']]');
	}
);

app.controller('addApartmentController', function($scope, $http, $location, $routeParams) {
	
	$scope.apartments = [];
	$scope.errors = [];

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
			$scope.apartment_name = "";
			$scope.city = "";
			$scope.address = "";
			$scope.price = "";
			$scope.room = "";
			$scope.bed = "";
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
