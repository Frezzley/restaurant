$(document).ready(function () {
    var config = {
        source: '/User/restaurantList',
        minLength: 2,

        select: function (event, ui) {
           // $('input[name="restaurant"]')
            var restaurantexists = "false";
            $('.restaurant').each(function(index, item) {
               //console.log($(item).val());
               // console.log(ui.item.value);
                if(ui.item.value == $(item).val()){restaurantexists = "true";}});
            if(restaurantexists == "false"){
            var template = $('#template-hidden').clone();
            //template.append('<input name="restaurant">');
            //console.log(document.getElementById(ui.item.value).className += 'restaurant');
//            template.className += 'restaurant';
            // template.add(className += 'restaurant');
            // document.getElementById()
            // template.removeAttr("type");
            template.addClass('restaurant');
            //template.val(ui.item.label);
            template.val(ui.item.value);
            template.attr('name','restaurant[]');
            // template.attr('readonly', true);
            appendItem(ui.item.label);
            //template.val(ui.item.label);
            template.removeAttr("id");
            //  $(this).text("").val("");
            $('#template-hidden').parent().append(template);
                //$('#inputRestaurant').text("").val("");
               // $('#inputRestaurant').reset();
               // $('#inputRestaurant').removeAttr('value');
               $('#inputRestaurant').val("");
               // $("#inputRestaurant").find("input[type=text], textarea").val("");
                $('#inputRestaurant').value('');
                //document.getElementById("inputRestaurant").reset();
            }}
    };
    $('#inputRestaurant').autocomplete(config);
});

var appendItem = function (text) {
    var ul = $('#content ul');
    var template = ul.find('li:first').clone(true).appendTo(ul);
    //var template = $('#li-template-hidden').clone();
    template.removeAttr("type");
    template.addClass('restaurant');
    template.append(text);
    template.removeAttr("id");
    template.text(text);
    //  $(this).text("").val("");$('#id-template-hidden').parent().append(template);
}
//  }
//






//http://stackoverflow.com/questions/1947263/using-an-html-button-to-call-a-javascript-function