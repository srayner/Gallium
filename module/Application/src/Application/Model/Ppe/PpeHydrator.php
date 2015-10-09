<?php

namespace Application\Model\Ppe;

use Zend\Stdlib\Hydrator\ClassMethods;

class PpeHydrator extends ClassMethods
{
    public function extract($object)
    {
        if (!$object instanceof PpeInterface) {
            throw new \InvalidArgumentException('$object must be an instance of ' . __NAMESPACE__ . '\PpeInterface');
        }
        $data = parent::extract($object);
        return $data;
    }
    
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof PpeInterface) {
            throw new \InvalidArgumentException('$object must be an instance of ' . __NAMESPACE__ . '\PpeInterface');
        }       
        return parent::hydrate($data, $object);
    }  
}