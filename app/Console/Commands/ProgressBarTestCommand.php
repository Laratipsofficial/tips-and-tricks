<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ProgressBarTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'progressbar:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $items = range(1, 3);

        $progressbar = $this->output->createProgressBar(count($items));

        $progressbar->start();

        foreach ($items as $item) {
            // perform some operation
            sleep(1);

            $progressbar->advance();
        }

        $progressbar->finish();

        return 0;
    }
}
