<?php

class modelClass {
    
    static public function getFicha() {
        try {
            $sql = 'SELECT Ficha.num_ficha, ficha.cod_prog, ficha.fecha_ini, ficha.fecha_fin, ficha.cod_centro FROM ficha';
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    
    static public function getCentro() {
        try {
            $sql = 'SELECT centro.cod_centro, centro.desc_centro, centro.tel, centro.dir, centro.cod_ciudad FROM centro';
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    
    static public function getPrograma() {
        try {
            $sql = 'SELECT programa.cod_prog, programa.desc_prog, programa.estado FROM programa';
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getRow($id) {
        try {

            $sql = 'SELECT Ficha.num_ficha, ficha.cod_prog, ficha.fecha_ini, ficha.fecha_fin, ficha.cod_centro from ficha WHERE ficha.num_ficha = ' . $id;
            
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;

        }
    }

    

    static public function certifyId($id) {
        try {
            $sql = 'SELECT ficha.num_ficha FROM ficha WHERE ficha.num_ficha = ' . $id;
            return dataBaseClass::getInstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function getAll() {
        try {
            $sql = 'SELECT Ficha.num_ficha, ficha.cod_prog, ficha.fecha_ini, ficha.fecha_fin, ficha.cod_centro from ficha ';
            return dataBaseClass::getinstance()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function NewFicha($Num, $Cod, $FechaIni, $FechaFin, $CodCentro) {
        try {
            $sql = "INSERT INTO ficha (num_ficha, cod_prog, fecha_ini, fecha_fin, cod_centro ) VALUES ('$Num', '$Cod', '$FechaIni', '$FechaFin', '$CodCentro')";
            
            
            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La ficha $Num $Cod $FechaIni   está siendo usado");
            }

            return $rsp;
        } catch (PDOException $e) {
            return $e;
        }
    }

    static public function updateFicha($id, $data) {
        try {

            $sql = "UPDATE ficha SET ";

            foreach ($data as $key => $value) {
                $sql = $sql . " " . $key . " = '" . $value . "', ";
            }

            $newLeng = strlen($sql) - 2;
            $sql = substr($sql, 0, $newLeng);

            $sql = $sql . " WHERE num_ficha = " . $id;

            dataBaseClass::getInstance()->beginTransaction();
            $rsp = dataBaseClass::getInstance()->exec($sql);
            dataBaseClass::getInstance()->commit();

            if ($rsp !== false) {
                $rsp = true;
            } else {
                throw new PDOException("La  ficha no ha podido ser actualizado");
            }
            return $rsp;
        } catch (PDOException $e) {
          dataBaseClass::getInstance()->rollback();
            return $e;
        }
    }

    static public function deleteFicha($id) {
        try {

            $sql = 'DELETE FROM ficha WHERE num_ficha = ' . $id;
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