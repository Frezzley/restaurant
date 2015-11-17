<?php
namespace View;

class CreateUser extends View
{
    function render()
    {


        $html = '<html><form class="form-horizontal" method="post" action="/user/create">
    <div class="form-group">
    <label for="Firstname">
    Vorname
    </label>
    <div>
    </div>
    <input  class="form-control" id="Firstname" name="Firstname" required>
    </div>

    <div class="form-group">
    <label for="Lastname" >
    Nachname
    </label>
    <div>
    </div>
    <input  class="form-control" id="Lastname" name="Lastname" required>
    </div>

    <div class="form-group">
    <label for="Preferences">
    Preferenzen
    </label>
    <div>
    </div>
    <input  class="form-control" id="Preferences" name="Preferences" required>
    </div>

    <div class="form-group">
    <label for="DailyPreference">
    Taegliche Preferenz
    </label>
    <div >
    </div>
    <input  class="form-control" id="DailyPreference" name="DailyPreference" required>
    </div>

<div class="form-group">
    <button class="btn btn-default" type="submit" name="submit-button" value="Submit">
    Senden!
    </button>
  </div>



';


        echo $html;
    }

}
