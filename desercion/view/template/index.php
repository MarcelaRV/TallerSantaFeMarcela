<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Gestión de desercion</title>
   <link rel="stylesheet" media="screen" href="css/main.css">
  </head>
  <body>
    <h1>Gestión de Desercion</h1>
    <div id="lnkNuevo">
      <a href="index.php?action=create">Nuevo</a>
      <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
    </div>
    
    <?php if (isset($error)): ?>
      <div class="error"><?php echo $error ?></div>
    <?php endif ?>

    <?php if (isset($success)): ?>
      <div class="success"><?php echo $success ?></div>
    <?php endif ?>
      
    <table id="tblContenido">
      <thead>
        <tr>
          <th>numero documento</th>
          <th>fecha documento</th>
          <th>identificación aprediz</th>
          <th>numero ficha</th>
          <th>codigo causa</th>
          <th>fecha desercion</th>
          <th>fase</th>
          
          <th colspan="2">Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
        <tr>
         <td><?php echo $row['num_doc']; ?></td>
         <td><?php echo $row['fecha_doc']; ?></td>
         <td><?php echo $row['id_apre']; ?></td>
         <td><?php echo $row['num_ficha']; ?></td>
         <td><?php echo $row['cod_causa']; ?></td>
         <td><?php echo $row['fecha_desercion']; ?></td>
         <td><?php echo $row['fase']; ?></td>
       
      
         <td><a href="index.php?action=update&amp;id=<?php echo $row['num_doc'] ?>">Modificar</a></td>
         <td><a  href="index.php?action=delete&amp;id=<?php echo $row['num_doc'] ?>">Eliminar</a></td>
       </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </body>
</html>