<?php

namespace Application\Model\Substance;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SubstanceMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new SubstanceMapper;
        $mapper->setEntityPrototype(new Substance);
        $mapper->setHydrator(new SubstanceHydrator);
        return $mapper;
    }
}