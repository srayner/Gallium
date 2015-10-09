<?php

namespace Application\Model\Activity;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ActivityMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new ActivityMapper;
        $mapper->setEntityPrototype($serviceLocator->get('app_activity'));
        $mapper->setHydrator($serviceLocator->get('app_activity_hydrator'));
        return $mapper;
    }
}