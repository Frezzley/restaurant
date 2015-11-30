$(document).ready(function () {
    var config = {
        source: '/User/restaurantList',
        minLength: 2,

        select: function (event, ui) {
           // $('input[name="restaurant"]')
            var restaurantexists = "false";
            $('.restaurant').each(function(index, item) {
            //   console.log($(item).val());
            //    console.log(ui.item.value);
                if(ui.item.value == $(item).val()){restaurantexists = "true";}});
            if(restaurantexists == "false") {
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
                template.attr('name', 'restaurant[]');
                template.add('#data-id',ui.item.value);
                // template.attr('readonly', true);
                appendItem(ui.item.label);
                //template.val(ui.item.label);
                template.removeAttr("id");
                //Buttondelete();
                //  $(this).text("").val("");
                $('#template-hidden').parent().append(template);
                //$('#inputRestaurant').text("").val("");
                // $('#inputRestaurant').reset();
                // $('#inputRestaurant').removeAttr('value');
            }
               $('#inputRestaurant').val("");
               // $("#inputRestaurant").find("input[type=text], textarea").val("");
                $('#inputRestaurant').value('');
                //document.getElementById("inputRestaurant").reset();
            }
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
//    template.text(text);
    //  $(this).text("").val("");$('#id-template-hidden').parent().append(template);
}
//  }
//

$(document).ready(function(){
    //$(".btn.btn-default.btn-lg.remove").on(function(){
    $(".btn.btn-default.btn-lg.remove").on('click', function() {

        $(".btn.btn-default.btn-lg.remove").click(function(){
            $(this).parent().remove();
            //var x = document.getElementById("myBtn").getAttribute("onclick")
            console.log($(this).val( $(this).attr('data-id')));
            var id =$(this).val( $(this).attr('data-id'))

            console.log($(this).attr('data-id'));
            var did =$(this).attr('data-id');

            console.log($("input").attr('data-id'));

            var element = document.getElementById("data-id");
         //   element.outerHTML = "";
            delete element;

            var list = document.getElementsByClassName("restaurant");
            for(var i = list.length - 1; 0 <= i; i--)
                if(list[i] && list[i].parentElement)
                    list[i].parentElement.removeChild(list[i]);
            //console.log($(this).parent().getAttribute('data-id'));
            //var attr = $(this).parent().getAttribute('data-id');
            //console.log(attr);
            //
            //var id = $(this).getAttribute('data-id');
            //$('data-id').attr(attribute);
            //var element = document.getAnonymousElementByAttribute('data-id', id);
            //element.parent().remove();
            //
            //var id = $(this).attr('#data-id');
            //console.log($(this).attr('#data-id'));
            //console.log(id);

            document.getElementsByClassName("restaurant").remove();


            //$("#add-file-field").click(function() {
           //     $("#text").append("<div class='text-field'><input type='text' /> <input type='button' class='remove-btn' value='remove' /></div>");
           // });

           // $(".remove-btn").live('click',function() {
                $(this).parent().remove();
          //  });

        $('data-id').data("3");
        $("input").remove('data-id=3');
    });
});