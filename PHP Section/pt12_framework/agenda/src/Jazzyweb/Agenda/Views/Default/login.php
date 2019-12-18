<div>
    <h4>Welcome to <small>Agenda</small></h4>
</div>
<div>
    <h4><?php echo $errorLogin ?></h4>
        <form action="<?php echo url('/validar') ?>" method="post">
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="usuario" value="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="contraseña" value="">
            </div>
            <input type="submit" class="btn btn-primary" value="Ver citas de hoy">
        </form>
</div>