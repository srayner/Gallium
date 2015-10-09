<?php

namespace Application\Model\Method;

use Zend\Stdlib\Hydrator\ClassMethods;
use Application\Model\Method\MethodInterface;

class MethodHydrator extends ClassMethods
{
    public function extract($object)
    {
        if (!$object instanceof MethodInterface) {
            throw new \InvalidArgumentException('$object must be an instance of Application\Model\Method\MethodInterface');
        }
        $data = parent::extract($object);
        
        return $data;
    }
    
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof MethodInterface) {
            throw new \InvalidArgumentException('$object must be an instance of Application\Model\Method\MethodInterface');
        }       
        return parent::hydrate($data, $object);
    }  
}
