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
        $args['centro'] = modelClass::getCentro();
        $args['programa'] = modelClass::getPrograma();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {            
            
            $rsp = modelClass::NewFicha($_POST['txtNum'], $_POST['txtcod'],$_POST['txtFechaIni'],$_POST['txtFechaFin'], $_POST['txtCentro']);
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
          
        $args['centro'] = modelClass::getCentro();
        $args['programa'] = modelClass::getPrograma();
         
          $data = modelClass::getRow($_GET['id']);


          if (is_array($data)) {
            if (count($data) > 0) {
              $args['num_ficha'] = $data[0]['num_ficha'];
              $args['cod_prog'] = $data[0]['cod_prog']; 
              $args['fecha_ini'] = $data[0]['fecha_ini'];
              $args['fecha_fin'] = $data[0]['fecha_fin'];
              $args['cod_centro'] = $data[0]['cod_centro'];     
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

      $data['cod_prog'] = $_POST['txtcod'];
      $data['fecha_ini'] = $_POST['txtFechaIni'];
      $data['fecha_fin'] = $_POST['txtFechaFin'];
       $data['cod_centro'] = $_POST['txtCentro'];
    
      
      $rsp = modelClass::updateFicha($_GET['id'], $data);
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

           $rsp = modelClass::deleteFicha($_GET['id']);
            if ($rsp === true) {
                $args['success'] = 'El registro ' . $_GET['id'] . ' fue eliminado exitosamente';
            } else {
                $args['error'] = 'NO SE PUDO BORRAR PORQUE EL REGISTRO ESTA SIENDO USADO';
               // $this->index($args);
                //viewClass::renderHTML('error.php', $args);
            }
            $this->index($args);
        }
    }

    public function notFound() {
        
    }

}

?>