<?php

namespace Tests\Feature;

use Tests\TestCase;

class JsonFlattenerTest extends TestCase
{
    public function test_json_flattener_success()
    {
        $inputJson = '{"a":1,"b":{"c":2,"d":3},"e":4}';
        $expected = ['a' => 1, 'b.c' => 2, 'b.d' => 3, 'e' => 4];

        $response = $this->getJson('/api/problems/json-flattener?input_json=' . urlencode($inputJson));

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'data' => $expected
                 ]);
    }

    public function test_json_flattener_invalid_json()
    {
        $inputJson = '{"a":1,"b":2,"e":4'; // Invalid JSON

        $response = $this->getJson('/api/problems/json-flattener?input_json=' . urlencode($inputJson));

        $response->assertStatus(400)
                 ->assertJson([
                     'success' => false,
                     'message' => 'Invalid JSON input.',
                 ]);
    }
}
