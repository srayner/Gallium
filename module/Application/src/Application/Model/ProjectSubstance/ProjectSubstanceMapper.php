<?php

namespace Application\Model\ProjectSubstance;

use ZfcBase\Mapper\AbstractDbMapper;
use Application\Service\DbAdapterAwareInterface;

class ProjectSubstanceMapper extends AbstractDbMapper implements ProjectSubstanceMapperInterface, DbAdapterAwareInterface
{
    protected $tableName = 'project_substance';
    
    public function getProjectSubstances($projectId)
    {
        $select = $this->getSelect();
        return $this->select($select)
                    ->where(array('project_id' => $projectId));
    }
    
    public function deleteProjectSubstances($projectId)
    {
        return parent::delete(array('project_id' => $projectId));
    }
    
    public function persistProjectSubstance($projectSubstance)
    {
        return parent::insert($projectSubstance, null, new projectSubstanceHydrator);
    }
}