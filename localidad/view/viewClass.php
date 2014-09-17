<?php

class viewCLass {

    static public function renderHTML($view, $args = NULL) {
        if (is_array($args)) {
            extract($args);
        }
        include_once 'template/' . $view;
    }

}

?>