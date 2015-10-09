<?php

namespace Application\Model\ProjectSubstance;

use Zend\Stdlib\Hydrator\ClassMethods;

class ProjectSubstanceHydrator extends ClassMethods
{   
    public function extract($object)
    {
        if (!$object instanceof ProjectSubstanceInterface) {
            throw new \InvalidArgumentException('$object must be an instance of ' . __NAMESPACE__ . '\ProjectSubstanceInterface');
        }
        $data = parent::extract($object);
        return $data;
    }
    
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof ProjectSubstanceInterface) {
            throw new \InvalidArgumentException('$object must be an instance of ' . __NAMESPACE__ . '\ProjectSubstanceInterface');
        }       
        return parent::hydrate($data, $object);
    }  
}