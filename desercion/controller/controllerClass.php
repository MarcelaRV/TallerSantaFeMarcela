<?php

class controllerClass {

    public function index($args = Null) {
        $args['datos'] = modelClass::getAll();

        if (is_array($args['datos'])) {
            viewClass::renderHTML('index.php', $args);
        } else {
            viewClass::renderHTML('error.php', $args);
        }
    }

    public function create() {
        $template = 'create.php';

        $args['desercion'] = modelClass::getdesercion();
        $args['ficha'] = modelClass::getficha();
        $args['causa_deser'] = modelClass::getcausa_deser();
        $args ['aprendiz'] = modelClass::getaprendiz();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $rsp = modelClass::NewDeser($_POST['txtNum'], $_POST['txtFecha'], $_POST['txtId'], $_POST['txtFicha'], $_POST['txtCod'], $_POST['txtFechaDeser'], $_POST['txtFase']);
            if ($rsp === true) {
                $args['success'] = 'El registro fue realizado exitosamente';
                $this->index($args);
            } else {

                $args['error'] = $rsp->getMessage();
                $args['formAction'] = 'index.php?action=create';
                $args = array_merge($args, $_POST);
                viewClass::renderHTML($template, $args);
            }
        } else {
            $args['formAction'] = 'index.php?action=create';
            viewClass::renderHTML($template, $args);
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id']) and is_numeric($_GET['id'])) {
            $certificate = modelClass::certifyId($_GET['id']);
            if (is_array($certificate)) {
                if (count($certificate) > 0) {
                    $args['ficha'] = modelClass::getficha();
                    $args['causa_deser'] = modelClass::getcausa_deser();
                    $args['aprendiz'] = modelClass::getaprendiz();
                    $data = modelClass::getRow($_GET['id']);


                    $data = modelClass::getRow($_GET['id']);


                    if (is_array($data)) {
                        if (count($data) > 0) {
                            $args['num_doc'] = $data[0]['num_doc'];
                            $args['fecha_doc'] = $data[0]['fecha_doc'];
                            $args['id_apre'] = $data[0]['id_apre'];
                            $args['num_ficha'] = $data[0]['num_ficha'];
                            $args['cod_causa'] = $data[0]['cod_causa'];
                            $args['fecha_desercion'] = $data[0]['fecha_desercion'];
                            $args['fase'] = $data[0]['fase'];
                        }
                    } else {
                        $args['error'] = $data;
                        viewClass::renderHTML('error.php', $args);
                    }
                }
            } else {
                $args['error'] = $certificate;
                viewClass::renderHTML('error.php', $args);
            }
            $args['formAction'] = 'index.php?action=update&amp;id=' . $_GET['id'];
            viewClass::renderHTML('update.php', $args);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data['fecha_doc'] = $_POST['txtFecha'];
            $data['id_apre'] = $_POST['txtId'];
            $data['num_ficha'] = $_POST['txtFicha'];
            $data['cod_causa'] = $_POST['txtCod'];
            $data['fecha_desercion'] = $_POST['txtFechaDeser'];
            $data['fase'] = $_POST['txtFase'];


            $rsp = modelClass::updateDeser($_GET['id'], $data);
            if ($rsp === true) {
                $args['success'] = 'Los cambios fueron realizados exitosamente';
            } else {
                $args['error'] = $rsp->getMessage();
            }
            $args['formAction'] = 'index.php?action=update&amp;id=' . $_GET['id'];
            $args = array_merge($args, $_POST);
            viewClass::renderHTML('update.php', $args);
        } else {
            $this->index();
        }
    }

    public function delete() {
        $args['formAction'] = 'index.php?action=delete&amp;id=' . $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id']) and is_numeric($_GET['id'])) {
            viewClass::renderHTML('delete.php', $args);
        } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {

            $rsp = modelClass::deleteDeser($_GET['id']);
            if ($rsp === true) {
                $args['success'] = 'El registro ' . $_GET['id'] . ' fue eliminado exitosamente';
            } else {
                $args['error'] = $rsp;
                viewClass::renderHTML('error.php', $args);
            }
            $this->index($args);
        }
    }

    public function notFound() {
        
    }

}

?>