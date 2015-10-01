<?php

namespace Application\Form;

use Application\Model\Method\MethodHydrator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class MethodFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new MethodForm();
        $form->setInputFilter(new MethodFilter());
        $form->setHydrator(new MethodHydrator());
        return $form;
    }   
}