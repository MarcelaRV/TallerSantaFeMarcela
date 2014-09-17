<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
    <td> numero ficha</td>
    <input  type="number" value="<?php echo ((isset($num_ficha))? $num_ficha: '')?>" id="txtNum" name="txtNum"  placeholder="numero ficha"><br />
    <td> identificacion </td>
    <input type="number" value="<?php echo ((isset($id_apre))? $id_apre: '')?>"id="txtId"name="txtId" placeholder="identificacion del aprendiz" required><br />
    <td> estado </td>
    <input type="number" value="<?php echo ((isset($estado))? $estado: '')?>"id="txtEstado"name="txtEstado" placeholder="estado" required><br />
    

    <input type="submit" value="Enviar"> 
        <td><a type="button" href="index.php">Volver</a></td>
        <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
       

    </div>
</form>
