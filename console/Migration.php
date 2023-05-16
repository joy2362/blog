<?php

namespace Console;

require_once realpath('config.php');

use Database\DB;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Migration extends Command
{
    private string $filePath = '/database/migration/table';

    private string $namespace = 'Database\\migration\\table';

    protected function configure()
    {
        $this->setName('create:migration')
            ->setDescription('create migration file')
            ->setHelp('create migration file for the project')
            ->addArgument('name', InputArgument::REQUIRED, 'Pass the migration name.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $progressBar = new ProgressBar($output, 1);
        $progressBar->start();
        $path = getSourceFilePath($this->filePath, date("_Y_m_d_H_i_s_") . $input->getArgument('name'));
        makeDirectory(dirname($path));
        $contents = generateStubContents(
            $this->getStubPath(),
            $this->getStubVariables(date("_Y_m_d_H_i_s_") . $input->getArgument('name'))
        );
        $progressBar->finish();
        $output->writeln('');
        createFile($path, $contents) ?
            $output->writeln('Migration successfully created') :
            $output->writeln('Migration already exits');
        return Command::SUCCESS;
    }

    public function getStubPath(): string
    {
        return realpath('') . '/stubs/migration.stub';
    }

    public function getStubVariables($name): array
    {
        $nameSpace = $this->namespace;
        $names = explode('/', $name);
        $className = end($names);
        array_pop($names);

        if (!empty($names)) {
            foreach ($names as $name) {
                $nameSpace .= "\\{$name}";
            }
        }
        return [
            'NAMESPACE' => $nameSpace,
            'CLASS_NAME' => $className,
            'NAME' => $className,
        ];
    }
}