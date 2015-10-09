<?php

namespace Application\Model\Substance;

use ZfcBase\Mapper\AbstractDbMapper;
use Application\Service\DbAdapterAwareInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\Sql\Sql;

class SubstanceMapper extends AbstractDbMapper implements SubstanceMapperInterface, DbAdapterAwareInterface
{
    protected $tableName = 'substance';
    
    public function deleteSubstanceById($substanceId)
    {
        return parent::delete(array('substance_id' => $substanceId));
    }
    
    public function getSubstances()
    {
        $select = $this->getSelect();
        return $this->select($select);
    }
    
    public function getSubstanceById($substanceId)
    {
        $select = $this->getSelect()
                       ->where(array('substance_id' => $substanceId));
        return $this->select($select)->current();
    }
    
    public function getSubstancesByProjectId($projectId)
    {
        $select = $this->getSelect()
                       ->join('project_substance', 'substance.substance_id = project_substance.substance_id')
                       ->where(array('project_substance.project_id' => $projectId));
        return $this->select($select);
    }
    
    public function persist(SubstanceInterface $substance)
    {
        if ($substance->getSubstanceId() > 0) {
            $this->update($substance, null, null, new SubstanceHydrator);
        } else {
            $this->insert($substance, null, new SubstanceHydrator);
        }
        return $substance;        
    }
    
    protected function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $result = parent::insert($entity, $tableName, $hydrator);
        $entity->setSubstanceId($result->getGeneratedValue());
        return $result;
    }
    
    protected function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        if (!$where) {
            $where = 'substance_id = ' . $entity->getSubstanceId();
        }
        return parent::update($entity, $where, $tableName, $hydrator);
    }
}
