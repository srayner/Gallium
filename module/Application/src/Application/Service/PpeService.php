<?php

namespace Application\Service;

class PpeService
{
    protected $mapper;
    
    public function getMapper()
    {
        return $this->mapper;
    }

    public function setMapper($mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }
    
    public function getPpes()
    {
        return $this->mapper->getPpes();
    }
    
    public function persist($ppe)
    {
        return $this->mapper->persist($ppe);
    }
    
    public function getPpeById($ppeId)
    {
        return $this->mapper->getPpeById($ppeId);
    }
    
    public function deletePpeById($ppeId)
    {
        return $this->mapper->deletePpeById($ppeId);
    }
   
}
