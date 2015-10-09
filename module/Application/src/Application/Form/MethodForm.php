<?php

namespace Application\Form;

use Zend\Form\Form;

class MethodForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        
        $this->setAttribute('class', 'zend-form');
        
        $this->add(array(
                'name' => 'category',
                'options' => array(
                        'label' => 'Category',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'sub_category',
                'options' => array(
                        'label' => 'Sub-category',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'heading',
                'options' => array(
                        'label' => 'Method Header',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'body',
                'options' => array(
                        'label' => 'Method Text',
                ),
                'attributes' => array(
                        'type' => 'textarea',
                        'class' => 'form-control input-sm',
                        'rows'  => '5'
                ), 
        ));
        
        // Submit button.
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Add',
                'id'    => 'submitbutton',
                'class' => 'btn btn-primary'
            ),
        ));
    }
}