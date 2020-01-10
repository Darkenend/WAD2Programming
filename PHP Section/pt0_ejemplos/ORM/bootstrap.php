<?php
// bootstrap.php
// Include Composer Autoload (relative to project root).
require_once "../../../vendor/autoload.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
$paths = array("./src");
$isDevMode = true;
// configuración de la base de datos
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'admin.doctrine',
    'password' => '123_admin.doctrine_321',
    'dbname'   => 'doctrine',
	'host' => 'localhost',
);
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($dbParams, $config);