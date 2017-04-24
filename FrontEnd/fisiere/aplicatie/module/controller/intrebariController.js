class intrebariController {
	constructor($scope, $window, serviceIntrebari){
		// Intrebari
		$scope.serv = serviceIntrebari.getData().then(function(response) {
			$scope.intrebareRaspuns = [];
			for (let i = 0; i < response.data.length; i++) {
				$scope.intrebareRaspuns.push(response.data[i]);
			}
		}, function () {
			console.log("Eroare in controller");
		});
		$scope.deschideTot = function(){
			$scope.intrebareRaspuns.map(function(i){
				i.deschideInchide = true;
			});
		};

		$scope.inchideTot = function(){
			$scope.intrebareRaspuns.map(function(i){
				i.deschideInchide = false;
				window.scrollTo(0, 0);
			});
		};
	}
}
intrebariController.$inject = ['$scope','$window','serviceIntrebari'];
export default intrebariController;