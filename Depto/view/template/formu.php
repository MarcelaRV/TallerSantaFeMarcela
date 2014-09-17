<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
  <div>
    <table>
      <tr>
        <td> codigo depto</td>
        <td><input  type="number" value="<?php echo ((isset($cod_depto)) ? $cod_depto : '') ?>" id="txtcod" name="txtcod"  placeholder="codigo departamento"><br /></td>
      </tr>
      <tr>
        <td> nombre depto</td>
        <td><input type="text" value="<?php echo ((isset($nom_depto)) ? $nom_depto : '') ?>"id="txtnom"name="txtnom" placeholder="nombre departamento" required><br /></td>
      </tr>

      <td><input type="submit" value="Enviar"></td> 
      <td><a type="button" href="index.php">Volver</a></td>
      <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
    </table>

  </div>
</form>
