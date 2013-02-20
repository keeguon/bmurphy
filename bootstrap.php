<?php

// General configuration
// ---------------------

define('APP_ENV', getenv('APP_ENV') ?: 'development');
define('APP_ROOT', realpath(__DIR__));
define('CONFIG_PATH', getenv('CONFIG_PATH') ?: APP_ROOT.'/config');


// Autoload
// --------

$loader = require __DIR__.'/vendor/autoload.php';


// Doctrine configuration
// ----------------------

use Doctrine\ORM\EntityManager
  , Doctrine\ORM\Configuration;

$cache = (APP_ENV === "development") ? new \Doctrine\Common\Cache\ArrayCache : new \Doctrine\Common\Cache\AppCache;

$config = new Configuration;
$config->setMetadataCacheImpl($cache);

$driver = new \Doctrator\Driver\DoctratorDriver(__DIR__.'/src/BMurphy/Models');
$config->setMetadataDriverImpl($driver);

$config->setQueryCacheImpl($cache);
$config->setProxyDir(__DIR__.'/src/BMurphy/Proxies');
$config->setProxyNamespace('BMurphy\Proxies');
$config->setAutoGenerateProxyClasses(false);

$dbConfig = \Symfony\Component\Yaml\Yaml::parse(CONFIG_PATH.'/database.yml');
$em = EntityManager::create(array_merge(array(PDO::ATTR_PERSISTENT => true), $dbConfig[APP_ENV]), $config);


// Doctrator configuration
// -----------------------

use Doctrator\EntityManagerContainer;

EntityManagerContainer::setEntityManager($em);
