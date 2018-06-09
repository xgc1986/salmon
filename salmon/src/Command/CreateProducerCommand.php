<?php

namespace App\Command;

use Pheanstalk\Pheanstalk;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateProducerCommand extends Command
{

    protected function configure()
    {
        $this->setName('s:produce');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $p = new Pheanstalk('beanstalk', '11300');
        $p->useTube('demo');
        $p->put('hello');

        return 0;
    }
}