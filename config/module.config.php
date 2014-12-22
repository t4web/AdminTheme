<?php

return array(

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
        'template_map' => array(
            'partial/navigation' => __DIR__ . '/../view/partial/navigation.phtml'
        ),
    ),


    'router' => array(
        'routes' => array(
            'admin-dashboard' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/admin/dashboard',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Admin\Controller\Admin',
                        'controller'    => 'Dashboard',
                        'action'        => 'default',
                    ),
                ),
            ),
            'admin-default' => array(
                'type' => 'Literal',
                'options' => array(
                    'route'    => '/admin',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Admin\Controller\Admin',
                        'controller'    => 'Phpinfo',
                        'action'        => 'default',
                    ),
                ),
            ),
        ),
    ),

);
