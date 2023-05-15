<?php

namespace Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Model extends Command
{

    private string $filePath = '/app/models';

    private string $namespace = 'App\\models';

    protected function configure()
    {
        $this->setName('create:model')
            ->setDescription('create model file')
            ->setHelp('create model file for the project')
            ->addArgument('name', InputArgument::REQUIRED, 'Pass the model name.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $progressBar = new ProgressBar($output, 1);
        $progressBar->start();
        $path = getSourceFilePath($this->filePath, $input->getArgument('name'));
        makeDirectory(dirname($path));
        $contents = generateStubContents(
            $this->getStubPath(),
            $this->getStubVariables($input->getArgument('name'))
        );
        $progressBar->finish();
        $output->writeln('');
        createFile($path, $contents) ?
            $output->writeln('Model successfully created') :
            $output->writeln('Model already exits');
        return Command::SUCCESS;
    }

    public function getStubPath(): string
    {
        return realpath('') . '/stubs/model.stub';
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