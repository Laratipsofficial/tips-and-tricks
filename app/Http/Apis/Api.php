<?php

namespace App\Http\Apis;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Traits\ForwardsCalls;

abstract class Api
{
    use ForwardsCalls;

    protected PendingRequest $http;

    public function __construct()
    {
        $this->http = $this->initialize();
    }

    public function __call($method, $params)
    {
        return $this->forwardCallTo($this->http, $method, $params);
    }

    abstract public function initialize(): PendingRequest;
}
