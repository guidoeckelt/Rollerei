/**
 * Created by Guido on 25.07.2016.
 */
var RollereiStartseite = (function(){
    var ctor = function(){

        var self = this;
        self.allVideos = [new Video("wGkvyN6s9cY","Perplexing Paperclips - Numberphile",new Date("2016","03","26")),
            new Video("FIFD25hk6bc", "Crazyman Commits CrayonCrime", new Date("2016","02","28")),
            new Video("qhIJPS8WNO0","rollerei issue # 19",new Date("2013","10","29"))];
        self.displayedVideo = self.allVideos[0];
        self.nextVideo = self.displayedVideo;
        self.previousVideo = self.allVideos[1];

        self.loadNextVideo = function(){
            console.log("nextVideo "+self.nextVideo.datum);
            //UpdateVM
            self.update(RollereiStartseite.Video.NEXT);
            //LoadVideo
            self.loadVideo();
            //UpdateDOM
            self.updateView(self.displayedVideo.datum, self.displayedVideo.titel);
        };
        self.loadPreviousVideo = function(){
            console.log("previousVideo");
            //UpdateVM
            self.update(RollereiStartseite.Video.PREVIOUS);
            //LoadVideo
            self.loadVideo();
            //UpdateDOM
            self.updateView(self.displayedVideo.datum, self.displayedVideo.titel);
        };
        self.loadVideo = function(){
            console.log("loading Video");
            YTplayer.cueVideoById(self.displayedVideo.id,0,YTplayer.getPlaybackQuality());
        };
        self.update = function(direction){
            if(direction == RollereiStartseite.Video.NEXT){
                self.previousVideo = self.displayedVideo;
                self.displayedVideo = self.nextVideo;
                self.nextVideo = self.allVideos[self.allVideos.indexOf(self.nextVideo)-1];
            }else if(direction == RollereiStartseite.Video.PREVIOUS){
                self.nextVideo = self.displayedVideo;
                self.displayedVideo = self.previousVideo;
                self.previousVideo = self.allVideos[self.allVideos.indexOf(self.displayedVideo)+1];
            }
        };
        self.updateView = function(datum, titel){
            showDate(datum);
            document.getElementById("videoTitel").innerHTML = titel;
        };

        self.updateView(self.displayedVideo.datum, self.displayedVideo.titel);

    };

    ctor.Video = {NEXT:1,PREVIOUS:2};

    ctor.prototype = {

    };

    return ctor;
})();

function Video(id, titel, datum){
    this.id = id;
    this.titel = titel;
    this.datum = datum;
    this.URL = "https://www.youtube.com/watch?v="+this.id

    this.PLATFORM = {Youtube:"Youtube",Vimeo:"Vimeo"}

}
var rollerei;
$(function(){
    rollerei = new RollereiStartseite();
    $("#btnNext").click(function(){
        rollerei.loadNextVideo();
    });
    $("#btnBack").click(function(){
        rollerei.loadPreviousVideo();
    });
    $('.login-titel').click(function(event){
        var loginForm = $('.login-form');
        var bool = loginForm.is(':hidden');
        if(bool == true){
            loginForm.css('display','flex');

        }else{
            loginForm.css('display','none');
        }
    });
});