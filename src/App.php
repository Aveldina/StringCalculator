<?php

declare(strict_types=1);
// src/App.php

namespace App;

use Symfony\Component\Console;

class App extends Console\Application
{
    /**
     * @param array<int, Console\Command\Command> $commands
     */
    public function __construct(iterable $commands)
    {
        $commands = $commands instanceof \Traversable ? \iterator_to_array($commands) : $commands;

        foreach ($commands as $command) {
            $this->add($command);
        }

        parent::__construct();
    }
}
