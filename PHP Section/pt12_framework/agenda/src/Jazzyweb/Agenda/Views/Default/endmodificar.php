<div>
    <div>
        <?php echo $menu ?>
    </div>
    <h2>
        La cita ha sido modificada
    </h2>
    <p>
        La cita con la ID <?php echo $_SESSION['idCita']; ?> ha sido modificada, haz clic en el boton de abajo para volver a la agenda.
    </p>
    <form action="<?php echo url('/agenda') ?>" method="post">
        <input type="submit" class="btn btn-info" value="Volver">
    </form>
</div>