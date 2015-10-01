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
        return new ViewModel();
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
            $method = $this->getMethodService();
            
            $form->bind($method);
            $form->setData($data);
            if ($form->isValid())
            {
          	// Persist method.
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
        return new ViewModel();
    }
    
    public function deleteAction()
    {
        return new ViewModel();
    }
}
    