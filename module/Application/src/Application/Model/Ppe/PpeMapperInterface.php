<?php

namespace Application\Model\Ppe;

interface PpeMapperInterface
{
    public function getPpes();
    public function getPpeById($substanceId);
    public function persist(PpeInterface $ppe);
    public function deletePpeById($ppeId);
}