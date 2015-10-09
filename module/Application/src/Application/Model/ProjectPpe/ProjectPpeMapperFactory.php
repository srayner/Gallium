<?php

namespace Application\Model\ProjectPpe;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProjectPpeMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new ProjectPpeMapper;
        $mapper->setEntityPrototype(new ProjectPpe);
        $mapper->setHydrator(new ProjectPpeHydrator);
        return $mapper;
    }
}