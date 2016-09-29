var HTTP = (function () {

// private static                   var privateStaticVariable = ...
    var sendHttpRequest = function(method,url,dto){

    };
    var sendHttpRequestAndWait = function(method,url,dto,callback){

    };

// Contructor
    var ctor = function () {
        var self = this; // prevents overlaping this-context
//      self.constructor.super.call(this[, params ... ] );

// private                          var privateVariable = ...


// public instance only             self.method = function(...


        (function init() {

        })();
// Getters & Setters                self.getVariable = function(...

    };

// public static                    ctor.method/Variable = ...
    ctor.get = function (route, callback) {
        $.get(route,function (rawData) {
            if(rawData == null){
                console.log("data null");
            }
            var jsonData = JSON.parse(rawData);
            callback(jsonData);
        });
    };
    ctor.post = function (route, data, callback) {
        $.post(route,data,function (rawData) {
            if(rawData == null){
                console.log("data null");
            }
            var jsonData = JSON.parse(rawData);
            callback(jsonData);
        });
    };

// public shared    name : value , ...
    ctor.prototype = {


    };

//  Inheritance
//  inherit(ctor, SuperClass);
    return ctor;
})();