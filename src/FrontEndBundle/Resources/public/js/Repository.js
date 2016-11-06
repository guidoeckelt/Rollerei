/**
 * Created by Guido on 06.11.2016.
 */
var repository = angular.module('Repository',[]);

repository.factory('VideoRepo',['$http',function ($http) {
    var routeList = {
        "read" : Routes.AllVideos,
        "create" : Routes.CreateVideo
    };
    var videoRepo = new Repository(routeList, $http);

    return videoRepo;
}]);
repository.factory('PhotoRepo',['$http',function ($http) {
    var routeList = {
        "read" : Routes.AllPhotos,
        "create" : Routes.CreatePhoto
    };
    var photoRepo = new Repository(routeList, $http);

    return photoRepo;
}]);

repository.factory('PlatformRepo',['$http',function ($http) {
    var routeList = {
        "read" : Routes.AllPlatforms,
        "create" : Routes.CreatePlatform
    };
    var platformRepo = new Repository(routeList, $http);

    return platformRepo;
}]);
repository.factory('EventRepo',['$http',function ($http) {
    var routeList = {
        "read" : Routes.AllEvents,
        "create" : Routes.CreateEvent
    };
    var eventRepo = new Repository(routeList, $http);

    return eventRepo;
}]);
repository.factory('AdminRepo',['$http',function ($http) {
    var routeList = {
        "read" : Routes.AllAdmins,
        "create" : Routes.CreateAdmin
    };
    var adminRepo = new Repository(routeList, $http);

    return adminRepo;
}]);
function Repository(routeList, $http) {
    var self = this;

    var routes = routeList;
    self.all = null;

    self.create = function (dto) {
        $http.post(routes.create, dto).then(function(response){
                console.log(response);
            },
            function(response){
                var data = JSON.parse(response.data);
                console.log(data);
            });
    };
    var load = function () {
        $http.get(routes.read).then(function(response) {
                self.all= JSON.parse(response.data);
            },
            function(response){
                var data = JSON.parse(response.data);
                console.log(data);
            });
    };
    self.reload = function(){
        load();
    };

    load();
}
// Repository.$inject = ['$http'];