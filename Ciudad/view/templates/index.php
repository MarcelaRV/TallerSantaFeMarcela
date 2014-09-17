<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Gestión De Ciudad</title>
        <link rel="stylesheet" media="screen" href="css/main.css">
    </head>
    <body>
        <h1>Gestión De Ciudad</h1>
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
                    <th>Codigo Ciudad</th>
                    <th>Nonmbre Ciudad</th>
                    <th>Codigo Departamento</th>
                    <th>Habitantes</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $row): ?>
                    <tr>
                        <td><?php echo $row['cod_ciudad'] ?></td>
                        <td><?php echo $row['nom_ciudad'] ?></td>
                        <td><?php echo $row['cod_depto'] ?></td>
                        <td><?php echo $row['habitantes'] ?></td>

                        <td><a href="index.php?action=update&amp;id=<?php echo $row['cod_ciudad'] ?>">Modificar</a></td> 
                        <td><a href="index.php?action=delete&amp;id=<?php echo $row['cod_ciudad'] ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </body>
</html>