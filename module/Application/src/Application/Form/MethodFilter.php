<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;

class MethodFilter extends InputFilter
{
    public function __construct()
    {
        // header
        $this->add(array(
            'name'       => 'heading',
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