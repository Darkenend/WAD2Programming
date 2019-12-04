<?php
$config = array(
    //sección rutas
    'routes' => array(
                    'homepage' => array(
                       'path' => '',
                       'controller' => array(
                           'class' => '\Jazzyweb\Bioritmos\Controller\DefaultController',
                           'action' => 'index'
                       )
                    ),
                    'homepageSlash' => array(
                       'path' => '/',
                       'controller' => array(
                           'class' => '\Jazzyweb\Bioritmos\Controller\DefaultController',
                           'action' => 'index'
                       )
                    ),
                    'bioritmo' => array(
                        'path' => '/bioritmo',
                        'controller' => array(
                            'class' => '\Jazzyweb\Bioritmos\Controller\DefaultController',
                            'action' => 'bioritmo'
                        )
                    ),
                    'bioritmoSlash' => array(
                        'path' => '/bioritmo/',
                        'controller' => array(
                            'class' => '\Jazzyweb\Bioritmos\Controller\DefaultController',
                            'action' => 'bioritmo'
                        )
                    )
    )
    //otras secciones
);
