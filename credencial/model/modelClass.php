<?php

class modelClass {

    static public function getCredencial() {
        try {
            $sql = 'SELECT credencial.id, credencial.nombre FROM credencial';
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getRow($id) {
        try {

            $sql = 'SELECT * from credencial WHERE credencial.id = ' . $id;

            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function certifyId($id) {
        try {
            $sql = 'SELECT credencial.id FROM credencial WHERE credencial.id = ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT * from credencial ';
            return dataBaseClass::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function NewCredencial($Id, $Nombre) {
        try {
            $sql = "INSERT INTO credencial (id, nombre ) VALUES ('$Id', '$Nombre')";


            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La credencial $Id $Nombre   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function updateCredencial($id, $data) {
        try {

            $sql = "UPDATE credencial SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE id = " . $id;

            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La credencial no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
          dataBaseClass::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteCredencial($id) {
        try {

            $sql = 'DELETE FROM credencial WHERE id = ' . $id;

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