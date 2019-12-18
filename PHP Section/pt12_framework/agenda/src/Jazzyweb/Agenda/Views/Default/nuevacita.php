<div>
    <div>
        <?php echo $menu ?>
    </div>
    <form action="<?php echo url('/crearCita') ?>" method="post">
        <legend>
            Creacion de Cita
        </legend>
        <fieldset>
            <label for="fecha">Fecha de Cita</label>
            <input type="date" name="fecha" id="fecha" placeholder="nueva fecha" value="<?php echo $fecha ?>"><br>
            <label for="hora">Hora de Cita</label>
            <input type="time" name="hora" id="hora"><br>
            <label for="asunto">Asunto</label>
            <input type="text" name="asunto" id="asunto"><br>
            <input type="submit" name="cambiarFecha" value="Crear Cita">
        </fieldset>
    </form>
    <form action="<?php echo url('/agenda') ?>" method="post">
        <input type="submit" value="Cancelar y volver a la Agenda">
    </form>
</div>