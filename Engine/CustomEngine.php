<?php

namespace Engine;
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\Templating\TemplateReferenceInterface;

/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 12/11/15
 * Time: 14:08
 */
class CustomEngine implements EngineInterface
{
    public function render($name, array $parameters = array())
    {
        return uniqid();
    }

    public function exists($name)
    {
        return true;
    }

    public function supports($name)
    {
        return strstr($name, ".html") !== false;
    }
}