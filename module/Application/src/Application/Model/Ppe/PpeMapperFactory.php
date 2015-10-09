<?php

namespace Application\Model\Ppe;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PpeMapperFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = new PpeMapper;
        $mapper->setEntityPrototype(new Ppe);
        $mapper->setHydrator(new PpeHydrator);
        return $mapper;
    }
}