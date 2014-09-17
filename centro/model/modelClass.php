<?php

class modelClass {
    
    static public function getCentro() {
        try {
            $sql = 'SELECT centro.cod_centro, centro.desc_centro, centro.cod_ciudad, centro.dir, centro.tel FROM centro';
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    

    static public function getRow($id) {
        try {

            $sql = 'SELECT centro.cod_centro, centro.desc_centro, centro.cod_ciudad, centro.dir, centro.tel  from centro WHERE centro.cod_centro = ' . $id;
            
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;

        }
    }

    

    static public function certifyId($id) {
        try {
            $sql = 'SELECT centro.cod_centro FROM centro WHERE centro.cod_centro = ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT centro.cod_centro, centro.desc_centro, centro.cod_ciudad, centro.dir, centro.tel  FROM centro ';
            return dataBaseClass::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function NewCentro($cod, $desCentro, $codCiudad, $dir, $tel) {
        try {
            $sql = "INSERT INTO centro (cod_centro, desc_centro, cod_ciudad, dir, tel ) VALUES ('$cod', '$desCentro', '$codCiudad', '$dir','$tel')";
            
            
            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El departamento $cod $desCentro   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function updateCentro($id, $data) {
        try {

            $sql = "UPDATE centro SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_centro = " . $id;

            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El departamento no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            dataBaseClass::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteCentro($id) {
        try {

            $sql = 'DELETE FROM centro WHERE cod_centro = ' . $id;

            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
         
            }
            return $rsp;
        } catch (PDOException $e) {
            dataBaseClass::getInstance()->rollback();
            return $e;
        }
    }


static public function showCity() {
    try {
      $sql = 'SELECT ciudad.cod_ciudad, ciudad.nom_ciudad FROM ciudad';
      return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e;
    }
  }
}

?>