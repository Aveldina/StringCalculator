<?php

declare(strict_types=1);

namespace App\Command;

use App\Service\StringCalculatorService;
use Symfony\Component\Console;

class StringCalculatorCommand extends Console\Command\Command
{
    protected static $defaultName = 'calc';

    public function __construct(private StringCalculatorService $stringCalculatorService)
    {
        parent::__construct(self::$defaultName);
    }

    protected function configure(): void
    {
        $this->setDescription('Splits and calculates a string');
        $this->addArgument('input', Console\Input\InputArgument::REQUIRED, 'A string that will be calculated');
    }

    protected function execute(Console\Input\InputInterface $input, Console\Output\OutputInterface $output): int
    {
        $inputString = strval($input->getArgument('input'));
        $inputString = str_replace('\\n', PHP_EOL, $inputString);
        $output->writeln((string) $this->stringCalculatorService->add($inputString));

        return self::SUCCESS;
    }
}
