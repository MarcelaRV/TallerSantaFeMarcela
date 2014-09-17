<?php

class modelClass {
    
    static public function gettipo_id() {
        try {
            $sql = 'SELECT tipo_id.cod_tipo_id, tipo_id.desc_tipo_id FROM tipo_id';
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    

    static public function getRow($id) {
        try {

            $sql = 'SELECT * from tipo_id WHERE tipo_id.cod_tipo_id = ' . $id;
            
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;

        }
    }

    

    static public function certifyId($id) {
        try {
            $sql = 'SELECT tipo_id.cod_tipo_id FROM tipo_id WHERE tipo_id.cod_tipo_id = ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT * from tipo_id ';
            return dataBaseClass::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function NewTipo_id($cod, $desc) {
        try {
            $sql = "INSERT INTO tipo_id (cod_tipo_id, desc_tipo_id ) VALUES ('$cod', '$desc')";
            
            
            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El tipo_id $cod $desc   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function updateTipo_id($id, $data) {
        try {

            $sql = "UPDATE tipo_id SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_tipo_id = " . $id;

            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El tipo_id no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
          dataBaseClass::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteTipo_id($id) {
        try {

            $sql = 'DELETE FROM tipo_id WHERE cod_tipo_id = ' . $id;
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