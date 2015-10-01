<?php

namespace Application\Model\MethodCategory;

use Zend\Stdlib\Hydrator\ClassMethods;

class MethodCategoryHydrator extends ClassMethods
{
    public function extract($object)
    {
        if (!$object instanceof MethodCategoryInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance of Application\Model\Method\MethodCategoryInterface');
        }
        $data = parent::extract($object);
        if ($data['created']) {
            $data['created'] = $data['created']->format('Y-m-d H:i:s');
        }
        if ($data['modified']) {
            $data['modified'] = $data['modified']->format('Y-m-d H:i:s');
        }
        return $data;
    }
    
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof MethodCategoryInterface) {
            throw new Exception\InvalidArgumentException('$object must be an instance of Application\Model\Method\MethodCategoryInterface');
        }       
        return parent::hydrate($data, $object);
    }  
}