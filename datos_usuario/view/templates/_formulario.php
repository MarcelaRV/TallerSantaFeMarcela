    <form action="<?php echo $formAction ?>" method="POST" nom="formu">
      <div>
        <table>
        <tr>
          <tr>
            <td> Id</td>
            <td><input value="<?php echo ((isset($txtId)) ? $txtId : '') ?>"type="number"  id="txtId" name="txtId" required min="5"  placeholder="Identificacion del Aprendiz"></td>
          </tr>
            <td>Identificacion Usuario</td>
            <td><select  id="txtIdUser"name="txtIdUser"required>
               <option value="">---Seleccionar---</option>
            <?php foreach ($idUser as $dato): ?>
        <option value="<?php echo $dato['id'] ?>"><?php echo $dato['usuario'] ?></option>
        <?php endforeach ?></td>
            </select></td>
          </tr>
          <tr>
            <td> Numbre</td>
            <td><input value="<?php echo ((isset($txtId)) ? $txtId : '') ?>"type="text"  id="txtName" name="txtName" required min="5"  placeholder="Identificacion del Aprendiz"></td>
          </tr>
          <tr>
            <td> Apellido</td>
            <td><input type="text" value="<?php echo ((isset($txtLastName)) ? $txtLastName : '') ?>" id="txtLastName"name="txtLastName" placeholder="ingresar nombre" required></td>
          </tr>
          <tr>
            <td> Direccion</td>
            <td><input type="text" id="txtDir"name="txtDir" placeholder="ingresar Direccion" required></td>
          </tr>
          <tr>
            <td> Telefono</td>
            <td><input type="number" id="txtTel"name="txtTel" placeholder="telefono" required></td>
          </tr>
          <tr>
            <td>Id Localida</td>
          <td><select id="txtLocalidad" name="txtLocalidad"required>
              <option value="">---Seleccionar---</option>
            <?php foreach ($Localidad as $dato):?>
        <option value="<?php echo $dato['id'] ?>"><?php echo $dato['nombre'] ?></option>
        <?php endforeach ?></td>
          </select>
             </tr>
         
          <td><input type="submit" value="Enviar"> </td>
          <td><a type="button" href="index.php">Volver</a></td>
          <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
        </table>
      </div>
    </form>


