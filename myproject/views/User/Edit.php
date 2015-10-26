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
    public function setVars($params)
    {
        $this->vars = $params;
    }



    function render()
    {

        $error = array_key_exists("Error",$this->vars) ? $this->vars["Error"]: null;
        $user = array_key_exists("User",$this->vars) ? $this->vars["User"]: null;

        $html = '<html><form method="post" action="/user/edit">

    <label for="Firstname">
    firstname:
    </label>
    <input id="Firstname" name="Firstname" value="' . $user->getFirstName() .'" required>
    </div>

    <div>
    <label for="Lastname" >
    lastname:
    </label>
    <input id="Lastname" name="Lastname" value="' . $user->getName() .'" required>
    </div>

    <button type="submit" name="submit-button" value="Submit">
    Senden!
    </button>
</body>
</html>';


        echo $html;
    }





}
?>