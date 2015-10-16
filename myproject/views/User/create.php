<?php
namespace view;

abstract class Create {
  function render() {



    $html='
    <div>
    Id: <input type="int" name="id" value="' . $Lastname . '">
        LastName: <input type="text" name="lastname" value="<?php echo $Lastname;?>">
        FirstName: <input type="text" name="firstname" value="<?php echo $Firstname;?>">
        Preferences: <input type="text" name="preferences" value="<?php echo $Preferences;?>">
        Daily_Preference: <input type="text" name="Daily_Preference" value="<?php echo $Daily_Preference;?>">
</div>';

      echo $html;

      $newuser = array(ID=>value,"Lastname"=>$Lastname,"Firstname"=>$Firstname,'Preferences'=>$Preferences,'Daily_Preferences'=>$Daily_Preferences);
      return $newuser;
    }
}
?>