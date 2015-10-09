<?php

namespace Application\Model\Method;

class Method implements MethodInterface
{
    protected $methodId;
    protected $category;
    protected $subCategory;
    protected $heading;
    protected $body;
    protected $template;
    protected $projectId;

    function getMethodId()
    {
        return $this->methodId;
    }

    function getCategory()
    {
        return $this->category;
    }
    
    function getSubCategory()
    {
        return $this->subCategory;
    }

    function getHeading()
    {
        return $this->heading;
    }

    function getBody()
    {
        return $this->body;
    }

    function getTemplate()
    {
        return $this->template;
    }
    
    function getProjectId()
    {
        return $this->projectId;
    }

    function setMethodId($methodId)
    {
        $this->methodId = $methodId;
        return $this;
    }

    function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }
    
    function setSubCategory($subCategory)
    {
        $this->subCategory = $subCategory;
        return $this;
    }

    function setHeading($heading)
    {
        $this->heading = $heading;
        return $this;
    }

    function setBody($body)
    {
        $this->body = $body;
        return $this;
    }
    
    function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
    
    function setProjectId($projectId)
    {
        $this->projectId = $projectId;
        return $this;
    }
}
   