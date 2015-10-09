<?php

namespace Application\Form;

use Application\Model\Activity\ActivityHydrator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ActivityFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new ActivityForm();
        $form->setInputFilter(new ActivityFilter());
        $form->setHydrator(new ActivityHydrator());
        return $form;
    }   
}