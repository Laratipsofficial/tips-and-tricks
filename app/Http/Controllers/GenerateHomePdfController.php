<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateHomePdfJob;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class GenerateHomePdfController extends Controller
{
    public function __invoke(Request $request)
    {
        GenerateHomePdfJob::dispatch();

        return redirect()->back()->with('success', 'Pdf generated successfully.');
    }
}
