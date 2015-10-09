<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;

class PpeFilter extends InputFilter
{
    public function __construct()
    {
        // ppe name
        $this->add(array(
            'name'       => 'ppe_name',
            'required'   => true,
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'max' => 120,
                    ),
                ),
            ),
            'filters'   => array(
                array('name' => 'StringTrim'),
            ),
        ));
    }
}