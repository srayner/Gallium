<?php

namespace Application\Model\ProjectSubstance;

interface ProjectSubstanceMapperInterface
{
    public function getProjectSubstances($projectId);
    public function deleteProjectSubstances($projectId);
    public function persistProjectSubstance($projectSubstance);
}