// three different searches
var request_places;
var request_restaurants;
var request_events;


// searchbar
$("#search").keyup(function(event) {
    event.preventDefault();


    if (request_places) {
        request_places.abort();
    }
    if (request_restaurants) {
        request_restaurants.abort();
    }
    if (request_events) {
        request_events.abort();
    }

    var $form = $(this);

    var $inputs = $form.find("input, select, button, textarea");


    var serializedData = $form.serialize();

    $inputs.prop("disabled", true);


    request_places = $.ajax({
        url: "actions/search_places.php",
        type: "post",
        data: serializedData
    });

    request_restaurants = $.ajax({
        url: "actions/search_restaurants.php",
        type: "post",
        data: serializedData
    });

    request_events = $.ajax({
        url: "actions/search_events.php",
        type: "post",
        data: serializedData
    });

    // write in places
    request_places.done(function(response, textStatus, jqXHR) {

        document.getElementById("places").innerHTML = response;
    });
    // write in restaurants

    request_restaurants.done(function(response, textStatus, jqXHR) {

        document.getElementById("restaurants").innerHTML = response;
    });
    // write in events
    request_events.done(function(response, textStatus, jqXHR) {

        document.getElementById("events").innerHTML = response;
    });

    request_places.fail(function(jqXHR, textStatus, errorThrown) {

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown
        );
    });
    request_restaurants.fail(function(jqXHR, textStatus, errorThrown) {

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown
        );
    });
    request_events.fail(function(jqXHR, textStatus, errorThrown) {

        console.error(
            "The following error occurred: " +
            textStatus, errorThrown
        );
    });

    request_places.always(function() {

        $inputs.prop("disabled", false);
    });

    request_restaurants.always(function() {

        $inputs.prop("disabled", false);
    });

    request_events.always(function() {

        $inputs.prop("disabled", false);
    });
});