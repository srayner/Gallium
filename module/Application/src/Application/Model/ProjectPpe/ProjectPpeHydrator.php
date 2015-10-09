<?php

namespace Application\Model\ProjectPpe;

use Zend\Stdlib\Hydrator\ClassMethods;

class ProjectPpeHydrator extends ClassMethods
{   
    public function extract($object)
    {
        if (!$object instanceof ProjectPpeInterface) {
            throw new \InvalidArgumentException('$object must be an instance of ' . __NAMESPACE__ . '\ProjectPpeInterface');
        }
        $data = parent::extract($object);
        return $data;
    }
    
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof ProjectPpeInterface) {
            throw new \InvalidArgumentException('$object must be an instance of ' . __NAMESPACE__ . '\ProjectPpeInterface');
        }       
        return parent::hydrate($data, $object);
    }  
}