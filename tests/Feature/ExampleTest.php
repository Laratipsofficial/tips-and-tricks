<?php

use function Pest\Laravel\get;

it('has a home page', function () {
    get('/')->assertOk();
});
