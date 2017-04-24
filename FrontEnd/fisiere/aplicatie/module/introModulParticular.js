import uiRouter from 'angular-ui-router';
import restangular from 'restangular';
import angularAnimate from 'angular-animate';
import angularSanitize from 'angular-sanitize';

// UI-VIEW CONTROLLER
import controllerPrincipal from './controller/controllerPrincipal.js';
import acasaController from './controller/acasaController.js';
import legislatieController from './controller/legislatieController.js';
import indicatoareController from './controller/indicatoareController.js';
import informatiiController from './controller/informatiiController.js';
import intrebariController from './controller/intrebariController.js';
import comentariiController from './controller/comentariiController.js';
import videoController from './controller/videoController.js';
import chestionareController from './controller/chestionareController.js';

import creareContModalController from './controller/creareContModalController.js';
import autentificareContModalController from './controller/autentificareContModalController.js';
import controllerEmail from './controller/controllerEmail.js';
import controllerProfil from './controller/controllerProfil.js';

// SERVICE
import serviceCreareContNou from './service/serviceCreareContNou.js';
import serviceAutentificare from './service/serviceAutentificare.js';
import serviceMail from './service/serviceMail.js';
import profilService from './service/profilService.js';
import serviceVideo from './service/serviceVideo.js';
import serviceIntrebari from './service/serviceIntrebari.js';
import serviceComentariu from './service/serviceComentariu.js';
import serviceAfiseazaComentarii from './service/serviceAfiseazaComentarii.js';

export default angular.module('modulParticular', ['ui.router','ngMessages','restangular','xeditable', 'flow', 'ui.bootstrap', 'ngAnimate', 'ngSanitize'])
.controller('controllerPrincipal', controllerPrincipal)
.controller('acasaController', acasaController)
.controller('legislatieController', legislatieController)
.controller('indicatoareController', indicatoareController)
.controller('informatiiController', informatiiController)
.controller('intrebariController', intrebariController)
.controller('videoController', videoController)
.controller('chestionareController', chestionareController)

.controller('creareContModalController', creareContModalController)
.controller('autentificareContModalController', autentificareContModalController)
.controller('controllerEmail', controllerEmail)
.controller('controllerProfil', controllerProfil)
.controller('comentariiController', comentariiController)

.service('serviceCreareContNou', serviceCreareContNou)
.service('serviceAutentificare', serviceAutentificare)
.service('serviceMail', serviceMail)
.service('profilService', profilService)
.service('serviceVideo', serviceVideo)
.service('serviceIntrebari', serviceIntrebari)
.service('serviceComentariu', serviceComentariu)
.service('serviceAfiseazaComentarii', serviceAfiseazaComentarii)

.config(['$qProvider','$urlRouterProvider','$stateProvider', 'RestangularProvider', function($qProvider, $urlRouterProvider,$stateProvider, RestangularProvider) {
	RestangularProvider.setBaseUrl('http://localhost/PROIECT2/BackEnd');
	$qProvider.errorOnUnhandledRejections(false);
	$urlRouterProvider.otherwise('/acasa');
	$stateProvider
	.state('acasa', {
		url: '/acasa',
		templateUrl: '../fisiere/aplicatie/module/pagini/acasa.htm',
		controller:'acasaController'
	})
	.state('legislatie', {
		url: '/legislatie',
		templateUrl: '../fisiere/aplicatie/module/pagini/legislatie.htm',
		controller:'legislatieController'
	})
	.state('indicatoare', {
		url: '/indicatoare',
		templateUrl: '../fisiere/aplicatie/module/pagini/indicatoare.htm',
		controller:'indicatoareController'
	})
	.state('informatii', {
		url: '/informatii',
		templateUrl: '../fisiere/aplicatie/module/pagini/informatii.htm',
		controller:'informatiiController'
	})
	.state('intrebari', {
		url: '/intrebari',
		templateUrl: '../fisiere/aplicatie/module/pagini/intrebari.htm',
		controller:'intrebariController'
	})
	.state('video', {
		url: '/video',
		templateUrl: '../fisiere/aplicatie/module/pagini/video.htm',
		controller:'videoController'
	})
	.state('chestionare', {
		url: '/chestionare',
		templateUrl: '../fisiere/aplicatie/module/pagini/chestionare.htm',
		controller:'chestionareController'
	});
}])
.run(function(editableOptions) {
  editableOptions.theme = 'bs3'; 
});
