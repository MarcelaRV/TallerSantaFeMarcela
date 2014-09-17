<?php

class modelClass {
    
    static public function getCausaDeser() {
        try {
            $sql = 'SELECT causa_desercion.cod_causa,  causa_desercion.desc_causa, causa_desercion.estado  FROM causa_desercion';
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    

    static public function getRow($id) {
        try {

            $sql = 'SELECT causa_desercion.cod_causa,  causa_desercion.desc_causa, causa_desercion.estado  FROM causa_desercion WHERE causa_desercion.cod_causa= ' . $id;        
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;

        }
    }

    

    static public function certifyId($id) {
        try {
            $sql = 'SELECT causa_desercion.cod_causa  FROM causa_desercion WHERE causa_desercion.cod_causa=  ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT causa_desercion.cod_causa,  causa_desercion.desc_causa, causa_desercion.estado  FROM causa_desercion';
            return dataBaseClass::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function NewCausa($cod, $descCausa,$estado) {
        try {
            $sql = "INSERT INTO causa_desercion (cod_causa, desc_causa, estado) VALUES ('$cod', '$descCausa', '$estado')";
            
            
            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La Causa $cod $descCausa   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function updateCausa($id, $data) {
        try {

            $sql = "UPDATE causa_desercion SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_causa = " . $id;

            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La Causa no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
            dataBaseClass::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteCausa($id) {
        try {

            $sql = 'DELETE FROM causa_desercion WHERE cod_causa = ' . $id;

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