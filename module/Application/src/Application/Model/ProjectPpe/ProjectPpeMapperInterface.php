<?php

namespace Application\Model\ProjectPpe;

interface ProjectPpeMapperInterface
{
    public function getProjectPpes($projectId);
    public function deleteProjectPpes($projectId);
    public function persistProjectPpe($projectPpe);
}