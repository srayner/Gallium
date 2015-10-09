<?php

namespace Application\Model\Activity;

interface ActivityInterface
{
    function getActivityId();
    function getActivity();
    function getHazard();
    function getRiskSeverity();
    function getRiskProbability();
    function getRisk();
    function getControlMeasures();
    function getFinalRiskSeverity();
    function getFinalRiskProbability();
    function getFinalRisk();
    function getPersonAtRisk();
    function getCreatedById();
    function getCreatedDate();
    function getModifiedById();
    function getModifiedDate();
    function setActivityId($activityId);
    function setActivity($activity);
    function setHazard($hazard);
    function setRiskSeverity($riskSeverity);
    function setRiskProbability($riskProbability);
    function setControlMeasures($controlMeasures);
    function setFinalRiskSeverity($finalRiskSeverity);
    function setFinalRiskProbability($finalRiskProbability);
    function setPersonAtRisk($personAtRisk);
    function setCreatedById($createdById);
    function setCreatedDate($createdDate);
    function setModifiedById($modifiedById);
    function setModifiedDate($modifiedDate);  
}