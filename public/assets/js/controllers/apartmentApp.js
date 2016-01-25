var app = angular.module('apartmentApp', ['ngRoute', 'ngAnimate', 'ngFileUpload'],
	function($interpolateProvider) {
		$interpolateProvider.startSymbol('[[');
  		$interpolateProvider.endSymbol(']]');
	}
);
app.factory('apartmaniFactory', function() {
	var saveData = {};
	function set(data) {
		saveData = data;
	}
	function get() {
		return saveData;
	}

	return {
		set: set,
		get: get
	}
});

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
                when('/editApartment/', {
                	templateUrl : 'admin/editApartment',
                    controller 	: 'editApartmentController'
                }).
                otherwise({ 
                	redirectTo: '/' 
            	});
    }
]);

app.controller('addApartmentController',
	['$scope', '$http', '$location', '$routeParams', 'Upload', 'apartmaniFactory', 
	function($scope, $http, $location, $routeParams, Upload, apartmaniFactory) {
	
	$scope.apartments = [];
	$scope.errors = [];
	$scope.accessories = [];

	$scope.showNext = true; // show button "dalje"
	$scope.edit = true;
	

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

	$scope.editApartment = function(item, index, path) {
		apartmaniFactory.set(item);
		$location.path(path);	
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

app.controller('editApartmentController',
	['$scope', '$http', '$routeParams', 'apartmaniFactory', 'Upload', '$location',
    function($scope, $http, $routeParams, apartmaniFactory, Upload, $location) {
   		$scope.data = apartmaniFactory.get();
   		$scope.files = [];

   		$scope.init = function() {
   			$scope.apartment_name = $scope.data['apartment_name']; 
   			$scope.city = $scope.data['city']; 
   			$scope.address = $scope.data['address']; 
   			$scope.price = $scope.data['price']; 
   			$scope.room = $scope.data['rooms']; 
   			$scope.bed = $scope.data['beds'];
   			showAccessories($scope.data['id']);
   			showImages($scope.data['id']); 
   		}

   		$scope.saveEditApartment = function() {
			Upload.upload({
				method: "POST",
				url: "/api/editApartment",
				data : {
					apartment_id : $scope.data['id'],
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
					files : $scope.images,
				}
			}).
			success(function(data) {
				$location.path('/');
			}).
			error(function(data) {
				$scope.errors.push(data);
			});
		}

		$scope.remove = function(file, index) {
			$http({
				method: "GET",
				url: "/api/deleteImages/"+ file.id 
			}).
			success(function() {
				$scope.files.splice(index, 1);
			});
		}
		
		$scope.removeNew = function(index) {
			$scope.images.splice(index, 1);
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

		var showImages = function(id) {
			$http({
				method: "GET",
				url: "/api/showImages/"+ id
			}).
			success(function(data) {
				$scope.files = data;
			});
		}

}]);
