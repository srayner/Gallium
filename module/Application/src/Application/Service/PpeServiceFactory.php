<?php

namespace Application\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PpeServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new PpeService();
        $mapper = $serviceLocator->get('app_ppe_mapper');
        $service->setMapper($mapper);
        return $service;
    }   
}