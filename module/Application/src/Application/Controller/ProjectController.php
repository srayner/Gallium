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
        // Generate and output a method statment.
        $projectId = (int) $this->params()->fromRoute('id', 0);
        $project = $this->getProjectService()->getProjectById($projectId);
        $pdfService = $this->getServiceLocator()->get('pdf_service');
        
        $methodService = $this->getServiceLocator()->get('app_method_service');
        $methods = $methodService->getMethodsByProjectId($projectId);
        
        $service = $this->getServiceLocator()->get('app_substance_service');
        $substances = $service->getSubstancesByProjectId($projectId);
        
        
      //  $service = $this->getServiceLocator()->get('app_project_ppe_service');
      //  $ppe = $service->getProjectPpes($projectId);
        
        $doc = $pdfService->generateDocument();
        
        $doc->setImageScale(1.53);
        $doc->Image('data/images/WilliamsLogo.png', 10, 10);
        
        $pdfService->writeLine($doc, '', 10);
        $pdfService->writeLine($doc, '', 10);
        $pdfService->writeLine($doc, '', 10);
        $pdfService->writeLine($doc, '', 10);
        $pdfService->writeLine($doc, '', 10);
        
        $pdfService->writeLine($doc, 'Method Statement', 16, 'B');
        $pdfService->writeLine($doc, $project->getProjectName(), 24);
        
        // Ref
        $pdfService->write($doc, 'Project Ref: ', 10);
        $pdfService->writeLine($doc, $project->getProjectRef(), 10, 'B');    
       
        // Address
        $pdfService->writeLine($doc, '', 10);
        $pdfService->writeLine($doc, 'Site Address:', 10);
        $pdfService->writeLine($doc, $project->getSiteAddress1(), 10, 'B');
        $pdfService->writeLine($doc, $project->getSiteAddress2(), 10, 'B');
        $pdfService->writeLine($doc, $project->getSiteAddress3(), 10, 'B');
        $pdfService->writeLine($doc, $project->getSiteAddress4(), 10, 'B');
        $pdfService->writeLine($doc, $project->getPostCode(), 10, 'B');
        
        // Client
        $pdfService->writeLine($doc, '', 10);
        $pdfService->write($doc, 'Client: ', 10);
        $pdfService->writeLine($doc, $project->getClientName(), 10, 'B');
        
        // Contrator
        $pdfService->writeLine($doc, '', 10);
        $pdfService->write($doc, 'Principle Contractor: ', 10);
        $pdfService->writeLine($doc, $project->getPrincipleContractor(), 10, 'B');
        
        // Location of works
        $pdfService->writeLine($doc, '', 10);
        $pdfService->write($doc, 'Location of works: ', 10);
        $pdfService->writeLine($doc, $project->getLocationOfWorks(), 10, 'B');
        
        // Start and end date
        $pdfService->writeLine($doc, '', 10);
        $pdfService->write($doc, 'Start and end date: ', 10);
        $pdfService->write($doc, $project->getStartDate()->format('d/m/Y') . ' to ', 10, 'B');
        $pdfService->writeLine($doc, $project->getEndDate()->format('d/m/Y'), 10, 'B');
        
        // Supervisor
        $pdfService->writeLine($doc, '', 10);
        $pdfService->write($doc, 'Site Supervisor Name: ', 10);
        $pdfService->writeLine($doc, $project->getSiteSupervisorName(), 10, 'B');
        
        // Supervisor Phone
        $pdfService->writeLine($doc, '', 10);
        $pdfService->write($doc, 'Site Supervisor Phone: ', 10);
        $pdfService->writeLine($doc, $project->getSiteSupervisorPhone(), 10, 'B');
        
        
        foreach($methods as $method)
        {                    
            $pdfService->writeLine($doc, '', 10);
            $pdfService->writeLine($doc, $method->getHeading(), 11, 'B');
            $pdfService->writeLine($doc, $method->getBody(), 10);
            
        }
      
        foreach ($substances as $substance)
        {
            $pdfService->addImage($doc, $substance->getImagePath());
        }
        
        $doc->Output('example_001.pdf', 'I');
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
    
    public function fontAction()
    {
        $pdf->addTTFfont('/path-to-font/DejaVuSans.ttf', 'TrueTypeUnicode', '', 32);
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
