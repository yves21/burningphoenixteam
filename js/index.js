$(document).ready(function() {
    $("#jq-calendar").eventCalendar({
        // link to events json
        eventsjson: "json/cal-events.php",
        jsonDateFormat: "human",
        showDescription: true
    });

    $.getJSON("json/last-posts.php", function(data) {
        var items = [],
            author;

        data.forEach(function(item) {
            author = item.author.substring(19, item.author.length - 1);
            items.push("<div><a href='" + item.link + "'>" + item.title + "</a><br/>par " + author + " le " + item.date + "</div>");
        });

        $("<div/>", {
            "class": "posts-list",
            html: items.join("")
        }).appendTo("#jq-lastposts");

    });

});
