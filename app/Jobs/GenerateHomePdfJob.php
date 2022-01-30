<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Spatie\Browsershot\Browsershot;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class GenerateHomePdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Browsershot::html(view('welcome', ['users' => User::get()])->render())
            ->showBackground()
            ->format('A4')
            ->savePdf(storage_path('app/pdfs/home-queued.pdf'));
    }
}
