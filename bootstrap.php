<?php
/**
 * Bootstrap the API and autoloaders.
 *
 * @author daithi coombes <webeire@gmail.com>
 */
namespace PersonalityInsightsPHP;
use FOS\RestBundle;

/** @var Singleton Config The runtime configuration */
$singleton;


/**
 * Autoloader.
 * Anonymous function.
 * @param string The full classname with namespace.
 */
spl_autoload_register(function($class){

    $filename = str_replace(
        "\\", "/",
        str_replace('PersonalityInsightsPHP', 'lib', $class)
    ).'.php';

    if (is_readable($filename))
        require_once($filename);
});
require_once('vendor/autoload.php');

$config = Config::getInstance();
