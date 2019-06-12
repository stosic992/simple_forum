var myApp=angular
	.module("mojModul", [])
	.controller("kontroler", function ($scope, $http){
		
		$scope.prikaziSve=function(){
			$http.get("../klase/servis.php")
			.then(function(response){
				$scope.korisnici=response.data;
				
			});
			
		};
		
		$scope.snimiPodatke=function(){
			
			$http.post("../klase/servis.php",{ime:$scope.ime, prezime:$scope.prezime,email:$scope.email,status:$scope.status,lozinka:$scope.lozinka})
			.then(function(response){
				$scope.poruka=response.data;
				$scope.prikaziSve();
			});
		};
		
		$scope.obrisiKorisnika=function(id){
			$http.get("../klase/servis.php?id="+id)
			.then(function(response){
				$scope.poruka=response.data;
				$scope.prikaziSve();
			});
		};
		$scope.pripremiKorisnika=function(x){
			$scope.id=x.id;
			$scope.ime=x.ime;
			$scope.prezime=x.prezime;
			$scope.email=x.email;
			$scope.status=x.status;
			$scope.lozinka=x.lozinka;
		};
		$scope.snimiIzmene=function(){
			$http.post("../klase/servis.php?id="+$scope.id,{id:$scope.id, ime:$scope.ime, prezime:$scope.prezime,email:$scope.email,status:$scope.status,lozinka:$scope.lozinka})
			.then(function(response){
				$scope.poruka=response.data;
				$scope.prikaziSve();
			});
		};
		$scope.prikaziSve();
	});