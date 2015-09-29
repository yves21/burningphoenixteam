$(document).ready(function() {
    var channels = ['yves21haut','guig_esprit_du_sage','thomasfreddy56','drangonlee'];

    channels.forEach(function(channel) {
        $.getJSON("https://api.twitch.tv/kraken/streams/"+channel+"?callback=?",function(streamData) {
            console.log('Stream Data:', streamData) // debug message, shows all available data
            if(streamData && streamData.stream) {
                // displayed if online
                $('#twitch' + channel).html("<img src='image/green_ball_16.png' alt='ONLINE' />");
            } else {
                // displayed if offline
                $('#twitch' + channel).html("<img src='image/red_ball_16.png' alt='OFFLINE' />");
            }
        });
    });
});
