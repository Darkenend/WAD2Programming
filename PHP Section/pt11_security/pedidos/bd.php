<?php
/**
* Función que obtiene los datos necesarios para conectar a la base de datos
* @param $nombre ruta del fichero XML con los datos de conexión a la base de datos
* @param $esquema ruta del fichero XSD para validar el anterior
* @return array Array con 3 valores: La cadena de conexión, el nombre de usuario y la clave.
*/
function leerConfig($nombre, $esquema) {
    $config = new DOMDocument();
    $config->load($nombre);
    $res = $config->schemaValidate($esquema);
    if ($res === FALSE) {
        throw new InvalidArgumentException("Revise el fichero de configuración");
    }
    $datos = simplexml_load_file($nombre);
    $ip = $datos->xpath("//ip");
    $nombre = $datos->xpath("//nombre");
    $usu = $datos->xpath("//usuario");
    $clave = $datos->xpath("//clave");
    $cad = sprintf("mysql:dbname=%s;host=%s", $nombre[0], $ip[0]);
    $resul = [];
    $resul[] = $cad;
    $resul[] = $usu[0];
    $resul[] = $clave[0];
    return $resul;
}

/**
* Función que comprueba los datos del formulario de login
* @param $usuario es un correo
* @param $clave es una clave
* @return Array|Bool Devuelve un array con dos campos: El código del restaurante y su correo. Devuelve FALSE en caso contrario.
*/

function comprobarUsuario($nombre, $clave) {
    // TODO: Convert into Hash password format (Optional)
    $res = leerConfig(dirname(__FILE__) . "/configuracion.xml",
    dirname(__FILE__) . "/configuracion.xsd");
    try {
        $bd = new PDO($res[0], $res[1], $res[2]);
        $stmt = $bd->prepare("SELECT `codRes`, `correo` FROM `restaurantes` WHERE `correo` = :nombre and clave = :clave");
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':clave', $clave, PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() === 1) return $stmt->fetch();
        else return FALSE;
    } catch (PDOException $e) {
        echo "Error al comprobar el usuario:<br>".$e->getMessage();
    } finally {
        if (isset($bd)) {
            $bd = null;
        }
    }
}

/**
* Lee las categorías de la BD
* @return PDOStatement|Bool Código y nombre de las categorías de la base de datos.
* FALSE en caso de error o no hay categorías.
*/
function cargarCategorias() {
    $res = leerConfig(dirname(__FILE__) . "/configuracion.xml",
    dirname(__FILE__) . "/configuracion.xsd");
    try {
        $bd = new PDO($res[0], $res[1], $res[2]);
        $stmt = $bd->prepare("SELECT `codCat`, `nombre` FROM `categorias`");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$result || sizeof($result) === 0) return FALSE;
        else return $result;
    } catch (PDOException $e) {
        echo "Error al cargar categorias:<br>".$e->getMessage();
    } finally {
        if (isset($bd)) {
            $bd = null;
        }
    }
}

/**
* Hace un select de nombre y descripción de la categoría $codCat
* @param $codCat Código de la categoría que se busca
* @return array Nombre y Descripción de la categoría. FALSE en caso de
* error o la categoría no existe.
*/
function cargarCategoria($codCat) {
    $res = leerConfig(dirname(__FILE__) . "/configuracion.xml",
    dirname(__FILE__) . "/configuracion.xsd");
    try {
        $bd = new PDO($res[0], $res[1], $res[2]);
        $stmt = $bd->prepare("SELECT `nombre`, `descripcion` FROM `categorias` WHERE `codCat` = :codcat");
        $stmt->bindParam(":codcat", $codCat, PDO::PARAM_INT);
        $stmt->execute();
        if (!$stmt || $stmt->rowCount() === 0) return FALSE;
        else return $stmt->fetch();
    } catch (PDOException $e) {
        echo "Error al cargar la categoria:<br>".$e->getMessage();
    } finally {
        if (isset($bd)) {
            $bd = null;
        }
    }
}

/**
* Selecciona todos los campos de todos los productos de una categoria
* @param $codCat código de la categoría
* @return PDOStatement|bool Cursor con sus productos (todas las columnas de la tabla).
*  FALSE en caso de error de la BD o no existe la categoría o
*  no tiene productos.
*/
function cargarProductosCategoria($codCat) {
    $res = leerConfig(dirname(__FILE__) . "/configuracion.xml",
    dirname(__FILE__) . "/configuracion.xsd");
    try {
        $bd = new PDO($res[0], $res[1], $res[2]);
        $stmt = $bd->prepare("SELECT * FROM `productos` WHERE `categoria` = :codCat");
        $stmt->bindParam(":codCat", $codCat, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$result || sizeof($result) === 0) return false;
        else return $result;
    } catch (PDOException $e) {
        echo "Error al cargar productos de las categorias:<br>".$e->getMessage();
    } finally {
        if (isset($bd)) {
            $bd = null;
        }
    }
}

/**
* Función que retorna los registros de los productos que están en el carrito
* @param $codigosProductos array de códigos de productos
* @return PDOStatement|bool cursor con todas las columnas de los productos cuyo
* código está en el array. FALSE en caso de error con la BD
*/
function cargarProductos($codigosProductos) {
    $res = leerConfig(dirname(__FILE__) . "/configuracion.xml",
    dirname(__FILE__) . "/configuracion.xsd");
    try{$bd = new PDO($res[0], $res[1], $res[2]);
        $textoIn = implode(",", $codigosProductos);
        $stmt = $bd->prepare("SELECT * FROM `productos` WHERE `codProd` in (:texto)");
        $stmt->bindParam(":texto", $textoIn, PDO::PARAM_STR);
        $stmt->execute();
        $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$resul) return FALSE;
        else return $resul;
    } catch (PDOException $e) {
        echo "Error al cargar productos:<br>".$e->getMessage();
    } finally {
        if (isset($bd)) {
            $bd = null;
        }
    }
}

/**
* Inserta un pedido en la BD
* @param $carrito carrito de la compra
* @param int $codRes Código del restaurante que realiza el pedido
* @return int|bool Código del nuevo pedido. FALSE en caso de error
*/
function insertarPedido($carrito, int $codRes) {
    $res = leerConfig(dirname(__FILE__) . "/configuracion.xml",
    dirname(__FILE__) . "/configuracion.xsd");
    try {
        $bd = new PDO($res[0], $res[1], $res[2]);
        $bd->beginTransaction();
        $hora = date("Y-m-d H:i:s", time());
        $stmt = $bd->prepare("INSERT INTO `pedidos`(`fecha`, `enviado`,`restaurante`) VALUES (:hora, 0, :codRes)");
        $stmt->bindParam(":hora", $hora, PDO::PARAM_STR);
        $stmt->bindParam(":codRes", $codRes, PDO::PARAM_INT);
        $resul = $stmt->execute();
        if (!$resul) {
            return FALSE;
        }
        $pedido = $bd->lastInsertId();
        foreach($carrito as $codProd=>$unidades) {
            $stmt = $bd->prepare("INSERT INTO `pedidosproductos`(`Pedido`, `Producto`, `Unidades`) VALUES (:pedido, :codProd, :unidades)");
            $stmt->bindParam(":pedido", $pedido, PDO::PARAM_INT);
            $stmt->bindParam(":codProd", $codProd, PDO::PARAM_INT);
            $stmt->bindParam(":unidades", $unidades, PDO::PARAM_INT);
            $resul = $stmt->execute();
            if (!$resul) {
                $bd->rollBack();
                return FALSE;
            }
            $stmt = $bd->prepare("UPDATE `productos` SET `STOCK`=`STOCK`-:unidades WHERE `codProd` = :codProd");
            $stmt->bindParam(":unidades", $unidades, PDO::PARAM_INT);
            $stmt->bindParam(":codProd", $codProd, PDO::PARAM_INT);
            $resul = $stmt->execute();
            if (!$resul) {
                $bd->rollBack();
                return FALSE;
            }
        }
        $bd->commit();
        return $pedido;
    } catch (PDOException $e) {
        echo "Error al procesar el pedido:<br>".$e->getMessage();
    } finally {
        if (isset($bd)) {
            $bd = null;
        }
    }
}