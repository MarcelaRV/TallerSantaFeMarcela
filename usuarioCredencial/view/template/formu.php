<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
    <td> identificacion</td>
    <input  type="number" value="<?php echo ((isset($id))? $id: '')?>" id="txtId" name="txtId"  placeholder="ingresa identificacion"><br />
    <td> usuario</td>
    <input type="number" value="<?php echo ((isset($usuario_id))? $usuario_id: '')?>"id="txtUsuario"name="txtUsuario" placeholder="ingresa usuario " required><br />
    <td>Credencial</td>
            <td><select  id="txtCredeId" name="txtCredeId"required>
               <option value="">---Seleccionar---</option>
            <?php foreach ($credencial as $dato): ?>
        <option value="<?php echo $dato['id'] ?>"><?php echo $dato['nombre'] ?></option>
        <?php endforeach ?></td>
            </select></td>
    
            <td><input type="submit" value="Enviar"> </td>
    <td><a type="button" href="index.php">Volver</a></td>
    <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
    </div>
</form>
