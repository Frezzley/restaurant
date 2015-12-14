<?php
/**
 * Created by IntelliJ IDEA.
 * User: adi
 * Date: 28.10.2015
 * Time: 08:14
 */

namespace View;

require_once BASE . 'views' . DS . 'User' . DS . 'Detail.php';
require_once BASE . 'views' . DS . 'User' . DS . 'Edit.php';


class ShowUsers extends View

{
    private $vars;
    public $ID;
    public $Name;
    public $FirstName;

    public function setVars($params)
    {
        $this->vars = $params;
    }

    public function render()
    {
        $list = $this->vars;
        ?>
        <ul class="list-inline">
        <?php
        $htmlhead = ' <div class="container">
                      <div class="row row-offcanvas row-offcanvas-right">
                      <div class="col-md-1"></div>
                      <div class="col-xs-12 col-sm-12 col-md-10">
                      <p class="pull-right visible-xs"></p>
                      <div class="row">';
        echo $htmlhead;


    foreach ($list as $user) {
        $ID = $user->getId();
        $Name = $user->getName();
        $FirstName = $user->getFirstName();
        $IsActive = $user->getIsPresentID();
        $htmlcontent = '<div class="row">
                            <h2 class="col-sm-4">' . $ID . ' </h2>';
         if($IsActive == "true") {
             $htmlcontent .= '     <p class="col-sm-8" ><a class="btn btn-success" href = " ' . '/user/activeButton/' . $ID . '"' . ' role = "button" > Present</a ></p >';
             } else{
             $htmlcontent .= '     <p class="col-sm-8" ><a class="btn btn-danger" href = " ' . '/user/activeButton/' . $ID . '"' . ' role = "button" > Not Present</a ></p >';
         }
        $htmlcontent .= '   <p class="col-sm-12">' . $FirstName . " " . $Name . '</p>
                            <p class="col-sm-12"><a class="btn btn-default" href=" ' . '/user/edit/' . $ID . '"' . ' role="button">Bearbeiten</a></p>
                            <p class="col-sm-12"><a class="btn btn-default" href=" ' . '/user/detail/' . $ID . '"' . ' role="button">Detail</a></p>
                            </div>'; ?>
        <li class="col-xs-6 col-md-4 col-lg-2">
        <?php echo $htmlcontent; ?>
        </li> <?php
    } ?>

        <?php
        $htmlfooter = '</div> </div> </div> </div>';
        echo $htmlfooter;
        ?>
        </ul><?php
    }
}

?>
