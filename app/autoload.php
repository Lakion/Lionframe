<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader([$loader, 'loadClass']);
AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation', "/../vendor/jms/serializer/src");

return $loader;
