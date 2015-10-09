<?php

namespace Application\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SubstanceServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new SubstanceService();
        $mapper = $serviceLocator->get('app_substance_mapper');
        $service->setMapper($mapper);
        return $service;
    }   
}