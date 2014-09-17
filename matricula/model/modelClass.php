<?php

class modelClass {

  static public function getMatricula() {
    try {
      $sql = 'SELECT matricula.num_ficha, matricula.id_apren, matricula.estado FROM matricula';
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function certifyId($id) {
    try {
      $sql = 'SELECT matricula.num_ficha FROM matricula WHERE matricula.num_ficha = ' . $id;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function getAll() {
    try {
      $sql = 'SELECT matricula.estado, matricula.id_apre, matricula.num_ficha from matricula ';
      return dataBaseClass::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function NewMatricula($Num, $Id, $Estado) {
    try {
      $sql = "INSERT INTO matricula (num_ficha, id_apre, estado ) VALUES ('$Num', '$Id', '$Estado')";


      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("La matricula $Num $Id $Estado   está siendo usado");
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function updateMatricula($id, $numFicha, $data) {
    try {
      
      $sql = "UPDATE matricula SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE num_ficha = '".$numFicha."' AND id_apre = '".$id."'";
      
      echo $sql;
      die();

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("La Matricula no ha podido ser actualizado");
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }
  
  

  static public function getRow($id) {
    try {

      $sql = 'SELECT matricula.estado, matricula.id_apre, matricula.num_ficha From matricula  WHERE matricula.num_ficha = ' . $id;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function deleteMatricula($id) {
    try {

      $sql = 'DELETE FROM matricula WHERE num_ficha = ' . $id;
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

}

?>