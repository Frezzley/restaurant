<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 22.10.2015
 * Time: 08:14
 */

namespace View;


class EditUser
{
    private $vars;
    private $restaurants;
    public function setVars($params, $list)
    {
        $this->vars = $params;
        $this->restaurants = $list;
    }

    function render()
    {
        $error = array_key_exists("Error",$this->vars) ? $this->vars["Error"]: null;
        $user = array_key_exists("User",$this->vars) ? $this->vars["User"]: null;



        $html='<form class="form-horizontal" method="post" action="/user/edit/'. $user->getId() . '">


<div class="form-group">
    <label for="inputFirstName" class="col-sm-2 control-label">Vorame</label>
    <div class="col-sm-10">
      <input type="text" name="Firstname" class="form-control" id="inputFirstName" placeholder="' . $user->getFirstName() .'">
    </div>
  </div>
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="Lastname" class="form-control" id="inputName" placeholder="' . $user->getName() .'">
    </div>
  </div>
  <div class="form-group">
    <label for="inputRestaurant" class="col-sm-2 control-label">Restaurant</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Preferences" id="inputRestaurant" placeholder="' . $user->getPreferences() .'">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>';

        echo $html;

                                                                        $htmljquery='
                                                                  <title>jQuery UI Autocomplete - Remote datasource</title>
                                                                  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
                                                                  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
                                                                  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
                                                                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                                                                  <link rel="stylesheet" href="/resources/demos/style.css">
                                                                  <style>
                                                                  .ui-autocomplete-loading {
                                                                    // background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
                                                                  }
                                                                  </style>
                                                                  <script>
                                                                  $(function() {
                                                                    function log( message ) {
                                                                      $( "<div>" ).text( message ).prependTo( "#log" );
                                                                      $( "#log" ).scrollTop( 0 );
                                                                    }

                                                                    $( "#restaurants" ).autocomplete({
                                                                      source: "search.php",
                                                                      minLength: 2,
                                                                      select: function( event, ui ) {
                                                                        log( ui.item ?
                                                                          "Selected: " + ui.item.value + " aka " + ui.item.id :
                                                                          "Nothing selected, input was " + this.value );
                                                                      }
                                                                    });
                                                                  });
                                                                  </script>
                                                                </head>
                                                                <body>

                                                                <div class="ui-widget">
                                                                  <label for="restaurants">Restaurants: </label>
                                                                  <input id="restaurants">
                                                                </div>

                                                                <div class="ui-widget" style="margin-top:2em; font-family:Arial">
                                                                  Result:
                                                                  <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
                                                                </div>';
        $testjquery1 ='

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


<script>
    $(function () {            }
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function() {
            var availableRestaurants = [';
        $testjquery2 ='
            ];
            $( "#inputRestaurant" ).autocomplete({
                source: availableRestaurants
            });
        });
    </script>
';
        echo $testjquery1;
        foreach ($this->restaurants as $restaurant) {
            $Name = $restaurant->getName();
            $fillinrestaurant = '"' . $Name . '",';
            echo $fillinrestaurant;
        }
        echo $testjquery2;
    }
}
?>