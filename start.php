<?php

Autoloader::map(array(
	'Pheanstalk'             => __DIR__ . '/pheanstalk.php',
	'Pheanstalk\\Pheanstalk' => __DIR__ . '/pheanstalk/classes/Pheanstalk.php',
));

$pheanstalkClassRoot = dirname(__FILE__) . '/pheanstalk/classes';
require_once $pheanstalkClassRoot . '/Pheanstalk/ClassLoader.php';

Pheanstalk_ClassLoader::register($pheanstalkClassRoot);
