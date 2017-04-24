export default class serviceAfiseazaComentarii {
    constructor(Restangular) {
    	this.resursa = Restangular.withConfig(function (RestangularConfigurer) {
    		RestangularConfigurer.setFullResponse(true);
    	}).all('/afiseazacomentarii');
    }
	
	getData () {
		return this.resursa.getList().then(function (response) {
             return response;
         });
	}
}

serviceAfiseazaComentarii.$inject = ['Restangular'];
