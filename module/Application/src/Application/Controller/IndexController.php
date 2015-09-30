<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function pdfAction()
    {
        $service = $this->getServiceLocator()->get('pdf_service');
        $document = $service->generateDocument();
        
        $html = '<h1>Method Statement</h1>';
        $service->addHtml($document, $html);
 
        $html = <<<EOD
 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
    when an unknown printer took a galley of type and scrambled it to make a type
    specimen book. It has survived not only five centuries, but also the leap into
    electronic typesetting, remaining essentially unchanged. It was popularise
    in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
    and more recently with desktop publishing software like Aldus PageMaker including
    versions of Lorem Ipsum.</p>
EOD;
        $array = array(
            array(
                'header' => 'Statement 1',
                'body' => $html
            ),
            array(
                'header' => 'Statement 2',
                'body' => $html
            ),
            array(
                'header' => 'Statement 3',
                'body' => $html
            ),
        );
        
                
        $service->addTextArray($document, $array);
                
        $document->Output('example_001.pdf', 'I');
        
    }
}
