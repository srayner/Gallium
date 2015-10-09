<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

return array(
    'router' => array(
        'routes' => array(
            
            // test route
            'pdf' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/pdf',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'pdf',
                    ),
                ),
            ),
            
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => ':controller[/:action[/:id]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index'     => 'Application\Controller\IndexController',
            'Application\Controller\Method'    => 'Application\Controller\MethodController',
            'Application\Controller\Project'   => 'Application\Controller\ProjectController',
            'Application\Controller\Activity'  => 'Application\Controller\ActivityController',
            'Application\Controller\Substance' => 'Application\Controller\SubstanceController',
            'Application\Controller\Ppe'       => 'Application\Controller\PpeController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    
    //Service manager config.
    'service_manager' => array (
        'invokables' => array(
            'app_activity'            => 'Application\Model\Activity\Activity',
            'app_activity_hydrator'   => 'Application\Model\Activity\ActivityHydrator',
            'app_method'              => 'Application\Model\Method\Method',
            'app_method_hydrator'     => 'Application\Model\Method\MethodHydrator',
            'app_ppe'                 => 'Application\Model\Ppe\Ppe',
            'app_ppe_hydrator'        => 'Application\Model\Ppe\PpeHydrator',
            'app_project'             => 'Application\Model\Project\Project',
            'app_project_hydrator'    => 'Application\Model\Project\ProjectHydrator',
            'app_project_substance'   => 'Application\Model\ProjectSubstance\ProjectSubstance',
            'app_project_ppe'         => 'Application\Model\ProjectPpe\ProjectPpe',
            'app_substance'           => 'Application\Model\Substance\Substance',
            'app_substance_hydrator'  => 'Application\Model\Substance\SubstanceHydrator',
            'pdf_service'             => 'Application\Service\PDF',
            
        ),
        'factories' => array(
            'app_activity_form'              => 'Application\Form\ActivityFormFactory',
            'app_activity_mapper'            => 'Application\Model\Activity\ActivityMapperFactory',
            'app_activity_service'           => 'Application\Service\ActivityServiceFactory',
            'app_method_form'                => 'Application\Form\MethodFormFactory',
            'app_method_mapper'              => 'Application\Model\Method\MethodMapperFactory',
            'app_method_service'             => 'Application\Service\MethodServiceFactory',
            'app_ppe_form'                   => 'Application\Form\PpeFormFactory',
            'app_ppe_mapper'                 => 'Application\Model\Ppe\PpeMapperFactory',
            'app_ppe_service'                => 'Application\Service\PpeServiceFactory',
            'app_project_form'               => 'Application\Form\ProjectFormFactory',
            'app_project_mapper'             => 'Application\Model\Project\ProjectMapperFactory',
            'app_project_service'            => 'Application\Service\ProjectServiceFactory',
            'app_project_substance_mapper'   => 'Application\Model\ProjectSubstance\ProjectSubstanceMapperFactory',
            'app_project_substance_service'  => 'Application\Service\ProjectSubstanceServiceFactory',
            'app_project_ppe_mapper'         => 'Application\Model\ProjectPpe\ProjectPpeMapperFactory',
            'app_project_ppe_service'        => 'Application\Service\ProjectPpeServiceFactory',
            'app_substance_form'             => 'Application\Form\SubstanceFormFactory',
            'app_substance_mapper'           => 'Application\Model\Substance\SubstanceMapperFactory',
            'app_substance_service'          => 'Application\Service\SubstanceServiceFactory',
        ),
    ),
    
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    
    
);
