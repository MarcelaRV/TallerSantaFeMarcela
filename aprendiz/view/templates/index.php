<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Gestión De Aprendiz</title>
    <link rel="stylesheet" media="screen" href="css/main.css">
  </head>
  <body>
    <h1>Gestión De Aprendiz</h1>
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
          <th>Id Aprendiz</th>
          <th>Nombre Aprendiz</th>
          <th>Apellido Aprendiz</th>
          <th>Telefono Aprendiz</th>
          <th>Codigo Ciudad Aprendiz</th>
          <th>Codigo Tipo Id Aprendiz</th>
          <th>Genero</th>
          <th>Edad</th>
          <th>Modificar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>
            <td><?php echo $row['id_apre'] ?></td>
            <td><?php echo $row['nom_apre'] ?></td>
            <td><?php echo $row['apell_apre'] ?></td>
            <td><?php echo $row['tel_apre'] ?></td>
            <td><?php echo $row['cod_ciudad'] ?></td>
            <td><?php echo $row['cod_tipo_id'] ?></td>
            <td><?php echo $row['genero'] ?></td>
            <td><?php echo $row['edad'] ?></td>
           
           <td><a href="index.php?action=update&amp;id=<?php echo $row['id_apre'] ?>">Modificar</a></td> 
           <td><a href="index.php?action=delete&amp;id=<?php echo $row['id_apre'] ?>">Eliminar</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </body>
</html>