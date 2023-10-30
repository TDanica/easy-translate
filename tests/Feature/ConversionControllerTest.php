<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConversionControllerTest extends TestCase
{
    /** @test */
    public function it_can_convert_currencies()
    {
        $payload = [
            'amount' => 100,
            'from_currency' => 'EUR',
            'to_currency' => 'USD'
        ];

        $response = $this->post('/convert', $payload);

        $response->assertStatus(200)
            ->assertJson([
                'success' => 'Conversion created successfully'
            ]);
    }
}
