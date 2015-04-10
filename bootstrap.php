<?php
/**
 * Bootstrap the API and autoloaders
 * @author daithi coombes <webeire@gmail.com>
 */
namespace = BlueMix\PersonalityInsightsPHP;

/** @var Singleton Config The runtime configuration */
$singleton;


/**
 * Autoloader
 */
spl_autoload(function($class){

});
require_once('vendor/autoload.php');
