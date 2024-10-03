<?php

namespace Tests\Feature;

use Tests\TestCase;

class CaesarCipherTest extends TestCase
{
    public function test_caesar_cipher_success()
    {
        $response = $this->getJson('/api/problems/caesar-cipher?input_string=ABC&shift=3');

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'data' => ['encoded' => 'DEF']
                 ]);
    }

    public function test_caesar_cipher_error()
    {
        $response = $this->getJson('/api/problems/caesar-cipher?input_string=&shift=');

        $response->assertStatus(400)
                 ->assertJson([
                     'success' => false,
                     'message' => 'Invalid input or shift value.',
                 ]);
    }
}
