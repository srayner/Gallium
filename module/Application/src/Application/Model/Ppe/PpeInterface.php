<?php

namespace Application\Model\Ppe;

interface PpeInterface
{
    public function getPpeId();
    public function getPpeName();
    public function getImagePath();
    public function setPpeId($ppeId);
    public function setPpeName($ppeName);
    public function setImagePath($imagePath);
}

