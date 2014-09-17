    <form action="<?php echo $formAction ?>" method="POST" nom="formu">
      <div>
        <table>
        <tr>
            <td>Tipo documento</td>
            <td><select  id="txtTypeId"name="txtTypeId"required>
               <option value="">---Seleccionar---</option>
            <?php foreach ($ti as $dato): ?>
        <option value="<?php echo $dato['cod_tipo_id'] ?>"><?php echo $dato['desc_tipo_id'] ?></option>
        <?php endforeach ?></td>
            </select></td>
          </tr>
          <tr>
            <td> Numero Identificacion</td>
            <td><input value="<?php echo ((isset($txtId)) ? $txtId : '') ?>"type="number"  id="txtId" name="txtId" required min="5"  placeholder="Identificacion del Aprendiz"></td>
          </tr>
          <tr>
            <td> Nombres Completos</td>
            <td><input type="text" value="<?php echo ((isset($txtName)) ? $txtName : '') ?>" id="txtName"name="txtName" placeholder="ingresar nombre" required></td>
          </tr>
          <tr>
            <td> Apellidos Completos</td>
            <td><input type="text" id="txtLastName"name="txtLastName" placeholder="ingresar apellido" required></td>
          </tr>
          <tr>
            <td> Telefono</td>
            <td><input type="number" id="txtPhone"name="txtPhone" placeholder="telefono" required></td>
          </tr>
          <tr>
            <td> Ciudad</td>
          <td><select id="txtCity"name="txtCity"required>
              <option value="">---Seleccionar---</option>
            <?php foreach ($ciudad as $dato): ?>
        <option value="<?php echo $dato['cod_ciudad'] ?>"><?php echo $dato['nom_ciudad'] ?></option>
        <?php endforeach ?></td>
          </select>
             </tr>
          <tr>
            <td>Rh</td>
            <td><select id="txtRh"name="txtRh"required>
              <option value="">---Seleccionar---</option>
              <?php foreach ($rh as $dato): ?>
        <option value="<?php echo $dato['cod_rh'] ?>"><?php echo $dato['desc_rh'] ?></option>
        <?php endforeach ?></td>
            </select></td>
          </tr>
          <tr>
            <td> Genero</td>
            <td><select id="txtGender"name="txtGender">
              <option value="">---Seleccionar---</option>
              <option value="F">Femenino</option>
              <option value="M">Maculino</option>
            </select></td>
          </tr>
          <tr>
            <td> Edad</td>
            <td><input type="text" id="txtAge"name="txtAge" placeholder="edad" required><br /></td>
          </tr>
          <tr>
          <td><input type="submit" value="Enviar"> </td>
          <td><a type="button" href="index.php">Volver</a></td>
          <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
          </tr>
        </table>
      </div>
    </form>


