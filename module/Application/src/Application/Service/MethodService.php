<?php

namespace Application\Service;

use Application\Model\Method\MethodMapperInterface;

class MethodService 
{
    /**
     * @var MethodMapperInterface
     */
    protected $methodMapper;
    
    public function deleteMethodById($methodId)
    {
        return $this->methodMapper->deleteMethodById($methodId);
    }
    
    function getMethodMapper()
    {
        return $this->methodMapper;
    }

    function setMethodMapper(MethodMapperInterface $methodMapper)
    {
        $this->methodMapper = $methodMapper;
        return $this;
    }
    
    function getMethods()
    {
        return $this->methodMapper->getMethods();
    }
    
    function getMethodById($id)
    {
        return $this->methodMapper->getMethodById($id);
    }
    
    public function getMethodsByProjectId($projectId)
    {
        return $this->methodMapper->getMethodsByProjectId($projectId);
    }
    
    function persist($method)
    {
        return $this->methodMapper->persist($method);
    }
    
    function cloneMethod($methodId, $projectId)
    {
        $method = $this->methodMapper->getMethodById($methodId);
        $method->setMethodId(null);
        $method->setProjectId($projectId);
        return $this->persist($method);
    }
}