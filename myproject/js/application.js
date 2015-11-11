$(document).ready(function() {
    var config = {
        source: '/ajax/restaurantList',
        minLength: 2,
        select: function(event, ui) {
            console.log(event);
            console.log(ui);
        }
    };
    $('#inputRestaurant').autocomplete(config);
});
