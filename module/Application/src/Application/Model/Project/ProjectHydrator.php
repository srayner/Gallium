<?php

namespace Application\Model\Project;

use Zend\Stdlib\Hydrator\ClassMethods;
use Application\Hydrator\Strategy\DateTimeStrategy;

class ProjectHydrator extends ClassMethods
{
    public function __construct($format = 'Y-m-d')
    {
        parent::__construct();
        $dateStrategy = new DateTimeStrategy($format);
        $this->addStrategy('start_date', $dateStrategy);
        $this->addStrategy('end_date', $dateStrategy);
        $this->addStrategy('created_date', $dateStrategy);
        $this->addStrategy('modified_date', $dateStrategy);
    }
    
    public function extract($object)
    {
        if (!$object instanceof ProjectInterface) {
            throw new \InvalidArgumentException('$object must be an instance of Application\Model\Project\ProjectInterface');
        }
        $data = parent::extract($object);
        
        return $data;
    }
    
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof ProjectInterface) {
            throw new \InvalidArgumentException('$object must be an instance of Application\Model\Project\ProjectInterface');
        }       
        return parent::hydrate($data, $object);
    }  
}