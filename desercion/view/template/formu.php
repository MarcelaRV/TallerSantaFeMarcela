  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
    <div>
    <td> Numero Documento</td>
    <input  type="number" value="<?php echo ((isset($num_doc))? $num_doc: '')?>" id="txtNum" name="txtNum"  placeholder="Numero Documento"><br />
    <td> Fecha Documento</td>
    <input type="date" value="<?php echo ((isset($fecha_doc))? $fecha_doc: '')?>"id="txtFecha"name="txtFecha" placeholder="Fecha Documento " required><br />
    <td> identificacion</td>
    <select id="txtId" name="txtId" required>
   <option value="">---Seleccionar---</option>
       <?php foreach ($aprendiz as $dato): ?>
         <option value="<?php echo $dato['id_apre'] ?>" selected><?php echo $dato['id_apre'] ?></option>           
          <?php endforeach ?>
        </select><br />
    <td> Numero Ficha</td>
    <select id="txFicha" name="txtFicha" required>
        <option value="">---Seleccionar---</option>
        <?php foreach ($ficha as $dato): ?>
        <option value="<?php echo $dato['num_ficha'] ?>" selected><?php echo $dato['num_ficha'] ?></option>
        <?php endforeach ?>
    </select><br />
    <td> codigo causa</td>
   <input type="number"value="<?php echo ((isset($cod_causa))? $cod_causa: '')?>" id="txtCod" name="txtCod" placeholder="ingresar causa" required><br />
     
    <td>fecha Desercion</td>
       <input type="date" value="<?php echo ((isset($fecha_deser))? $fecha_deser: '')?>"id="txtFechaDeser"name="txtFechaDeser" placeholder="Fecha Desercion " required><br />
    <td>fase</td>
     <input type="text"value="<?php echo ((isset($fase))? $fase: '')?>" id="txtFase" name="txtFase" placeholder="ingresar fase" required><br />
   
    
    <input type="submit" value="Enviar"> 
        <td><a type="button" href="index.php">Volver</a></td>
        <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>

    </div>
</form>
