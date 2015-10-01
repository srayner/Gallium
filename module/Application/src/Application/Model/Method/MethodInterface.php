<?php

namespace Application\Model\Method;

interface MethodInterface
{
    function getMethodId();
    function getMethodCategoryId();
    function getHeading();
    function getBody();
    function setMethodId($methodId);
    function setMethodCategoryId($methodCategoryId);
    function setHeading($heading);
    function setBody($body);
}

