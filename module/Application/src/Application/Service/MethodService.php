<?php

namespace Application\Service;

use Application\Model\Method\MethodMapperInterface;

class MethodService 
{
    /**
     * @var MethodMapperInterface
     */
    protected $mapper;
    
    public function deleteMethodById($methodId)
    {
        return $this->mapper->deleteMethodById($methodId);
    }
    
    function getMethodMapper()
    {
        return $this->mapper;
    }

    function setMethodMapper(MethodMapperInterface $methodMapper)
    {
        $this->mapper = $methodMapper;
        return $this;
    }
    
    function getMethods()
    {
        return $this->mapper->getMethods();
    }
    
    function getMethodById($id)
    {
        return $this->mapper->getMethodById($id);
    }
    
    public function getMethodsByProjectId($projectId)
    {
        return $this->mapper->getMethodsByProjectId($projectId);
    }
    
    function persist($method)
    {
        return $this->mapper->persist($method);
    }
    
    public function deleteByProjectId($projectId)
    {
        return $this->mapper->deleteByProjectId($projectId);
    }
    
    function cloneMethod($methodId, $projectId)
    {
        $method = $this->mapper->getMethodById($methodId);
        $method->setMethodId(null);
        $method->setProjectId($projectId);
        $method->setTemplate(FALSE);
        return $this->persist($method);
    }
}