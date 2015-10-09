<?php

namespace Application\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProjectSubstanceServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new ProjectSubstanceService();
        $mapper = $serviceLocator->get('app_project_substance_mapper');
        $service->setProjectSubstanceMapper($mapper);
        return $service;
    }   
}