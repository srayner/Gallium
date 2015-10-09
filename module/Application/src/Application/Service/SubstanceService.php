<?php

namespace Application\Service;

class SubstanceService
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
    
    public function getSubstances()
    {
        return $this->mapper->getSubstances();
    }
    
    public function persist($substance)
    {
        return $this->mapper->persist($substance);
    }
    
    public function getSubstanceById($substanceId)
    {
        return $this->mapper->getSubstanceById($substanceId);
    }
    
    public function deleteSubstanceById($substanceId)
    {
        return $this->mapper->deleteSubstanceById($substanceId);
    }
    
    public function getSubstancesByProjectId($projectId)
    {
        return $this->mapper->getSubstancesByProjectId($projectId);
    }
   
}


