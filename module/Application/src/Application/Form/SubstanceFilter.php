<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;

class SubstanceFilter extends InputFilter
{
    public function __construct()
    {
        // substance name
        $this->add(array(
            'name'       => 'substance_name',
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