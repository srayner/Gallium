<?php

namespace Application\Service;

use Application\Model\Project\ProjectMapperInterface;
use Application\Model\MethodStatement\MethodStatement;

class ProjectService 
{
    protected $serviceLocator;
    
    /**
     * @var ProjectMapperInterface
     */
    protected $projectMapper;
    
    function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    function setServiceLocator($serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }

    function getProjectMapper()
    {
        return $this->projectMapper;
    }

    function setProjectMapper(ProjectMapperInterface $projectMapper)
    {
        $this->projectMapper = $projectMapper;
        return $this;
    }
    
    public function getProjects()
    {
        return $this->projectMapper->getProjects();
    }
    
    public function getProjectById($projectId)
    {
        return $this->projectMapper->getProjectById($projectId);
    }
    
    public function persistProject($project)
    {
        return $this->projectMapper->persistProject($project);
    }
    
    public function count($search = null)
    {
        return $this->projectMapper->count($search);
    }
    
    public function deleteProjectById($projectId)
    {
        return $this->projectMapper->deleteProjectById($projectId);
    }
    
    public function createMethods($methodIds, $projectId)
    {
        $service = $this->serviceLocator->get('app_method_service');
        $service->deleteByProjectId($projectId);
        foreach($methodIds as $methodId)
        {
            $service->cloneMethod($methodId, $projectId);
        }
        return $this;
    }
    
    public function createSubstances($substanceIds, $projectId)
    {
        $service = $this->serviceLocator->get('app_project_substance_service');
        $service->deleteProjectSubstances($projectId);
        foreach($substanceIds as $substanceId)
        {
            $projectSubstance = $this->serviceLocator->get('app_project_substance');
            $projectSubstance->setProjectId($projectId)
                             ->setSubstanceId($substanceId);
            $service->persistProjectSubstance($projectSubstance);
        }
        return $this;
    }
    
    public function createPpes($ppeIds, $projectId)
    {
        $service = $this->serviceLocator->get('app_project_ppe_service');
        $service->deleteProjectPpes($projectId);
        foreach($ppeIds as $ppeId)
        {
            $projectPpe = $this->serviceLocator->get('app_project_ppe');
            $projectPpe->setProjectId($projectId)
                       ->setPpeId($ppeId);
            $service->persistProjectPpe($projectPpe);
        }
        return $this;
    }
}