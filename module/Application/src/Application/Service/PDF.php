<?php

namespace Application\Service;

class PDF
{
    public function generateDocument()
    {
        $document = new \TCPDF(PDF_PAGE_ORIENTATION, 'mm', 'A4', true, 'UTF-8', false);
        $document->setPrintHeader(false);
        $document->setPrintFooter(false);
//$fontname = \TCPDF_FONTS::addTTFfont('data/fonts/arialbd.ttf', 'TrueTypeUnicode', '', 32);
        $document->addPage();
        $document->SetFont('arial', '', 11, '', true);
        
        return $document;
    }
    
    public function write($doc, $txt, $size, $style = '')
    {
        $fontname = 'arial';
        if (strpos($style, 'B') !== false) {
            $fontname = 'arialbd';
        }
        $doc->SetFont($fontname, '', $size, '', true);
        $doc->write(0, $txt, '', false, '', false);  
    }
    
    public function writeLine($doc, $txt, $size, $style = '')
    {
        $fontname = 'arial';
        if (strpos($style, 'B') !== false) {
            $fontname = 'arialbd';
        }
        $doc->SetFont($fontname, '', $size, '', true);
        $doc->write(0, $txt, '', false, '', true);  
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
    
    public function addImage($document, $imagePath)
    {
        $document->Image($imagePath, 0, 0, 85, 85);
        return $this;
    }
    
    
}