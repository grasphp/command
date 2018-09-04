<?php declare(strict_types = 1);
namespace App\Command;

use Illuminate\Support\Str;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCommand extends Command
{
    protected $code = '<?php declare(strict_types=1);
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class %1$s
 *
 * @package App\Command
 */
class %1$s extends Command
{
    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName(\'%2$s\');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        // code...
    }
}
';

    protected function configure()
    {
        $this
            ->setName('create:command')
            ->setDescription('Create a new command class file')
            ->setHelp('CreateCommand. Create a new command class file with scaffolded content')
            ->addArgument('className', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $className = $input->getArgument('className');
        $commandName   = Str::snake($className, ':');

        file_put_contents(
            __DIR__ ."/$className.php",
            sprintf(
                $this->code,
                $className,
                $commandName
            )
        );
    }
}
