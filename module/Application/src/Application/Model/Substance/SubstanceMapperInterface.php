<?php

namespace Application\Model\Substance;

interface SubstanceMapperInterface
{
    public function getSubstances();
    public function getSubstanceById($substanceId);
    public function persist(SubstanceInterface $substance);
    public function deleteSubstanceById($substanceId);
    
}