<?php

namespace Application\Model\ProjectSubstance;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProjectSubstanceMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new ProjectSubstanceMapper;
        $mapper->setEntityPrototype(new ProjectSubstance);
        $mapper->setHydrator(new ProjectSubstanceHydrator);
        return $mapper;
    }
}