<?php

namespace Application\Service;

use Application\Model\ProjectPpe\ProjectPpeMapperInterface;

class ProjectPpeService 
{   
    /**
     * @var ProjectPpeMapperInterface
     */
    protected $mapper;
    
    public function getProjectPpeeMapper()
    {
        return $this->mapper;
    }

    public function setProjectPpeMapper(ProjectPpeMapperInterface $projectPpeMapper)
    {
        $this->mapper = $projectPpeMapper;
        return $this;
    }

    public function getProjectPpes($projectId)
    {
        return $this->mapper->getProjectPpes($projectId);
    }
    
    public function deleteProjectPpes($projectId)
    {
        return $this->mapper->deleteProjectPpes($projectId);
    }
    
    public function persistProjectPpe($projectPpe)
    {
        return $this->mapper->persistProjectPpe($projectPpe);
    }
}
