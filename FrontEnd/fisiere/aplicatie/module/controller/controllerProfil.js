class controllerProfil {
	constructor($scope, profilService, $window){
		$scope.defaultImg = true;
		// Imagine
		$scope.imageStrings = [];
		$scope.processFiles = function(files){
			angular.forEach(files, function(flowFile, i){
				var fileReader = new FileReader();
				fileReader.onload = function (event) {
					let uri = event.target.result;
						$scope.imageStrings[i] = uri;    
						$scope.imgSalvata = $scope.imageStrings[i]; 
						$scope.defaultImg = false;
				};
				fileReader.readAsDataURL(flowFile.file);
			});
		};
		if(JWT){
				//Campuri de modificat
				$scope.utilizator = {
					nume: JWT.utilizator,
					parola: '',
					email: JWT.email,
					poza: JWT.poza
				};
		}
		$scope.salveaza=function(){
			let params = {
				utilizator: $scope.utilizator.nume,
				email: $scope.utilizator.email,
				poza: $scope.imgSalvata
			};
			if($scope.utilizator.parola){
				params.parola = $scope.utilizator.parola;
			}
			profilService.resursa.id = JWT.id;
			$scope.serv = profilService.putData(params).then(function(response) {
				if(response){
					swal("Datele au fost salvate cu succes!", "", "success");
					$scope.dezautentificare();
					swal("Vă rugăm să vă autentificaţi cu noile credenţiale!", "", "success");
					setTimeout(function () {
						$window.location.reload();
					}, 4000);
				}
			}, function () {
				console.log("Eroare in controller");
				sweetAlert("Atenţie!", "Datele nu au fost salvate cu succes!", "error");
			});
		};
	}
}
controllerProfil.$inject = ['$scope', 'profilService', '$window'];
export default controllerProfil;