var myApp=angular
	.module("mojModul", [])
	.controller("kontroler", function ($scope, $http){
		/*$http({
			method:"GET",
			url:"servis6.php"
		})*/
		$http.get("servis6.php?id=5")
		.then(function(response){
			$scope.korisnici=response.data;
			$scope.response=response;
		})
		
	});