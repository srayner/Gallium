<?php

namespace Application\Form;

use Zend\Form\Form;

class ActivityForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        
        $this->setAttribute('class', 'zend-form');
        
        $this->add(array(
                'name' => 'activity',
                'options' => array(
                        'label' => 'Activity',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'hazard',
                'options' => array(
                        'label' => 'Hazard',
                ),
                'attributes' => array(
                        'type' => 'textarea',
                        'class' => 'form-control input-sm',
                        'rows'  => '5'
                ), 
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'risk_probability',
            'options' => array(
                'label' => 'Risk Probability',
                'value_options' => array(
                    '1' => 'Improbable',
                    '2' => 'Low',
                    '3' => 'Medium',
                    '4' => 'High',
                    '5' => 'Certain'
                ),
            )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'risk_severity',
            'options' => array(
                    'label' => 'Risk Severity',
                    'value_options' => array(
                        '1' => 'Minor',
                        '2' => 'Low',
                        '3' => 'Medium',
                        '4' => 'High',
                        '5' => 'Major'
                     ),
             )
        ));
        
        $this->add(array(
            'name' => 'control_measures',
            'options' => array(
                    'label' => 'Control Measures',
            ),
            'attributes' => array(
                    'type' => 'textarea',
                    'class' => 'form-control input-sm',
                    'rows'  => '5'
            ), 
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'final_risk_probability',
            'options' => array(
                'label' => 'Final Risk Probability',
                'value_options' => array(
                    '1' => 'Improbable',
                    '2' => 'Low',
                    '3' => 'Medium',
                    '4' => 'High',
                    '5' => 'Certain'
                ),
            )
        ));
        
        $this->add(array(
            'type' => 'Zend\Form\Element\Select',
            'name' => 'final_risk_severity',
            'options' => array(
                    'label' => 'Final Risk Severity',
                    'value_options' => array(
                        '1' => 'Minor',
                        '2' => 'Low',
                        '3' => 'Medium',
                        '4' => 'High',
                        '5' => 'Major'
                     ),
             )
        ));
        
        $this->add(array(
                'name' => 'person_at_risk',
                'options' => array(
                        'label' => 'Person at risk',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
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