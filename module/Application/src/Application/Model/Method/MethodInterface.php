<?php

namespace Application\Model\Method;

interface MethodInterface
{
    function getMethodId();
    function getCategory();
    function getSubCategory();
    function getHeading();
    function getBody();
    function getTemplate();
    function getProjectId();
    function setMethodId($methodId);
    function setCategory($category);
    function setSubCategory($subCategory);
    function setHeading($heading);
    function setBody($body);
    function setTemplate($template);
    function setProjectId($projectId);
}

