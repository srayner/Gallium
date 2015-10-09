<?php

namespace Application\Model\Project;

interface ProjectMapperInterface
{
    public function count($search = null);
    public function deleteProjectById($projectId);
    public function getProjects();
    public function getProjectById($projectId);
    public function persistProject(ProjectInterface $project);
}