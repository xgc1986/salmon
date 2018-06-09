<?php

namespace App\Command;

use Pheanstalk\Pheanstalk;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsumerCommand extends Command
{

    protected function configure()
    {
        $this->setName('s:consume');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $p = new Pheanstalk('beanstalk', '11300');
        $p->watch('demo');
        $p->ignore('hello');
        $job = $p->reserve();

        $output->writeln($job->getData());

        $p->delete($job);

        return 0;
    }
}