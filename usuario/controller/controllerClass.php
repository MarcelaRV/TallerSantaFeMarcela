<?php

/**
 * Description of controllerClass
 *
 * @author julianlasso
 */
class controllerClass {

  public function index($args = NULL) {
    $args['datos'] = modelClass::getAll();

    if (is_array($args['datos'])) {
      viewClass::renderHTML('index.php', $args);
    } else {
      viewClass::renderHTML('error.php', $args);
    }
  }

  public function create() {
    $template = 'create.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if ($_POST['txtPassword1'] === $_POST['txtPassword2']) {
        $activate = ($_POST['rdoActivado'] === 'true') ? 1 : 0;
        $rsp = modelClass::putNewUser($_POST['txtUsuario'], $_POST['txtPassword1'], $activate);
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
        $args['error'] = 'Las contraseñas no son iguales';
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
              $args['idUsuario'] = $data[0]['id'];
              $args['txtUsuario'] = $data[0]['usuario'];
              $args['rdoActivado'] = ($data[0]['activado'] === '1') ? 'true' : 'false';
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
      if ((isset($_POST['txtPassword1']) and strlen($_POST['txtPassword1']) > 0) or ( isset($_POST['txtPassword2']) and strlen($_POST['txtPassword2']) > 0)) {
        if ($_POST['txtPassword1'] === $_POST['txtPassword2']) {
          $data['password'] = md5($_POST['txtPassword1']);
        } else {
          $args['error'] = 'Las contraseñas no son iguales';
          $args['formAction'] = 'index.php?action=update&amp;id=' . $_GET['id'];
          $args = array_merge($args, $_POST);
          viewClass::renderHTML('update.php', $args);
        }
      }
      $data['usuario'] = $_POST['txtUsuario'];
      $data['activado'] = ($_POST['rdoActivado'] === 'true') ? 1 : 0;
      $rsp = modelClass::updateUsuario($_GET['id'], $data);
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
      $rsp = modelClass::deleteUsuario($_GET['id']);
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