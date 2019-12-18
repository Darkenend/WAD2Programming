<div>
    <div>
        <?php echo $menu ?>
    </div>
    <h2>
        La cita ha sido borrada
    </h2>
    <p>
        Cita con la ID <?php echo $_SESSION['idCita']; ?> ha sido borrada, para volver a la agenda, haz click en el botón de abajo.
    </p>
    <form action="<?php echo url('/agenda') ?>" method="post">
        <input type="submit" class="btn btn-info" value="Volver">
    </form>
</div>