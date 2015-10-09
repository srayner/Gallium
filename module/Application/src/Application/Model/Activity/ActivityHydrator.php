<?php

namespace Application\Model\Activity;

use InvalidArgumentException;
use Zend\Stdlib\Hydrator\ClassMethods;
use Application\Hydrator\Strategy\DateTimeStrategy;

class ActivityHydrator extends ClassMethods
{
    public function __construct($format = 'Y-m-d')
    {
        parent::__construct();
        $dateStrategy = new DateTimeStrategy($format);
        $this->addStrategy('created_date', $dateStrategy);
        $this->addStrategy('modified_date', $dateStrategy);
    }
    
    public function extract($object)
    {
        if (!$object instanceof ActivityInterface) {
            throw new InvalidArgumentException('$object must be an instance of ' . __NAMESPACE__ . '\ActivityInterface');
        }
        $data = parent::extract($object);
        unset($data['risk']);
        unset($data['final_risk']);
        return $data;
    }
    
    public function hydrate(array $data, $object)
    {
        if (!$object instanceof ActivityInterface) {
            throw new InvalidArgumentException('$object must be an instance of ' . __NAMESPACE__ . '\ActivityInterface');
        }       
        return parent::hydrate($data, $object);
    }  
}
