<?php

namespace Application\Model\Substance;

class Substance implements SubstanceInterface
{
    protected $substanceId;
    protected $substanceName;
    protected $ImagePath;
    
    function getSubstanceId()
    {
        return $this->substanceId;
    }

    function getSubstanceName()
    {
        return $this->substanceName;
    }

    function getImagePath()
    {
        return $this->ImagePath;
    }

    function setSubstanceId($substanceId)
    {
        $this->substanceId = $substanceId;
        return $this;
    }

    function setSubstanceName($substanceName)
    {
        $this->substanceName = $substanceName;
        return $this;
    }

    function setImagePath($ImagePath)
    {
        $this->ImagePath = $ImagePath;
        return $this;
    }


}
