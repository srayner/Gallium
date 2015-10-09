<?php

namespace Application\Model\Project;

use ZfcBase\Mapper\AbstractDbMapper;
use Application\Service\DbAdapterAwareInterface;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\StdLib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use DateTime;

class ProjectMapper extends AbstractDbMapper implements ProjectMapperInterface, DbAdapterAwareInterface
{
    protected $tableName = 'project';
    
    public function getProjects()
    {
        $select = $this->getSelect();
        return $this->select($select);
    }
    
    public function getProjectById($projectId)
    {
        $select = $this->getSelect()
                       ->where(array('project_id' => $projectId));
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
            $select->where("project_name like '%$search%'");
        }
        $selectString = $sql->buildSqlString($select);
        return (int)$adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE)->current()['cnt'];
    }
    
    public function deleteProjectById($projectId)
    {
        return parent::delete(array('project_id' => $projectId));
    }
    
    public function persistProject(ProjectInterface $project)
    {
        if ($project->getProjectId() > 0) {
            $this->update($project, null, null, new ProjectHydrator);
        } else {
            $this->insert($project, null, new ProjectHydrator);
        }
        return $project;        
    }
    
    public function createMethod($methodStatement)
    {
        return parent::insert($methodStatement, 'method_statement', new ClassMethods());
    }
    
    protected function insert($entity, $tableName = null, HydratorInterface $hydrator = null)
    {
        $entity->setCreatedDate(new DateTime)
               ->setCreatedById(-1);
        $result = parent::insert($entity, $tableName, $hydrator);
        $entity->setProjectId($result->getGeneratedValue());
        return $result;
    }
    
    protected function update($entity, $where = null, $tableName = null, HydratorInterface $hydrator = null)
    {
        $entity->setModifiedDate(new DateTime);
        if (!$where) {
            $where = 'project_id = ' . $entity->getProjectId();
        }
        return parent::update($entity, $where, $tableName, $hydrator);
    }
}