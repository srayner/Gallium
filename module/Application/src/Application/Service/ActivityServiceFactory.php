<?php

namespace Application\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ActivityServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $service = new ActivityService();
        $mapper = $serviceLocator->get('app_activity_mapper');
        $service->setActivityMapper($mapper);
        return $service;
    }
}
