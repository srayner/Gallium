<?php

namespace Application\Model\ProjectPpe;

class ProjectPpe implements ProjectPpeInterface
{
    protected $projectId;
    protected $PpeId;
    
    public function getProjectId()
    {
        return $this->projectId;
    }

    public function getPpeId()
    {
        return $this->PpeId;
    }

    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
        return $this;
    }

    public function setPpeId($PpeId)
    {
        $this->PpeId = $PpeId;
        return $this;
    }
}

