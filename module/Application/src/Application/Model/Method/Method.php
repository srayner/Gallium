<?php

namespace Application\Model\Method;

class Method implements MethodInterface
{
    protected $methodId;
    protected $methodCategoryId;
    protected $heading;
    protected $body;
    
    function getMethodId()
    {
        return $this->methodId;
    }

    function getMethodCategoryId()
    {
        return $this->methodCategoryId;
    }

    function getHeading()
    {
        return $this->heading;
    }

    function getBody()
    {
        return $this->body;
    }

    function setMethodId($methodId)
    {
        $this->methodId = $methodId;
        return $this;
    }

    function setMethodCategoryId($methodCategoryId)
    {
        $this->methodCategoryId = $methodCategoryId;
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
}
    

