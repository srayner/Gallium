<?php

namespace Application\Service;

class ActivityService
{
    protected $activityMapper;
    
    function getActivityMapper()
    {
        return $this->activityMapper;
    }

    function setActivityMapper($activityMapper)
    {
        $this->activityMapper = $activityMapper;
        return $this;
    }

    public function getActivities()
    {
        return $this->activityMapper->getActivities();
    }
    
    public function getActivityById($activityId)
    {
        return $this->activityMapper->getActivityById($activityId);   
    }
    
    public function persistActivity($activity)
    {
        $this->activityMapper->persistActivity($activity);
    }
}
