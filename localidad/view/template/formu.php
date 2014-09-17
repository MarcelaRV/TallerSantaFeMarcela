<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
        <td> id</td>
        <input  type="number" value="<?php echo ((isset($id)) ? $id : '') ?>" id="txtId" name="txtId"  placeholder=" ingrese identificacion"><br />
        <td> nombre </td>
        <input type="text" value="<?php echo ((isset($nombre)) ? $nombre : '') ?>"id="txtNombre"name="txtNombre" placeholder="ingrese nombre" required><br />
        <td> localidad </td>
        <input type="text" value="<?php echo ((isset($localidad_id)) ? $localidad_id : '') ?>"id="txtlocaId"name="txtLocaId" placeholder="ingrese localidad" required><br />


        <input type="submit" value="Enviar"> 
           <td><a type="button" href="index.php">Volver</a></td>
           <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>

    </div>
</form>
