<?php

require_once __DIR__.'/../bootstrap.php';

use Symfony\Component\Console\Application;


// Helper set configuration
// ------------------------

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db'     => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection())
  , 'dialog' => new \Symfony\Component\Console\Helper\DialogHelper()
  , 'em'     => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));


// CLI Application configuration
// -----------------------------

$cli = new Application('BMurphy Command Line Interface', \BMurphy\Version::VERSION);
$cli->setCatchExceptions(true);
$cli->setHelperSet($helperSet);


// Add commands
// ------------

$cli->addCommands(array(
  // DBAL Commands
  // -------------

    new \Doctrine\DBAL\Tools\Console\Command\RunSqlCommand()
  , new \Doctrine\DBAL\Tools\Console\Command\ImportCommand()


  // ORM commands
  // ------------

  , new \Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand()
  , new \Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand()
  , new \Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand()
  , new \Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand()
  , new \Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand()
  , new \Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand()
  , new \Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand()
  , new \Doctrine\ORM\Tools\Console\Command\ConvertDoctrine1SchemaCommand()
  , new \Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand()
  , new \Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand()
  , new \Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand()
  , new \Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand()
  , new \Doctrine\ORM\Tools\Console\Command\RunDqlCommand()
  , new \Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand()
  , new \Doctrine\ORM\Tools\Console\Command\InfoCommand()


  // Migrations commands
  // -------------------

  , new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand()
  , new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand()
  , new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand()
  , new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand()
  , new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand()
  , new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand()


  // Doctrator commands
  // ------------------

  , new \Doctrator\Tools\Console\Command\GenerateCommand()
));


// Run CLI application
// -------------------

$cli->run();
