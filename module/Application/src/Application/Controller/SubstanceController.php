<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class SubstanceController extends AbstractActionController
{
    protected $substanceService;
    
    private function getSubstanceService()
    {
        if (null === $this->substanceService)
        {
            $this->substanceService = $this->getServiceLocator()->get('app_substance_service');
        }
        return $this->substanceService;
    }
    
    public function indexAction()
    {
        $substances = $this->getSubstanceService()->getSubstances();
        return array (
            'substances' => $substances
        );
    }
    
    public function addAction()
    {
        // Create new form
        $form = $this->getServiceLocator()->get('app_substance_form');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new substance object.
            $substance = $this->getServiceLocator()->get('app_substance');
            
            $form->bind($substance);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist substance.
            	$this->getSubstanceService()->persist($substance);
                
            	// Redirect to list of methods
		return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'substance',
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
                 'controller' => 'substance',
                 'action' => 'add'
             ));
        }
        
        // Grab the substance with the specified id.
        $substance = $this->getSubstanceService()->getSubstanceById($id);
        
        $form = $this->getServiceLocator()->get('app_substance_form');
        $form->bind($substance);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Persist substance.
                $this->getsubstanceService()->persist($substance);
                
                // Redirect to list of substances
                return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'substance',
                    'action' => 'index'
                ));
            }     
        }
        
        return array(
             'substanceId' => $id,
             'form' => $form,
        );   
    }
    
    public function deleteAction()
    {
        // Ensure we have a method id, if not redirect to method list
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('application/default', array('controller' => 'substance'));
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Only perform delete if value posted was 'Yes'.
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getSubstanceService()->deleteSubstanceById($id);
            }

            // Redirect to list of methods
            return $this->redirect()->toRoute('application/default', array('controller' => 'substance'));
         }
        
        // If not a POST request, then render the confirmation page.
        return array(
            'id'    => $id,
            'substance' => $this->getSubstanceService()->getSubstanceById($id)    
        );
    }
}   