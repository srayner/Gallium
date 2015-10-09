<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class PpeController extends AbstractActionController
{
    protected $ppeService;
    
    private function getPpeService()
    {
        if (null === $this->ppeService)
        {
            $this->ppeService = $this->getServiceLocator()->get('app_ppe_service');
        }
        return $this->ppeService;
    }
    
    public function indexAction()
    {
        $ppes = $this->getPpeService()->getPpes();
        return array (
            'ppes' => $ppes
        );
    }
    
    public function addAction()
    {
        // Create new form
        $form = $this->getServiceLocator()->get('app_ppe_form');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new substance object.
            $ppe = $this->getServiceLocator()->get('app_ppe');
            
            $form->bind($ppe);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist ppe.
            	$this->getPpeService()->persist($ppe);
                
            	// Redirect to list of methods
		return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'ppe',
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
                 'controller' => 'ppe',
                 'action' => 'add'
             ));
        }
        
        // Grab the ppe with the specified id.
        $ppe = $this->getPpeService()->getPpeById($id);
        
        $form = $this->getServiceLocator()->get('app_ppe_form');
        $form->bind($ppe);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Persist substance.
                $this->getPpeService()->persist($ppe);
                
                // Redirect to list of ppes
                return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'ppe',
                    'action' => 'index'
                ));
            }     
        }
        
        return array(
             'ppeId' => $id,
             'form' => $form,
        );   
    }
    
    public function deleteAction()
    {
        // Ensure we have a ppe id, if not redirect to ppe list
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('application/default', array('controller' => 'ppe'));
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Only perform delete if value posted was 'Yes'.
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getPpeService()->deletePpeById($id);
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