<?php

namespace Application\Model\Activity;

use DateTime;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\Sql\Sql;
use ZfcBase\Mapper\AbstractDbMapper;
use Application\Service\DbAdapterAwareInterface;

class ActivityMapper extends AbstractDbMapper implements ActivityMapperInterface, DbAdapterAwareInterface
{
    protected $tableName = 'activity';
    
    public function getActivities()
    {
        $select = $this->getSelect();
        return $this->select($select);
    }
    
    public function getActivityById($activityId)
    {
        $select = $this->getSelect()
                       ->where(array('activity_id' => $activityId));
        return $this->select($select)->current();
    }
    
    public function count($search = null)
    {
        $adapter = $this->getDbAdapter();
        $sql = new Sql($adapter);
        $select = $sql->select();
        $select->columns(array('cnt' => new \Zend\Db\Sql\Expression('COUNT(*)')))
                ->from($this->tableName);
        if ($search){
            $select->where("activity like '%$search%'");
        }
        $selectString = $sql->buildSqlString($select);
        return (int)$adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE)->current()['cnt'];
    }
    
    public function persistActivity(ActivityInterface $activity)
    {
        if ($activity->getActivityId() > 0) {
            $this->update($activity, null, null, new ActivityHydrator);
        } else {
            $this->insert($activity, null, new ActivityHydrator);
        }
        return $activity;        
    }
    
    protected function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $entity->setCreatedDate(new DateTime)
               ->setCreatedById(-1);
        $result = parent::insert($entity, $tableName, $hydrator);
        $entity->setActivityId($result->getGeneratedValue());
        return $result;
    }
    
    protected function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        $entity->setModifiedDate(new DateTime);
        if (!$where) {
            $where = 'activity_id = ' . $entity->getActivityId();
        }
        return parent::update($entity, $where, $tableName, $hydrator);
    }
}