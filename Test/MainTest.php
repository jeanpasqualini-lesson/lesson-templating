<?php
/**
 * Created by PhpStorm.
 * User: prestataire
 * Date: 09/11/15
 * Time: 17:28
 */

namespace Test;

use Engine\CustomEngine;
use \Interfaces\TestInterface;
use Symfony\Component\Templating\DelegatingEngine;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;


// http://symfony.com/doc/current/components/form/form_events.html
class MainTest implements TestInterface

{
    public function runTest()
    {
        $loader = new FilesystemLoader(__DIR__.'/../views/%name%');

        $templating = new DelegatingEngine(array(
            new PhpEngine(new TemplateNameParser(), $loader),
            new CustomEngine()
        ));

        echo "===== Php Engine ===".PHP_EOL;;

        echo $templating->render("hello.php", array("firstname" => "Fabien"));

        echo PHP_EOL;

        echo "===== Custom Engine ====".PHP_EOL;

        echo PHP_EOL;

        echo $templating->render("hello.html");

        echo PHP_EOL;
    }
}