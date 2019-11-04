<html>
    <body>
        <?php
            //======================================================================
            // PROCESAR IMAGENES 
            //======================================================================
            // Comprobamos si nos llega los datos por POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Iteramos todos los archivos
                foreach ($_FILES["imagen"]["error"] as $posicion => $error) {
                    // Comprobamos si se ha subido correctamente
                    if ($error == UPLOAD_ERR_OK) {
                        // Definir directorio donde se guardará
                        $dir_subida = './subidos/';
                        // Definir la ruta final del archivo
                        $fichero_subido = $dir_subida . basename($_FILES['imagen']['name'][$posicion]);
                        // Mueve el archivo de la carpeta temporal a la ruta definida
                        if (move_uploaded_file($_FILES['imagen']['tmp_name'][$posicion], $fichero_subido)) {
                            // Mensaje de confirmación donde todo ha ido bien
                            echo '<p>Se subió perfectamente' . $_FILES['imagen']['name'][$posicion] . '.</p>';
                            // Muestra la imagen que acaba de ser subida
                            echo '<p><img width="500" src="' . $fichero_subido . '"></p>';
                        } else {
                            // Mensaje de error: ¿Límite de tamaño? ¿Ataque?
                            echo '<p>¡Ups! Algo ha pasado.</p>';
                        }
                    }
                }
            }
        ?>
        <!-- Formulario -->
        <form method="post" enctype="multipart/form-data">
            <p>
                <!-- Campos de imágenes -->
                <input type="file" name="imagen[]">
                <input type="file" name="imagen[]">
                <input type="file" name="imagen[]">
            </p>
            <p>
                <!-- Botón submit -->
                <input type="submit" value="Enviar">
            </p>
        </form>
    </body>
</html>
