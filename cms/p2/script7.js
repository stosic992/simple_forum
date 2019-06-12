var myApp=angular
	.module("mojModul", [])
	.controller("kontroler", function ($scope, $http){
		
		$scope.posaljiPodatke=function(){
			$http.post("servis7.php",{ime:$scope.ime, prezime:$scope.prezime})
			.then(function(response){
				$scope.poruka=response.data;
			});
		};
		
	});