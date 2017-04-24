class acasaController {
	constructor($scope){
	/*CAROUSEL*/
	$scope.myInterval = 8000;
	$scope.noWrapSlides = false;
	$scope.active = 0;
	let slides = $scope.slides = [];
	var currIndex = 0;

	let img = ['./imagini/slide1.jpg','./imagini/slide2.jpg','./imagini/slide3.jpg'];
	$scope.addSlide = function() {
		slides.push({
				image: img[currIndex],
				id: currIndex++
			});
	};
	for (let i = 0; i < 3; i++) {
		$scope.addSlide();
	}
	/*FINAL CAROUSEL*/
	}
}
acasaController.$inject = ['$scope'];
export default acasaController;
