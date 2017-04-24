class videoController {
	constructor($scope, serviceVideo){
		$scope.serv = serviceVideo.getData().then(function(response) {
			$scope.urls = [];
			for (let i = 0; i < response.data.length; i++) {
				$scope.urls.push(response.data[i].url);
			}
			console.log($scope.urls);
		}, function () {
			console.log("Eroare in controller");
		});
	}
}
videoController.$inject = ['$scope', 'serviceVideo'];
export default videoController;