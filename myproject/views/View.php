<?php
namespace View;

abstract class View {

    private function header() {

    }

    public function show($view) {
        echo $this->header();
        echo $view->render();
        echo $this->footer();
    }

    private function footer() {

    }

    abstract function render();
}