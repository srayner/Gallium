<?php

namespace Application\Model\ProjectPpe;

interface ProjectPpeInterface
{
    public function getProjectId();
    public function getPpeId();
    public function setProjectId($projectId);
    public function setPpeId($ppeId);
}