<?php declare(strict_types = 1);
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
     * @method  configure
     * @return  void
     */
    protected function configure()
    {
        $this->setName('run');
    }

    /**
     * @method  execute
     * @param   InputInterface   $input
     * @param   OutputInterface  $output
     * @return  void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // code...
    }
}
