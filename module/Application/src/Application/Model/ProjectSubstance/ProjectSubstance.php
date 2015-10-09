<?php

namespace Application\Model\ProjectSubstance;

class ProjectSubstance implements ProjectSubstanceInterface
{
    protected $projectId;
    protected $substanceId;
    
    function getProjectId()
    {
        return $this->projectId;
    }

    function getSubstanceId()
    {
        return $this->substanceId;
    }

    function setProjectId($projectId)
    {
        $this->projectId = $projectId;
        return $this;
    }

    function setSubstanceId($substanceId)
    {
        $this->substanceId = $substanceId;
        return $this;
    }
}

