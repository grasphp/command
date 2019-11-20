<?php

declare(strict_types=1);

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Run
 */
class Run extends Command
{
    /**
     * Configure command
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('run');
    }

    /**
     * Run command
     *
     * @param InputInterface  $input  Command input interface.
     * @param OutputInterface $output Command output interface.
     *
     * @return integer|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello, World!');
        return null;
    }
}
