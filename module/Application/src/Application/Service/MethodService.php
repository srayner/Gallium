<?php

namespace Application\Service;
        
class MethodService 
{
    /**
     * @var MethodMapperInterface
     */
    protected $methodMapper;
    
    function getMethodMapper()
    {
        return $this->methodMapper;
    }

    function setMethodMapper(MethodMapperInterface $methodMapper)
    {
        $this->methodMapper = $methodMapper;
        return $this;
    }
    
    function persist($method)
    {
        return $this->methodMapper->persist($method);
    }
}