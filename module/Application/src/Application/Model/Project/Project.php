<?php

namespace Application\Model\Project;

class Project implements ProjectInterface
{
    protected $projectId;
    protected $projectName;
    protected $projectRef;
    protected $clientName;
    protected $principleContractor;
    protected $locationOfWorks;
    protected $startDate;
    protected $endDate;
    protected $siteAddress1;
    protected $siteAddress2;
    protected $siteAddress3;
    protected $siteAddress4;
    protected $postCode;
    protected $siteSupervisorName;
    protected $siteSupervisorPhone;
    protected $createdById;
    protected $createdDate;
    protected $modifiedById;
    protected $modifiedDate;
 
    function getProjectId()
    {
        return $this->projectId;
    }

    function getProjectName()
    {
        return $this->projectName;
    }

    function getProjectRef()
    {
        return $this->projectRef;
    }

    function getClientName()
    {
        return $this->clientName;
    }

    function getPrincipleContractor()
    {
        return $this->principleContractor;
    }

    function getLocationOfWorks()
    {
        return $this->locationOfWorks;
    }

    function getStartDate()
    {
        return $this->startDate;
    }

    function getEndDate()
    {
        return $this->endDate;
    }

    function getSiteAddress1()
    {
        return $this->siteAddress1;
    }

    function getSiteAddress2()
    {
        return $this->siteAddress2;
    }

    function getSiteAddress3()
    {
        return $this->siteAddress3;
    }

    function getSiteAddress4()
    {
        return $this->siteAddress4;
    }

    function getPostCode()
    {
        return $this->postCode;
    }

    function getSiteSupervisorName()
    {
        return $this->siteSupervisorName;
    }

    function getSiteSupervisorPhone()
    {
        return $this->siteSupervisorPhone;
    }

    function getCreatedById()
    {
        return $this->createdById;
    }

    function getCreatedDate()
    {
        return $this->createdDate;
    }

    function getModifiedById()
    {
        return $this->modifiedById;
    }
    
    function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    function setProjectId($projectId)
    {
        $this->projectId = $projectId;
        return $this;
    }

    function setProjectName($projectName)
    {
        $this->projectName = $projectName;
        return $this;
    }

    function setProjectRef($projectRef)
    {
        $this->projectRef = $projectRef;
        return $this;
    }

    function setClientName($clientName)
    {
        $this->clientName = $clientName;
        return $this;
    }

    function setPrincipleContractor($principleContractor)
    {
        $this->principleContractor = $principleContractor;
        return $this;
    }

    function setLocationOfWorks($locationOfWorks)
    {
        $this->locationOfWorks = $locationOfWorks;
        return $this;
    }

    function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    function setSiteAddress1($siteAddress1)
    {
        $this->siteAddress1 = $siteAddress1;
        return $this;
    }

    function setSiteAddress2($siteAddress2)
    {
        $this->siteAddress2 = $siteAddress2;
        return $this;
    }

    function setSiteAddress3($siteAddress3)
    {
        $this->siteAddress3 = $siteAddress3;
        return $this;
    }

    function setSiteAddress4($siteAddress4)
    {
        $this->siteAddress4 = $siteAddress4;
        return $this;
    }

    function setPostCode($postCode)
    {
        $this->postCode = $postCode;
        return $this;
    }

    function setSiteSupervisorName($siteSupervisorName)
    {
        $this->siteSupervisorName = $siteSupervisorName;
        return $this;
    }

    function setSiteSupervisorPhone($siteSupervisorPhone)
    {
        $this->siteSupervisorPhone = $siteSupervisorPhone;
        return $this;
    }

    function setCreatedById($createdById)
    {
        $this->createdById = $createdById;
        return $this;
    }

    function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    function setModifiedById($modifiedById)
    {
        $this->modifiedById = $modifiedById;
        return $this;
    }
    
    function setModifiedDate($modifiedDate)
    {
        $this->modifiedDate = $modifiedDate;
        return $this;
    }
}