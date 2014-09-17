<?php

class modelClass {

    static public function viewCity($id) {
        try {
            $sql = 'SELECT rh.cod_rh, rh.desc_rh FROM rh WHERE rh.cod_rh = ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function certifyId($id) {
        try {
            $sql = 'SELECT rh.cod_rh FROM rh WHERE rh.cod_rh = ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

   
         static public function getAll() {
        try {
            $sql = 'SELECT rh.cod_rh, rh.desc_rh FROM rh ';
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
    static public function updateRh($id, $data) {
        try {

            $sql = "UPDATE rh SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_rh = " . $id;

            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("el rh no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            dataBaseClass::getInstance()->rollback();
            return $e;
        }
    }
     static public function getRow($id) {
        try {

            $sql = 'SELECT rh.cod_rh, rh.desc_rh FROM rh WHERE rh.cod_rh = ' . $id;
                  return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;

        }
        
    }
    
   
    static public function deleteRh($id) {
        try {

            $sql = "DELETE FROM rh WHERE cod_rh = " . $id;

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

    static public function newRh($id, $nom) {
        try {
            $sql = "INSERT INTO rh (cod_rh, desc_rh ) VALUES ('$id', '$nom')";
            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El rh $id $nom $depto  está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

}

?>