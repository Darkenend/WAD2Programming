<div>
    <h4>Welcome to <small>Agenda</small></h4>
</div>
<div>
    <h4><?php echo $errorLogin ?></h4>
        <form action="<?php echo url('/validar') ?>" method="post">
            <div>
                <input type="text" name="usuario" placeholder="usuario" value="">
            </div>
            <div>
                <input type="password" name="password" placeholder="contraseña" value="">
            </div>
            <div>
                <input type="submit" value="Ver citas de hoy">
            </div>
        </form>
</div>