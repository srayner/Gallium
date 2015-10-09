<?php

namespace Application\Model\ProjectSubstance;

interface ProjectSubstanceInterface
{
    function getProjectId();
    function getSubstanceId();
    function setProjectId($projectId);
    function setSubstanceId($substanceId);
}

