<div>
    <div>
        <?php echo $menu ?>
    </div>
    <form action="<?php echo url('/crearCita') ?>" method="post">
        <legend>
            Creacion de Cita
        </legend>
        <fieldset>
            <div class="form-group row">
                <label for="fecha" class="col-sm-2 col-form-label">
                    Fecha de Cita
                </label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="fecha" id="fecha" placeholder="nueva fecha" value="<?php echo $fecha ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="hora" class="col-sm-2 col-form-label">
                    Hora de Cita
                </label>
                <div class="col-sm-10">
                    <input type="time" class="form-control" name="hora" id="hora">
                </div>
            </div>
            <div class="form-group row">
                <label for="asunto" class="col-sm-2 col-form-label">
                    Asunto
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="asunto" id="asunto">
                </div>
            </div>
            <input type="submit" class="btn btn-success" name="cambiarFecha" value="Crear Cita">
        </fieldset>
    </form>
    <hr>
    <form action="<?php echo url('/agenda') ?>" method="post">
        <input type="submit" class="btn btn-danger" value="Cancelar y volver a la Agenda">
    </form>
</div>