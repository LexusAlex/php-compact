<?php

declare(strict_types=1);

namespace Compact\Ci\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class IndexCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('test')
            ->setDescription('test Command')
            ->setHelp('Command');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Hello!</info>');

        return 0;
    }
}
