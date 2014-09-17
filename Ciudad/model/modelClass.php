<?php

class modelClass {

    static public function viewCity($id) {
        try {
            $sql = 'SELECT ciudad.cod_ciudad, ciudad.nom_ciudad, ciudad.habitantes FROM ciudad WHERE ciudad.cod_ciudad = ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function certifyId($id) {
        try {
            $sql = 'SELECT ciudad.cod_ciudad FROM ciudad WHERE ciudad.cod_ciudad = ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

   
     static public function getDepto() {
        try {
            $sql = 'SELECT depto.cod_depto, depto.nom_depto FROM depto';
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT ciudad.cod_ciudad, ciudad.nom_ciudad, ciudad.habitantes, ciudad.cod_depto FROM ciudad ';
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
    static public function updateCity($id, $data) {
        try {

            $sql = "UPDATE ciudad SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_ciudad = " . $id;

            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("la cxiudad no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            dataBaseClass::getInstance()->rollback();
            return $e;
        }
    }
     static public function getRow($id) {
        try {

            $sql = 'SELECT ciudad.cod_ciudad, ciudad.cod_depto, ciudad.nom_ciudad, ciudad.habitantes, depto.nom_depto from ciudad, depto  WHERE ciudad.cod_depto=depto.cod_depto and  ciudad.cod_ciudad = ' . $id;
                  return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;

        }
        
    }
    
   
    static public function deleteCity($id) {
        try {

            $sql = "DELETE FROM ciudad WHERE cod_ciudad = " . $id;

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

    static public function newCity($id, $nom, $depto, $habitantes) {
        try {
            $sql = "INSERT INTO ciudad (cod_ciudad, nom_ciudad, cod_depto, habitantes ) VALUES ('$id', '$nom', '$depto', '$habitantes')";
            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El Ciudad $id $nom $depto  está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

}

?>