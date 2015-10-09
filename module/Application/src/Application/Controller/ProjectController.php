<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class ProjectController extends AbstractActionController
{
    protected $projectService;
    
    private function getProjectService()
    {
        if (null === $this->projectService)
        {
            $this->projectService = $this->getServiceLocator()->get('app_project_service');
        }
        return $this->projectService;
    }
    
    public function indexAction()
    {
        $projects = $this->getProjectService()->getProjects();
        return array (
            'projects' => $projects
        );
    }
    
    public function enterDetailAction()
    {
        $form = $this->getServiceLocator()->get('app_project_form');
        
        // If we have an Id grab the current details from the database.
        $id = (int) $this->params()->fromRoute('id', 0);
        if ($id) {
            $project = $this->getProjectService()->getProjectById($id);
            if($project) {
                $form->bind($project);
            }
        }
        
        // Check if the request is a POST.
        $request = $this->getRequest();
        if ($request->isPost())
        {    
            // If we don't yet have a project, create a new project. 
            if (!isset($project)) {
                $project = $this->getServiceLocator()->get('app_project');
                $form->bind($project);
            }
            
            $form->setData($request->getPost());
            if ($form->isValid())
            {
          	// Persist project.
            	$this->getProjectService()->persistProject($project);
                
                // redirect
                return $this->redirectTo($request->getPost('next', 'Exit'), $id);
            }
        }
        
        // If not a POST request, or invalid data, then just render the form.
        return array(
            'form'   => $form,
            'id'     => $id
        );
        
    }
    
    public function deleteAction()
    {
        // Ensure we have a project id, if not redirect to project list
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('application/default', array('controller' => 'project'));
        }
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            // Only perform delete if value posted was 'Yes'.
            $del = $request->getPost('del', 'No');
            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getProjectService()->deleteProjectById($id);
            }

            // Redirect to list of projects
            return $this->redirect()->toRoute('application/default', array('controller' => 'project'));
         }
        
        // If not a POST request, then render the confirmation page.
        return array(
            'id'    => $id,
            'project' => $this->getProjectService()->getProjectById($id)    
        );
    }
    
    public function riskAssessmentAction()
    {
        // Ensure we have an id, else redirect to add action.
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('application/default', array(
                'controller' => 'project',
            ));
        }
        return array(
            'id' => $id
        );
    }
    
    public function methodStatementAction()
    {
        // Ensure we have an id, else redirect to add action.
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('application/default', array(
                'controller' => 'project',
            ));
        }
        
        $service = $this->getServiceLocator()->get('app_method_service');
        $methods = $service->getMethods();
        
        $substanceService = $this->getServiceLocator()->get('app_substance_service');
        $substances = $substanceService->getSubstances();
    
        $ppeService = $this->getServiceLocator()->get('app_ppe_service');
        $ppes = $ppeService->getPpes();
        
        return array(
            'methods'    => $methods,
            'substances' => $substances,
            'ppes'       => $ppes,
            'projectId'  => $id
        );
    }
    
    public function createMethodsAction()
    {
        $request= $this->getRequest();
        $methodIds    = $this->extractValues($request->getPost(), 'method_');
        $substanceIds = $this->extractValues($request->getPost(), 'substance_');
        $ppeIds       = $this->extractValues($request->getPost(), 'ppe_');
        $projectId = (int) $this->params()->fromRoute('id', 0);
        $service = $this->getProjectService();
        $service->createMethods($methodIds, $projectId)
                ->createSubstances($substanceIds, $projectId)
                ->createPpes($ppeIds, $projectId);
        
        return $this->redirect()->toRoute('application/default', array (
            'controller' => 'project',
            'action' => 'preview',
            'id' => $projectId
        ));
    }
    
    public function previewAction()
    {
        require_once("vendor/dompdf/dompdf/dompdf_config.inc.php");
        
        // Generate and output a method statment.
        $projectId = (int) $this->params()->fromRoute('id', 0);
        $project = $this->getProjectService()->getProjectById($projectId);
        
        $methodService = $this->getServiceLocator()->get('app_method_service');
        $methods = $methodService->getMethodsByProjectId($projectId);
        
        $substanceService = $this->getServiceLocator()->get('app_substance_service');
        $substances = $substanceService->getSubstancesByProjectId($projectId);
        
        $ppeService = $this->getServiceLocator()->get('app_ppe_service');
        $ppes = $ppeService->getPpesByProjectId($projectId);
        
        ob_start();
        include('./data/pdf/style.phtml');
        include('./data/pdf/template.phtml');
        $html = ob_get_contents();
        ob_end_clean();

        $dompdf = new \DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream("sample.pdf", array("Attachment" => 0));   
    }
    
    private function redirectTo($next, $id)
    {
        if ($next == 'Next') {
            return $this->redirect()->toRoute('application/default', array(
                 'controller' => 'project',
                 'action'     => 'risk_assessment',
                 'id'         => $id
             ));
        }
        
        return $this->redirect()->toRoute('application/default', array(
            'controller' => 'project'
        ));
    }
    
    private function extractValues($data, $prefix)
    {
        $result = array();
        foreach ($data as $key => $value)
        {
            if (substr($key, 0, strlen($prefix)) == $prefix) {
                array_push($result, $value);
            }
        }
        return $result;
    }
}   
