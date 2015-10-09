<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;

class ActivityFilter extends InputFilter
{
    public function __construct()
    {
        // hazard
        $this->add(array(
            'name'       => 'hazard',
            'required'   => true,
            'filters'   => array(
                array('name' => 'StringTrim'),
            ),
        ));
    }
}