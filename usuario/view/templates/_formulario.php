<form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">
  <div>
    <div>
      <div class="floatLeft">
        <label for="txtUsuario">Usuario</label>
      </div>
      <div>
        <input type="text" value="<?php echo ((isset($txtUsuario)) ? $txtUsuario : '') ?>" id="txtUsuario" name="txtUsuario" required min="5" max="20">
      </div>
    </div>
    <div>
      <div class="floatLeft">
        <label for="txtPassword1">Contraseña</label>
      </div>
      <div>
        <input type="password" value="" id="txtPassword1" name="txtPassword1" <?php echo ($_GET['action'] === 'update') ? '' : 'required' ?> min="5" max="20">
      </div>
    </div>
    <div>
      <div class="floatLeft">
        <label for="txtPassword2">Repetir contraseña</label>
      </div>
      <div>
        <input type="password" value="" id="txtPassword2" name="txtPassword2" <?php echo ($_GET['action'] === 'update') ? '' : 'required' ?> min="5" max="20">
      </div>
    </div>
    <div>
      <div class="floatLeft">
        <label>Activado</label>
      </div>
      <div>
        <input type="radio" name="rdoActivado" id="rdoActivadoSi" value="true" <?php echo ((isset($rdoActivado)) ? (($rdoActivado === 'true') ? 'checked' : '') : '') ?> required> Si
        <input type="radio" name="rdoActivado" id="rdoActivadoNo" value="false" <?php echo ((isset($rdoActivado)) ? (($rdoActivado === 'false') ? 'checked' : '') : '') ?> required> No
      </div>
    </div>
  </div>
  <div>
    <a href="index.php">Volver</a>
    <button type="submit">Registrar</button>
    <td><a href="/mitaller" title="Regresar al inicio">Home</a></td>
  </div>
</form>