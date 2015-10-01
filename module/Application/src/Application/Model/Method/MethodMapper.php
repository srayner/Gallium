<?php

namespace Application\Model\Method;

use ZfcBase\Mapper\AbstractDbMapper;
use Application\Service\DbAdapterAwareInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Db\Sql\Sql;

class MethodMapper extends AbstractDbMapper implements MethodMapperInterface, DbAdapterAwareInterface
{
    protected $tableName = 'method';
    
    public function getMethods()
    {
        $select = $this->getSelect();
        return $this->select($select);
    }
    
    public function getMethodById($methodId)
    {
        $select = $this->getSelect()
                       ->where(array('method_id' => $methodId));
        return $this->select($select)->current();
    }
    
    public function getMethodsByMethodCategoryId($methodCategoryId)
    {
        $select = $this->getSelect()
                       ->where(array('method_category_id' => $methodCategoryId));
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
            $select->where("header like '%$search%'");
        }
        $selectString = $sql->buildSqlString($select);
        return (int)$adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE)->current()['cnt'];
    }
    
    public function persist(MethodInterface $method)
    {
        if ($method->getMethodId() > 0) {
            $this->update($method, null, null, new MethodHydrator);
        } else {
            $this->insert($method, null, new MethodHydrator);
        }
        return $method;        
    }
    
    protected function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $result = parent::insert($entity, $tableName, $hydrator);
        $entity->setMethodId($result->getGeneratedValue());
        return $result;
    }
    
    protected function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        if (!$where) {
            $where = 'method_id = ' . $entity->getMethodId();
        }
        return parent::update($entity, $where, $tableName, $hydrator);
    }
}