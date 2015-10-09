<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ActivityController extends AbstractActionController
{
    protected $activityService;
    
    private function getActivityService()
    {
        if (null === $this->activityService)
        {
            $this->activityService = $this->getServiceLocator()->get('app_activity_service');
        }
        return $this->activityService;
    }
    
    public function indexAction()
    {
        $activities = $this->getActivityService()->getActivities();
        return array (
            'activities' => $activities
        );
    }
    
    public function addAction()
    {
        // Create new form and hydrator instances.
        $form = $this->getServiceLocator()->get('app_activity_form');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new activity object.
            $activity = $this->getServiceLocator()->get('app_activity');
            
            $form->bind($activity);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist activity.
            	$this->getActivityService()->persistActivity($activity);
                
            	// Redirect to list of projects
		return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'activity',
		    'action'     => 'index'
		));
            }
        } 
        
        // If not a POST request, or invalid data, then just render the form.
        return array(
            'form'   => $form,
        );
        
    }
    
    public function editAction()
    {
        // Ensure we have an id, else redirect to add action.
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
             return $this->redirect()->toRoute('application/default', array(
                 'controller' => 'activity',
                 'action' => 'add'
             ));
        }
        
        // Grab the activity with the specified id.
        $activity = $this->getActivityService()->getActivityById($id);
        
        $form = $this->getServiceLocator()->get('app_activity_form');
        $form->bind($activity);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Persist activity.
                $this->getActivityService()->persistActivity($activity);
                
                // Redirect to list of activities
                return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'activity',
                    'action' => 'index'
                ));
            }     
        }
        
        return array(
             'activityId' => $id,
             'form' => $form,
        );   
    }
    
    public function deleteAction()
    {
        
    }
}   