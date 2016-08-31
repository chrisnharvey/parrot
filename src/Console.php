<?php

namespace Nimbusoft\Parrot;

use Nimbusoft\Parrot\Parrot;
use Nimbusoft\Parrot\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Application as BaseApplication;

class Console extends BaseApplication
{
    public function __construct(Parrot $parrot)
    {
        $this->parrot = $parrot;

        parent::__construct('Parrot', Parrot::VERSION);

        $this->getDefinition()->addOptions($this->getDefaultOptions());
    }

    public function findPlugins()
    {
        // Use the passed plugin-dir argument to find plugin phar files
        // and load them.
    }

    protected function getDefaultOptions(): array
    {
        return [
            new InputOption('--plugin-dir', '-p', InputOption::VALUE_OPTIONAL, 'The directory containing Parrot plugins.', '/usr/lib/parrot/plugins')
        ];
    }

    protected function getDefaultCommands(): array
    {
        return array_merge(parent::getDefaultCommands(), [
            new Command\RunCommand
        ]);
    }
}