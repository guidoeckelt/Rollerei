var HTTP = {
    get : function (route, callback) {
        $.ajax({
            type: "GET",
            url: route,
            data: null,
            success : function (rawData) {
                if(rawData == null){
                    console.log("data null");
                }
                var jsonData = JSON.parse(rawData);
                callback(jsonData);
            },
            processData: false,  // tell jQuery not to process the data
            contentType: false   // tell jQuery not to set contentType
        });
    },
    post : function (route, data, callback) {
        $.ajax({
            type: "POST",
            url: route,
            data: data,
            dataType: 'json',
            success : function (rawData) {
                if(rawData == null){
                    console.log("data null");
                }
                var jsonData = JSON.parse(rawData);
                callback(jsonData);
            },
            processData: false,  // tell jQuery not to process the data
            contentType: false   // tell jQuery not to set contentType
        });
    },
    Request : (function() {

// Contructor
        var ctor = function (methodStr, routeStr, dataObject) {
            var self = this; // prevents overlaping this-context
//      self.constructor.super.call(this[, params ... ] );

// private attributes               var privateVariable = ...
            var request = new XMLHttpRequest();
            var method = methodStr;
            var route = routeStr;
            var data = dataObject;

            //callbacks
            var progressCallbacks = new Array();
            var errorCallbacks = new Array();

// private methods

            var call = function(event, params){
                var callbacks;
                switch(event){
                    case 'error': callbacks = errorCallbacks; break;
                    case 'progress': callbacks = progressCallbacks; break;
                    default: console.log('Event not found -> '+event);
                }
                for(var callback of callbacks){
                    callback(params);
                }
            };
            var successfulDefault = function () {
                console.log('Request scuccessful -> '+route);
            };
            var errorDefault = function () {
                console.log('Request failed -> '+route);
            };
// public attritubes

// public instance only             self.method = function(...
            self.send = function () {
                request.open(method, route, false);
                request.send(data);
            };

            self.sendAndWait =function (successCallback) {
                request.open(method, route, true);
                request.onreadystatechange = function () {
                    if (request.readyState != 4 || request.status != 200){
                        console.log('Request not ready -> ' + route);
                        var error = {};
                        call('error', error);
                    }
                    //ProgressCallback ...

                    if (request.readyState == 4 || request.status == 200){
                        var response = request.responseText;
                        //Formatting ...
                        var responseJson = JSON.parse(response);
                        successCallback(responseJson);
                    }
                };
                request.send();
            };

// Getters & Setters                self.getVariable = function(...
            self.getRoute = function(){ return route; };
            self.getData = function () { return data; };
            self.getErrorCallbacks = function () { return Array.of(errorCallbacks); };
            self.getProgressCallbacks = function () { return Array.of(progressCallbacks); };

            self.setRoute = function(value){ route = value};
            self.setData = function(value){ data = value};


            (function init() {

            })();
        };


// public static                    ctor.method/Variable = ...


// public shared    name : value , ...
        ctor.prototype = {
            addCallback : function(event, callback){
                //.. check for callback
                switch(event){
                    case 'error': this.getErrorCallbacks().push(callback); break;
                    case 'progress': this.getProgressCallbacks().push(callback); break;
                    default: console.log('Event not found -> '+event);
                }
            },
            addParam : function (key, value) {
                if(method == "GET"){
                    if(this.getRoute().includes("?")){
                       this.setRoute(this.getRoute()+"&"+key+"="+value);
                    }else{
                        this.setRoute(this.getRoute()+"?"+key+"="+value);
                    }
                }else if(method == "POST"){
                    //key is string
                    if(!key.includes(".")){
                        data[key] = value;
                    }else{
                        var keySplitted = key.split('.');
                    }
                }
            },
            addHeader : function (key, value) {

            }
        };

//  Inheritance
//  inherit(ctor, SuperClass);
        return ctor;
    })()
};