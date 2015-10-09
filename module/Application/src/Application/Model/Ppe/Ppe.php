<?php

namespace Application\Model\Ppe;

class Ppe implements PpeInterface
{
    protected $ppeId;
    protected $ppeName;
    protected $imagePath;
    
    public function getPpeId()
    {
        return $this->ppeId;
    }

    public function getPpeName()
    {
        return $this->ppeName;
    }

    public function getImagePath()
    {
        return $this->imagePath;
    }

    public function setPpeId($ppeId)
    {
        $this->ppeId = $ppeId;
        return $this;
    }

    public function setPpeName($ppeName)
    {
        $this->ppeName = $ppeName;
        return $this;
    }

    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
        return $this;
    }

}
