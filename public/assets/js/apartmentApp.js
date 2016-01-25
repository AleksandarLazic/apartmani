var app = angular.module('apartmentApp', ['ngRoute', 'ngAnimate', 'ngFileUpload'],
	function($interpolateProvider) {
		$interpolateProvider.startSymbol('[[');
  		$interpolateProvider.endSymbol(']]');
	}
);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
                when('/', {
                	templateUrl : 'admin/allApartmens',
                	controller 	: 'addApartmentController'
                }).
                when('/apartments', {
                    templateUrl : 'admin/apartmani',
                    controller 	: 'addApartmentController'
                }).
                when('/editApartment/:param', {
                	templateUrl : 'admin/apartmani',
                    controller 	: 'addApartmentController'
                }).
                otherwise({ 
                	redirectTo: '/' 
            	});
    }
]);

app.controller('addApartmentController',
	['$scope', '$http', '$location', '$routeParams', 'Upload', 
	function($scope, $http, $location, $routeParams, Upload) {
	
	$scope.apartments = [];
	$scope.errors = [];
	$scope.accessories = [];

	$scope.saveApartment = function() {
		$scope.errors.length = 0;
		Upload.upload({
			method: "POST",
			url: "/api/addApartment",
			data: { 
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
				ljubimci : $scope.ljubimci,
				files : $scope.files, 
			}
		}).
		success(function(data) {
			clearFields();
			$scope.files = "";
			$scope.apartments.push(data);
			$location.path('/');
		}).
		error(function(data) {
			$scope.errors.push(data);
		});
	}

	$scope.remove = function(index) {
		$scope.files.splice(index, 1);
	}

	$scope.editApartment = function(item, index) {
		$routeParams.param = item.id;
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
		$scope.internet = "";
		$scope.parking = "";
		$scope.tv = "";
		$scope.klima = "";
		$scope.vesmasina = "";
		$scope.ljubimci = ""; 
	}

	$scope.showAllApartment();
}]);
