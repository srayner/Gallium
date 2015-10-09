<?php

namespace Application\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProjectPpeServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new ProjectPpeService();
        $mapper = $serviceLocator->get('app_project_ppe_mapper');
        $service->setProjectPpeMapper($mapper);
        return $service;
    }   
}