<?php

class modelClass {

  static public function viewDatos($id) {
    try {
      $sql = 'SELECT  datos_usuario.id, datos_usuario.usuario_id, datos_usuario.nombre, datos_usuario.apellido, datos_usuario.direcion, datos_usuario.telefono, datos_usuario.localidad_id FROM datos_usuario WHERE datos_usuario.id = ' . $id;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function certifyId($id) {
    try {
      $sql = 'SELECT  datos_usuario.id FROM datos_usuario WHERE datos_usuario.id = ' . $id;;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }


  static public function getLocalidad() {
    try {
      $sql = 'SELECT localidad.id, localidad.nombre, localidad.localidad_id FROM localidad';
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function getIdUSuario() {
    try {
      $sql = 'SELECT usuario.id, usuario.usuario, usuario.password, usuario.activado FROM usuario';
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function getAll() {
    try {
      $sql = 'SELECT datos_usuario.id, datos_usuario.usuario_id, datos_usuario.nombre, datos_usuario.apellido, datos_usuario.direcion, datos_usuario.telefono, datos_usuario.localidad_id FROM datos_usuario';
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
      /*
        if($e->getCode() === 10) {
        echo 'Base de Datos no encotrada';
        }
       */
    }
  }

  static public function updateDatos($id, $data) {
    try {

      echo $sql = "UPDATE datos_usuario SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE datos_usuario.id = " . $id;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El aprendiz no ha podido ser actualizado");
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }

  static public function getRow($id) {
    try {

      $sql = 'SELECT datos_usuario.id, datos_usuario.usuario_id, datos_usuario.nombre, datos_usuario.apellido, datos_usuario.direcion, datos_usuario.telefono, datos_usuario.localidad_id FROM datos_usuario WHERE datos_usuario.id = ' . $id;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function deleteUser($id) {
    try {

      $sql = "DELETE FROM datos_usuario WHERE datos_usuario.id = " . $id;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        $rsp = false;
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }

  static public function NewDatoUser($id, $idUser, $nom, $apell, $dir, $tel, $loca) {
    try {
      $sql = "INSERT INTO datos_usuario (id, usuario_id, nombre, apellido, direcion, telefono, localidad_id ) VALUES ('$id', '$idUser', '$nom', '$apell', '$dir', '$tel', '$loca')";
      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("Los Datos $id $nom $apell  está siendo usado");
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

}

?>