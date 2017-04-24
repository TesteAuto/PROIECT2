class comentariiController {
	constructor($scope, serviceComentariu, serviceAfiseazaComentarii, $window){
		// Posteaza Comentarii
		// Btn Anulează
		$scope.cancelComentariu = function(){
			$scope.titluCom = '';
			$scope.nrCaractere = '';
		};
		// Btn Trimite
		$scope.trimiteComentariu = function(){
					let parametri = {
						idUtilizator: JWT.id,
						titlu: $scope.titluCom,
						comentariu: $scope.nrCaractere
					};
					$scope.serv = serviceComentariu.postData(parametri).then(function(response) {
						if(response.data){
							swal("Comentariul tău a fost salvat cu succes!", "", "success");
							$scope.cancelComentariu();
							setTimeout(function () {
	                		$window.location.reload();
	                	}, 1000);
						}else{
							sweetAlert("Atenţie!", 'Comentariul nu a fost salvat cu succes!', "error");
							console.log(response.data);
							$scope.cancelComentariu();
						}
					}, function () {
						console.log("Eroare in controller!!!");
						$scope.cancel();
					});
		};
		// Afiseaza Comentarii
		$scope.servAfisare = serviceAfiseazaComentarii.getData().then(function(response) {
			$scope.afiseazaComentarii = [];
			$scope.totalComentarii = response.data.length;
			for (let i = 0; i < response.data.length; i++) {
				$scope.afiseazaComentarii.push(response.data[i]);
			}
		}, function () {
			console.log("Eroare in controller");
		});
	}
}
comentariiController.$inject = ['$scope', 'serviceComentariu', 'serviceAfiseazaComentarii', '$window'];
export default comentariiController;