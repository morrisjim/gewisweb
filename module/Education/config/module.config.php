<?php
return array(
    'router' => array(
        'routes' => array(
            'education' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/education',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Education\Controller',
                        'controller'    => 'Education',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '[/:action]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Education\Controller\Education' => 'Education\Controller\EducationController',
            'Education\Controller\Oase' => 'Education\Controller\OaseController'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'education' => __DIR__ . '/../view/'
        )
    ),
    'doctrine' => array(
        'driver' => array(
            'education_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Education/Model/')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Education\Model' => 'education_entities'
                )
            )
        )
    ),
    // console routes
    'console' => array(
        'router' => array(
            'routes' => array(
                'oase' => array(
                    'options' => array(
                        'route' => 'oase update',
                        'defaults' => array(
                            'controller' => 'Education\Controller\Oase',
                            'action' => 'index'
                        )
                    )
                ),
                'oase-show-studies' => array(
                    'options' => array(
                        'route' => 'oase show studies',
                        'defaults' => array(
                            'controller' => 'Education\Controller\Oase',
                            'action' => 'studies'
                        )
                    )
                )
            )
        )
    )
);
