<?php

namespace Application\Model\Method;

interface MethodMapperInterface
{
    public function getMethods();
    public function getMethodById($methodId);
    public function getMethodsByMethodCategoryId($methodCategoryId);
    public function persist(MethodInterface $method);
    public function count($search = null);
}