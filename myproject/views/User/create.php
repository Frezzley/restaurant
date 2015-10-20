<?php
namespace View;

class Create {
  function render()
  {


      $html = '<html><form method="post" action="/user/create">
    <div>
    <label for="Firstname">
    Vorname
    </label>
    <div>
    </div>
    <input id="Firstname" name="Firstname" required>
    </div>

    <div>
    <label for="Lastname" >
    Nachname
    </label>
    <div>
    </div>
    <input id="Lastname" name="Lastname" required>
    </div>


    <button type="submit" name="submit-button" value="Submit">
    Senden!
    </button>



</body>
</html>';


      echo $html;
  }




}