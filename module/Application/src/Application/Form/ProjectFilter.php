<?php

namespace Application\Form;

use Zend\InputFilter\InputFilter;

class ProjectFilter extends InputFilter
{
    public function __construct()
    {
        // project name
        $this->add(array(
            'name'       => 'project_name',
            'required'   => true,
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'max' => 100,
                    ),
                ),
            ),
            'filters'   => array(
                array('name' => 'StringTrim'),
            ),
        ));
        
        // project name
        $this->add(array(
            'name'       => 'project_ref',
            'required'   => false,
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'max' => 30,
                    ),
                ),
            ),
            'filters'   => array(
                array('name' => 'StringTrim'),
            ),
        ));
        
        // Client Name
        $this->add(array(
            'name'       => 'client_name',
            'required'   => false,
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'max' => 60,
                    ),
                ),
            ),
            'filters'   => array(
                array('name' => 'StringTrim'),
            ),
        ));
        
        // start date
        $this->add(array(
            'name'       => 'start_date',
            'required'   => true,
        ));
    }
}