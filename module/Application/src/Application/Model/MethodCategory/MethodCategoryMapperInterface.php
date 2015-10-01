<?php

namespace Application\Model\MethodCategory;

interface MethodCategoryMapperInterface
{
    public function getMethodCategories();
    public function getMethodCategoryById($methodCategoryId);
    public function persist(MethodCategoryInterface $methodCategory);
    public function count($search = null);
}