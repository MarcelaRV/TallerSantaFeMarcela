<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
  <div>
    <table>
      <tr>
        <td> codigo Causa</td>
        <td><input  type="number" value="<?php echo ((isset($cod_causa)) ? $cod_causa : '') ?>" id="txtcod" name="txtcod"><br /></td>
      </tr>
      <tr>
        <td> Causas Desercion</td>
        <td><input type="text" value="<?php echo ((isset($desc_causa)) ? $desc_causa : '') ?>"id="txtnom"name="txtnom"  required><br /></td>
      </tr>
      <tr>
        <td> Estado</td>
        <td><input type="text" value="<?php echo ((isset($estado)) ? $estado : '') ?>"id="txtes"name="txtes"  required><br /></td>
      </tr>

      <td><input type="submit" value="Enviar"> 
      <td>
        <a type="button" href="index.php">Volver</a>
        <a href="/mitaller" title="Regresar al inicio">Home</a>
        <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
      </td>
    </table>
  </div>
</form>
