<?php

namespace Application\Form;

use Application\Model\Substance\SubstanceHydrator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SubstanceFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new SubstanceForm();
        $form->setInputFilter(new SubstanceFilter());
        $form->setHydrator(new SubstanceHydrator());
        return $form;
    }   
}