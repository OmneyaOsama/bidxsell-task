<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\JsonFlattenerService;

class JsonFlattenerServiceTest extends TestCase
{
    protected $jsonFlattenerService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->jsonFlattenerService = new JsonFlattenerService();
    }

    public function test_flatten_json()
    {
        $input = ['a' => 1, 'b' => ['c' => 2, 'd' => 3], 'e' => 4];
        $expected = ['a' => 1, 'b.c' => 2, 'b.d' => 3, 'e' => 4];

        $this->assertEquals($expected, $this->jsonFlattenerService->flatten($input));
    }
}
