<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
    <td> programa</td>
    <input  type="number" value="<?php echo ((isset($cod_prog))? $cod_prog: '')?>" id="txtCod" name="txtCod"><br />
    <td> Descripcion programa</td>
    <input type="text" value="<?php echo ((isset($desc_prog))? $desc_prog: '')?>"id="txtDesc"name="txtDesc"  required><br />
    <td> Estado</td>
    <input type="text" value="<?php echo ((isset($estado))? $estado: '')?>"id="txtEs"name="txtEs"  required><br />
    

    <input type="submit" value="Enviar"> 
    <td><a type="button" href="index.php">Volver</a></td>
    <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
    </div>
</form>
