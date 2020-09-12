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

        $soapClient = new \SoapClient('http://soap-server.test/soap?wsdl');
        $result = $soapClient->hello('Kestutis', ['name' => 'Kes']);

        $io->writeln($result);

        $io->success('Success.');

        return 0;
    }

    protected function configure()
    {
        $this->setName(self::$name);
    }
}
