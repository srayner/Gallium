<?php

namespace Application\Model\Ppe;

use ZfcBase\Mapper\AbstractDbMapper;
use Application\Service\DbAdapterAwareInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\Sql\Sql;

class PpeMapper extends AbstractDbMapper implements PpeMapperInterface, DbAdapterAwareInterface
{
    protected $tableName = 'ppe';
    
    public function deletePPeById($ppeId)
    {
        return parent::delete(array('ppe_id' => $ppeId));
    }
    
    public function getPpes()
    {
        $select = $this->getSelect();
        return $this->select($select);
    }
    
    public function getPpeById($ppeId)
    {
        $select = $this->getSelect()
                       ->where(array('ppe_id' => $ppeId));
        return $this->select($select)->current();
    }
    
    public function persist(PpeInterface $ppe)
    {
        if ($ppe->getPpeId() > 0) {
            $this->update($ppe, null, null, new PpeHydrator);
        } else {
            $this->insert($ppe, null, new PpeHydrator);
        }
        return $ppe;        
    }
    
    protected function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $result = parent::insert($entity, $tableName, $hydrator);
        $entity->setPpeId($result->getGeneratedValue());
        return $result;
    }
    
    protected function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        if (!$where) {
            $where = 'ppe_id = ' . $entity->getPpeId();
        }
        return parent::update($entity, $where, $tableName, $hydrator);
    }
}
