<?php

namespace Application\Service;

use Application\Model\ProjectSubstance\ProjectSubstanceMapperInterface;

class ProjectSubstanceService 
{   
    /**
     * @var ProjectSubstanceMapperInterface
     */
    protected $projectSubstanceMapper;
    
    public function getProjectSubstanceMapper()
    {
        return $this->projectSubstanceMapper;
    }

    public function setProjectSubstanceMapper(ProjectSubstanceMapperInterface $projectSubstanceMapper)
    {
        $this->projectSubstanceMapper = $projectSubstanceMapper;
        return $this;
    }

    public function getProjectSubstances($projectId)
    {
        return $this->projectSubstanceMapper->getProjectSubstance($projectId);
    }
    
    public function deleteProjectSubstances($projectId)
    {
        return $this->projectSubstanceMapper->deleteProjectSubstances($projectId);
    }
    
    public function persistProjectSubstance($projectSubstance)
    {
        return $this->projectSubstanceMapper->persistProjectSubstance($projectSubstance);
    }
}
