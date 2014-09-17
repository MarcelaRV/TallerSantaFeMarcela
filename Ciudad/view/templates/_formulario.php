    <form action="<?php echo $formAction ?>" method="POST" nom="formu">
      <div>
        <table>
            <tr>
            <td> Codigo Ciudad</td>
            <td><input type="number" id="codCity"name="codCity"required></td>
              </tr>
             <tr>
            <td> Ciudad</td>
            <td><input type="text" id="nameCity"name="nameCity"required></td>
            </tr>
             <tr>
            <td> Departamento</td>
          <td><select id="txtDepto"name="txtDepto"required>
              <option value="">---Seleccionar---</option>
            <?php foreach ($depto as $dato): ?>
        <option value="<?php echo $dato['cod_depto'] ?>"><?php echo $dato['nom_depto'] ?></option>
        <?php endforeach ?></td>
          </select>
             </tr>
             <tr>
            <td> Habitantes</td>
            <td><input  type="number" id="txtHabi"name="txtHabi"required></td>
             </tr>
          <td><input type="submit" value="Enviar"> </td>
          <td><a type="button" href="index.php">Volver</a></td>
          <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
        </table>
      </div>
    </form>


