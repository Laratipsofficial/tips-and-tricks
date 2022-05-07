<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestCommandTest extends TestCase
{
    /** @test */
    public function randomCommandTest()
    {
        $this->artisan('test:command')
            ->doesntExpectOutputToContain('laratips');
    }
}
