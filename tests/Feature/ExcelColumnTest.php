<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExcelColumnTest extends TestCase
{
    public function test_get_excel_column_success()
    {
        $response = $this->getJson('/api/problems/excel-column/28');

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'data' => ['column' => 'AB']
                 ]);
    }

    public function test_get_excel_column_error()
    {
        $response = $this->getJson('/api/problems/excel-column/0');

        $response->assertStatus(400)
                 ->assertJson([
                     'success' => false,
                     'message' => 'Index must be a positive integer.',
                 ]);
    }
}
