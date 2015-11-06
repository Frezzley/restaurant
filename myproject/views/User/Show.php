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


class ShowUsers
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
            $htmlhead = '
<body>
<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">
<div class="col-md-1"></div>
        <div class="col-xs-12 col-sm-12 col-md-10">
            <p class="pull-right visible-xs">
               <!-- <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>-->
            </p>
            <div class="row">';
            echo $htmlhead;
            foreach ($list as $user) {
                ?>
                <?php
                //  print_r($list);
                $ID = $user->getId();
                $Name = $user->getName();
                $FirstName = $user->getFirstName();
                $htmlcontent = '<div>
                    <h2>' . $ID . ' </h2>

                    <p>' . $FirstName . " " . $Name . '</p>

                    <p><a class="btn btn-default" href=" ' . '/user/edit/' . $ID . '"' . ' role="button">Bearbeiten</a></p>
                    <p><a class="btn btn-default" href=" ' . '/user/detail/' . $ID . '"' . ' role="button">Detail</a></p>
                </div>';
                ?><li  class="col-xs-6 col-md-4 col-lg-2"><?php echo $htmlcontent; ?></li><?php
              //  echo "\n";
               // echo "<br>";
                ?> </li><?php
            }
            $htmlfooter = '
            </div>
        </div>

     <!--   <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <a href="#" class="list-group-item active">Link</a>
                <a href="#" class="list-group-item">Link</a>
                <a href="#" class="list-group-item">Link</a>
                <a href="#" class="list-group-item">Link</a>
                <a href="#" class="list-group-item">Link</a>
                <a href="#" class="list-group-item">Link</a>
                <a href="#" class="list-group-item">Link</a>
                <a href="#" class="list-group-item">Link</a>
                <a href="#" class="list-group-item">Link</a>
                <a href="#" class="list-group-item">Link</a>
            </div>
        </div>-->
        <!--/.sidebar-offcanvas-->
    </div>
    <!--/row-->
    <hr>
    <footer>
        <p>Frezzley 2015</p>
    </footer>
</div>
</body>';
            echo $htmlfooter; ?>
            <li><input type="button" value="Neu" onclick="window.location.href='/user/create'"/></li>
        </ul>

        <?php
    }
}
?>