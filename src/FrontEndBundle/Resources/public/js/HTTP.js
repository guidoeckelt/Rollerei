var HTTP = {
    get : function (route, callback) {
        $.get(route,function (rawData) {
            if(rawData == null){
                console.log("data null");
            }
            var jsonData = JSON.parse(rawData);
            callback(jsonData);
        });
    },
    post : function (route, data, callback) {
        $.post(route,data,function (rawData) {
            if(rawData == null){
                console.log("data null");
            }
            var jsonData = JSON.parse(rawData);
            callback(jsonData);
        });
    },
    Request : (function() {

// Contructor
        var ctor = function (routeStr) {
            var self = this; // prevents overlaping this-context
//      self.constructor.super.call(this[, params ... ] );

// private attributes               var privateVariable = ...
            var route = routeStr;
            var data = {};

            //callbacks
            var success = successfulDefault;
            var error = errorDefault;

// private methods

            var successfulDefault = function () {
                console.log('Request scuccessful -> '+route);
            };
            var errorDefault = function () {
                console.log('Request failed -> '+route);
            };

// public instance only             self.method = function(...
            self.getRoute = function(){ return route; };


            (function init() {

            })();
// Getters & Setters                self.getVariable = function(...
        };


// public static                    ctor.method/Variable = ...


// public shared    name : value , ...
        ctor.prototype = {


        };

//  Inheritance
//  inherit(ctor, SuperClass);
        return ctor;
    })()
};