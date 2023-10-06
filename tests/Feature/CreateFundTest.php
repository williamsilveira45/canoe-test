<?php

namespace Tests\Feature;

use App\Modules\Core\Models\FundManager;
use Tests\TestCase;

class CreateFundTest extends TestCase
{
    public function test_create_fund(): void
    {
        $manager = FundManager::factory()->create();

        $response = $this->postJson('/api/funds', [
            'name' => 'Test Fund',
            'start_year' => 2021,
            'manager_id' => $manager->getKey(),
        ]);

        $response->assertStatus(201);
    }
}
