<?php

namespace Tests\Feature;

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
