<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class HelloCommand extends Command
{
    protected static string $defaultName = 'app:hello';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $soapClient = new \SoapClient('http://127.0.0.1:8000/soap?wsdl');
        $result = $soapClient->call('hello', ['name' => 'Kes']);

        $io->success('Success.');

        return 0;
    }
}
