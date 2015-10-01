<?php

namespace Application\Model\MethodCategory;

class MethodCategory
{
    protected $methodCategoryId;
    protected $title;
    
    function getMethodCategoryId()
    {
        return $this->methodCategoryId;
    }

    function getTitle()
    {
        return $this->title;
    }

    function setMethodCategoryId($methodCategoryId)
    {
        $this->methodCategoryId = $methodCategoryId;
        return $this;
    }

    function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }   
}