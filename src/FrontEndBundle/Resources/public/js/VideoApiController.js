/**
 * Created by Guido on 25.07.2016.
 */
function VideoApiController(){

    this.loadVideoApis = function(callback){

        setTimeout(
            function () {
                callback();
            },2000
        )
    };


}




var YTplayer				  , YTplayerContainer,
    YTplayerID = "ytapiplayer",	YTplayerContainerID = "ytapiplayerContainer";
var YTplayerVars = {};
var YTplayerEvents = {
    'onReady': onYTPlayerReady,
    'onStateChange': onYTPlayerStateChange
};
var YTplayerOptions = { height: '400', width: '400',
    videoId: 'FIFD25hk6bc', events: YTplayerEvents };
function onYouTubeIframeAPIReady() {
    YTplayerContainer = document.getElementById(YTplayerContainerID);
    YTplayerOptions.videoId = rollerei.displayedVideo.id;
    YTplayer = new YT.Player(YTplayerID, YTplayerOptions);
}
function onYTPlayerReady(event) {
    //event.target.playVideo();
    //YTplayer.playVideo();
}
function onYTPlayerStateChange(event) {


    if (event.data == YT.PlayerState.ENDED) {
        console.log("Hallo Ende");
    }
}
function stopVideo() {
    YTplayer.stopVideo();
}
function playVideo() {
    YTplayer.playVideo();
}
function pauseVideo() {
    YTplayer.pauseVideo();
}
function switchAudioState() {
    if(YTplayer.isMuted() == true){
        YTplayer.unMute();
    }else{
        YTplayer.mute();
    }

}
function setVolume(number) {
    YTplayer.setVolume(number);
}
