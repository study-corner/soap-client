<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class HelloCommand extends Command
{
    protected static string $name = 'app:hello';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $soapClient = new \SoapClient('localhost:8000/soap?wsdl');
        $result = $soapClient->hello('hello', ['name' => 'Kes']);

        $io->success('Success.');

        return 0;
    }

    protected function configure()
    {
        $this->setName(self::$name);
    }
}
