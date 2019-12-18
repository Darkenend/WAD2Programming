
<form>
    <div>
        <?php echo $menu ?>
    </div>
    <form action="<?php echo url('/endModificar') ?>" method="post">
        <legend>
            Modificacion de Cita <?php echo $_SESSION['idCita'] ?>
        </legend>
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $_SESSION['idCita']; ?>">
            <div class="form-group row">
                <label for="fecha" class="col-sm-2 col-form-label">
                    Fecha de Cita
                </label>
                <div class="col-sm-10">
                    <input type="date" name="fecha" id="fecha" class="form-control" placeholder="nueva fecha" value="<?php echo $fecha ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="hora" class="col-sm-2 col-form-label">Hora de Cita</label>
                <div class="col-sm-10">
                    <input type="time" name="hora" id="hora" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="asunto" class="col-sm-2 col-form-label">
                    Asunto
                </label>
                <div class="col-sm-10">
                    <input type="text" name="asunto" id="asunto" class="form-control">
                </div>
            </div>
            <input type="submit" class="btn btn-success" name="cambiarFecha" value="Modificar Cita">
        </fieldset>
    </form>
    <hr>
    <form action="<?php echo url('/agenda') ?>" method="post">
        <input type="submit" class="btn btn-danger" value="Cancelar y volver a la Agenda">
    </form>
</div>