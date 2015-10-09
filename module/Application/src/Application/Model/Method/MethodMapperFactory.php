<?php

namespace Application\Model\Method;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MethodMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new MethodMapper;
        $mapper->setEntityPrototype($serviceLocator->get('app_method'));
        $mapper->setHydrator($serviceLocator->get('app_method_hydrator'));
        return $mapper;
    }
}