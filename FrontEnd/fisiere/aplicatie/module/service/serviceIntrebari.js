export default class serviceIntrebari {
    constructor(Restangular) {
    	this.resursa = Restangular.withConfig(function (RestangularConfigurer) {
    		RestangularConfigurer.setFullResponse(true);
    	}).all('/intrebari');
    }
	
	getData () {
		return this.resursa.getList().then(function (response) {
             return response;
         });
	}
}

serviceIntrebari.$inject = ['Restangular'];
