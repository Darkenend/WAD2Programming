<div>
    <div>
        <?php echo $menu ?>
    </div>
    <h2> Bienvenido a la agenda </h2>
    <p>Citas del día: <?php echo $nCitas ?></p>
    <p>Agenda para el día: <?php echo $fecha ?></p>
    <hr>
    <form action="<?php echo url('/cambiarCita') ?>" method="post">
        <div>
            <?php echo $citas ?> 
        </div>
    </form>
    <hr>
    <form action="<?php echo url('/nuevaCita') ?>" method="POST">
        <input type="submit" name="nuevaCita" value="Nueva cita">
    </form>
    <form action="<?php echo url('/agenda') ?>" method="POST">
        <input type="date" name="fecha" placeholder="nueva fecha" value="<?php echo $fecha ?>">
        <input type="submit" name="cambiarFecha" value="cambiar fecha">
    </form> 
</div>