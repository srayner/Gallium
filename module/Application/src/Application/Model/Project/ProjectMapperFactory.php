<?php

namespace Application\Model\Project;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProjectMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new ProjectMapper;
        $mapper->setEntityPrototype($serviceLocator->get('app_project'));
        $mapper->setHydrator($serviceLocator->get('app_project_hydrator'));
        return $mapper;
    }
}