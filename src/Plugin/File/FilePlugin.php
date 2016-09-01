<?php

namespace Nimbusoft\Parrot\Plugin\File;

use Nimbusoft\Parrot\Parrot;
use League\Event\EventInterface;
use Nimbusoft\Parrot\Extension\AbstractPlugin;

class FilePlugin extends AbstractPlugin
{
    public function register()
    {
        $this->parrot->listen('run', [$this, 'run'], Parrot::P_NORMAL);
    }

    public function run(EventInterface $event)
    {
        $config = $event->getConfig();

        if ( ! isset($config['files'])) return;
        if (isset($config['files']['adapter'])) $config['files'] = [$config['files']];
    }
}