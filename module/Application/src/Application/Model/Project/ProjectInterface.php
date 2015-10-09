<?php

namespace Application\Model\Project;

interface ProjectInterface
{
    public function getProjectId();
    public function getProjectName();
    public function getProjectRef();
    public function getClientName();
    public function getPrincipleContractor();
    public function getLocationOfWorks();
    public function getStartDate();
    public function getEndDate();
    public function getSiteAddress1();
    public function getSiteAddress2();
    public function getSiteAddress3();
    public function getSiteAddress4();
    public function getPostCode();
    public function getSiteSupervisorName();
    public function getSiteSupervisorPhone();
    public function getCreatedById();
    public function getCreatedDate();
    public function getModifiedById();
    public function getModifiedDate();
    public function setProjectId($projectId);
    public function setProjectName($projectName);
    public function setProjectRef($projectRef);
    public function setClientName($clientName);
    public function setPrincipleContractor($principleContractor);
    public function setLocationOfWorks($locationOfWorks);
    public function setStartDate($startDate);
    public function setEndDate($endDate);
    public function setSiteAddress1($siteAddress1);
    public function setSiteAddress2($siteAddress2);
    public function setSiteAddress3($siteAddress3);
    public function setSiteAddress4($siteAddress4);
    public function setPostCode($postCode);
    public function setSiteSupervisorName($siteSupervisorName);
    public function setSiteSupervisorPhone($siteSupervisorPhone);
    public function setCreatedById($createdById);
    public function setCreatedDate($createdDate);
    public function setModifiedById($modifiedById);
    public function setModifiedDate($modifiedDate);
}
