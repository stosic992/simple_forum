var myApp=angular
	.module("mojModul", [])
	.controller("kontroler", function ($scope){
		var objZaposleni=[
		{ime:"Boško", prezime:"Bogojević", "pol":"Muški", datrodj:new Date("January 20,1976"),plata:55000.564},
		{ime:"Pera", prezime:"Perić", "pol":"Muški", datrodj:new Date("May 20,1978"),plata:54000.564},
		{ime:"Ivana", prezime:"Ivanović", "pol":"Ženski", datrodj:new Date("June 20,1998"),plata:35000},
		{ime:"Sanja", prezime:"Jović", "pol":"Ženski", datrodj:new Date("August 20,1986"),plata:50000},
		{ime:"Joca", prezime:"Karburator", "pol":"Muški", datrodj:new Date("February 20,1986"),plata:52000},
		{ime:"Cane", prezime:"Kurbla", "pol":"Muški", datrodj:new Date("February 20,1986"),plata:52000}
		];
		$scope.zaposleni=objZaposleni;
		$scope.brojRedova=3;
		$scope.ukupno=$scope.zaposleni.length;
	});