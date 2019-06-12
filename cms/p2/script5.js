var myApp=angular
	.module("mojModul", [])
	.controller("kontroler", function ($scope){
		var objZaposleni=[
		{ime:"Boško", prezime:"Bogojević", "pol":"Muški",plata:55000, grad:"Beograd"},
		{ime:"Pera", prezime:"Perić", "pol":"Muški",plata:54000, grad:"Novi Sad"},
		{ime:"Ivana", prezime:"Ivanović", "pol":"Ženski",plata:35000, grad:"Podgorica"},
		{ime:"Sanja", prezime:"Jović", "pol":"Ženski", plata:50000, grad:"Ćićevac"},
		{ime:"Joca", prezime:"Karburator", "pol":"Muški", plata:52000, grad:"Nikšić"},
		{ime:"Cane", prezime:"Kurbla", "pol":"Muški",plata:52000, grad:"Kolašin"}
		];
		$scope.zaposleni=objZaposleni;
		$scope.sakriPlatu=true;
		$scope.prikaziGrad=true;
	});