<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CaesarService;

class CaesarServiceTest extends TestCase
{
    protected $caesarService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->caesarService = new CaesarService();
    }

    public function test_encode_with_shift()
    {
        $this->assertEquals('DEF', $this->caesarService->encode('ABC', 3));
        $this->assertEquals('zab', $this->caesarService->encode('xyz', 2));
    }
}
