<?php

namespace App\Http\Apis;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class LaratipsApi extends Api
{
    public function initialize(): PendingRequest
    {
        return Http::acceptJson()->baseUrl('http://laratips.test/api');
    }
}
