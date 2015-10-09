<?php

namespace Application\Model\ProjectPpe;

use ZfcBase\Mapper\AbstractDbMapper;
use Application\Service\DbAdapterAwareInterface;

class ProjectPpeMapper extends AbstractDbMapper implements ProjectPpeMapperInterface, DbAdapterAwareInterface
{
    protected $tableName = 'project_ppe';
    
    public function getProjectPpes($projectId)
    {
        $select = $this->getSelect();
        return $this->select($select)
                    ->where(array('project_id' => $projectId));
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