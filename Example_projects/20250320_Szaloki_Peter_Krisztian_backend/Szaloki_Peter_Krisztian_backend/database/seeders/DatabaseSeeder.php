<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $vehicleTypes = ["repülőgép", "busz", "autó", "vonat", "hajó"];
        foreach ($vehicleTypes as $type) {
            Vehicle::create([
                "type" => $type
            ]);
            // DB::table('vehicles')->insert([
            //     'type' => $type
            // ]);
        }
    }
}
