<?php
namespace View;

abstract class View
{

    private function header()
    {
        require_once BASE . 'Layout.php';
    }

    public function show($view)
    {
        echo $this->header();
        echo $view->render();
        echo $this->footer();
    }

    private function footer()
    {
        require_once BASE . 'LayoutFooter.php';
    }

    abstract function render();
}