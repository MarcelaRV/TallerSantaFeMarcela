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

   public function update() {
     
     $args['Localidad'] = modelClass::getLocalidad();
     $args['idUser'] = modelClass::getIdUSuario();
    if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id']) and is_numeric($_GET['id'])) {
      $certificate = modelClass::certifyId($_GET['id']);
      if (is_array($certificate)) {
        if (count($certificate) > 0) {
          

         
          $data = modelClass::getRow($_GET['id']);


          if (is_array($data)) {
            if (count($data) > 0) {
              $args['id'] = $data[0]['id'];
              $args['usuario_id'] = $data[0]['usuario_id'];
              $args['nombre'] = $data[0]['nombre'];  
              $args['apellido'] = $data[0]['apellido'];
              $args['direcion'] = $data[0]['direcion']; 
              $args['telefono'] = $data[0]['telefono'];
              $args['localidad_id'] = $data[0]['localidad_id']; 
                    
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
      $data['id'] = $_POST['txtId']; 
      $data['nombre'] = $_POST['txtName'];
      $data['usuario_id'] = $_POST['txtIdUser'];
      $data['apellido'] = $_POST['txtLastName'];
      $data['direcion'] = $_POST['txtDir'];
      $data['telefono'] = $_POST['txtTel'];
      $data['localidad_id'] = $_POST['txtLocalidad'];
    
      
      $rsp = modelClass::updateDatos($_GET['id'], $data);
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
      $rsp = modelClass::deleteUser($_GET['id']);
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
   
    $args['Localidad'] = modelClass::getLocalidad();
     $args['idUser'] = modelClass::getIdUSuario();

    $template = 'create.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $rsp = modelClass::NewDatoUser($_POST['txtId'], $_POST['txtIdUser'], $_POST['txtName'], $_POST['txtLastName'], $_POST['txtDir'], $_POST['txtTel'], $_POST['txtLocalidad']);
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
 
