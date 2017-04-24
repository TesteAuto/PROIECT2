export default class serviceVideo {
    constructor(Restangular) {
    	this.resursa = Restangular.withConfig(function (RestangularConfigurer) {
    		RestangularConfigurer.setFullResponse(true);
    	}).all('/video');
    }
	
	getData () {
		return this.resursa.getList().then(function (response) {
             return response;
         });
	}
}

serviceVideo.$inject = ['Restangular'];
