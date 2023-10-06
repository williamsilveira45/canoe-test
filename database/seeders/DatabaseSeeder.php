<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Modules\Core\Models\Company;
use App\Modules\Core\Models\Fund;
use App\Modules\Core\Models\FundAlias;
use App\Modules\Core\Models\FundManager;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Fund::factory(10)->create();
        FundAlias::factory(10)->create();
        FundManager::factory(10)->create();
        Company::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
