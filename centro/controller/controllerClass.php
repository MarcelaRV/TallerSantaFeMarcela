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
        $args['ciudad'] = modelClass::showCity();

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {            
            
            $rsp = modelClass::NewCentro($_POST['txtcod'], $_POST['txtDesc'], $_POST['txtCity'], $_POST['txtdir'], $_POST['txttel']);
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
          

         
          $data = modelClass::getRow($_GET['id']);


          if (is_array($data)) {
            if (count($data) > 0) {
              $args['cod_centro'] = $data[0]['cod_centro'];
              $args['desc_centro'] = $data[0]['desc_centro'];
              $args['cod_ciudad'] = $data[0]['cod_ciudad'];
              $args['dir'] = $data[0]['dir'];
              $args['tel'] = $data[0]['tel'];
              $args['ciudad'] = modelClass::showCity();
              
                    
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

      $data['cod_centro'] = $_POST['txtcod'];
      $data['desc_centro'] = $_POST['txtDesc'];
      $data['cod_ciudad'] = $_POST['txtCity'];
      $data['dir'] = $_POST['txtdir'];
      $data['tel'] = $_POST['txttel'];
    
      
      $rsp = modelClass::updateCentro($_GET['id'], $data);
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

       $rsp = modelClass::deleteCentro($_GET['id']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['id'] . ' fue eliminado exitosamente';
      } else {
        $args['error'] = 'NO SE PUDO BORRAR PORQUE EL REGISTRO ESTA SIENDO USADO';
        $this->index($args);
        viewClass::renderHTML('error.php', $args);
      }
      $this->index($args);
    }
  }
    public function notFound() {
        
    }

}

?>