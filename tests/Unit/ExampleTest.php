<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = collect([
            'name' => 'Laratips',
            'platform' => 'YouTube',
        ]);

        dd($data->has(['name', 'platform']));
    }
}
