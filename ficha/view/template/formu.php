<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
  <div>
    <td> numero ficha</td>
    <input  type="number" value="<?php echo ((isset($num_ficha)) ? $num_ficha : '') ?>" id="txtNum" name="txtNum"  placeholder="numero ficha"><br />
    <td> programa </td>
    <select id="txtcod" name="txtcod" required>
      <option value="">---Seleccionar---</option>
      <?php foreach ($programa as $dato): ?>
        <option value="<?php echo $dato['cod_prog'] ?>" selected><?php echo $dato['desc_prog'] ?></option>           
      <?php endforeach ?>
    </select><br />
    <td> fecha inicion </td>
    <input type="date" value="<?php echo ((isset($fecha_ini)) ? $fecha_ini : '') ?>"id="txtFechaIni"name="txtFechaIni" placeholder="fecha inicio" required><br />
    <td> fecha fin </td>
    <input type="date" value="<?php echo ((isset($fecha_fin)) ? $fecha_fin : '') ?>"id="txtFechaFin"name="txtFechaFin" placeholder="fecha fin" required><br />
    <td> centro </td>
    <select id="txtCentro" name="txtCentro" required>
      <option value="">---Seleccionar---</option>
      <?php foreach ($centro as $dato): ?>
        <option value="<?php echo $dato['cod_centro'] ?>" selected><?php echo $dato['desc_centro'] ?></option>           
      <?php endforeach ?>
    </select><br />

    <input type="submit" value="Enviar"> 
    <td><a type="button" href="index.php">Volver</a></td>
    <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>

  </div>
</form>
