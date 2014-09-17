<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
  <div>
    <td> codigo Centro</td>
    <input  type="number" value="<?php echo ((isset($cod_centro)) ? $cod_centro : '') ?>" id="txtcod" name="txtcod"  placeholder="codigo centro"><br />
    <td> Centro</td>
    <input type="text" value="<?php echo ((isset($desc_centro)) ? $desc_centro : '') ?>"id="txtDesc"name="txtDesc" placeholder="centro" required><br />
    <td> Ciudad</td>
    <td><select id="txtCity"name="txtCity"required>
        <option value="<?php echo ((isset($cod_ciudad)) ? $cod_ciudad : '') ?>">---Seleccionar---</option>
        <?php foreach ($ciudad as $dato): ?>
          <option value="<?php echo $dato['cod_ciudad'] ?>"><?php echo $dato['nom_ciudad'] ?></option>
      <?php endforeach ?></td>
    </select>
      <div>
      <td>Direccion</td>
    <input  type="text" value="<?php echo ((isset($dir)) ? $dir : '') ?>" id="txtdir" name="txtdir"  placeholder="direccion"><br/>
  </div>
    <td> Telefono</td>
    <input type="text" value="<?php echo ((isset($tel)) ? $tel : '') ?>"id="txttel" name="txttel" placeholder="telefono" required><br />

    <input type="submit" value="Enviar"> 
    <td><a type="button" href="index.php">Volver</a></td>
    <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
  </div>
</form>
