<?php

class controllerClass {

  public function index($args = NULL) {
    $args['datos'] = modelClass::getAll();

    if (is_array($args['datos'])) {
      viewClass::renderHTML('index.php', $args);
    } else {
      viewClass::renderHTML('error.php', $args);
    }
    
  }
  public function updateApren(){
       
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id']) and is_numeric($_GET['id'])) {
      $certificate = modelClass::certifyId($_GET['id']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $args['depto']= modelClass::getDepto();
          $data = modelClass::getRow($_GET['id']);     
          $data = modelClass::getRow($_GET['id']);

            if (is_array($data)) {
            if (count($data) > 0) {
              $args['cod_ciudad'] = $data[0]['cod_ciudad'];
              $args['nom_ciudad'] = $data[0]['nom_ciudad'];              
              $args['cod_depto'] = $data[0]['cod_depto'];              
              $args['habitantes'] = $data[0]['habitantes'];              
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

      $data['cod_ciudad'] = $_POST['codCity'];
      $data['nom_ciudad'] = $_POST['nameCity'];
      $data['cod_depto'] = $_POST['txtDepto'];
      $data['habitantes'] = $_POST['txtHabi'];
      $rsp = modelClass::updateCity($_GET['id'], $data);
      if ($rsp === true) {
        $args['success'] = 'Los cambios fueron realizados exitosamente';
      } else {
        $args['error'] = $rsp->getMessage();
      }
      $args['formAction'] = 'index.php?action=update&amp;id=' . $_GET['id'];
      $args = array_merge($args, $_POST);
      viewClass::renderHTML('update.php', $args);
    } else {
      $this->index($args);
    }
  }
  public function delete() {
    $args['formAction'] = 'index.php?action=delete&amp;id=' . $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id']) and is_numeric($_GET['id'])) {
      viewClass::renderHTML('delete.php', $args);
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['confirmation']) and $_POST['confirmation'] === 'true') {
      $rsp = modelClass::deleteCity($_GET['id']);
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
  public function create() {
      $args['depto']= modelClass::getDepto();

    $template = 'create.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rsp = modelClass::newCity($_POST['codCity'],$_POST['nameCity'],$_POST['txtDepto'],$_POST['txtHabi']);
        if ($rsp === true) {
          $args['success'] = 'El registro fue realizado exitosamente';
          $this->index($args);
        } else {
          $args['error'] = $rsp->getMessage();
          $args['formAction'] = 'index.php=create';
          $args = array_merge($args, $_POST);
          viewClass::renderHTML($template, $args);
        }
      
     
    } else {
      $args['formAction'] = 'index.php?action=create';
      viewClass::renderHTML($template, $args);
    }
 }
}

?>
 
