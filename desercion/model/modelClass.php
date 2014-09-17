<?php

class modelClass {

  static public function getdesercion() {
    try {
      $sql = 'SELECT desercion.num_doc, desercion.fecha_doc, desercion.id_apre, desercion.num_ficha, desercion.cod_causa, desercion.fecha_desercion, desercion.fase FROM desercion';
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function getficha() {
    try {
      $sql = 'SELECT ficha.num_ficha, ficha.cod_prog, ficha.fecha_ini, ficha.fecha_fin  FROM ficha';
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function getcausa_deser() {
    try {
      $sql = 'SELECT causa_desercion.cod_causa, causa_desercion.desc_causa, causa_desercion.estado FROM causa_desercion';
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function getaprendiz() {
    try {
      $sql = 'SELECT aprendiz.id_apre, aprendiz.nom_apre, aprendiz.apell_apre, aprendiz.tel_apre, aprendiz.cod_ciudad, aprendiz.cod_rh, aprendiz.cod_tipo_id, aprendiz.genero, aprendiz.edad FROM aprendiz';
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function getRow($id) {
    try {

      $sql = 'SELECT desercion.num_doc, desercion.fecha_doc, desercion.id_apre, desercion.num_ficha, desercion.cod_causa, desercion.fecha_desercion, desercion.fase FROM desercion, causa_desercion, ficha, aprendiz WHERE desercion.id_apre=aprendiz.id_apre AND ficha.num_ficha=desercion.num_ficha AND causa_desercion.cod_causa=desercion.cod_causa AND desercion.num_doc = ' . $id;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function certifyId($id) {
    try {
      $sql = 'SELECT desercion.num_doc FROM desercion WHERE desercion.num_doc = ' . $id;
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function getAll() {
    try {
      $sql = 'SELECT desercion.num_doc, desercion.fecha_doc, desercion.id_apre, desercion.num_ficha, desercion.cod_causa, desercion.fecha_desercion, desercion.fase FROM desercion, causa_desercion, ficha, aprendiz WHERE desercion.id_apre=aprendiz.id_apre AND ficha.num_ficha=desercion.num_ficha AND causa_desercion.cod_causa=desercion.cod_causa';
      return dataBaseClass::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function NewDeser($Num, $Fecha, $Id, $NumFicha, $Cod, $FechaDeser, $Fase) {
    try {
      $sql = "INSERT INTO desercion (num_doc, fecha_doc, id_apre, num_ficha, cod_causa, fecha_desercion, fase ) VALUES ('$Num', '$Fecha', '$Id', '$NumFicha', '$Cod', '$FechaDeser', '$Fase')";


      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("La desercion $Num $Fecha $Id  está siendo usado");
      }

      return $rsp;
    } catch (PDOException $e) {
      return $e;
    }
  }

  static public function updateDeser($id, $data) {
    try {

      $sql = "UPDATE desercion SET ";

      foreach ($data as $key => $value) {
        $sql = $sql . " " . $key . " = '" . $value . "', ";
      }

      $newLeng = strlen($sql) - 2;
      $sql = substr($sql, 0, $newLeng);

      $sql = $sql . " WHERE num_doc = " . $id;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("La desercion no ha podido ser actualizado");
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }

  static public function deleteDeser($id) {
    try {

      $sql = 'DELETE FROM desercion WHERE num_doc = ' . $id;

      dataBaseClass::getInstance()->beginTransaction();
      $rsp = dataBaseClass::getInstance()->exec($sql);
      dataBaseClass::getInstance()->commit();

      if ($rsp !== false) {
        $rsp = true;
      } else {
        throw new PDOException("El aprendiz no ha podido ser eliminado", 2633);
      }
      return $rsp;
    } catch (PDOException $e) {
      dataBaseClass::getInstance()->rollback();
      return $e;
    }
  }

}

?>