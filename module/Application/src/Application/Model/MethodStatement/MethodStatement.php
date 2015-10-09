<?php

namespace Application\Model\MethodStatement;

class MethodStatement
{
    protected $methodId;
    protected $statementId;
    
    public function __construct($methodId, $statementId)
    {
        $this->methodId = $methodId;
        $this->statementId = $statementId;
    }
    
    function getMethodId()
    {
        return $this->methodId;
    }

    function getStatementId() 
    {
        return $this->statementId;
    }

    function setMethodId($methodId)
    {
        $this->methodId = $methodId;
        return $this;
    }

    function setStatementId($statementId)
    {
        $this->statementId = $statementId;
        return $this;
    }
}