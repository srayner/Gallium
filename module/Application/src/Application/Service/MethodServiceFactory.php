<?php

namespace Application\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MethodServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new MethodService();
        $mapper = $serviceLocator->get('app_method_mapper');
        $service->setMethodMapper($mapper);
        return $service;
    }   
}