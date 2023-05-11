<?php

namespace Console;

require_once realpath(__DIR__ . '../../config.php');

use Database\DB;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Migrate extends Command
{
    private string $namespace = '\\Database\\migration\\table\\';

    protected function configure()
    {
        $this->setName('migrate')
            ->setDescription('migrate database')
            ->setHelp('migrate database for the project')
            ->addArgument('username', InputArgument::REQUIRED, 'Pass the username.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $location = realpath(__DIR__ . '../../database/migration/table');

        $files = array_diff(scandir($location), array(".", ".."));

        $progressBar = new ProgressBar($output, count($files));

        $progressBar->start();
        foreach ($files as $file) {
            if (str_ends_with($file, ".php")) {
                $class = $this->getClass($file);
                $classWithNameSpace = $this->getClassWithNameSpace($class);
                $migration = new $classWithNameSpace();
                $sql = $this->prepareSql($migration->table, $migration->create());

                DB::connection()->exec($sql);
                sleep(2);
                $progressBar->advance();
            }
        }
        $progressBar->finish();
        $output->writeln('');
        $output->writeln('Migrate complete.');
        return Command::SUCCESS;
    }

    private function getClass($fileName): string
    {
        return str_replace(".php", "", $fileName);
    }

    private function getClassWithNameSpace($class): string
    {
        return $this->namespace . $class;
    }

    private function prepareSql($name, $tableCols)
    {
        $sql = "CREATE TABLE IF NOT EXISTS " . $name . "\n";
        $columns = " ( \n";

        foreach ($tableCols as $key => $value) {
            if (!next($tableCols)) {
                $columns .= $key . " " . $value . "  \n";
            } else {
                $columns .= $key . " " . $value . " , \n";
            }
        }

        $columns .= " )  ";
        $sql .= $columns;

        return $sql;
    }


}