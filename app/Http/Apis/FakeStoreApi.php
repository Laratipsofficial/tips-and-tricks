<?php

namespace App\Http\Apis;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class FakeStoreApi extends Api
{
    public function initialize(): PendingRequest
    {
        return Http::acceptJson()->baseUrl('https://fakestoreapi.com');
    }
}
