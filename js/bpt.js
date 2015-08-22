$(document).ready(function() {
    $("#jq-calendar").eventCalendar({
        // link to events json
        eventsjson: "http://www.google.com/calendar/feeds/bpt.burningphoenixteam40@google.com/public/full?alt=json-in-script&callback=insertAgenda&orderby=starttime&max-results=15&singleevents=true&sortorder=ascending&futureevents=true",
        jsonDateFormat: "human"
    });
});
