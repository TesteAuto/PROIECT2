class autentificareContModalController {
	constructor($scope, serviceAutentificare, $window, $location){
		// Btn Anulează
		$scope.cancel = function(){
			$scope.utilizator = '';
			$scope.parola = '';
		};
		// Btn Autentificare cont
		$scope.autentificare = function(){
			   let parametri = {
			   	utilizator: $scope.utilizator,
			   	parola: $scope.parola
			   };
			   $scope.serv = serviceAutentificare.postData(parametri).then(function(response) {
			    	if(response.data[0]!=='Introduceţi credenţiale valide'){
			    		swal("Autentificare reuşită!", "", "success");
			    		let jwtDecode = jwt_decode(response.data[0]);
			    		$window.localStorage.setItem('JWT', JSON.stringify(jwtDecode.credentials));
	                	$scope.cancel();
	                	setTimeout(function () {
	                		$window.location.reload();
	                	}, 1000);
			   		}else{
			   			console.log(response.data[0]);
				    	sweetAlert("Atenţie!", response.data[0], "error");
				   	    $scope.cancel();
			   	  }
			   }, function () {
			   	console.log("Eroare in controller!!!");
			   	$scope.cancel();
			   });
		};
	}
}
autentificareContModalController.$inject = ['$scope', 'serviceAutentificare', '$window', '$location'];
export default autentificareContModalController;