<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use function Termwind\ask;
use function Termwind\render;

class MilesToKilometers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'miles_to_km';

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
        $miles = render(view('termwind.miles_to_km')->render());
        $kilometers = $miles * 1.60934;

        render(view('termwind.miles_to_km_result', ['m' => $miles, 'km' => $kilometers])->render());

        return 0;
    }
}
