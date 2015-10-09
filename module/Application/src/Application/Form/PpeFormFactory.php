<?php

namespace Application\Form;

use Application\Model\Ppe\PpeHydrator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PpeFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new PpeForm();
        $form->setInputFilter(new PpeFilter());
        $form->setHydrator(new PpeHydrator());
        return $form;
    }   
}