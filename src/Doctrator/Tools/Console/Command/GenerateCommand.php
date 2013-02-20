<?php

namespace Doctrator\Tools\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;
use Mandango\Mondator\Mondator;

class GenerateCommand extends Command
{
  /**
   * @inheritDoc
   */
  protected function configure()
  {
    $this
      ->setName('doctrator:generate')
      ->setDescription('Generate entity classes from config classes.')
      ->addOption('schema-dir', null, InputOption::VALUE_REQUIRED, 'The directory where your schema files (config classes) are located.')
      ->addOption('model-dir', null, InputOption::VALUE_REQUIRED, 'The directory where your model files will be dumped.')
    ;
  }

  /**
   * @inheritDoc
   */
  protected function execute(InputInterface $input, OutputInterface $output)
  {
    // check that the user provided a schema dir
    if (!$input->getOption('schema-dir')) {
      return $output->writeln('<error>You must provide the directory where your schema files (config classes) are located to the "schema-dir" option.</error>');
    } else {
      if (!is_dir($input->getOption('schema-dir'))) {
        return $output->writeln('<error>The provided schema directory does not exists.</error>');
      }
    }

    // check that the user provided a model dir
    if (!$input->getOption('model-dir')) {
      return $output->writeln('<error>You must provide the directory where your model files will be dumped to the "model-dir" option.</error>');
    } else {
      if (!is_dir($input->getOption('model-dir'))) {
        return $output->writeln('<error>The provided model directory does not exists.</error>');
      }
    }

    // process schemas (config classes)
    $output->writeln('<info>Processing config classes.</info>');
    $configClasses = array();
    $finder = new Finder;
    foreach ($finder->files()->name('*.yml')->followLinks()->in($input->getOption('schema-dir')) as $file) {
      foreach ((array) Yaml::parse($file) as $class => $configClass) {
        $configClasses[$class] = $configClass;
      }
    }

    // generate classes
    $output->writeln('<info>Generating classes.</info>');
    $mondator = new Mondator;
    $mondator->setExtensions(array(
        new \Doctrator\Extension\Core(array(
            'default_output' => $input->getOption('model-dir')
        ))
      , new \Doctrator\Extension\ArrayAccess()
      , new \Doctrator\Extension\ActiveRecord()
      , new \Doctrator\Extension\Behaviors()
    ));
    $mondator->setConfigClasses($configClasses);
    $mondator->process();
  }
}

