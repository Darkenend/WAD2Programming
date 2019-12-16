<?php
$config = array(
    //sección rutas
    'routes' => array(
                    'inicial' => array(
                        'path' => '/',
                        'controller' => array(
                            'class' => '\Jazzyweb\Agenda\Controller\DefaultController',
                            'action' => 'login'
                        )
                    ),
                    'validar' => array(
                        'path' => '/validar',
                        'controller' => array(
                            'class' => '\Jazzyweb\Agenda\Controller\DefaultController',
                            'action' => 'validar'
                        )
                    ),
                    'agenda' => array(
                        'path' => '/agenda',
                        'controller' => array(
                            'class' => '\Jazzyweb\Agenda\Controller\DefaultController',
                            'action' => 'agenda'
                        )
                    ),
                    'logout' => array(
                        'path' => '/logout',
                        'controller' => array(
                            'class' => '\Jazzyweb\Agenda\Controller\DefaultController',
                            'action' => 'logout'
                        )
                    ),
                    'cambiarCita' => array(
                        'path' => '/cambiarCita',
                        'controller' => array(
                            'class' => '\Jazzyweb\Agenda\Controller\DefaultController',
                            'action' => 'cambiarCita'
                        )
                    ),
                    'borrarCita' => array(
                        'path' => '/borrarCita',
                        'controller' => array(
                            'class' => '\Jazzyweb\Agenda\Controller\DefaultController',
                            'action' => 'borrarCita'
                        )
                    ),
                    'modificarCita' => array(
                        'path' => '/modificarCita',
                        'controller' => array(
                            'class' => '\Jazzyweb\Agenda\Controller\DefaultController',
                            'action' => 'modificarCita'
                        )
                    )
    ),
    //usuarios agenda
    'users' => array(
        'agenda' => array(
            'password' =>'123_agenda_321'
        )
    )
);
