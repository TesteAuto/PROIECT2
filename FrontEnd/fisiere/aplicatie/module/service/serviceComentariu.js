export default class serviceComentariu {
    constructor(Restangular) {
    	this.resursa = Restangular.withConfig(function (RestangularConfigurer) {
    		RestangularConfigurer.setFullResponse(true);
    	}).all('/comentariu');
    }
	
	postData (params) {
		return this.resursa.post(params).then(function (response) {
             return response;
         });
	}
}

serviceComentariu.$inject = ['Restangular'];