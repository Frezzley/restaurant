<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 22.10.2015
 * Time: 08:14
 */

namespace View;


class EditUser extends View
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
        $error = array_key_exists("Error", $this->vars) ? $this->vars["Error"] : null;
        $user = array_key_exists("User", $this->vars) ? $this->vars["User"] : null;


        $html = '<form class="form-horizontal" method="post" action="/user/edit/' . $user->getId() . '">


<div class="form-group">
    <label for="inputFirstName" class="col-sm-2 control-label">Vorame</label>
    <div class="col-sm-10">
      <input type="text" name="Firstname" class="form-control" id="inputFirstName" placeholder="' . $user->getFirstName() . '">
    </div>
  </div>
  <div class="form-group">
    <label for="inputName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" name="Lastname" class="form-control" id="inputName" placeholder="' . $user->getName() . '">
    </div>
  </div>
  <div class="form-group">
    <label for="inputRestaurant" class="col-sm-2 control-label">Restaurant</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Preferences" id="inputRestaurant" placeholder="' . $user->getPreferences() . '">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Update</button>
    </div>
  </div>
</form>';

        echo $html;
    }
}

?>