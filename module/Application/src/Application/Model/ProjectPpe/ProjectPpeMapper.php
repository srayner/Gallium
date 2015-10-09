<?php

namespace Application\Model\ProjectPpe;

use ZfcBase\Mapper\AbstractDbMapper;
use Application\Service\DbAdapterAwareInterface;

class ProjectPpeMapper extends AbstractDbMapper implements ProjectPpeMapperInterface, DbAdapterAwareInterface
{
    protected $tableName = 'project_ppe';
    
    public function getProjectPpes($projectId)
    {
        $select = $this->getSelect()
                       ->where(array('project_id' => $projectId));
        return $this->select($select);
    }
    
    public function deleteProjectPpes($projectId)
    {
        return parent::delete(array('project_id' => $projectId));
    }
    
    public function persistProjectPpe($projectPpe)
    {
        return parent::insert($projectPpe, null, new projectPpeHydrator);
    }
}