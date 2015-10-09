<?php

namespace Application\Model\Method;

interface MethodMapperInterface
{
    public function deleteMethodById($methodId);
    public function getMethods();
    public function getMethodById($methodId);
    public function getMethodsByMethodCategoryId($methodCategoryId);
    public function getMethodsByProjectId($projectId);
    public function persist(MethodInterface $method);
    public function deleteByProjectId($projectId);
    public function count($search = null);
}