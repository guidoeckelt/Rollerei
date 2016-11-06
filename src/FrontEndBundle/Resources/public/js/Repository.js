/**
 * Created by Guido on 06.11.2016.
 */
var repository = angular.module('Repository',[]);

repository.factory('VideoRepo',['$http',function ($http) {
    var videos = {
        all : null,
        create : function(dto) {
            $http.post(Routes.CreateVideo, dto).then(function(response){
                console.log(response);
            },function(response){ console.log(response); });
        },
        reload : function(){
            $http.get(Routes.AllVideos).then(function (response) {
                videos.all= JSON.parse(response.data);
            },
            function(response) { console.log(response); });
        }
    };
    videos.reload();
    return videos;
}]);
repository.factory('PhotoRepo',['$http',function ($http) {
    var photos = {
        all : null,
        reload : function(){
            $http.get(Routes.allPhotos).then(function (response) {
                photos.all= JSON.parse(response.data);
            },
            function(response) { console.log(response); });
        }
    };
    photos.reload();
    return photos;
}]);

repository.factory('PlatformRepo',['$http',function ($http) {
    var platforms = {
        all : null,
        reload : function(){
            $http.get(Routes.AllPlatforms).then(function (response) {
                platforms.all = JSON.parse(response.data);
            },
            function(response) { console.log(response); });
        }
    };
    platforms.reload();
    return platforms;
}]);
repository.factory('EventRepo',['$http',function ($http) {
    var events = {
        all : null,
        reload : function(){
            $http.get(Routes.AllEvents).then(function (response) {
                events.all = JSON.parse(response.data);
            },
            function(response) { console.log(response); });
        }
    };
    events.reload();
    return events;
}]);
repository.factory('AdminRepo',['$http',function ($http) {
    var videos = {
        all : null,
        reload : function(){
            $http.get(Routes.AllAdmins).then(function (response) {
                videos.all= JSON.parse(response.data);
            },
            function(response) { console.log(response); });
        }
    };
    videos.reload();
    return videos;
}]);