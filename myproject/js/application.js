$(document).ready(function() {
    var config = {
        source: '/User/restaurantList',
        minLength: 2,
        select: function (event, ui) {
            console.log(ui.item.value);
            console.log("I'm up here")
            var template = $('#template-hidden').clone();
            template.append('<input name="restaurant">');
            //->
            appendItem(ui.item.label);
            //template.val(ui.item.label);
            template.removeAttr("id");
            $(this).text("").val("");
            $('#template-hidden').parent().append(template);
        }
    };
    $('#inputRestaurant').autocomplete(config);
}
);

  // ->
    var appendItem = function(text) {
       // $('#content ul').append(
         //   $('<li>').append(
           //     $('<a>').attr('href','/user/messages').append(
             //       $('<span>').attr('class', 'tab').append("Message center")

        var li = $('<li></li>');
        li.html(text);
        $("#content ul").append(li)

        console.log($("#content ul").append(li))
       // //$("#template-hidden ul").append(li);
             //   )
           // )
      //  );
    }
  //  }
//);