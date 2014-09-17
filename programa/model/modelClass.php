<?php

class modelClass {
    
    static public function getProgra() {
        try {
            $sql = 'SELECT programa.cod_prog,  programa.desc_prog, programa.estado  FROM programa';
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    

    static public function getRow($id) {
        try {

            $sql = 'SELECT programa.cod_prog,  programa.desc_prog, programa.estado  FROM programa WHERE programa.cod_prog= ' . $id;        
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;

        }
    }

    

    static public function certifyId($id) {
        try {
            $sql = 'SELECT programa.cod_prog  FROM programa WHERE programa.cod_prog=  ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT programa.cod_prog,  programa.desc_prog, programa.estado  FROM programa';
            return dataBaseClass::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function NewCausa($Cod, $Desc,$Estado) {
        try {
            $sql = "INSERT INTO programa (cod_prog, desc_prog, estado) VALUES ('$Cod', '$Desc', '$Estado')";
            
            
            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El programa $Cod $Desc   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function updateProgra($id, $data) {
        try {

            $sql = "UPDATE programa SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE cod_prog = " . $id;

            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("El programa no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
          dataBaseClass::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteProgra($id) {
        try {

            $sql = 'DELETE FROM programa WHERE cod_prog = ' . $id;

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