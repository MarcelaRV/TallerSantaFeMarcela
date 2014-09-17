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
       $args['ti']= modelClass::showTypeId();
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id']) and is_numeric($_GET['id'])) {
      $certificate = modelClass::certifyId($_GET['id']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          $args['ciudad'] = modelClass::showCity();
          $args['tipo_id'] = modelClass::showTypeId();
          $args['rh'] = modelClass::getRh();
          $data = modelClass::getRow($_GET['id']);     
          $data = modelClass::getRow($_GET['id']);

            if (is_array($data)) {
            if (count($data) > 0) {
              $args['id_apre'] = $data[0]['id_apre'];
              $args['nom_apre'] = $data[0]['nom_apre'];              
              $args['apell_apre'] = $data[0]['apell_apre'];              
              $args['tel_apre'] = $data[0]['tel_apre'];              
              $args['cod_ciudad'] = $data[0]['cod_ciudad'];              
              $args['cod_rh'] = $data[0]['cod_rh'];              
              $args['cod_tipo_id'] = $data[0]['cod_tipo_id'];              
              $args['genero'] = $data[0]['genero'];              
              $args['edad'] = $data[0]['edad'];              
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

      $data['nom_apre'] = $_POST['txtName'];
      $data['apell_apre'] = $_POST['txtLastName'];
      $data['tel_apre'] = $_POST['txtPhone'];
      $data['cod_ciudad'] = $_POST['txtCity'];
      $data['cod_rh'] = $_POST['txtRh'];
      $data['cod_tipo_id'] = $_POST['txtTypeId'];
      $data['genero'] = $_POST['txtGender'];
      $data['edad'] = $_POST['txtAge'];
      
      $rsp = modelClass::updateApren($_GET['id'], $data);
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
      $rsp = modelClass::deleteUsuario($_GET['id']);
      if ($rsp === true) {
        $args['success'] = 'El registro ' . $_GET['id'] . ' fue eliminado exitosamente';
      } else {
        $args['error'] = 'NO SE PUDO BORRAR PORQUE EL REGISTRO ESTA SIENDO USADO';
        //$this->index($args);
        //viewClass::renderHTML('error.php', $args);
      }
      $this->index($args);
    }
  }
  public function create() {
      $args['ciudad'] = modelClass::showCity();
      $args['ti']= modelClass::showTypeId();
      $args['rh']= modelClass::getRh();
      
    $template = 'create.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rsp = modelClass::NewApre($_POST['txtId'],$_POST['txtName'],$_POST['txtLastName'],$_POST['txtPhone'],$_POST['txtCity'],$_POST['txtRh'],$_POST['txtTypeId'],$_POST['txtGender'],$_POST['txtAge']);
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
 
