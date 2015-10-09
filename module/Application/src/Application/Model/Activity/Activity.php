<?php

namespace Application\Model\Activity;

class Activity implements ActivityInterface
{
    protected $activityId;
    protected $activity;
    protected $hazard;
    protected $riskSeverity;
    protected $riskProbability;
    protected $controlMeasures;
    protected $finalRiskSeverity;
    protected $finalRiskProbability;
    protected $personAtRisk;
    protected $createdById;
    protected $createdDate;
    protected $modifiedById;
    protected $modifiedDate;
    
    function getActivityId()
    {
        return $this->activityId;
    }

    function getActivity()
    {
        return $this->activity;
    }

    function getHazard()
    {
        return $this->hazard;
    }

    function getRiskSeverity()
    {
        return $this->riskSeverity;
    }

    function getRiskProbability()
    {
        return $this->riskProbability;
    }
    
    function getRisk()
    {
        if (($this->riskSeverity != null) && ($this->riskProbability != null)) {
          return $this->riskSeverity * $this->riskProbability;
        }
        return null;
    }

    function getControlMeasures()
    {
        return $this->controlMeasures;
    }

    function getFinalRiskSeverity()
    {
        return $this->finalRiskSeverity;
    }

    function getFinalRiskProbability()
    {
        return $this->finalRiskProbability;
    }
    
    function getFinalRisk()
    {
        if (($this->finalRiskSeverity != null) && ($this->finalRiskProbability != null)) {
            return $this->finalRiskSeverity * $this->finalRiskProbability;
        }
        return null;
    }

    function getPersonAtRisk()
    {
        return $this->personAtRisk;
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

    function setActivityId($activityId)
    {
        $this->activityId = $activityId;
        return $this;
    }

    function setActivity($activity)
    {
        $this->activity = $activity;
        return $this;
    }

    function setHazard($hazard)
    {
        $this->hazard = $hazard;
        return $this;
    }

    function setRiskSeverity($riskSeverity)
    {
        $this->riskSeverity = $riskSeverity;
        return $this;
    }

    function setRiskProbability($riskProbability)
    {
        $this->riskProbability = $riskProbability;
        return $this;
    }

    function setControlMeasures($controlMeasures)
    {
        $this->controlMeasures = $controlMeasures;
        return $this;
    }

    function setFinalRiskSeverity($finalRiskSeverity)
    {
        $this->finalRiskSeverity = $finalRiskSeverity;
        return $this;
    }

    function setFinalRiskProbability($finalRiskProbability)
    {
        $this->finalRiskProbability = $finalRiskProbability;
        return $this;
    }

    function setPersonAtRisk($personAtRisk)
    {
        $this->personAtRisk = $personAtRisk;
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