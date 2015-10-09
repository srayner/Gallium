<?php

namespace Application\Form;

use Zend\Form\Form;

class ProjectForm extends Form
{
    public function __construct()
    {
        parent::__construct();
        
        $this->setAttribute('class', 'zend-form');
        
        $this->add(array(
                'name' => 'project_name',
                'options' => array(
                        'label' => 'Project Name',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'project_ref',
                'options' => array(
                        'label' => 'Project Ref',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'client_name',
                'options' => array(
                        'label' => 'Client',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'principle_contractor',
                'options' => array(
                        'label' => 'Principle Contractor',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'location_of_works',
                'options' => array(
                        'label' => 'Location of Works',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'start_date',
                'options' => array(
                        'label' => 'Start Date',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'end_date',
                'options' => array(
                        'label' => 'End Date',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'site_address1',
                'options' => array(
                        'label' => 'Site Address',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'site_address2',
                'options' => array(
                        'label' => ' ',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'site_address3',
                'options' => array(
                        'label' => ' ',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'site_address4',
                'options' => array(
                        'label' => ' ',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'site_address2',
                'options' => array(
                        'label' => ' ',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'post_code',
                'options' => array(
                        'label' => 'Post Code',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'site_supervisor_name',
                'options' => array(
                        'label' => 'Site Supervisor',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        $this->add(array(
                'name' => 'site_supervisor_phone',
                'options' => array(
                        'label' => 'Site Supervisor Phone',
                ),
                'attributes' => array(
                        'type' => 'text',
                        'class' => 'form-control input-sm'
                ), 
        ));
        
        // Save and exit button.
        $this->add(array(
            'name' => 'save',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Save and exit',
                'id'    => 'saveandexit',
                'class' => 'btn btn-sm btn-default'
            ),
        ));
        
        // Next button
        $this->add(array(
            'name' => 'next',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Next',
                'id'    => 'next',
                'class' => 'btn btn-sm btn-primary'
            ),
        ));
    }
}