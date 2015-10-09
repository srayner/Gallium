<?php

namespace Application\Form;

use Application\Model\Project\ProjectHydrator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProjectFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new ProjectForm();
        $form->setInputFilter(new ProjectFilter());
        $form->setHydrator(new ProjectHydrator('d/m/Y'));
        return $form;
    }   
}