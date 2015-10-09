<?php

namespace Application\Model\Substance;

interface SubstanceInterface
{
    public function getSubstanceId();
    public function getSubstanceName();
    public function getImagePath();
    public function setSubstanceId($substanceId);
    public function setSubstanceName($substanceName);
    public function setImagePath($imagePath);
}

