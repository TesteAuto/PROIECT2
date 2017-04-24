class controllerPrincipal {
	constructor($scope, $window, $location){
		let jwt = JSON.parse(window.localStorage.getItem('JWT'));
		window.JWT = jwt;
		if (jwt) {
			$scope.autentificareJWT = true;
		}else{
			$scope.autentificareJWT = false;			
		}
		$scope.dezautentificare=function(){
			window.localStorage.removeItem('JWT');
			$scope.autentificareJWT = false;
		};
	}
}
controllerPrincipal.$inject = ['$scope', '$window', '$location'];
export default controllerPrincipal;
