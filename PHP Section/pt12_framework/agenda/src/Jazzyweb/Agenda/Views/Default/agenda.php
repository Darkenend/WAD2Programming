<h2>
    Bienvenido a la agenda
    <small class="text-muted">Citas del día: <?php echo $nCitas ?></small>
</h2>
<p class="lead">Agenda para el día: <?php echo $fecha ?></p>
<?php echo $menu ?>
<hr>
<div class="row">
    <div class="col-sm-8">
        <form action="<?php echo url('/cambiarCita') ?>" method="post">
            <div class="form-group">
                <?php echo $citas ?> 
            </div>
        </form>
    </div>
    <div class="col-sm-4 bg-light">
        <form action="<?php echo url('/nuevaCita') ?>" method="POST">
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="nuevaCita" value="Nueva cita">
            </div>
        </form>
        <form action="<?php echo url('/agenda') ?>" method="POST">
            <input type="date" name="fecha" class="form-control" placeholder="nueva fecha" value="<?php echo $fecha ?>">
            <input type="submit" class="btn btn-secondary" name="cambiarFecha" value="Cambiar Fecha">
        </form>
    </div>
</div>
<hr>