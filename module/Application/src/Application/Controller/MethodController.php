<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MethodController extends AbstractActionController
{
    protected $methodService;
    
    private function getMethodService()
    {
        if (null === $this->methodService)
        {
            $this->methodService = $this->getServiceLocator()->get('app_method_service');
        }
        return $this->methodService;
    }
    
    public function indexAction()
    {
        $methods = $this->getMethodService()->getMethods();
        return array (
            'methods' => $methods
        );
    }
    
    public function addAction()
    {
        // Create new form and hydrator instances.
        $form = $this->getServiceLocator()->get('app_method_form');
         
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {
            // POST, so check if valid.
            $data = (array) $request->getPost();
          
            // Create a new method object.
            $method = $this->getServiceLocator()->get('app_method');
            
            $form->bind($method);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist method.
                $method->setTemplate(true);
            	$this->getMethodService()->persist($method);
                
            	// Redirect to list of methods
		return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'method',
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
                 'controller' => 'method',
                 'action' => 'add'
             ));
        }
        
        // Grab the method with the specified id.
        $method = $this->getMethodService()->getMethodById($id);
        
        $form = $this->getServiceLocator()->get('app_method_form');
        $form->bind($method);
        $form->get('submit')->setAttribute('value', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
        
            $form->setData($request->getPost());
            if ($form->isValid()) {
                
                // Persist method.
                $this->getMethodService()->persist($method);
                
                // Redirect to list of methods
                return $this->redirect()->toRoute('application/default', array(
                    'controller' => 'method',
                    'action' => 'index'
                ));
            }     
        }
        
        return array(
             'methodId' => $id,
             'form' => $form,
        );   
    }
    
    public function deleteAction()
    {
        // Ensure we have a method id, if not redirect to method list
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('application/default', array('controller' => 'method'));
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Only perform delete if value posted was 'Yes'.
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getMethodService()->deleteMethodById($id);
            }

            // Redirect to list of methods
            return $this->redirect()->toRoute('application/default', array('controller' => 'method'));
         }
        
        // If not a POST request, then render the confirmation page.
        return array(
            'id'    => $id,
            'method' => $this->getMethodService()->getMethodById($id)    
        );
    }
}
    