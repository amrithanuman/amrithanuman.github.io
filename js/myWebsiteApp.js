//Module
var myWebsiteApp = angular.module('myWebsiteApp',['ngRoute','ngResource']);

//Routes
myWebsiteApp.config(['$routeProvider', function($routeProvider){
	$routeProvider
	.when("/", {
		templateUrl: 'pages/home.html',
	})
    .when("/about", {
		templateUrl: 'pages/about.html',
        
	})
    .when("/portfolio", {
		templateUrl: 'pages/portfolio.html',
	})
    .when("/resume", {
		templateUrl: 'pages/resume.html',
	})
}]);

//Controllers
myWebsiteApp.controller('mainController', ['$scope', function($scope){

}]);


////Controllers
//myWebsiteApp.controller('mainController', ['$scope', '$rootScope','$routeParams','$route','$location', function($scope, $rootScope, $routeParams, $route, $location){
//
//}]);