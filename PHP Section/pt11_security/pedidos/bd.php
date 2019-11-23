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
    $bd = new PDO($res[0], $res[1], $res[2]);
    $stmt = $bd->prepare("SELECT `codRes`, `correo` FROM `restaurantes` WHERE `correo` = :nombre and clave = :clave");
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':clave', $clave, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() === 1) return $stmt->fetch();
    else return FALSE;
}

/**
* Lee las categorías de la BD
* @return PDOStatement|Bool Código y nombre de las categorías de la base de datos.
* FALSE en caso de error o no hay categorías.
*/
function cargarCategorias() {
    $res = leerConfig(dirname(__FILE__) . "/configuracion.xml",
    dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    $stmt = $bd->prepare("SELECT `codCat`, `nombre` FROM `categorias`");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result || sizeof($result) === 0) return FALSE;
    else return $result;
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
    $bd = new PDO($res[0], $res[1], $res[2]);
    $stmt = $bd->prepare("SELECT `nombre`, `descripcion` FROM `categorias` WHERE `codCat` = :codcat");
    $stmt->bindParam(":codcat", $codCat, PDO::PARAM_INT);
    $stmt->execute();
    if (!$stmt || $stmt->rowCount() === 0) return FALSE;
    else return $stmt->fetch();
}

/**
* Selecciona todos los campos de todos los productos de una categoria
* @param $codCat código de la categoría
* @return PDOStatement|bool Cursor con sus produtos (todas las columnas de la tabla).
*  FALSE en caso de error de la BD o no existe la categoría o
*  no tiene productos.
*/
function cargarProductosCategoria($codCat) {
    $res = leerConfig(dirname(__FILE__) . "/configuracion.xml",
    dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    $stmt = $bd->prepare("SELECT * FROM `productos` WHERE `categoria` = :codCat");
    $stmt->bindParam(":codCat", $codCat, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$result || sizeof($result) === 0) return false;
    else return $result;
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
    $bd = new PDO($res[0], $res[1], $res[2]);
    $textoIn = implode(",", $codigosProductos);
    $stmt = $bd->prepare("SELECT * FROM `productos` WHERE `codProd` in (:texto)");
    $stmt->bindParam(":texto", $textoIn, PDO::PARAM_STR);
    $stmt->execute();
    $resul = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (!$resul) return FALSE;
    else return $resul;
}

/**
* Inserta un pedido en la BD
* @param $carrito carrito de la compra
* @param int $codRes Código del restaurante que realiza el pedido
* @return int|bool Código del nuevo pedido. FALSE en caso de error
*/
function insertarPedido($carrito, int $codRes) {
    // TODO: Switch to prepare->bind->execute model.
    $res = leerConfig(dirname(__FILE__) . "/configuracion.xml",
    dirname(__FILE__) . "/configuracion.xsd");
    $bd = new PDO($res[0], $res[1], $res[2]);
    
    // Se hace como transacción ya que hay que tocar varias tablas:
    // - pedidos: insertar un pedido
    // - pedidosproductos: insertar los detalles de cada producto
    // - productos: actualizar el nuevo stock
    $bd->beginTransaction();
    
    //Obtener fecha y hora
    $hora = date("Y-m-d H:i:s", time());
    
    //insertar pedido en tabla pedidos
    $sql = "insert into pedidos(fecha, enviado, restaurante)
    values('$hora', 0, $codRes)";
    $resul = $bd->query($sql);
    if (!$resul) {
        return FALSE;
    }
    
    //coger el id del nuevo pedido para las filas detalle
    $pedido = $bd->lastInsertId();
    
    //insertar las filas en pedidoproductos
    foreach($carrito as $codProd=>$unidades) {
        $sql = "insert into pedidosproductos(Pedido, Producto, Unidades)
        values($pedido, $codProd, $unidades)";
        //echo $sql . '<br>'; //debug
        $resul = $bd->query($sql);
        
        //si falla se hace un rollback de la transacción
        if (!$resul) {
            $bd->rollBack();
            return FALSE;
        }
        
        $sql = "update productos
        set stock = stock - $unidades
        where codProd = $codProd";
        $resul = $bd->query($sql);
        
        //si falla se hace un rollback de la transacción
        if (!$resul) {
            $bd->rollBack();
            return FALSE;
        }
        
    }
    // commit de base de datos
    $bd->commit();
    
    // retorna el código del nuevo pedido
    return $pedido;
}

/**
 * Esta funcion devuelve el stock actual de un producto
 * @param int $cod Código del producto
 * @return PDOStatement Stock actual del producto
 */
function getCurrentStock(int $cod) {
    $value = 0;
    try {
        $res = leerConfig(dirname(__FILE__)."/configuracion.xml", dirname(__FILE__)."/configuracion.xsd");
        $bd = new PDO($res[0], $res[1], $res[2]);
        $stmt = $bd->prepare("SELECT `Stock` FROM `productos` WHERE `CodProd` = :COD");
        $stmt->bindParam(':COD', $cod, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        if (!$stmt || $stmt->rowCount() == 0) {
            $value = $stmt->fetch();
        } 
    } catch (PDOException $e) {
        echo "Error con la base de datos: ".$e->getMessage();
    } finally {
        if (isset($bd)) {
            $bd = null;
        }
        return $value;
    }
}