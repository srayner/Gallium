<?php

namespace Application\Service;

class PDF
{
    public function generateDocument()
    {
        $document = new \TCPDF(PDF_PAGE_ORIENTATION, 'mm', 'A4', true, 'UTF-8', false);
        $document->addPage();
        $document->SetFont('Helvetica', '', 12, '', true);
        return $document;
    }
    
    public function addHtml($document, $html)
    {
        $document->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        return $this;
    }
    
    public function addTextArray($document, $array)
    {
        foreach ($array as $element) {
            $this->addHTML($document, '<br><h2>' . $element['header'] . '</h2>');
            $this->addHTML($document, $element['body']);
        }
        return $this;
    }
}