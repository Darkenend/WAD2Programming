<div>
    <div>
        <?php echo $menu ?>
    </div>
    <h2>
        La cita ha sido creada
    </h2>
    <p>
        Ha sido creada satisfactoriamente una cita, haz clic en el boton de abajo para volver a la agenda.
    </p>
    <form action="<?php echo url('/agenda') ?>" method="post">
        <input type="submit" class="btn btn-info" value="Volver">
    </form>
</div>