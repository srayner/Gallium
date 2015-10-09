<?php

namespace Application\Model\Activity;

interface ActivityMapperInterface
{
    public function getActivities();
    public function getActivityById($activityId);
    public function persistActivity(ActivityInterface $activity);
    public function count($search = null);
}