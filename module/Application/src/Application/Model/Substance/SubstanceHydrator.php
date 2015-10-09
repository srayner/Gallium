<?php

namespace Application\Model\Substance;

use Zend\Stdlib\Hydrator\ClassMethods;

class SubstanceHydrator extends ClassMethods
{
    public function extract($object)
    {
        if (!$object instanceof SubstanceInterface) {
            throw new \InvalidArgumentException('$object must be an instance of ' . __NAMESPACE__ . '\SubstanceInterface');
        }
        $data = parent::extract($object);
        return $data;
    }
    
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof SubstanceInterface) {
            throw new \InvalidArgumentException('$object must be an instance of ' . __NAMESPACE__ . '\SubstanceInterface');
        }       
        return parent::hydrate($data, $object);
    }  
}