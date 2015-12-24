<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 04.11.2015
 * Time: 09:27
 */

namespace View;


class EditmoreUserCriterias extends View
{

    public function setVars($user, $criterias)
    {
        $this->user = $user;
        $this->criterias = $criterias;
    }

    public function render()
    {
        $criterias = $this->criterias;
//$list = $this->vars;

        ?>
        <ul class="list-inline">
            <?php

            foreach ($criterias as $criteria) {
                ?>
                <li>
                    <div class="row">
                            <div class="col-sm-12">
                                <?php
                                echo $criteria["Name"];
                                ?>
                                <div class="input-group">
                                    <input type="radio"  name="<?php echo $criteria["Name"]; ?>" value="1"><label> Not important</label>
                                    <input type="radio"  name="<?php echo $criteria["Name"]; ?>" value="2"><label>a bit important</label>
                                    <input type="radio"  name="<?php echo $criteria["Name"]; ?>" value="3"><label> neutral</label>
                                    <input type="radio"  name="<?php echo $criteria["Name"]; ?>" value="4"><label> important</label>
                                    <input type="radio"  name="<?php echo $criteria["Name"]; ?>" value="5"><label>very important</label>
                                </div>
                            </div>
                        </div>
                </li>
            <?php } ?>
        </ul>
        <?php

    }
}

?>
</body>
</html>