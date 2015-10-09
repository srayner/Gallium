<?php

namespace Application\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProjectServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new ProjectService();
        $mapper = $serviceLocator->get('app_project_mapper');
        $service->setProjectMapper($mapper);
        $service->setServiceLocator($serviceLocator);
        return $service;
    }   
}