<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function generate(Request $request)
    {
        return "invoice generate";
    }

    public function download(Request $request)
    {
        return "invoice download";
    }

    public function send(Request $request)
    {
        return "invoice send";
    }
}
