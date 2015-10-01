<?php

namespace Application\Model\MethodCategory;

interface MethodCategoryInterface
{
    function getMethodCategoryId();
    function getTitle();
    function setMethodCategoryId($methodCategoryId);
    function setTitle($title);
}