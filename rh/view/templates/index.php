<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión De Rh</title>
        <link rel="stylesheet" media="screen" href="css/main.css">
        
    </head>
    <body>
        <h1>Gestión De Rh</h1>
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
                    <th>Codigo Rh</th>
                    <th>Tipo Rh</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['cod_rh'] ?></td>
                        <td><?php echo $row['desc_rh'] ?></td>


                        <td><a href="index.php?action=update&amp;id=<?php echo $row['cod_rh'] ?>">Modificar</a></td> 
                        <td><a href="index.php?action=delete&amp;id=<?php echo $row['cod_rh'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>